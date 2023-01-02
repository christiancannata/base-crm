<?php

namespace Modules\Lead\DataTables;

use App\Http\DataTables\BaseDataTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Lead\Entities\Lead;
use Modules\Task\Entities\TaskCategory;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;

class LeadDataTable extends BaseDataTable
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
            ->addColumn('action', function (Lead $customer) {
                $route = 'lead';
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
    public function query(Lead $model): QueryBuilder
    {
        return $model->newQuery()->with(['owner'])->when(auth()->user()->hasRole('agente'), function ($q) {
            $q->where(function ($q) {
                $q->where('owner_id', auth()->user()->id)->orWhereNull('owner_id');
            });
        })->when(!empty(request()->get('category_id')), function ($q) {
            $q->whereIn('category_id', [request()->get('category_id')]);
        })
            ->when(!empty(request()->get('owner_id')), function ($q) {
                $q->whereIn('owner_id', [request()->get('owner_id')]);
            })
            ->when(!empty(request()->get('status_id')), function ($q) {
                $q->whereIn('status_id', [request()->get('status_id')]);
            })
            ->when(!empty(request()->get('first_name')), function ($q) {
                $q->where('first_name', 'LIKE', '%' . request()->get('first_name') . '%');
            })
            ->when(!empty(request()->get('last_name')), function ($q) {
                $q->where('last_name', 'LIKE', '%' . request()->get('last_name') . '%');
            })
            ->when(!empty(request()->get('phone')), function ($q) {
                $q->where('phone', 'LIKE', '%' . request()->get('phone') . '%');
            })
            ->when(!empty(request()->get('email')), function ($q) {
                $q->where('email', 'LIKE', '%' . request()->get('email') . '%');
            })
            ->when(!empty(request()->get('company_name')), function ($q) {
                $q->where('company_name', 'LIKE', '%' . request()->get('company_name') . '%');
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


    public function getFilters()
    {
        return [
            'first_name' => [
                'label' => 'Nome',
                'type' => 'text',
                'cols' => 4
            ],
            'last_name' => [
                'label' => 'Cognome',
                'type' => 'text',
                'cols' => 4
            ],
            'company_name' => [
                'label' => 'Ragione sociale',
                'type' => 'text',
                'cols' => 4
            ],
            'phone' => [
                'label' => 'Telefono',
                'type' => 'text',
                'cols' => 4
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'cols' => 4
            ],
            'owner_id' => [
                'label' => 'Creato da',
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

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected
    function filename(): string
    {
        return 'Leads_' . date('YmdHis');
    }


}
