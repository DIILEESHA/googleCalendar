@extends('layout.logout')

@section('contents')
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset='utf-8' />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'
            rel='stylesheet'>
        <link rel="stylesheet" href="/css/welcome.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>
        <link rel="stylesheet" href="/css/app.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>
        <div class="m-4">
            <div class="" id='calendar'></div>
        </div>

        <!-- Bootstrap Modal for adding events -->
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addEventForm" action="{{ route('events.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="eventDate" class="form-label">Event Date</label>
                                <input type="text" class="form-control" id="eventDate" name="event_date"
                                    placeholder="Select event date" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="eventName" name="name"
                                    placeholder="Enter event name" required>
                            </div>
                            <div class="mb-3">
                                <label for="eventDescription" class="form-label">Event Description</label>
                                <textarea class="form-control" id="eventDescription" name="description" rows="3"
                                    placeholder="Enter event description" required></textarea>
                            </div>
                            <!-- Ensure the submit button is within the form -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="saveEventButton" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Modal for viewing event details -->
        <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Event Name:</strong> <span id="eventName"></span></p>
                        <p><strong>Event Date:</strong> <span id="eventDate"></span></p>
                        <p><strong>Description:</strong> <span id="eventDescription"></span></p>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary" id="editEventButton"><i class="fas fa-edit"></i>
                            Edit</button>
                        <button type="button" class="btn btn-danger" id="deleteEventButton"><i class="fas fa-trash"></i>
                            Delete</button>
                        <input type="hidden" id="eventId" value="">
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Form --}}
        <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editEventForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="eventDate" class="form-label">Event Date</label>
                                <input type="text" class="form-control" id="eventDate" name="event_date"
                                    placeholder="Select event date" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEventName" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="editEventName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEventDescription" class="form-label">Event Description</label>
                                <textarea class="form-control" id="editEventDescription" name="description" rows="3" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="updateEventButton">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
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
                        if (info.event.id !== undefined) {
                            $('#eventDetailsModal #eventName').text(info.event.title);
                            $('#eventDetailsModal #eventDate').text(info.event.startStr);
                            $('#eventDetailsModal #eventDescription').text(info.event.extendedProps
                                .description);
                            $('#eventId').val(info.event.id);
                        }
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

                $('#editEventForm').submit(function(event) {
                    event.preventDefault();
                    var eventId = $('#eventId').val();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '/events/' + eventId,
                        type: 'PUT',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#editEventModal').modal('hide');
                            calendar.refetchEvents();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                $('#deleteEventButton').click(function() {
                    var eventId = $('#eventId').val();
                    $.ajax({
                        url: '/events/' + eventId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#eventDetailsModal').modal('hide');
                            calendar.refetchEvents();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                $('#editEventButton').click(function() {
                    var eventName = $('#eventDetailsModal #eventName').text();
                    var eventDate = $('#eventDetailsModal #eventDate').text();
                    var eventDescription = $('#eventDetailsModal #eventDescription').text();

                    $('#editEventModal #editEventName').val(eventName);
                    $('#editEventModal #editEventDate').val(eventDate);
                    $('#editEventModal #editEventDescription').val(eventDescription);

                    $('#eventDetailsModal').modal('hide');
                    $('#editEventModal').modal('show');
                });
            });
        </script>
    </body>

    </html>
@endsection
