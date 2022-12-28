<?php

namespace Modules\Calendar\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Calendar\Entities\Event;

class CalendarController extends Controller
{
    public function getAllEvents()
    {
        $from = request()->get('start_date');
        $to = request()->get('end_date');

        $events = Event::when(!auth()->user()->hasAnyRole(['admin', 'superadmin']), function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->whereBetween('start', [$from, $to])->get();

        return $events;
    }
}
