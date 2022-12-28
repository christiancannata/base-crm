<?php

namespace App\Http\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class BaseDataTable extends DataTable
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
            ->addColumn('action', function (Model $model) {
                return view('datatables.action', ['entity' => $model, 'route' => $this->route]);
            })
            ->setRowId('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
            ->setTableId($this->route . '-table')
            ->setTableAttribute('class', 'table align-middle mb-0')
            ->columns($this->getColumns())
            ->minifiedAjax()
            /*  ->addColumnDef([
                  'searchPanes' => ['show' => true],
                  'targets' => [3],
              ])*/
            //   ->searchPanes(SearchPane::make())
            ->selectStyleMulti()
            ->orderBy(1)
            ->dom('Bfrtip')
            /* ->buttons([
                 Button::make('searchPanes'),
                 Button::make('export'),
                 Button::make('reset'),

             ])*/
            ->parameters([
                'language' => [
                    'url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')
                ],
                // other configs
            ]);
    }

    public function getFilters()
    {
        return [];
    }
}
