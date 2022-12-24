@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="page-title">
                        <h3>Elimina {{trans('crm.modules.'.strtolower($entityName).'.name')}}</h3>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 d-none d-sm-block">
                    <ul class="page-title-list">
                        <li>Elimina {{trans('crm.modules.'.strtolower($entityName).'.name')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->


    <div class="form-layouts-area">
        <div class="container-fluid">
            <div class="card-box-style">


                <form method="POST" action="{{route($entityName.'.destroy', [ $entityName=>$entity ])}}">
                    @csrf

                    <input type="hidden" name="_method" value="DELETE">
                    <div class="row">
                        <div class="col-md-12">
                            <span>Confermi di voler eliminare l'elemento?</span>

                        </div>
                        <div class="col-md-12  mt-4">
                            <button class="btn btn-success pull-right">Elimina</button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="flex-grow-1"></div>

@endsection


@push('scripts')
@endpush
