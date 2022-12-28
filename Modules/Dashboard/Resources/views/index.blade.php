@extends('layouts.app')

@section('content')

    @include('calendar::components.calendar',['eventsRoute' => route('calendar.all-events')])
@endsection
