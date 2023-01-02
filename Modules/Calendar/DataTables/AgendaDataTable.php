<?php

namespace Modules\Calendar\DataTables;

use App\Http\DataTables\BaseDataTable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Calendar\Entities\Agenda;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;

class AgendaDataTable extends BaseDataTable
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
            ->addColumn('action', function (Agenda $customer) {
                $route = 'agenda';
                return view('datatables.action', ['entity' => $customer, 'route' => $route]);
            })
            ->editColumn('start', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->start)->format('d-m-Y H:i');
                return $formatedDate;
            })
            ->editColumn('end', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->end)->format('d-m-Y H:i');
                return $formatedDate;
            })
            ->addColumn('user_full_name', function ($data) {
                return $data->user ? $data->user->full_name : '-';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Agenda $model): QueryBuilder
    {
        return $model->newQuery()->with(['user'])->when(auth()->user()->hasRole('agente'), function ($q) {
            $q->where(function ($q) {
                $q->where('user_id', auth()->user()->id)->orWhereNull('user_id');
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
            Column::make(['data' => 'start', 'title' => 'Dal']),
            Column::make(['data' => 'end', 'title' => 'Al']),
            Column::make([
                'data' => 'user_full_name',
                'title' => 'Agente'
            ]),
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
    protected
    function filename(): string
    {
        return 'Agenda_' . date('YmdHis');
    }
}
