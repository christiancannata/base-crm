<div class="calendar-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="calendar-wrap style-two">
                    <div id="calendar"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="performance-date">
                    <div class="main-title d-flex justify-content-between align-items-center">
                        <h3>Prossimi appuntamenti</h3>

                        <select class="form-select form-control update-events">
                            <option value="7" selected>7 giorni</option>
                            <option value="15">15 giorni</option>
                            <option value="30">30 giorni</option>
                        </select>
                    </div>

                    <div id="latestEvents">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="calendarModal" class="modal fade modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"></h4>
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Chiudi</button>

            </div>
            <div id="modalBody" class="modal-body"></div>
        </div>
    </div>
</div>

@push('scripts')

    <script>

        function loadEvents() {
            $.get("{{route('calendar.latest-events-box')}}?days=" + $(".update-events").val(), function (data) {
                $("#latestEvents").html(data);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {

            $(document).on('click', '.update-event', function (e) {
                e.preventDefault()

                $.post("{{route('calendar.latest-events-box')}}",
                    {}, function (data) {
                        loadEvents()
                        modal.hide()
                    });

            })

            $(document).on('change', '.status_id', function (e) {
                if ($(this).val() == '') {
                    $("#noteDiv").show()
                } else {
                    $("#noteDiv").hide()
                }
            })

            loadEvents()
            $(".close-modal").click(function () {
                modal.hide()
            })

            $(".update-events").change(function (e) {
                loadEvents()
            })


            const container = document.getElementById("calendarModal");
            const modal = new bootstrap.Modal(container);

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'it',
                events: '{{$eventsRoute}}',
                eventClick: function (event, jsEvent, view) {
                    $('#modalTitle').html(event.event.title);
                    $('#modalBody').html(event.event.extendedProps.html);
                    $('#eventUrl').attr('href', event.event.url);
                    modal.show();
                }
            });
            calendar.render();
        });

    </script>

@endpush
