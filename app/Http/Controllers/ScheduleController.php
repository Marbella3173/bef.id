<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function submit($id){
        $schedule = Schedule::find($id);
        $studentName = DB::table('students')->select('studentName')->where('students.userID', '=', $schedule->userID)->value('studentName');
        return view('submit', ['schedule' => $schedule, 'studentName' => $studentName]);
    }
    public function index()
    {
        if(auth()->user()->status == 'Verified') {
            $events = DB::table('schedules')->join('users', 'schedules.userID', '=', 'users.id')
                                            ->select('schedules.id as id', 'scheduleName', 'scheduleDeadline')
                                            ->get();
            return view('student-class', ['events' => $events]);
        } else {
            $events = Schedule::all();
            $students = DB::table('users')->join('students', 'users.id', '=', 'students.userID')
                                                ->select('users.id', 'studentName')
                                                ->get();
            return view('class', ['events' => $events, 'students' => $students]);
        }
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
        $students = DB::table('users')->select('id', 'studentName')->where('users.id', '=', $schedule->userID)->get();
        return view('schedule-edit', ['event' => $schedule, 'students' => $students]);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->scheduleName = $request->title;
        $schedule->scheduleDeadline = $request->deadline;
        $schedule->scheduleType = $request->type;
        $schedule->zoomLink = $request->zoomlink;

        if ($request->hasFile('submissionFile')){
            $extension = $request->file('submissionFile')->getClientOriginalExtension();
            $filePath = $request->input('title') . '.' . $extension;
            $request->file('submissionFile')->storeAs('public/submissions', $filePath);
        }

        $schedule->scheduleSubmissionName = $filePath;

        $schedule->save();

        return redirect()->route('class');
    }

    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('class');
    }
}
