<?php

namespace Modules\Calendar\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Calendar\Entities\Event;

class CalendarController extends Controller
{
    public function getAllEvents()
    {
        $from = request()->get('start');
        $to = request()->get('end');

        $events = Event::when(!auth()->user()->hasAnyRole(['admin', 'superadmin']), function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->whereBetween('start', [$from, $to])->get();

        return $events;
    }

    public function getLatestEventsBox()
    {
        $now = new \DateTime();
        $endDate = clone $now;
        $endDate->add(new \DateInterval('P' . request()->get('days') . 'D'));

        $events = Event::when(!auth()->user()->hasAnyRole(['admin', 'superadmin']), function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->whereBetween('start', [$now->format("Y-m-d H:i:s"), $endDate->format("Y-m-d H:i:s")])->get();

        return view('calendar::partials.list-event', compact('events'));
    }
}
