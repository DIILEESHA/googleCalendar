<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>
    <!-- Bootstrap CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    console.log('Selected date:', info.startStr);
                    $('#addEventModal').modal('show');
                    $('#selectedDate').text(info.startStr);
                }
            });
            calendar.render();

            // Event listener for saving event
            $('#saveEventButton').click(function() {
                // Submit the form
                $('#addEventForm').submit();
            });
        });
    </script>
</head>

<body>
    <div id='calendar' data-event-url="{{ route('events.store') }}"></div>


    <!-- Bootstrap Modal for adding events -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Selected date: <span id="selectedDate"></span></p>
                    <form id="addEventForm" action="{{ route('events.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="name" placeholder="Enter event name" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Event Description</label>
                            <textarea class="form-control" id="eventDescription" name="description" rows="3" placeholder="Enter event description" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="saveEventButton" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
