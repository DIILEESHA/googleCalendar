<!-- resources/views/events/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Calendar Homepage</title>
    <style>
        .calendar {
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            border: 1px solid black;
            padding: 5px;
        }
        .calendar th {
            background-color: #ccc;
        }
        .calendar td {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Calendar</h1>
    <a href="{{ url('/event/create') }}">Add Event</a>
    <a href="{{ url('/event/prev') }}">Previous</a>
    <a href="{{ url('/event/next') }}">Next</a>
    <br><br>
    <table class="calendar">
        <tr>
            <th>Time</th>
            @foreach ($dates as $date)
                <th>{{ $date->format('Y-m-d') }}</th>
            @endforeach
        </tr>
        @for ($i = 0; $i < 24; $i++)
        <tr>
            <td>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00 - {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}:00</td>
            @foreach ($dates as $date)
            <td data-time="{{ $date->format('Y-m-d') }} {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00:00">
                @if (isset($events[$date->format('Y-m-d')][$i]))
                    @foreach ($events[$date->format('Y-m-d')][$i] as $event)
                        {{ $event->title }}
                        <br>
                    @endforeach
                @endif
            </td>
            @endforeach
        </tr>
        @endfor
    </table>
</body>
</html>
