<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request){
        if(empty($request->all())){
            $students = Student::with('user')->get(); // Fetch all students with related user data
            return view('database', compact('students'));
        }else{
            return $this->search($request);
        }
    }

    public function search(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $students = Student::with('user')
            ->where("studentName", "LIKE", "%{$request->search}%")
            ->get();

        return view('database', compact('students'));
    }

    public function updateStatus(Request $request)
    {
        $statuses = $request->input('statuses', []);

        foreach ($statuses as $userID => $status) {
            $user = User::find($userID);
            if ($user) {
                $user->status = $status;
                $user->save();
            }
        }

        return redirect()->back()->with('success', 'Statuses updated successfully.');
    }
}