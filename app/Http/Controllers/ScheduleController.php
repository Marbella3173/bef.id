<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function submit($id){
        $schedule = Schedule::find($id);
        $studentName = DB::table('users')->join('students', 'users.id', '=', 'students.userID')
                                                ->select('studentName')
                                                ->where('students.userID', '=', $schedule->userID)
                                                ->value('studentName');
        return view('submit', ['schedule' => $schedule, 'studentName' => $studentName]);
    }
    public function index()
    {
        if(auth()->user()->status == 'Verified') {
            $user_id = auth()->id();
            $events = DB::table('schedules')->select('schedules.id as id', 'scheduleName', 'scheduleDeadline', 'scheduleType')
                                                ->where('schedules.userID', '=', $user_id)
                                                ->get();
            return view('student-class', ['events' => $events]);
        } else {
            $events = Schedule::all();
            $students = DB::table('users')->join('students', 'users.id', '=', 'students.userID')
                                                ->select('users.id as id', 'studentName')
                                                ->where('users.status', '=', 'Verified')
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
        $students = Student::all();
        $currentStudent = DB::table('students')->select('students.userID', 'studentName')->where('students.userID', '=', $schedule->userID)->first();
        return view('schedule-edit', ['event' => $schedule, 'students' => $students, 'currentStudent' => $currentStudent]);
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

            $schedule->scheduleSubmissionName = $filePath;
        }

        $schedule->save();

        return redirect()->route('class');
    }

    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('class');
    }
}
