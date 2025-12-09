<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\SclClasse;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $gender=Gender::where()->get();
        // $class=SclClasse::where()->get();
        // $section=Section::where()->get();
       return view('student.create',compact('gender','class','section'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $student=$request->validate([
             'full_name'=>'required|regax:/^[a-zA-Z\s]|100',
             'roll_number'=>'required|digits:10',
             'class'=>'required',
             'section'=>'required',
             'gender'=>'required',
             'date_of_birth'=>'required|date',
             'contact_number'=>'required|digits:10',
             'address'=>'required',
             'partent_name'=>'required',
             'partent_contact'=>'required|digits:10',
      ]);

      $std=Student::created([
                'full_name'=>$student['full_name'],
                'roll_name'=>$student['roll_name'],
                'class'=>$student['class'],
                'section'=>$student['section'],
                'gender'=>$student['gender'],
                'date_of_birth'=>$student['date_of_birth'],
                'contact_number'=>$student['contact_number'],
                'address'=>$student['address'],
                'partent_name'=>$student['partent_name'],
                'partent_contact'=>$student['partent_contact'],
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $std=$request->validate([
                'full_name'=>'required|regax:/^[a-zA-Z\s]|100',
                'roll_name'=>'required|digits:10',
                'class'=>'required',
                'section'=>'requireed',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'contact_number'=>'required|digits:10',
                'student_email'=>'required',
                'address'=>'required',
                'partent_name'=>'required',
                'partent_contact'=>'required|digits:10',
        ]);
        Student::updated([
            'full_name'=>$std['full_name'],
            'roll_name'=>$std['roll_name'],
            'class'=>$std['class'],
            'section'=>$std['section'],
            'gender'=>$std['gender'],
            'date_of_birth'=>$std['date_of_birth'],
            'contact_number'=>$std['contact_number'],
            'student_email'=>$std['student_email'],
            'address'=>$std['address'],
            'partent_name'=>$std['partent_name'],
            'partent_contact'=>$std['partent_contact'],

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
