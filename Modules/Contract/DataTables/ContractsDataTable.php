<?php

namespace Modules\Contract\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Contract\Entities\Contract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class ContractsDataTable extends BaseDataTable
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
            ->addColumn('action', function (Contract $contract) {
                $route = 'contract';
                return view('datatables.action', ['entity' => $contract, 'route' => $route]);
            })
            ->addColumn('customer_full_name', function (Contract $contract) {
                return $contract->customer ? $contract->customer->full_name : '-';
            })
            ->addColumn('created_by_full_name', function (Contract $contract) {
                return $contract->createdBy ? $contract->createdBy->full_name : '-';
            })
            ->addColumn('referent_full_name', function (Contract $contract) {
                return $contract->referent ? $contract->referent->full_name : '-';
            })
            ->editColumn('created_at', function (Contract $contract) {
                return $contract->created_at->format("d-m-Y H:i");
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contract $model): QueryBuilder
    {
        return $model->newQuery()->with(['customer', 'status', 'referent', 'createdBy', 'category']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contracts-table')
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
            ])
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make([
                'data' => 'customer_full_name',
                'title' => 'Cliente'
            ]),
            Column::make([
                'data' => 'created_at',
                'title' => 'Creato il'
            ]),
            Column::make([
                'data' => 'category.name',
                'title' => 'Categoria'
            ]),
            Column::make([
                'data' => 'status.name',
                'title' => 'Stato'
            ]),
            Column::make([
                'data' => 'type',
                'title' => 'Tipo'
            ]),
            Column::make([
                'data' => 'referent_full_name',
                'title' => 'Referente'
            ]),
            Column::computed('action')
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
