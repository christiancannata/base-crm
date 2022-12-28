<?php

namespace Modules\Task\DataTables;

use App\Http\DataTables\BaseDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskStatus;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TasksDataTable extends BaseDataTable
{
    public $route = 'task';

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->addColumn('action', function (Model $model) {
                return view('datatables.action', ['entity' => $model, 'route' => $this->route]);
            })
            ->searchPane(
            /*
             * This is the column for which this SearchPane definition is for
             */
                'status.name',
                /*
                 * Here we define the options for our SearchPane. This should be either a collection or an array with the
                 * form:
                 * [
                 *     [
                 *          'value' => 1,
                 *          'label' => 'display value',
                 *          'total' => 5, // optional
                 *          'count' => 3 // optional
                 *     ],
                 *     [
                 *          'value' => 2,
                 *          'label' => 'display value 2',
                 *          'total' => 6, // optional
                 *          'count' => 5 // optional
                 *     ],
                 * ]
                 */
                fn() => TaskStatus::query()->select('id as value', 'name as label')->get(),
                /*
                 * This is the filter that gets executed when the user selects one or more values on the SearchPane. The
                 * values are always given in an array even if just one is selected
                 */
                function (\Illuminate\Database\Eloquent\Builder $query, array $values) {
                    return $query
                        ->whereIn(
                            'status_id',
                            $values);
                }
            )
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model): QueryBuilder
    {
        return $model->newQuery()->with('category', 'status');
    }


    public function getColumns(): array
    {
        return [
            Column::make([
                    'data' => 'title',
                    'title' => 'Appuntamento'
                ]
            ),
            Column::make('description'),
            Column::make('event_date'),
            Column::make('category.name'),
            Column::make([
                'title' => 'Stato',
                'data' => 'status.name'
            ]),
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
