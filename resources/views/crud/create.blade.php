@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6">
                    <div class="page-title">
                        <h3>Aggiungi {{trans('crm.modules.'.strtolower($entityName).'.name')}}</h3>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <ul class="page-title-list">
                        <li>Aggiungi {{trans('crm.modules.'.strtolower($entityName).'.name')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <div class="form-layouts-area">
        <div class="container-fluid">
            <div class="card-box-style">
                <!--  <div class="others-title">
                      <h3>Form Grid</h3>
                  </div>
  -->
                {!! form($form) !!}

            </div>

        </div>
    </div>

    <div class="flex-grow-1"></div>

@endsection


@push('scripts')
@endpush
