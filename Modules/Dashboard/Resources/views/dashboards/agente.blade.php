@include('dashboard::components.latest_events')

@include('calendar::components.calendar',['eventsRoute' => route('calendar.all-events')])

