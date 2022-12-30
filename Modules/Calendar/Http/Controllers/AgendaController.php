<?php

namespace Modules\Calendar\Http\Controllers;

use App\Http\Controllers\BaseController;
use Modules\Calendar\DataTables\AgendaDataTable;
use Modules\Calendar\Entities\Agenda;
use Modules\Calendar\Entities\Event;
use Modules\Calendar\Forms\AgendaForm;

class AgendaController extends BaseController
{
    public $entityName = 'agenda';
    public $formClass = AgendaForm::class;

    public $entityClass = Agenda::class;
    public $datatable = AgendaDataTable::class;

    public function getUserUnavailabilities()
    {
        $from = request()->get('start');
        $to = request()->get('end');
        $userId = request()->get('user_id');

        $events = Agenda::where('user_id', $userId)->where('end', '>=', $from . ' 00:00:00')
            ->where('start', '<=', $to . ' 23:59:59')->get();

        $json = [];

        foreach ($events as $event) {
            $json[] = [
                'start' => $event->start,
                'end' => $event->end,
                'title' => 'Non disponibile'
            ];
        }

        $appointments = Event::where('user_id', $userId)->where('end', '>=', $from . ' 00:00:00')
            ->where('start', '<=', $to . ' 23:59:59')->get()->toArray();

        $json = array_merge($appointments, $json);

        return response()->json($json);
    }

    public function getUserUnavailabilitiesDayTime()
    {
        $from = request()->get('start');
        $to = request()->get('end');
        $userId = request()->get('user_id');

        $events = Agenda::where('user_id', $userId)->where('end', '>=', $from . ' 00:00:00')
            ->where('start', '<=', $to . ' 23:59:59')->get();

        $json = [];

        foreach ($events as $event) {
            $json[] = [
                'start' => $event->start,
                'end' => $event->end,
                'title' => 'Non disponibile'
            ];
        }

        $appointments = Event::where('user_id', $userId)->where('end', '>=', $from . ' 00:00:00')
            ->where('start', '<=', $to . ' 23:59:59')->get()->toArray();

        $json = array_merge($appointments, $json);


        $day = new \DateTime($from);

        $hours = [];

        return view('calendar::partials.time_box', compact('day', 'hours'));
    }
}
