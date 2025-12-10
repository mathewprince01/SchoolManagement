@extends('Layout.app')
@section('title', 'Timetable list')
@section('main')
    <div class="container">
        <div class="card my-5">
            <div class="card-header bg-light text-center">
                <h3>Time Table</h3>
            </div>
            <x-SessionComponent/>
            <div class="card-body">
                <table class="table table-bordered table-stripped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>Day</th>
                            <th>Period</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($timetables as $table )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$table->day}}</td>
                                <td>{{$table->period}}</td>
                                <td>{{$table->subject->name}}</td>
                                <td>{{$table->teacher}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
