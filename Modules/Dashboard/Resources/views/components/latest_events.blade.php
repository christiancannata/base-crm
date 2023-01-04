
<?php
$latestTasks = \Modules\Task\Entities\Task::where('assigned_to_id', auth()->user()->id)->whereBetween('event_date', [(new \DateTime())->format("Y-m-d 00:00:00"), (new \DateTime())->format("Y-m-d 23:59:59")])->orderBy('event_date', 'ASC')->get();

?>

<div class="total-visits-browse-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="total-visits-content card-box-style">
                    <div class="main-title d-flex justify-content-between align-items-center">
                        <h3>Appuntamenti di oggi</h3>
                    </div>

                    @if(count($latestTasks) > 0)
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th scope="col">Lead</th>
                                <th scope="col">Data</th>
                                <th scope="col">Stato</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestTasks as $task)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('task.show',['task' => $task])}}">
                                            {{$task->lead->full_name}}
                                        </a>
                                    </th>

                                    <td>
                                    <span>
                                        {{$task->event_date->format("d-m-Y H:i")}}
                                    </span>
                                    </td>

                                    <td>
                                    <span>
                                      <span class="badge bg-secondary "
                                            style="background:{{$task->status->color}};color:white">{{$task->status->name}}</span>
                                    </span>
                                    </td>


                                    <td>
                                        <a class="btn btn-success" href="{{route('task.show',['task' => $task])}}">Vai
                                            all'appuntamento</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                        <div class="alert alert-warning">
                            Non hai nessun appuntamento per oggi.
                        </div>

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
