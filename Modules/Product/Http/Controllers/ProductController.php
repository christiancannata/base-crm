<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Product\DataTables\ProductDataTable;
use Modules\Product\Entities\Product;
use Modules\Product\Forms\ProductForm;

class ProductController extends BaseController
{
    public $entityName = 'product';
    public $formClass = ProductForm::class;
    public $entityClass = Product::class;
    public $datatable = ProductDataTable::class;
}
