@extends('layout.logout')

@section('contents')
    <div class="container mt-5">
        <h2>{{ $event->name }}</h2>
        <p><strong>Event Date:</strong> {{ $event->event_date }}</p>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <!-- Add more details as needed -->
    </div>
@endsection
