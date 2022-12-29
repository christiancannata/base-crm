@extends('layouts.app')

@section('content')

    @include('contract::components.contracts_histogram')

    @include('calendar::components.calendar',['eventsRoute' => route('calendar.all-events')])
@endsection
