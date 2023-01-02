@include('dashboard::components.latest_events')

@include('calendar::components.calendar',['eventsRoute' => route('calendar.all-events')])

@include('contract::components.contracts_histogram')
