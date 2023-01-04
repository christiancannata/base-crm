@if(count($events)> 0)
    <ul class="performance-date-list">
        @foreach($events as $event)

            <li
                @if($event->model && $event->model->status)
                    class="status-{{$event->model->status->id}}"
                @endif
            >
                <h3>{{$event->title}} <span>{{$event->start->format("d/m/Y H:i")}}</span></h3>
                <p>{{$event->description}}</p>
            </li>
        @endforeach

    </ul>

@else
    <div class="alert alert-warning">Nessun appuntamento.</div>
@endif
