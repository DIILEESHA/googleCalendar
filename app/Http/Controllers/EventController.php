<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date', // Add validation for event_date
        ]);

        // Create new event instance
        $event = new Event();
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];
        $event->event_date = $validatedData['event_date'];
        $event->save();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Event created successfully.');
    }
    

    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();
    
        // Format the events for FullCalendar
        $formattedEvents = $events->map(function ($event) {
            return [
                'title' => $event->name,
                'start' => $event->event_date, // Use the event_date field instead of created_at
                // Add more properties as needed
            ];
        });
    
        // Return the formatted events
        return $formattedEvents->toJson();
    }
    

    public function getEventsForDate($date)
    {
        // Fetch events for the specified date
        $events = Event::whereDate('event_date', $date)->get();
    
        // Format the events for the calendar
        $formattedEvents = $events->map(function ($event) {
            return [
                'title' => $event->name,
                'description' => $event->description,
                // Add more properties as needed
            ];
        });
    
        // Return the formatted events
        return response()->json($formattedEvents);
    }
    
}