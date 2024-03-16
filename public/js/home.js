// home.js
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        select: function(info) {
            $('#addEventModal').modal('show');
            $('#selectedDate').text(info.startStr);
            $('#eventDate').val(info.startStr);
        },
        eventClick: function(info) {
            $('#eventDetailsModal #eventName').text(info.event.title);
            $('#eventDetailsModal #eventDate').text(info.event.startStr);
            $('#eventDetailsModal #eventDescription').text(info.event.extendedProps.description);
            $('#eventDetailsModal').modal('show');
        },
        events: "{{ route('events.index') }}",
    });
    calendar.render();

    $('#eventDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $('#saveEventButton').click(function() {
        $('#addEventForm').submit();
    });
});
