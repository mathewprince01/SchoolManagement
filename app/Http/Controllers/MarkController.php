<?php

namespace App\Http\Controllers;

use App\Exports\MarkSummary;
use App\Exports\MarkSummaryExport;
use App\Exports\TopPerformer;
use App\Exports\TopPerformerExport;
use App\Jobs\SendResultMail;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::with('student', 'exam')->get();
        return view('mark.list', compact('marks'));
    }

    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        $students = Student::pluck('full_name', 'id');
        $exams = Exam::pluck('exam_name', 'id');
        return view('mark.create', compact('subjects','students','exams'));

    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'student' => 'required',
            'exam' => 'required',
            'marks_obtained' => 'required|numeric',
            'max_marks' => 'required|numeric'
        ]);
        $mark = $validData['marks_obtained'];

        switch($mark){
            case $mark < 35 :
                echo $grade = 'FAIL';
            break;
            case $mark >= 35 && $mark < 50 :
                echo $grade = 'D';
            break;
            case $mark >= 50 && $mark < 70 :
                echo $grade = 'C';
            break;
            case $mark >= 70 && $mark < 85 :
                echo $grade = 'B';
            break;
            case $mark >= 85 && $mark <= 100 :
                echo $grade = 'A';
            break;
        }

        $mark = Mark::create([
            'student_id' => $validData['student'],
            'exam_id' => $validData['exam'],
            'subject_id' => $request['subject_id'],
            'marks_obtained' => $validData['marks_obtained'],
            'max_marks' => $validData['max_marks'],
            'grade' => $grade
        ]);

        $students = Student::all();
        foreach($students as $student){
            SendResultMail::dispatch($mark, $student);
        }
        return redirect()->route('marks_list')->with('success', 'Marks Added Successfully');
    }

    public function markSummary(){
        $mark = Mark::with('student', 'subject', 'exam')->get();
        return Excel::download(new MarkSummary($mark), 'Mark_summary.csv');
    }

    public function topPerformer(){
        $mark = Mark::with('student', 'subject', 'exam')
                    ->orderBy('marks_obtained', 'DESC')
                    ->limit(4)
                    ->get();
        return Excel::download(new TopPerformer($mark), 'top_performer.csv');
    }

}
