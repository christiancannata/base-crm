<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Task\DataTables\TasksDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Forms\TaskForm;

class TaskController extends BaseController
{

    public $datatable = TasksDataTable::class;
    public $entityName = 'task';
    public $entity = Task::class;
    public $formClass = TaskForm::class;

}
