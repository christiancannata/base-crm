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

                {!! form_start($form) !!}
                {!!  form_row($form->first_name) !!}
                {!!  form_row($form->last_name) !!}
                {!!  form_row($form->email) !!}
                {!!  form_row($form->password) !!}
                {!!  form_row($form->roles_id) !!}
                {!!  form_row($form->phone) !!}
                {!!  form_row($form->vat_code) !!}
                <div class="row mt-4">
                    <div class="col-md-6 mt-2">
                        <h4>Documenti</h4>

                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary add-to-collection pull-right">Aggiungi documento
                        </button>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="collection-container" data-prototype="{{ form_row($form->attachments->prototype()) }}">
                        {!! form_row($form->attachments) !!}
                    </div>


                    {!! form_end($form) !!}
                </div>

            </div>

        </div>
    </div>
    <div class="flex-grow-1"></div>

@endsection


@push('scripts')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    <script>
        $(document).ready(function () {

            let myDropzone = new Dropzone(".dropzone", {url: "{{route('attachment.upload_temp_file')}}"});
            myDropzone.on("success", (file, response) => {

            })

            $('.delete-attachment').first().remove()
        })
        $('.add-to-collection').on('click', function (e) {
            e.preventDefault();
            var container = $('.collection-container');
            var count = container.children().length;
            var proto = container.data('prototype').replace(/__NAME__/g, count);
            container.append(proto);
        });

        $(document).on('click', '.delete-attachment', function (e) {
            e.preventDefault()
            $(this).closest('.form-group').remove()
        })
    </script>
@endpush
