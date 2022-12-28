<div id='calendar'></div>


@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'it',
                events: '{{$eventsRoute}}'
            });
            calendar.render();
        });

    </script>

@endpush
