@extends('Layout.app')
@section('title', 'Student update')
@section('main')
    <div class="container w-50">
        <div class="card mt-3">
            <div class="card-header bg-secondary text-center">
                <h3>Student Update</h3>
            </div>
            <div class="card-body">
                <form action="{{route('student.update', $student->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" id="full_name" name="full_name" value="{{old('full_name')}}" class="form-control">
                        @error('full_name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="roll_number" class="form-label">Roll Number</label>
                        <input type="text" id="roll_number" name="roll_number" value="{{old('roll_number')}}" class="form-control">
                        @error('roll_number')
                            <div class="aleert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                   <div class="row">
                    <div class="col-4">
                        <label for="scl_class_id" class="form-label">Class</label>
                        <select name="scl_class_id" id="scl_class_id" class="form-select">
                            <option value="">--select--</option>
                            @foreach ($classess as $id=>$class)
                                 <option value="{{$id}}"@selected(old('scl_class_id')==$id)>{{$class}}</option>
                            @endforeach
                        </select>
                        @error('scl_class_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="section_id" class="form-label">Section</label>
                        <select name="section_id" id="section_id" class="form-select">
                            <option value="">--select--</option>
                        @foreach ($sections as $id=>$section)
                        <option value="{{$id}}" @selected(old('section_id')==$id)>{{$section}}</option>
                        @endforeach
                        </select>
                        @error('section_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                   </div>
                   <div class="mb-2">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">--select--</option>
                        @foreach ($genders as $id=>$gender)
                        <option value="{{$id}}" @selected(old('gender')==$id)>{{$gender}}</option>
                        @endforeach
                    </select>
                    @error('gender')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                   </div>
                   <div class="mb-2">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="date" id="date_of-birth" name="date_of_birth" value="{{old('date_of_birth')}}" class="form-control">
                        @error('date_of_birth')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                   </div>
                   <div class="mb-2">
                        <label for="contact_number" class="form-label">Contact number</label>
                        <input type="number" id="contact_number" name="contact_number" value="{{old('contact_number')}}" class="form-control">
                        @error('contact_number')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                   </div>
                   <div class="mb-2">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="3" class="form-control">{{old('address')}}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                   </div>
                   <div class="row">
                   <div class="col-4">
                        <label for="partent_name" class="label-form">Partent Name</label>
                        <input type="text" name="partent_name" id="partent_name" value="{{old('partent_name')}}">
                   </div>
                   @error('partent_name')
                       <div class="alert alert-danger">{{$message}}</div>
                   @enderror
                   <div class="col-4 mb-3">
                        <label for="partent_contact" class="label-form">Partent Contact</label>
                        <input type="text" id="partent_contact" class="label-control" name="partent_contact" value="{{old('partent_contact')}}">
                        @error('partent_contact')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                   </div>
                </div>
                   <div>
                       <button class="btn btn-warning">Update</button>
                   </div>
                </form>
                </div>
        </div>
    </div>
@endsection

