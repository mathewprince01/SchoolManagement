@extends('layout.app')
@section('title', 'Student List')
@section('main')
    <x-LogoutComponent/>
    <div class="container">
        <div class="card p-2">
            <x-SessionComponent/>
            <div class="card-header bg-light text-center">
                <h3>Student Dashboard</h3>
            </div>
            @if (auth()->user()->role == 'Admin')
                <form action="{{route('student_import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-2">
                        <div class="col-8">
                            <label for="import" class="form-label">Student Import: </label>
                            <input type="file" name="import" id="import" class="form-control">
                            @error('import')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-2 text-center mt-4">
                            <button class="btn btn-success">Import</button>
                        </div>
                    </div>
                </form>
            @endif
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student->student_id}}</td>
                                <td>{{$student->full_name}}</td>
                                <td>{{$student->sclclass->name}}</td>
                                <td>{{$student->section->name}}</td>
                                <td>{{date_format(date_create($student->date_of_birth), 'd-M-Y')}}</td>
                                <td>{{$student->address}}</td>
                                <td class="d-flex gap-2">
                                    <form action="{{route('student_pdf')}}" method="get">
                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                        <button class="btn btn-info">Summary</button>
                                    </form>
                                    @if (auth()->user()->role == 'Admin')
                                        <a href="{{route('student.edit',$student->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('student.destroy',$student->id)}}" method="POST" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
