@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="page-title">
                        <h3>Lista {{trans('crm.modules.'.strtolower($entityName).'.plural_name')}}</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact List Area -->
    <div class="contact-list-area">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 ">
                    @if (flash()->message)
                        <div class="{{ flash()->class }}">
                            {{ flash()->message }}
                        </div>
                    @endif

                    <a href="{{route($entityName.'.create')}}" class="btn btn-success mb-4 pull-right">Aggiungi</a>
                </div>
            </div>
            <div class="table-responsive" data-simplebar="init">
                <div class="simplebar-wrapper">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset">
                            <div class="simplebar-content-wrapper"
                            >
                                <div class="simplebar-content">
                                    {{ $dataTable->table() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 762px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                         style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                         style="height: 477px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact List Area -->

    <div class="flex-grow-1"></div>

@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
