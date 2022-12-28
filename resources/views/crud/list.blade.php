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
                                    @if(isset($filters) && is_array($filters))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form autocomplete="off" method="GET" action="" id="searchForm"
                                                      class="row">
                                                    @foreach($filters as $field => $filter)

                                                        <div class="col-md-{{$filter['cols']}} mb-2">
                                                            <label>{{$filter['label']}}</label>
                                                            @if($filter['type'] == 'select')
                                                                <select autocomplete="off" class="select2 form-control"
                                                                        name="{{$field}}">
                                                                    <option selected value="0">-- seleziona --</option>
                                                                    @foreach($filter['options'] as $value => $option)
                                                                        <option
                                                                            value="{{$value}}">{{$option}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif

                                                            @if($filter['type'] == 'text')
                                                                <input type="text" class="form-control"
                                                                       name="{{$field}}">
                                                            @endif

                                                            @if($filter['type'] == 'daterange')
                                                                <input type="text" class="datepicker form-control"
                                                                       name="{{$field}}">
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    <div class="col-md-12 mb-2">
                                                        <button type="submit"
                                                                class="btn btn-success pull-right"
                                                        >Filtra
                                                        </button>
                                                        <button type="reset"
                                                                class="btn btn-primary pull-right  reset-search-form"
                                                                style="margin-right:10px;">Reset
                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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

    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.umd.min.js"></script>
    <script>
        const DateTime = easepick.DateTime;

        const picker = new easepick.create({
            element: document.getElementsByClassName('datepicker')[0],
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.css',
            ],
            plugins: ['RangePlugin'],
            format: 'DD-MM-YYYY',
            RangePlugin: {
                tooltipNumber(num) {
                    return num - 1;
                },
                locale: {
                    one: 'giorno',
                    other: 'giorni',
                }
            }
        });

        window.originalSubmitUrl = null

        $(document).ready(function () {
            $(".reset-search-form").click(function (e) {
                e.preventDefault()
                $("#searchForm")[0].reset()
                $(".select2").val(0).trigger("change");

                if (!window.originalSubmitUrl) {
                    window.originalSubmitUrl = LaravelDataTables['task-table'].ajax.url()
                }

                LaravelDataTables['task-table'].ajax.url(window.originalSubmitUrl + "?" + $(this).serialize()).load();

            })
            $("#searchForm").submit(function (e) {
                e.preventDefault()

                if (!window.originalSubmitUrl) {
                    window.originalSubmitUrl = LaravelDataTables['task-table'].ajax.url()
                }

                LaravelDataTables['task-table'].ajax.url(window.originalSubmitUrl + "?" + $(this).serialize()).load();

            })
        })
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
