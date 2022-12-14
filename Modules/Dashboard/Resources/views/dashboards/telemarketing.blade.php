<?php
$latestTasks = \Modules\Task\Entities\Task::where('created_by_id', auth()->user()->id)->orderBy('created_at', 'DESC')->limit(10)->get();
?>

<div class="total-visits-browse-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="total-visits-content card-box-style">
                    <div class="main-title d-flex justify-content-between align-items-center">
                        <h3>Ultimi Appuntamenti aggiunti</h3>
                        <a href="{{route('task.create')}}" class="btn btn-success">Aggiungi Appuntamento</a>
                    </div>

                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th scope="col">Lead</th>
                            <th scope="col">Agente</th>
                            <th scope="col">Data</th>
                            <th scope="col">Aggiunto il</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($latestTasks as $task)
                            <tr>
                                <th scope="row">
                                    <a href="{{route('task.edit',['task' => $task])}}">
                                        {{$task->lead->full_name}}


                                    </a>
                                </th>
                                <td>
                                    <span>
                                         {{$task->assignedTo->full_name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$task->event_date->format("d-m-Y H:i")}}
                                    </span>
                                </td>

                                <td>
                                    <span>
                                        {{$task->created_at->format("d-m-Y H:i")}}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
