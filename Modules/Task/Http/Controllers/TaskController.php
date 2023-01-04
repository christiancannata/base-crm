<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Notifications\TaskAssigned;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Calendar\Entities\Event;
use Modules\Lead\Entities\Lead;
use Modules\Task\DataTables\TasksDataTable;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskStatus;
use Modules\Task\Forms\TaskForm;

class TaskController extends BaseController
{

    public $datatable = TasksDataTable::class;
    public $entityName = 'task';
    public $entityClass = Task::class;
    public $formClass = TaskForm::class;

    public $showView = 'task::show';


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FormBuilder $formBuilder)
    {

        $form = $formBuilder->create($this->formClass);
        $form->redirectIfNotValid();

        $params = $form->getFieldValues();

        if (request()->get('hour')) {
            $params['event_date'] .= ' ' . request()->get('hour');
        }

        if ($params['lead_id'] == 'new_lead') {
            $lead = new Lead();
            $lead->fill($params['new_lead']);
            $lead->save();
            $lead->owner_id = auth()->user()->id;
            $params['lead_id'] = $lead->id;
        }

        $entity = new $this->entityClass();
        $entity->fill($params);
        $entity->save();

        if (isset($params['custom_fields'])) {
            // $entity->saveCustomFields($params['custom_fields']);
        }

        $this->afterStore($entity);

        flash()->success(trans('crm.form.success_message', ['entity' => trans('crm.modules.' . $this->entityName . '.singular_name')]));

        return redirect(route($this->entityName . '.index'));
    }

    public function afterStore(Model $model)
    {

        $endDate = clone $model->event_date;

        if (request()->get('period')) {
            $endDate->add(new \DateInterval('PT' . request()->get('period') . 'M'));
        }

        $event = new Event();
        $event->title = $model->title;
        $event->description = $model->description;
        $event->model_id = $model->id;
        $event->model_type = Task::class;
        $event->start = $model->event_date;
        $event->end = $endDate;
        $event->user_id = $model->assigned_to_id;
        $event->save();

        $event->user->notify(new TaskAssigned($model));
        //@todo: invia email all'agente
    }

    public function afterDestroy($entity)
    {
        //send email to assigned event
        $events = Event::where('model_type', Task::class)->where('model_id', $entity['id'])->get();

        foreach ($events as $event) {
            // l'evento è stato annullato
            //@todo: invia email all'agente

        }
    }

    public function updatePopupCall(Task $task)
    {
        $status = TaskStatus::where('system_name', request()->get('status_system_name'))->first();

        if (!$status) {
            flash()->error('Nessuno stato trovato con System Name = ' . request()->get('status_system_name'));
            return back();
        }

        $task->status_id = $status->id;
        $task->close_reason_id = !empty(request()->get('close_reason_id')) ? request()->get('close_reason_id') : null;
        $task->notes = request()->get('notes');
        $task->save();

        flash()->success('Chiamata esitata correttamente.');

        return back();
    }
}
