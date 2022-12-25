<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Task\DataTables\TasksDataTable;
use Modules\Task\DataTables\TaskStatusesDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskStatus;
use Modules\Task\Forms\TaskForm;
use Modules\Task\Forms\TaskStatusForm;

class TaskStatusController extends BaseController
{

    public $datatable = TaskStatusesDataTable::class;
    public $entityName = 'task';
    public $entity = TaskStatus::class;
    public $formClass = TaskStatusForm::class;

}
