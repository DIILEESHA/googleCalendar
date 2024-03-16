<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $event = Event::first(); 
        return view('layout.home', compact('event'));
    }
}
