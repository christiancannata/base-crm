<?php

namespace Modules\Setting\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\CustomView;
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
    public function query(CustomView $model): QueryBuilder
    {
        return $model->newQuery();
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
