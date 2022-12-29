<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Schema;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Setting\DataTables\CustomViewsDataTable;
use Modules\Setting\Entities\CustomView;
use Modules\Setting\Entities\Entity;

class CustomViewController extends BaseController
{

    public $datatable = CustomViewsDataTable::class;
    public $entityName = 'customview';
    public $entityClass = CustomView::class;


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(FormBuilder $formBuilder)
    {

        $entityName = $this->entityName;

        return view('setting::custom-view.create', compact('entityName'));
    }

    public function getAjaxList()
    {
        $jsonResponse = [];

        $models = getAllModels();
        foreach ($models as $namespace => $model) {
            $namespace = '\\Modules\\' . $namespace;
            $entity = new $namespace();
            $table = $entity->table;
            if (!$table) {
                $table = strtolower($model) . "s";
            }

            $columns = \Schema::getColumnListing($table);

            $tmpColumns = [];
            foreach ($columns as $column) {
                $tmpColumns[] = [
                    'field' => $column,
                    'namespace' => $namespace,
                    'model' => $model,
                    'label' => $model . ' / ' . trans('crm.columns.' . $column)
                ];
            }

            $entityObj = Entity::where('class', ltrim($namespace, "\\"))->first();
            if ($entityObj) {
                foreach ($entityObj->customFields as $column) {
                    $tmpColumns[] = [
                        'field' => $column,
                        'namespace' => $namespace,
                        'model' => $model,
                        'label' => $model . ' / ' . trans('crm.columns.' . $column)
                    ];
                }
            }


            $jsonResponse[] = [
                'name' => $model,
                'fields' => $tmpColumns
            ];

        }

        return response()->json($jsonResponse);
    }
}
