<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request){
        $userID = auth()->id();
        $request->validate([
            'student_name' => 'required|string',
            'parent_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string|regex:/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/',
            'address' => 'required|string'
        ]);

        Student::create([
            'userID' => $userID,
            'studentName' => $request->student_name,
            'parentName' => $request->parent_name,
            'phoneNumber' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'isPendaftaranChecked' => $request->has('pendaftaran'),
            'isSelfActiveLearningChecked' => $request->has('self_active_learning'),
            'isBiayaChecked' => $request->has('biaya'),
            'additionalNotes' => $request->other_question
        ]);

        return redirect()->route('/');
    }
}
