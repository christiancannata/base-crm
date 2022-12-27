<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Task\DataTables\TaskCategoriesDataTable;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Forms\TaskCategoryForm;

class TaskCategoryController extends BaseController
{

    public $datatable = TaskCategoriesDataTable::class;
    public $entityName = 'taskcategory';
    public $entityClass = TaskCategory::class;
    public $formClass = TaskCategoryForm::class;

}
