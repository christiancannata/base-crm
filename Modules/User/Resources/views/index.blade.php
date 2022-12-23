@extends('layouts.app')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6">
                    <div class="page-title">
                        <h3>Utenti</h3>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <ul class="page-title-list">
                        <li>Utenti</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact List Area -->
    <div class="contact-list-area">
        <div class="container-fluid">
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
                                    <table class="table align-middle mb-0">

                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-2.png" alt="user-2">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Zennilia Anderson</h4>
                                                        <a href="mailto:anderson@gmail.com">anderson@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#exampleModal">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-3.png" alt="user-3">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Zara Canela</h4>
                                                        <a href="mailto:anderson@gmail.com">zaracanela@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-4.png" alt="user-4">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Victor James</h4>
                                                        <a href="mailto:anderson@gmail.com">victorjames@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-5.png" alt="user-1">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Jane Ronan</h4>
                                                        <a href="mailto:anderson@gmail.com">janeronan@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-1.png" alt="user-1">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Angela Carter</h4>
                                                        <a href="mailto:anderson@gmail.com">angelacarter@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-2.png" alt="user-2">
                                                    </label>
                                                    <div class="info">
                                                        <h4>John Karahan</h4>
                                                        <a href="mailto:anderson@gmail.com">johnkarahan@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78911</a>
                                            </td>
                                            <td>
                                                <span class="location">31/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label ms-2">
                                                        <img class="rounded-circle ms-3 me-3 border"
                                                             src="assets/images/user/user-1.png" alt="user-1">
                                                    </label>
                                                    <div class="info">
                                                        <h4>Anderson Coopers</h4>
                                                        <a href="mailto:anderson@gmail.com">anderson@gmail.com</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:+(124)45678910">+ (124) 456 78910</a>
                                            </td>
                                            <td>
                                                <span class="location">32/B, Central town, England</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-betweens">
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/call-2.svg" alt="call-2">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/messages-2.svg"
                                                                 alt="messages-2" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/video-3.svg" alt="video-3">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="assets/images/icon/trash-2.svg" alt="trash-2">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
