$(document).ready(function ($) {

    var calendarEl = document.getElementById('calendar');

    let options = {
        initialView: 'dayGridMonth',
        locale: 'it',
        events: '/agenda/user-unavailabilities?user_id=' + $("#assigned_to_id").val(),
        dateClick: function (info) {

            $(".fc-day").removeAttr('style')
            info.dayEl.style.backgroundColor = '#359CC0';
            $.get('/agenda/user-unavailabilities-day-time?start=' + info.dateStr + '&end=' + info.dateStr + '&user_id=' + $("#assigned_to_id").val(), function (data) {
                $('#selectBox').html(data);
            });

        }
    }

    $("#assigned_to_id").select2()
    $('#assigned_to_id').on('select2:select', function (e) {

        calendar.destroy()

        options.events = '/agenda/user-unavailabilities?user_id=' + $("#assigned_to_id").val()

        calendar = new FullCalendar.Calendar(calendarEl, options);
        calendar.render();

    });

    var calendar = new FullCalendar.Calendar(calendarEl, options);
    calendar.render();

})
