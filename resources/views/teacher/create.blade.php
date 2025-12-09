@extends('layout.app')
@section('title', 'Student Register')
@section('main')
    <div class="container w-80">
        <div class="card mt-3">
            <div class="card-header bg-black text-center text-white">
                <h3>Student Registration</h3>
            </div>

            <div class="card-body">
                    <form action="">
                        <div class="mb-2">
                            <label for="full_name" class="label-form">Full Name</label>
                            <input type="text" id="full_name" name="full_name" value="{{old('full_name')}}" class="form-control">
                            @error('full_name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="subject" class="form-label">Subject</label>
                            <select name="subject" id="subject" class="form-label">
                                <option value="">-select subject-</option>
                                @foreach ($subjects as $id=>$subject)
                                    <option value="{{$id}}"@selected(old('subject')==$id)>{{$subject}}</option>
                                @endforeach
                            </select>
                            @error('subject')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="full_name" class="label-form">Qualication</label>
                            <input type="text" class="form-control" name="qualication" id="qualication" value="{{old('qulication')}}">
                            @error('qualication')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </form>
            </div>
        </div>
    </div>
