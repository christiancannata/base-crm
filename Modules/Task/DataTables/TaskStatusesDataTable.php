<?php

namespace Modules\Task\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Task\Entities\TaskStatus;
use Yajra\DataTables\Html\Column;

class TaskStatusesDataTable extends BaseDataTable
{

    public $route = 'taskstatus';


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TaskStatus $model): QueryBuilder
    {
        return $model->newQuery();
    }


    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::computed('action','')
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
