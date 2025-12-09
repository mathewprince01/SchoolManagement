@extends('layout.base')
@section('title', 'Marks Entry')
@section('main')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Enter Student Marks</h3>
            </div>
            <div class="card-body">
                <form action="{{route('marks_store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="student" class="form-label">Student Name: </label>
                        <select name="student" id="student" class="form-select">
                            <option value="">--Select Student--</option>
                            @foreach ($students as $id=>$student)
                                <option value="{{$id}}" @selected(old('student') == $id)>{{$student}}</option>
                            @endforeach
                        </select>
                        @error('student')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exam" class="form-label">Exam: </label>
                        <select name="exam" id="exam" class="form-select">
                            <option value="">--Select Exam--</option>
                            @foreach ($exams as $id=>$exam)
                                <option value="{{$id}}" @selected(old('exam') == $id)>{{$exam}}</option>
                            @endforeach
                        </select>
                        @error('exam')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject: </label>
                        <select name="subject_id" id="subject_id" class="form-select">
                            <option value="">--Select Subject--</option>
                            @foreach ($subjects as $id=>$subject)
                                <option value="{{$id}}" @selected(old('subject_id') == $id)>{{$subject}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="marks_obtained" class="form-label">Marks Obtained: </label>
                            <input type="number" name="marks_obtained" id="marks_obtained" class="form-control" min="1" max="100" value="{{old('marks_obtained')}}">
                             @error('marks_obtained')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-4 mb-4">
                            <label for="max_marks" class="form-label">Out of:  </label>
                            <input type="number" name="max_marks" id="max_marks" class="form-control" min="1" max="100" value="{{old('max_marks')}}">
                             @error('max_marks')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
