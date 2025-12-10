@extends('Layout.app')
@section('title', 'Student Register')
@section('main')
    <div class="container w-80">
        <div class="card mt-3">
            <div class="card-header bg-black text-center text-white">
                <h3>Student Registration</h3>
            </div>

            <div class="card-body">
                <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="full_name" class="form_label">Full Name: </label>
                        <input type="text" name="full_name"  id="full_name" value="{{old('full_name')}}" class="form-control">
                        @error('full_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="roll_number" class="form_label"> Roll Number: </label>
                        <input type="number" name="roll_number"id="roll_number" value="{{old('roll_number')}}" class="form-control">
                        @error('roll_number')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="scl_class_id" class="form-label">Class: </label>
                            <select name="scl_class_id" id="scl_class_id" class="form-select">
                                <option value="">--Select Class--</option>
                                @foreach ($classess as $id=>$class)
                                    <option value="{{$id}}" @selected(old('scl_class_id') == $id)>{{$class}}</option>
                                @endforeach
                            </select>
                            @error('scl_class_id')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="section_id" class="form-label">Section: </label>
                            <select name="section_id" id="section_id" class="form-select">
                                <option value="">--Select Section--</option>
                                @foreach ($sections as $id=>$section)
                                    <option value="{{$id}}" @selected(old('section_id') == $id)>{{$section}}</option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender: </label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="">--Select Gender--</option>
                            @foreach ($genders as $gender)
                                <option value="{{$gender}}" @selected(old('gender') == $gender)>{{$gender}}</option>
                            @endforeach
                        </select>
                        @error('gender')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="date_of_birth" class="form_label"> Date Of Birth: </label>
                            <input type="date" name="date_of_birth" id="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" class="form-control">
                            @error('date_of_birth')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="contact_number" class="form_label"> Contact Number: </label>
                            <input type="number" name="contact_number" id="contact_number" id="contact_number" value="{{old('contact_number')}}" class="form-control">
                            @error('contact_number')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form_label">Student Email: </label>
                        <input type="text" name="email" id="email" id="email" value="{{old('email')}}" class="form-control">
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address: </label>
                        <textarea name="address" id="address" rows="3" class="form-control">{{old('address')}}</textarea>
                        @error('address')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="parent_name" class="form_label">Parent Name: </label>
                            <input type="text" name="parent_name" id="parent_name" id="parent_name" value="{{old('parent_name')}}" class="form-control">
                            @error('parent_name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="parent_contact" class="form_label">Parent Contact: </label>
                            <input type="text" name="parent_contact" id="parent_contact" id="parent_contact" value="{{old('parent_contact')}}" class="form-control">
                            @error('parent_contact')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
