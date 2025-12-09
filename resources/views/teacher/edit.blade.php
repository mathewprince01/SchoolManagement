@extends('layout.base')
@section('title', 'Teacher Update')
@section('main')
    <div class="container w-50">
        <div class="card mt-3">
            <div class="card-header text-center bg-secondary">
                <h3>Teacher Registration </h3>
            </div>
            <div class="card-body">
                <form action="{{route('teacher.update', $teacher->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="full_name" class="form_label">Full Name: </label>
                        <input type="text" name="full_name" id="full_name" id="full_name" value="{{old('full_name',$teacher->full_name)}}" class="form-control">
                        @error('full_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject: </label>
                        <select name="subject_id" id="subject_id" class="form-select">
                            <option value="">--Select Subject--</option>
                            @foreach ($subjects as $id=>$subject)
                                <option value="{{$id}}" @selected(old('subject_id',$teacher->subject_id) == $id)>{{$subject}}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="qualification" class="form_label"> Qualification: </label>
                        <input type="text" name="qualification" id="qualification" id="qualification" value="{{old('qualification',$teacher->qualification)}}" class="form-control">
                        @error('qualification')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="contact" class="form_label"> Contact: </label>
                        <input type="text" name="contact" id="contact" id="contact" value="{{old('contact',$teacher->contact)}}" class="form-control">
                        @error('contact')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form_label"> Email ID: </label>
                        <input type="text" name="email" id="email" id="email" value="{{old('email',$teacher->email)}}" class="form-control">
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    @php
                        $selected = explode(',', $teacher->assigned_classes)
                    @endphp
                     <div class="mb-4">
                        <label for="assigned_classes" class="form-label">Class: </label>
                        <select name="assigned_classes[]" id="assigned_classes" class="form-select" multiple>
                            <option value="">--Select Class--</option>
                            @foreach ($classess as $class)
                                <option value="{{$class}}" @selected(in_array($class,old('assigned_classes',$selected)))>{{$class}}</option>
                            @endforeach
                        </select>
                        @error('assigned_classes')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

