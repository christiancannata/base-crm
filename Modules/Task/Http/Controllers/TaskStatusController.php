<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Task\DataTables\TaskStatusesDataTable;
use Modules\Task\Entities\TaskStatus;
use Modules\Task\Forms\TaskStatusForm;

class TaskStatusController extends BaseController
{

    public $datatable = TaskStatusesDataTable::class;
    public $entityName = 'taskstatus';
    public $entityClass = TaskStatus::class;
    public $formClass = TaskStatusForm::class;

}
