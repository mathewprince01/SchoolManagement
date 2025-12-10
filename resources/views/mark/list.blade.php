@extends('Layout.app')
@section('title', 'Mark List')
@section('main')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-light text-center">
                <h3>Mark List</h3>
            </div>
            <x-SessionComponent/>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Exam</th>
                            <th>Subject</th>
                            <th>Marks</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marks as $mark )
                           <tr>
                                <td>{{$mark->student->student_id}}</td>
                                <td>{{$mark->student->full_name}}</td>
                                <td>{{$mark->exam->exam_name}}</td>
                                <td>{{$mark->subject->name}}</td>
                                <td>{{$mark->marks_obtained}}</td>
                                <td>{{$mark->grade}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
