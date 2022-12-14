<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.svg">
    <!-- Title -->
    <title>CRM Vitrano & Co</title>

    <!-- Jquery Min JS -->
    <script src="/assets/js/jquery.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <!-- Link Of CSS -->
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/remixicon.css">
    <link rel="stylesheet" href="/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="/assets/css/iconsax.css">
    <link rel="stylesheet" href="/assets/css/metismenu.min.css">
    <link rel="stylesheet" href="/assets/css/simplebar.min.css">
    <link rel="stylesheet" href="/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/css/jbox.all.min.css">
    <link rel="stylesheet" href="/assets/css/editor.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/loaders.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/calendar.css">

    <link href="/assets/css/select2.min.css" rel="stylesheet"/>


</head>

<body class="body-bg-f8faff">
<!-- Start All Section Area -->
<div class="all-section-area">

    @include('layouts.partials.header')


    @include('layouts.partials.nav')

    <!-- Start Main Content Area -->
    <main class="main-content-wrap style-two">
        @yield('content')
        <!--
        <div class="features-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-features">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-content">
                                        <span class="features-title">CLICK THROUGH</span>
                                        <h3>9,670 <span>-0.21%</span></h3>
                                        <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-chart">
                                        <div id="click_chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-features color-style-1765fd">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-content">
                                        <span class="features-title">VIEW THROUGH</span>
                                        <h3>5,952 <span>+0.21%</span></h3>
                                        <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-chart">
                                        <div id="view_chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-features color-style-5c31d6">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-content">
                                        <span class="features-title">TOTAL CONVERSIONS</span>
                                        <h3>10,302 <span>+0.21%</span></h3>
                                        <p>Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed.</p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-sm-6">
                                    <div class="single-click-chart">
                                        <div id="conversions_chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overview-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="overview-content-wrap card-box-style">
                            <div class="overview-content d-flex justify-content-between align-items-center">
                                <div class="overview-title">
                                    <h3>Audience Overview</h3>
                                    <span>1 July, 2021 - 14 July, 2021</span>
                                </div>

                                <ul class="total-overview">
                                    <li>
                                        <button class="today">Today</button>
                                    </li>
                                    <li>
                                        <button>7d</button>
                                    </li>
                                    <li>
                                        <button class="active">2w</button>
                                    </li>
                                    <li>
                                        <button>1m</button>
                                    </li>
                                    <li>
                                        <button>3m</button>
                                    </li>
                                    <li>
                                        <button>1y</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="audience-content-wrap">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single-audience d-flex justify-content-between align-items-center">
                                            <div class="audience-content">
                                                <h5>New Users</h5>
                                                <h4>19,202 <span>+55%</span></h4>
                                            </div>
                                            <div class="icon">
                                                <img src="/assets/images/icon/white-profile-2user.svg" alt="white-profile-2user">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single-audience d-flex justify-content-between align-items-center">
                                            <div class="audience-content">
                                                <h5>Page Views</h5>
                                                <h4>21,202 <span>+32%</span></h4>
                                            </div>
                                            <div class="icon">
                                                <img src="/assets/images/icon/eye.svg" alt="eye">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single-audience d-flex justify-content-between align-items-center">
                                            <div class="audience-content">
                                                <h5>Page Sessions</h5>
                                                <h4>15,251 <span>+23%</span></h4>
                                            </div>
                                            <div class="icon">
                                                <img src="/assets/images/icon/timer.svg" alt="timer">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single-audience d-flex justify-content-between align-items-center">
                                            <div class="audience-content color-style-fe5957">
                                                <h5>Bounce Rate</h5>
                                                <h4>21,202 <span>-15%</span></h4>
                                            </div>
                                            <div class="icon">
                                                <img src="/assets/images/icon/mask.svg" alt="mask">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="audience-chart">
                                    <div id="overview_chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="traffic-content card-box-style">
                            <div class="main-title d-flex justify-content-between align-items-center">
                                <h3>Traffic Channel</h3>

                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>15 days</option>
                                    <option value="1">16 days</option>
                                    <option value="2">17 days</option>
                                    <option value="3">18 days</option>
                                </select>
                            </div>

                            <div class="traffic-chart text-center">
                                <div id="traffic_chart"></div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xxl-3 col-md-3 col-sm-3">
                                    <div class="single-traffic">
                                        <span class="title">Organic Search</span>
                                        <h4>19,202 <span>+32.50%</span></h4>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3 col-sm-3">
                                    <div class="single-traffic border-style-5c31d6">
                                        <span class="title">Social Media</span>
                                        <h4>15,202 <span>+32.50%</span></h4>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3 col-sm-3">
                                    <div class="single-traffic border-style-4fcb8d">
                                        <span class="title">Email</span>
                                        <h4>502 <span>+2%</span></h4>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3 col-sm-3">
                                    <div class="single-traffic border-style-fec107">
                                        <span class="title">Referrals</span>
                                        <h4>1,202 <span>+32.50%</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="device-website-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-7">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="device-content card-box-style">
                                    <div class="main-title d-flex justify-content-between align-items-center">
                                        <h3>Device Sessions</h3>

                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>30 days</option>
                                            <option value="1">15 days</option>
                                            <option value="2">10 days</option>
                                            <option value="3">5 days</option>
                                        </select>
                                    </div>

                                    <div class="device-chart text-center">
                                        <div id="device_chart"></div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="single-device">
                                                <span class="title">Mobile</span>
                                                <h4>32,590 <span>+2%</span></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="single-device border-style-4fcb8d">
                                                <span class="title">Desktop</span>
                                                <h4>19,202 <span>+32.50%</span></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="single-device border-style-fec107">
                                                <span class="title">Tablet</span>
                                                <h4>1,202 <span>+32.50%</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="device-content website card-box-style">
                                    <div class="main-title d-flex justify-content-between align-items-center">
                                        <h3>Website Performance</h3>

                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>30 days</option>
                                            <option value="1">15 days</option>
                                            <option value="2">10 days</option>
                                            <option value="3">5 days</option>
                                        </select>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                <div class="website-performance-content">
                                                    <h5>Bounce Rate (avg)</h5>
                                                    <h4>24.67% <span>+04.18%</span></h4>
                                                </div>
                                                <div class="website-chart">
                                                    <div id="bounce_rate"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                <div class="website-performance-content color-style-fe5957">
                                                    <h5>Page Views (avg)</h5>
                                                    <h4>7.32% <span>-0.21%</span></h4>
                                                </div>
                                                <div class="website-chart">
                                                    <div id="page_views"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="single-website-performance d-flex justify-content-between align-items-center">
                                                <div class="website-performance-content">
                                                    <h5>Time On Site (avg)</h5>
                                                    <h4>1min 30s <span>+2.50%</span></h4>
                                                </div>
                                                <div class="website-chart">
                                                    <div id="time_on_site"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5">
                        <div class="website-up-down card-box-style">
                            <div class="main-title d-flex justify-content-between align-items-center">
                                <h3>Website Performance</h3>

                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>30 days</option>
                                    <option value="1">15 days</option>
                                    <option value="2">10 days</option>
                                    <option value="3">5 days</option>
                                </select>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-up-and-down d-flex justify-content-between align-items-center">
                                        <div class="up-and-down-content">
                                            <h5>Monthly</h5>
                                            <h4><span>+32%</span></h4>
                                        </div>
                                        <div class="total">
                                            <h4 class="mb-0">7.32%</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-up-and-down d-flex justify-content-between align-items-center">
                                        <div class="up-and-down-content color-style-fe5957">
                                            <h5>Weekly</h5>
                                            <h4><span>-01.17%</span></h4>
                                        </div>
                                        <div class="total">
                                            <h4 class="mb-0">7.32%</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-up-and-down d-flex justify-content-between align-items-center mb-0">
                                        <div class="up-and-down-content">
                                            <h5>Today</h5>
                                            <h4><span>+03.93%</span></h4>
                                        </div>
                                        <div class="total">
                                            <h4 class="mb-0">7.32%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sessions-chart">
                                <div id="sessions_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="total-visits-browse-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-6">
                        <div class="total-visits-content card-box-style">
                            <div class="main-title d-flex justify-content-between align-items-center">
                                <h3>Total Visits</h3>

                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>30 days</option>
                                    <option value="1">15 days</option>
                                    <option value="2">10 days</option>
                                    <option value="3">7 days</option>
                                </select>
                            </div>

                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th scope="col">LINK</th>
                                    <th scope="col">PAGE TITLE</th>
                                    <th scope="col">PERCENTAGE (%)</th>
                                    <th scope="col" class="present">VALUE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/icon/link.svg" alt="link">
                                        </a>
                                    </th>
                                    <td>
                                        <span>Homepage</span>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 65.35%;" aria-valuenow="65.35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="present">
                                        <span>65.35%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/icon/link.svg" alt="link">
                                        </a>
                                    </th>
                                    <td>
                                        <span>Our Services</span>
                                    </td>
                                    <td>
                                        <div class="progress services">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 40.25%;" aria-valuenow="40.25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="present">
                                        <span>40.25%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/icon/link.svg" alt="link">
                                        </a>
                                    </th>
                                    <td>
                                        <span>List of Products</span>
                                    </td>
                                    <td>
                                        <div class="progress products">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25.15%;" aria-valuenow="25.15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="present">
                                        <span>25.15%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/icon/link.svg" alt="link">
                                        </a>
                                    </th>
                                    <td>
                                        <span>Blog</span>
                                    </td>
                                    <td>
                                        <div class="progress blog">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 80.95%;" aria-valuenow="80.95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="present">
                                        <span>80.95%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/icon/link.svg" alt="link">
                                        </a>
                                    </th>
                                    <td>
                                        <span>Contact Us</span>
                                    </td>
                                    <td>
                                        <div class="progress contact">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 42.35%;" aria-valuenow="42.35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="present">
                                        <span>42.35%</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <div class="total-browse-content card-box-style">
                            <div class="main-title d-flex justify-content-between align-items-center">
                                <h3>Browser Used By Users</h3>

                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>30 days</option>
                                    <option value="1">15 days</option>
                                    <option value="2">10 days</option>
                                    <option value="3">7 days</option>
                                </select>
                            </div>

                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th scope="col">BROWSER</th>
                                    <th scope="col">SESSIONS</th>
                                    <th scope="col">BOUNCE RATE</th>
                                    <th scope="col">CONVERSION RATE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/chrome.svg" alt="chrome">
                                            <span class="ms-2">Google Chrome</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>13,410</span>
                                    </td>
                                    <td>
                                        <span>65.35%</span>
                                    </td>
                                    <td>
                                        <span>12.32%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/mozilla.svg" alt="mozilla">
                                            <span class="ms-2">Mozilla Firefox</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>14,530</span>
                                    </td>
                                    <td>
                                        <span>40.25%</span>
                                    </td>
                                    <td>
                                        <span>19.59%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/safari.svg" alt="safari">
                                            <span class="ms-2">Apple Safari</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>2,515</span>
                                    </td>
                                    <td>
                                        <span>25.15%</span>
                                    </td>
                                    <td>
                                        <span>11.42%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/edge.svg" alt="edge">
                                            <span class="ms-2">Microsoft Edge</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>1095</span>
                                    </td>
                                    <td>
                                        <span>80.95%</span>
                                    </td>
                                    <td>
                                        <span>13.31%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/opera.svg" alt="opera">
                                            <span class="ms-2">Opera</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>235</span>
                                    </td>
                                    <td>
                                        <span>42.35%</span>
                                    </td>
                                    <td>
                                        <span>2.35%</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <a href="index.html">
                                            <img src="/assets/images/apps/uc-browser.svg" alt="uc-browser">
                                            <span class="ms-2">UC Browser</span>
                                        </a>
                                    </th>
                                    <td>
                                        <span>132</span>
                                    </td>
                                    <td>
                                        <span>42.35%</span>
                                    </td>
                                    <td>
                                        <span>12.21%</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="footer-area">
            <div class="container-fluid">
                <div class="footer-content">
                    <p>Vitrano & Co. S.r.l.s. - P.iva 01959390897 Via Corsica 38/D 96100 Siracusa (SR) ??? <a
                            href="mailto:direzione@vitranoeco.it">direzione@vitranoeco.it</a></p>
                </div>
            </div>
        </div>

    </main>


    <!-- End Main Content Area -->
