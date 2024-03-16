<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        $event = new Event();
        $event->name = $validatedData['name'];
        $event->user_id = Auth::id();
        $event->description = $validatedData['description'];
        $event->event_date = $validatedData['event_date'];
        $event->save();

        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function index()
    {
        // Fetch events associated with the authenticated user
        $events = Event::where('user_id', Auth::id())->get();
    
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->event_date,
                'description' => $event->description,
            ];
        });
    
        return $formattedEvents->toJson();
    }

    public function getEventsForDate($date)
    {
        $events = Event::whereDate('event_date', $date)->get();

        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->name,
                'description' => $event->description,
            ];
        });

        return response()->json($formattedEvents);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];
        $event->event_date = $validatedData['event_date'];
        $event->save();

        // return redirect()->back()->with('success', 'Event updated successfully.');
    return view('layout.home', compact('event'));

    }

    public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return view('layout.home', compact('event'));
}

}
