<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\CarbonPeriod;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
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
        $params = request()->get('range');

        $dates = explode(" - ", $params);

        $from = \DateTime::createFromFormat('d-m-Y', $dates[0]);
        $to = \DateTime::createFromFormat('d-m-Y', $dates[1]);

        $events = Event::where('model_type', Task::class)->whereBetween('created_at', [$from->format("Y-m-d 00:00:00"), $to->format("Y-m-d 23:59:59")])->get();
        $contracts = Contract::whereBetween('start_date', [$from->format("Y-m-d 00:00:00"), $to->format("Y-m-d 23:59:59")])->get();

        $period = CarbonPeriod::create($from, $to);

        $x = [];
        $tmpEvents = [];
        $tmpContracts = [];
        foreach ($period as $date) {
            $x[] = $date->format('d/m');

            $tmpEvents[] = $events->whereBetween('created_at', [$date->format("Y-m-d 00:00:00"), $date->format("Y-m-d 23:59:59")])->count();
            $tmpContracts[] = $contracts->whereBetween('start_date', [$date->format("Y-m-d 00:00:00"), $date->format("Y-m-d 23:59:59")])->count();

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

        return $json;
    }

}
