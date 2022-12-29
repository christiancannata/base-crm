@extends('layouts.app')

@section('content')

    @include('dashboard::dashboards.'.auth()->user()->getRoleNames()[0])

@endsection
