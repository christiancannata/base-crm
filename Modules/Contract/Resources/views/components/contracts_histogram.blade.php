<div class="overview-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="overview-content-wrap card-box-style">
                    <div class="overview-content d-flex justify-content-between align-items-center">
                        <div class="overview-title">
                            <h3>Panoramica Performance</h3>
                            <!-- <span>1 July, 2021 - 14 July, 2021</span>-->
                        </div>

                        <ul class="total-overview">
                            <li>
                                <input placeholder="Dal/Al" type="text" class="datepicker form-control range"
                                       name="date_range">
                            </li>
                        </ul>
                        <button class="search btn btn-primary">Filtra</button>

                    </div>

                    <div class="audience-content-wrap">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-audience d-flex justify-content-between align-items-center">
                                    <div class="audience-content">
                                        <h5>Nuovi Contratti</h5>
                                        <h4>19,202 <span>+55%</span></h4>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/icon/white-profile-2user.svg" alt="white-profile-2user">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="single-audience d-flex justify-content-between align-items-center">
                                    <div class="audience-content">
                                        <h5>Nuovi appuntamenti</h5>
                                        <h4>21,202 <span>+32%</span></h4>
                                    </div>
                                    <div class="icon">
                                        <img src="assets/images/icon/eye.svg" alt="eye">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="audience-chart">
                            <div id="overview_chart_dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.umd.min.js"></script>

    <script>

        $(document).ready(function () {
            loadCharts()
            var chart = null

            function loadCharts() {

                $.get("{{route('dashboard.chart')}}?range=" + $(".range").val(), function (data) {

                    if (chart) {
                        chart.destroy();
                    }
                    chart = new ApexCharts(document.querySelector("#overview_chart_dashboard"), data)
                    chart.render();
                });

            }

            $(".search").click(function (e) {
                e.preventDefault()
                loadCharts()
            })

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


        })

    </script>

@endpush
