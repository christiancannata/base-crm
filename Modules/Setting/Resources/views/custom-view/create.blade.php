@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h3>Aggiungi {{trans('crm.modules.'.strtolower($entityName).'.singular_name')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <div class="form-layouts-area">
        <div class="container-fluid">
            <div class="card-box-style">

                <form class="row">
                    <div class="col-md-6 form-group  mb-2">
                        <label class="form-label">Nome Vista</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label class="form-label">Ruoli</label>
                        <select class="select2 form-control" multiple required name="roles_id">
                            @foreach(\Spatie\Permission\Models\Role::orderBy('name')->get() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label class="form-label">Risorsa</label>
                        <?php
                        $models = getAllModels();
                        ?>
                        <select class="select2 form-control" required name="entity_id">

                            @foreach( $models as $value => $model)
                                <option value="{{$value}}">{{trans('crm.modules.class.'.$model)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div id="builder"></div>
                    </div>


                    <div class="col-md-12">
                        <button class="btn btn-success pull-right">Aggiungi</button>
                    </div>

                </form>

            </div>
        </div>

        <div class="flex-grow-1"></div>
    </div>
@endsection


@push('scripts')
    @vite('resources/js/form-builder.js')
@endpush
