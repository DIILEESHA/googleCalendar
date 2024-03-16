<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create new event instance
        $event = new Event();
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];
        $event->save();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Event created successfully.');
    }

    // Fetch events for a specific date
    public function eventsForDate($date)
    {
        $events = Event::whereDate('created_at', $date)->get();
        return response()->json($events);
    }
}