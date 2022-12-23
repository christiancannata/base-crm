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
                            <img width="150" src="/images/{{config('crm.logo')}}" alt="Logo CRM">
                        </a>
                        <h3>Accedi</h3>
                    </div>

                    <form class="account-wrap" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group mb-24 icon">
                            <input required name="email" type="email" class="form-control" placeholder="Email">
                            <img src="/assets/images/icon/sms.svg" alt="sms">
                        </div>
                        <div class="form-group mb-24 icon">
                            <input required name="password" type="password" class="form-control" placeholder="Password">
                            <img src="/assets/images/icon/key.svg" alt="key">
                        </div>
                        <div class="form-group mb-24">
                            <a href="{{route('password.request')}}" class="forgot">Password dimenticata?</a>
                        </div>
                        <div class="form-group mb-24">
                            <button type="submit" class="default-btn">Accedi</button>
                        </div>
                        <!--     <div class="form-group mb-24 text-center">
                                 <p class="account">Not A Member? <a href="register.html">Create An Account</a></p>
                             </div>-->
                    </form>

                    <!-- <ul class="account-social-link">
                         <li>
                             <a href="https://www.google.com/" target="_blank">
                                 <i class='bx bxl-google'></i>
                             </a>
                         </li>
                         <li>
                             <a href="https://www.facebook.com/" target="_blank">
                                 <i class='bx bxl-facebook'></i>
                             </a>
                         </li>
                         <li>
                             <a href="https://www.twitter.com/" target="_blank">
                                 <i class='bx bxl-twitter'></i>
                             </a>
                         </li>
                     </ul> -->
                </div>
            </div>
        </div>
    </div>

@endsection
