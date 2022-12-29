<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Setting\DataTables\CustomViewsDataTable;
use Modules\Setting\Entities\CustomView;

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

        return view('setting::custom-view.create',compact('entityName'));
    }
}
