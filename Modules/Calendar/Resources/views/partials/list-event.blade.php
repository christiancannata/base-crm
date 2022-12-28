@foreach($events as $event)

    <li>
        <h3>{{$event->title}} <span>{{$event->start->format("d/m/Y H:i")}}</span></h3>
        <p>{{$event->description}}</p>
    </li>
@endforeach
