<?php

namespace Modules\User\DataTables;

use App\Http\DataTables\BaseDataTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UsersDataTable extends BaseDataTable
{
    public $route = 'user';


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Model $model) {
                return view('datatables.user_action', ['entity' => $model, 'route' => $this->route]);
            })
            ->addColumn('roles', function (Model $model) {
                return $model->getRoleNames()->implode(', ');
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with('roles');
    }


    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            /*  Column::make([
                  'data' => 'id',
                  'title' => 'ID'
              ]),*/
            Column::make([
                'data' => 'first_name',
                'title' => 'Nome'
            ]),
            Column::make([
                'data' => 'last_name',
                'title' => 'Cognome'
            ]),
            Column::make([
                'data' => 'email',
                'name' => 'Email'
            ]),
            Column::computed('roles')
                ->title('Ruoli')
                ->addClass('text-center'),
            Column::computed('action','')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
