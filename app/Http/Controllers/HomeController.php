<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Retrieve all events from the database
        return view('layout.home', compact('events'));
    }
}
