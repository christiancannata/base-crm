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

        $events = Event::with('model')->when(!auth()->user()->hasAnyRole(['admin', 'superadmin']), function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->whereBetween('start', [$from, $to])->get();

        $json = [];

        foreach ($events as $event) {

            $background = null;

            if ($event->model && $event->model->status) {
                $background = $event->model->status->color;
            }

            $json[] = [
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'backgroundColor' => $background,
                'html' => view('calendar::partials.detail-popup', compact('event'))->render()
            ];
        }

        return $json;
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
