@extends('layout.base')
@section('title', 'Teacher List')
@section('main')
    <x-LogoutComponent/>
    <div class="container">
        <div class="card p-2">
            <div class="card-header bg-light text-center">
                <h3>Teacher's Dashboard</h3>
            </div>
            <x-SessionComponent/>
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>Teacher ID</th>
                            <th>Teacher Name</th>
                            <th>Subject</th>
                            <th>contact</th>
                            <th>Assigned Classes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$teacher->teacher_id}}</td>
                                <td>{{$teacher->full_name}}</td>
                                <td>{{$teacher->subject->name}}</td>
                                <td>{{$teacher->contact}}</td>
                                <td>{{$teacher->assigned_classes}}</td>
                                <td class="d-flex gap-2">
                                    <form action="{{route('teacher_report')}}" method="get">
                                        <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                        <button class="btn btn-info">Report</button>
                                    </form>
                                    @if (auth()->user()->role == 'Admin')
                                        <a href="{{route('student.edit',$teacher->id)}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('student.destroy',$teacher->id)}}" method="POST" onsubmit="return confirm('Are You Sure?')">
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

