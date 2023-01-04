<?php

namespace Modules\Task\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskStatus;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TaskStatusesDataTable extends BaseDataTable
{

    public $route = 'taskstatus';


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Model $model) {
                return view('datatables.action', ['entity' => $model, 'route' => $this->route]);
            })
            ->addColumn('parent_name', function ($status) {
                return $status->parent ? $status->parent->name : '-';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TaskStatus $model): QueryBuilder
    {
        return $model->newQuery()->with('parent');
    }


    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make([
                'data' => 'name',
                'title' => 'Nome'
            ]),
            Column::make([
                'data' => 'parent_name',
                'title' => 'Padre'
            ]),
            Column::computed('action', '')
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
        return 'Stati_' . date('YmdHis');
    }
}
