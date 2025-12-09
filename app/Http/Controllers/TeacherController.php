<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $teacher=$request->validate([
            'full_name'=>'required|regax:/^[a-zA-Z\s]|100',
            'subject'=>'required',
            'qualification'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'assigned_classes'=>'required',

       ]);



            Teacher::created([
                'full_name'=>$teacher['full_name'],
                'subject'=>$teacher['subject'],
                'qualication'=>$teacher['qualication'],
                'contact'=>$teacher['contact'],
                'email'=>$teacher['email'],
                'assigned_classes'=>$teacher['assigned_classes'],
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
