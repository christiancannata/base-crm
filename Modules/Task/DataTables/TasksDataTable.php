<?php

namespace Modules\Task\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Task\Entities\Task;
use Yajra\DataTables\Html\Column;

class TasksDataTable extends BaseDataTable
{
    public $route = 'task';

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model): QueryBuilder
    {
        return $model->newQuery()->with('category','status');
    }


    public function getColumns(): array
    {
        return [
            Column::make('title'),
            Column::make('description'),
            Column::make('event_date'),
            Column::make('category.name'),
            Column::make('status.name'),
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
