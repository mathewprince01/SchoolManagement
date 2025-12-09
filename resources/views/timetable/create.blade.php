@extends('layout.base')
@section('title', 'Timetable')
@section('main')
    <div class="container ">
        <div class="card my-5">
            <div class="card-header text-center">
                <h3>Time Table</h3>
            </div>
            <div class="card-body">
                <form action="{{route('timetable_store')}}" method="post" class="w-50">
                    @csrf
                    @php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday'];
                    @endphp
                    <div class="mb-3">
                        <label for="day" class="form_label">Day: </label>
                        <select name="day" id="day" class="form-select">
                            <option value="">--Select Day--</option>
                            @foreach ($days as $day )
                                <option value="{{$day}}" @selected(old('day') == $day)>{{$day}}</option>
                            @endforeach
                        </select>
                        @error('day')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form_label"> Period: </label>
                        <input type="number" name="period" id="period" id="period" value="{{old('period')}}" class="form-control">
                        @error('period')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subject_id" class="form_label">Subject: </label>
                        <select name="subject_id" id="subject_id" class="form-select">
                            <option value="">--Select Subject--</option>
                            @foreach ($subjects as $id=>$subject )
                                <option value="{{$id}}" @selected(old('subject_id') == $subject)>{{$subject}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="teacher" class="form_label">Teacher: </label>
                        <select name="teacher" id="teacher" class="form-select">
                            <option value="">--Select Teacher--</option>
                        </select>
                        @error('teacher')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change', '#subject_id', function(){
                let teacher = "{{old('teacher')}}";
                let subject_id = $(this).val();
                $.ajax({
                    url : "{{route('getteacher')}}",
                    method : "GET",
                    data : {teacher, subject_id},
                    success : function(data){
                        $('#teacher').html(data)
                    }
                })
            });
        });
    </script>
@endpush
