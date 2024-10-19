<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $events = Schedule::all();
        // dd($events);
        $students = DB::table('users')->select('id', 'studentName')->where('status', '=', 'Verified')->get();
        return view('class', ['events' => $events, 'students' => $students]);
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->userID = $request->userid;
        $schedule->scheduleName = $request->title;
        $schedule->scheduleDeadline = $request->deadline;
        $schedule->scheduleType = $request->type;
        $schedule->zoomLink = $request->zoomlink;

        $schedule->save();

        return redirect()->route('class');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $studentName = DB::table('users')->select('studentName')->where('users.id', '=', $schedule->userID)->value('studentName');
        return view('schedule-edit', ['event' => $schedule, 'studentName' => $studentName]);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->scheduleName = $request->title;
        $schedule->scheduleDeadline = $request->deadline;
        $schedule->scheduleType = $request->type;
        $schedule->zoomLink = $request->zoomlink;

        $schedule->save();

        return redirect()->route('class');
    }

    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('class');
    }
}