</div>
<!-- End All Section Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
<!-- End Go Top Area -->


<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/metismenu.min.js"></script>
<script src="/assets/js/simplebar.min.js"></script>
<script src="/assets/js/apexcharts/apexcharts.min.js"></script>
<script src="/assets/js/apexcharts/website-analytics.js"></script>
<script src="/assets/js/geticons.js"></script>
<script src="/assets/js/editor.js"></script>
<script src="/assets/js/form-validator.min.js"></script>
<script src="/assets/js/contact-form-script.js"></script>
<script src="/assets/js/ajaxchimp.min.js"></script>
<script src="/assets/js/sweetalert2.all.min.js"></script>
<script src="/assets/js/select2.js"></script>
<script src="/assets/js/custom.js"></script>
@stack('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.2/index.global.min.js"
        integrity="sha512-Oh8TxU+uqKYsmHku33fGrSDbZyN+2U3w/MJSWlnCnpHVzIJSczqx6XxAYjS2zAXCfnH1+YXwwD6BnagxPizYAA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<style>
    @foreach(\Modules\Task\Entities\TaskStatus::whereNotNull('color')->get() as $status)
            .performance-date-list li.status-{{$status->id}}::before {
        background-color: {{$status->color}} !important;
    }
    @endforeach

</style>

</body>
</html>
