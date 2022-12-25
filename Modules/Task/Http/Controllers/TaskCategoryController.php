<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Task\DataTables\TaskCategoriesDataTable;
use Modules\Task\DataTables\TasksDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Forms\TaskCategoryForm;
use Modules\Task\Forms\TaskForm;

class TaskCategoryController extends BaseController
{

    public $datatable = TaskCategoriesDataTable::class;
    public $entityName = 'taskcategory';
    public $entity = TaskCategory::class;
    public $formClass = TaskCategoryForm::class;

}
