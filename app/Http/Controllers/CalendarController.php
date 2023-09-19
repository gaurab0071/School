<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('calendar.index', compact('events'));
    }

    public function create(Request $request)
    {
        $event = new Event([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);
        $event->save();

        return response()->json(['message' => 'Event created successfully']);
    }

    public function update(Request $request)
    {
        $event = Event::find($request->input('id'));
        if ($event) {
            $event->update([
                'start' => $request->input('start'),
                'end' => $request->input('end'),
            ]);
            return response()->json(['message' => 'Event updated successfully']);
        } else {
            return response()->json(['error' => 'Event not found'], 404);
        }
    }

    public function delete(Request $request)
    {
        $event = Event::find($request->input('id'));
        if ($event) {
            $event->delete();
            return response()->json(['message' => 'Event deleted successfully']);
        } else {
            return response()->json(['error' => 'Event not found'], 404);
        }
    }
}

