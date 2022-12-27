<?php

namespace Modules\Contract\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Contract\DataTables\ContractsCategoryDataTable;
use Modules\Contract\Entities\ContractCategory;
use Modules\Contract\Forms\ContractCategoryForm;

class ContractCategoryController extends BaseController
{

    public $datatable = ContractsCategoryDataTable::class;
    public $entityName = 'contractcategory';
    public $entity = ContractCategory::class;
    public $formClass = ContractCategoryForm::class;

}
