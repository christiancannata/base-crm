<?php

namespace Modules\Customer\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Customer\Entities\Customer;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;

class CustomerDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Customer $customer) {
                $route = 'customer';
                return view('datatables.action', ['entity' => $customer, 'route' => $route]);
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery()->with(['owner'])->when(auth()->user()->hasRole('agente'), function ($q) {
            $q->where(function ($q) {
                $q->where('owner_id', auth()->user()->id)->orWhereNull('owner_id');
            });
        });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public
    function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('roles-table')
            ->setTableAttribute('class', 'table align-middle mb-0')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'language' => [
                    'url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')
                ],
                // other configs
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public
    function getColumns(): array
    {
        return [
            Column::make([
                'data' => 'first_name',
                'title' => 'Nome'
            ]),
            Column::make([
                'data' => 'last_name',
                'title' => 'Cognome'
            ]),
            Column::make([
                'data' => 'company_name',
                'title' => 'Ragione Sociale'
            ]),
            Column::make('email'),
            Column::make([
                'data' => 'phone',
                'title' => 'Telefono'
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
    protected
    function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
