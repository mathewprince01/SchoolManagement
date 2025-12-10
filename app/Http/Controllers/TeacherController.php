<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\SclClass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        return view('teacher.list', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        $classess = SclClass::pluck('name');
        return view('teacher.create', compact('subjects', 'classess'));
    }

    public function store(Request $request)
    {
         $user = Auth::user();
        if($user->role == 'Teacher'){
            $user = User::where('id', $user->id)->first();
        }
        // $user = User::where('name', $request->full_name)->first();

        $validData = $request->validate([
            'full_name'        => 'required|string|max:100',
            'subject_id'       => 'required',
            'qualification'    => 'nullable',
            'contact'          => 'required|numeric|digits:10',
            'email'            => 'required|unique:teachers,email',
            'assigned_classes' => 'required|array'
        ],
        [
            'subject_id.required' => 'Kindly Select the Subject.'
        ]
    );
        do{
            $id = mt_rand(1001, 9999);
            $teacher_id = 'TCH-'.$id;
        }while(Teacher::where('teacher_id',$teacher_id)->exists());
        $assigned_classes = implode(',', $validData['assigned_classes']);

        $teacher = collect($validData)->except('assigned_classes')->toArray();
        $teacher['teacher_id']       = $teacher_id;
        $teacher['user_id']          = $user->id;
        $teacher['assigned_classes'] = $assigned_classes;
        Teacher::create($teacher);
        return redirect()->route('teacher.index')->with('success', 'New Teacher Added Successfully!');
    }

    public function edit(Teacher $teacher)
    {
        $subjects = Subject::pluck('name', 'id');
        $classess = SclClass::pluck('name');
        return view('teacher.edit', compact('teacher','subjects', 'classess'));
    }

    public function update(Request $request, Teacher $teacher)
    {
         $validData = $request->validate([
            'full_name'        => 'required',
            'subject_id'       => 'required',
            'qualification'    => 'nullable',
            'contact'          => 'required|numeric|digits:10',
            'email'            => 'required',
            'assigned_classes' => 'required'
        ],
        [
            'subject_id.required' => 'Kindly Select the Subject.'
        ]
    );
        $assigned_classes =implode(',', $validData['assigned_classes']);

        $upd_teacher = collect($validData)->except('assigned_classes')->toArray();
        $teacher['assigned_classes'] = $assigned_classes;
        $teacher->update($upd_teacher);

        return redirect()->route('teacher.index')->with('success', 'Teacher Details Updated Successfully!');
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back()->with('success', 'Teacher details Deleted Successfully');
    }

    public function teacherReport(Request $request){
        $teacher = Teacher::where('id', $request->teacher_id)
                  ->with('subject')
                  ->first();
        $marks = Mark::where('subject_id', $teacher->subject_id)->first();

        $total_marks = $marks->sum('marks_obtained');
        $total_subjects = $marks->count('subject_id');
        $average = $total_marks / $total_subjects;
        $pdf = Pdf::loadView('teacher.performance_report', compact('teacher', 'average'));
        return $pdf->download('teacher_report.pdf');

    }
}
