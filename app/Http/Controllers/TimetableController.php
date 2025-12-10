<?php

namespace App\Http\Controllers;

use App\Models\ClassTimetable;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = ClassTimetable::with('subject')->get();
        return view('timetable.list', compact('timetables'));
    }

    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        return view('timetable.create', compact('subjects'));
    }

    public function store(Request $request)
    {
       $validdata =  $request->validate([
            'day'        => 'required',
            'period'     => 'required',
            'subject_id' => 'required',
            'teacher'    => 'required'
        ]);
        $timetable = collect($validdata)->toArray();
        ClassTimetable::create($timetable);
        return redirect()->route('timetable_index')->with('success', 'Timetable Created Successfully');

    }
    public function getTeacher(Request $request)
    {
        $teachers = Teacher::where('subject_id', $request->subject_id)->get();
        $options = "<option value=''>--Select Teacher--</option>";

        foreach($teachers as $teacher){
            $selected = ($request->teacher == $teacher->full_name) ? 'selected':'';
            $options .= "<option value='{$teacher->full_name}' {$selected}>{$teacher->full_name}</option>";
        }
        return $options;
    }
}
