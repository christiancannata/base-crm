<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\CarbonPeriod;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Calendar\Entities\Event;
use Modules\Contract\Entities\Contract;
use Modules\Task\Entities\Task;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dashboard::index');
    }

    public function getChart()
    {
        $range = request()->get('range');

        if (empty($range)) {
            $now = new \DateTime();
            $lastWeek = clone $now;
            $lastWeek->sub(new \DateInterval('P7D'));
            $range = $lastWeek->format("d-m-Y") . ' - ' . $now->format("d-m-Y");
        }

        $dates = explode(" - ", $range);

        $from = \DateTime::createFromFormat('d-m-Y', $dates[0]);
        $to = \DateTime::createFromFormat('d-m-Y', $dates[1]);

        $events = Event::where('model_type', Task::class)
            ->when(auth()->user()->hasRole('agente'), function ($q) {
                $q->where('user_id', auth()->user()->id);
            })
            ->whereBetween('created_at', [$from->format("Y-m-d 00:00:00"), $to->format("Y-m-d 23:59:59")])->get();

        $contracts = Contract::whereBetween('created_at', [$from->format("Y-m-d 00:00:00"), $to->format("Y-m-d 23:59:59")])->when(auth()->user()->hasRole('agente'), function ($q) {
            $q->where('created_by_id', auth()->user()->id);
        })->get();

        $period = CarbonPeriod::create($from, $to);

        $x = [];
        $tmpEvents = [];
        $tmpContracts = [];
        $totalEvents = 0;
        $totalContracts = 0;

        foreach ($period as $date) {
            $x[] = $date->format('d/m');

            $tmpDayEvents = $events->whereBetween('created_at', [$date->format("Y-m-d 00:00:00"), $date->format("Y-m-d 23:59:59")])->count();
            $tmpDayContracts = $contracts->whereBetween('created_at', [$date->format("Y-m-d 00:00:00"), $date->format("Y-m-d 23:59:59")])->count();

            $tmpEvents[] = $tmpDayEvents;
            $tmpContracts[] = $tmpDayContracts;

            $totalContracts += $tmpDayContracts;
            $totalEvents += $tmpDayEvents;
        }

        $json = [
            'chart' => [
                'height' => 300,
                'type' => 'area',
                'stacked' => true,
                'toolbar' => [
                    'show' => true,
                    'autoSelected' => 'zoom'
                ]
            ],
            'colors' => [
                "#1765fd",
                "#bbc6cf"
            ],
            'dataLabels' => [
                'enabled' => true
            ],
            'stroke' => [
                "curve" => "smooth",
                "width" => [5, 2],
                "dashArray" => [0, 4],
                "lineCap" => "round"
            ],
            'grid' => [
                'padding' => [
                    'left' => 0,
                    'right' => 0
                ],
                'strokeDashArray' => 1
            ],
            'markers' => [
                'size' => 0,
                'hover' => [
                    'size' => 0
                ]
            ],
            'series' => [
                [
                    'name' => "Contratti",
                    'data' => $tmpContracts
                ],
                [
                    'name' => "Appuntamenti",
                    'data' => $tmpEvents
                ]
            ],
            'yaxis' => [
                "labels" => [
                    //"formatter" => ""
                ]
            ],
            'xaxis' => [
                "type" => "category",
                "categories" => $x,
                "axisBorder" => [
                    "show" => true
                ],
                "axisTicks" => [
                    "show" => true
                ]
            ],
            "fill" => [
                "type" => "gradient",
                "gradient" => [
                    "shadeIntensity" => 1,
                    "opacityFrom" => 0,
                    "opacityTo" => 0,
                    "stops" => [0, 90, 100]
                ]
            ],
            "tooltip" => [
                "x" => [
                    "format" => "dd/MM/yy"
                ]
            ],
            "legend" => [
                "position" => "bottom",
                "horizontalAlign" => "right",
                "show" => true
            ]
        ];

        return response()->json(['chart' => $json, 'total_contracts' => $totalContracts, 'total_events' => $totalEvents]);
    }

}
