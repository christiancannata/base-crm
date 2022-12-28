<div id='calendar'></div>

<div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            $(".close-modal").click(function () {
                modal.hide()
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
                    $('#modalBody').html(event.event.modal_html);
                    $('#eventUrl').attr('href', event.event.url);
                    modal.show();
                }
            });
            calendar.render();
        });

    </script>

@endpush
