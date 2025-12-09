<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\Gender;
use App\Models\Mark;
use App\Models\SclClass;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('sclclass', 'section')->get();
        return view('student.list', compact('students'));
    }


    public function create()
    {
        $users = User::where('role', 'Student')->get();
        $classess = SclClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $genders = Gender::pluck('name');
        return view('student.create', compact('users','classess', 'sections', 'genders'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Student'){
            $user_id = User::where('id', $user->id)->first();
        }
        $validData = $request->validate([
            'full_name'      => 'required|string|max:100',
            'roll_number'    => 'required|unique:students,roll_number',
            'scl_class_id'   => 'required',
            'section_id'     => 'required',
            'gender'         =>  'required',
            'date_of_birth'  => 'required',
            'contact_number' => 'required|digits:10|numeric',
            'email'          => 'required|unique:students,email',
            'address'        => 'required',
            'parent_name'    => 'required',
            'parent_contact' => 'required|digits:10|numeric'
        ],
        [
            'scl_class_id.required'  => 'Kindly Select a Student Class',
            'section_id.required'    => 'Kindly Select a Student Section'
        ]

    );
        do{
            $id = mt_rand(1001, 9999);
            $student_id = 'STU-'.$id;
        }while(Student::where('student_id', $student_id)->exists());

        $student = collect($validData)->toArray();
        $student['student_id'] = $student_id;
        $student['user_id']    = $user_id->id;
        Student::create($student);

        return redirect()->route('student.index')->with('success', 'Student Registration Completed Successfully!');
    }

    public function edit(Student $student)
    {
        $classess = SclClass::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        $genders = Gender::pluck('name');
        return view('student.edit', compact('student','classess', 'sections', 'genders'));
    }


    public function update(Request $request, Student $student)
    {
        $validData = $request->validate([
            'full_name'      => 'required|string|max:100',
            'roll_number'    => 'required',
            'scl_clss_id'     => 'required',
            'section_id'     => 'required',
            'gender'         =>  'required',
            'date_of_birth'  => 'required',
            'contact_number' => 'required|digits:10|numeric',
            'email'          => 'required',
            'address'        => 'required',
            'parent_name'    => 'required',
            'parent_contact' => 'required|digits:10|numeric'
        ],
        [
            'scl_class_id.required'  => 'Kindly Select a Student Class',
            'section_id.required'   => 'Kindly Select a Student Section'
        ]
    );
        $upd_student = collect($validData)->toArray();
        $student->update($upd_student);
        return redirect()->route('student.index')->with('success', 'Student Details Updated Successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success', 'Student Details Deleted Successfully');
    }

    public function studentPdf(Request $request){
        $student = Student::where('id', $request->student_id)
                 ->with('sclclass', 'section')
                 ->first();
        $marks  = Mark::where('student_id', $request->student_id)
                ->with('exam')
                ->get();
        $total_marks = $marks->sum('marks_obtained');
        $max_marks = $marks->sum('max_marks');
        $percentage = ($total_marks / $max_marks) * 100;

        $pdf = Pdf::loadView('student.student_pdf', compact('student', 'marks', 'percentage'));
        return $pdf->download('student_report.pdf');
    }

    public function studentImport(Request $request){
        $request->validate([
            'import' => 'required|mimes:xlsx,csv'
        ]);
        Excel::import(new StudentImport, $request->file('import'));
        return back()->with('success', 'Student Imported Successfully!');
    }

}
