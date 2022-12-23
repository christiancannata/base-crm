@extends('layouts.login_app')
@section('meta')
    <title>Accedi</title>
@endsection

@section('content')

    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="account-content">
                    <div class="account-header">
                        <a href="/">
                            <img width="100" src="/images/{{config('crm.logo')}}" alt="Logo CRM">
                        </a>
                        <h3>{{ __('Reset Password') }}</h3>
                    </div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="account-wrap" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="email"
                                       class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    Invia il link
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
