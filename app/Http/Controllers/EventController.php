<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;


use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $events = Event::latest()->get()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date,
                'image' => asset($event->image),
                'created_at' => $event->created_at,
            ];
        });

        return Inertia::render('Events/Events', ['events' => $events]);
    }

    public function show($id)
    {
        $event = Event::find($id);

        return Inertia::render('SingleEvent/SingleEvent', ['event' => $event]);
    }
}
