<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('class', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();

        return redirect()->route('calendar.index');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('schedule-edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();

        return redirect()->route('calendar.index');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('calendar.index');
    }
}
