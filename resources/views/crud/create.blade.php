@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h3>@if(isset($entity))Modifica @else Aggiungi @endif {{trans('crm.modules.'.strtolower($entityName).'.singular_name')}}</h3>
                    </div>
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
