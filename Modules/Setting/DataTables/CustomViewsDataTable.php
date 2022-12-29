<?php

namespace Modules\Setting\DataTables;

use App\Http\DataTables\BaseDataTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategory;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CustomViewsDataTable extends BaseDataTable
{
    public $route = 'customview';

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        //  $users = User::query()->select('id as value', 'id as label')->get();
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Model $model) {
                return view('datatables.action', ['entity' => $model, 'route' => $this->route]);
            })
            /*   ->searchPane('assigned_to_id', $users, function ($query, $values) {
                   $query->whereIn('assigned_to_id', $values);
               })*/
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
            ->with('category', 'status')
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
                    'data' => 'name',
                    'title' => 'Nome'
                ]
            ),
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

}
