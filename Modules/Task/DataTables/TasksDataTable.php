<?php

namespace Modules\Task\DataTables;

use App\Http\DataTables\BaseDataTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategory;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TasksDataTable extends BaseDataTable
{
    public $route = 'task';

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Model $model) {
                return view('datatables.action', ['entity' => $model, 'route' => $this->route]);
            })
            ->editColumn('event_date', function ($data) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data->event_date)->format('d-m-Y H:i');
            })
            ->editColumn('assigned_to_id', function ($data) {
                return $data->assignedTo->full_name;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('category', 'status', 'assignedTo')
            ->when(!empty(request()->get('category_id')), function ($q) {
                $q->whereIn('category_id', [request()->get('category_id')]);
            })
            ->when(!empty(request()->get('assigned_to_id')), function ($q) {
                $q->whereIn('assigned_to_id', [request()->get('assigned_to_id')]);
            })
            ->when(!empty(request()->get('status_id')), function ($q) {
                $q->whereIn('status_id', [request()->get('status_id')]);
            })
            ->when(!empty(request()->get('event_date')), function ($q) {
                $date = explode(" - ", request()->get('event_date'));
                $from = \DateTime::createFromFormat('d-m-Y', $date[0]);
                $to = \DateTime::createFromFormat('d-m-Y', $date[1]);
                if ($from && $to) {
                    $q->whereBetween('status_id', [$from->format("Y-m-d 00:00:00"), $from->format("Y-m-d 23:59:59")]);
                }
            });
    }


    public function getColumns(): array
    {
        return [
            Column::make([
                    'data' => 'title',
                    'title' => 'Appuntamento'
                ]
            ),
            Column::make('description'),
            Column::make(['data' => 'event_date', 'title' => 'Quando']),
            Column::make(['name' => 'assigned_to_id', 'data' => 'assigned_to_id', 'title' => 'Assegnato a']),
            Column::make(['data' => 'category.name', 'title' => 'Categoria']),
            Column::make([
                'title' => 'Stato',
                'data' => 'status.name'
            ]),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Tasks_' . date('YmdHis');
    }

    public function getFilters()
    {
        return [
            'event_date' => [
                'label' => 'Dal / Al',
                'type' => 'daterange',
                'cols' => 4
            ],
            'assigned_to_id' => [
                'label' => 'Assegnato a',
                'type' => 'select',
                'cols' => 4,
                'options' => User::orderBy('last_name')->get()->pluck('last_name', 'id')->toArray()
            ],
            'category_id' => [
                'label' => 'Categoria',
                'type' => 'select',
                'cols' => 4,
                'options' => TaskCategory::orderBy('name')->get()->pluck('name', 'id')->toArray()
            ]
        ];
    }
}
