@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="page-title">
                        <h3>Campi Aggiuntivi</h3>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-sm-6">
                    <button type="button" class="btn btn-primary  pull-right" data-bs-toggle="modal"
                            data-bs-target="#addFieldUser">
                        Aggiungi campo
                    </button>

                    <div class="modal fade" id="addFieldUser" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST"
                                      id="newFieldForm"
                                      action="{{route('setting.post_additional_fields')}}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Aggiungi un campo
                                            personalizzato</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Entità</label>
                                                <select class="form-control" name="entity" required>
                                                    @foreach($entities as $key => $entity)
                                                        <option value="{{$key}}">{{$entity['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Tipo campo</label>
                                                <select class="form-control" name="type" required>
                                                    <option value="text">Testo semplice</option>
                                                    <option value="textarea">Area di testo</option>
                                                    <option value="select">Scelta singola</option>
                                                    <option value="checkbox">Checkbox</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Nome campo</label>
                                                <input class="form-control" type="text" required
                                                       name="name" placeholder="Es.: Email aziendale">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Descrizione</label>
                                                <textarea class="form-control" type="text"
                                                          name="description"></textarea>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">
                                                    <input type="checkbox"
                                                           name="required">
                                                    Campo obbligatorio</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Aggiungi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <div class="tabs-area">
        <div class="container-fluid">

            <div class="card-box-style">

                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    @foreach($entities as $key => $entity)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($loop->index == 0) active @endif " id="tab-{{ $loop->index }}"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tab-pane-{{ $loop->index }}" type="button" role="tab"
                                    aria-controls="tab-pane-{{ $loop->index }}"
                                    aria-selected="true">{{$entity['name']}}
                            </button>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($entities as $key => $entity)
                        <div class="tab-pane fade @if($loop->index == 0) active show @endif "
                             id="tab-pane-{{$loop->index}}" role="tabpanel"
                             aria-labelledby="tab-{{$loop->index}}"
                             tabindex="{{$loop->index}}">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrizione</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Obbligatorio</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($entity['fields'] as $field)
                                    <tr>
                                        <th scope="row">{{$field->title}}</th>
                                        <td>{{$field->description}}</td>
                                        <td>{{$field->type}}</td>
                                        <td>
                                            @if($field->required)
                                                <span class="badge rounded-pill text-bg-success">Si</span>
                                            @else
                                                <span class="badge rounded-pill text-bg-danger">No</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-betweens">
                                                <a href="#">
                                                    Modifica
                                                </a>
                                                <a href="#">
                                                    <img src="/assets/images/icon/trash-2.svg"
                                                         alt="trash-2">
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

    <div class="flex-grow-1"></div>

@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            const container = document.getElementById("addFieldUser");
            const modal = new bootstrap.Modal(container);

            $("#newFieldForm").submit(function (e) {
                e.preventDefault()
                $.post($(this).attr('action'), $(this).serialize(), function (data) {

                    modal.hide();

                });
            })
        })

    </script>
@endpush
