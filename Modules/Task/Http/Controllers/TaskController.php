<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Model;
use Modules\Calendar\Entities\Event;
use Modules\Task\DataTables\TasksDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Forms\TaskForm;

class TaskController extends BaseController
{

    public $datatable = TasksDataTable::class;
    public $entityName = 'task';
    public $entityClass = Task::class;
    public $formClass = TaskForm::class;

    public function afterStore(Model $model)
    {
        $event = new Event();
        $event->title = $model->title;
        $event->description = $model->description;
        $event->model_id = $model->id;
        $event->model_type = Task::class;
        $event->start = $model->event_date;
        $event->end = $model->event_date;
        $event->user_id = $model->assigned_to_id;
        $event->save();

    }

    public function afterDestroy($id)
    {
        Event::where('model_type', Task::class)->where('model_id', $id)->delete();

    }
}
