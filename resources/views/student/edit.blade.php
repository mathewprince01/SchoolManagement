@extends('Layout.app')
@section('title', 'stduent Create')
@section('main')
    <div class="containner w-80">
        <div class="card mt-3">
            <div class="card-header bg-warning text-white text-center">
                <h3>Stduent Edit</h3>
            </div>
            <div class="card-body">
                <form action="student.update" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="full_name" class="form-label">FUll Name :</label>
                        <input type="text" id="full_name" class="form-control" value="{{ old('full_name') }}">
                        @error('full_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="roll_number" class="form-label">Roll NUmber :</label>
                        <input type="text" id="roll_number" class="form-control" value="{{ old('roll_number') }}">
                        @error('roll_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <div class="row">
                            <div class="col-4">
                                <label for="scl_class_id" class="form-label">Class : </label>
                                <select name="scl_class_id" id="scl_class_id" class="form-control">
                                    <option value="">select</option>
                                    {{-- @foreach ($classs as $id => $class)
                                        <option value="{{ $id }}" @Selected(old('scl_class_id') == $id)>{{ $class }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                @error('scl_class_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="section_id" class="form-label">Section :</label>
                                <select name="section_id" id="section" class="form-control">
                                    <option value="">select</option>
                                    {{-- @foreach ($sections as $id => $section)
                                        <option value="{{ $id }}" @selected(old('section_id') == $id)>{{ $section }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Gender select</option>
                            {{-- @foreach ($genders as $id => $gender)
                                <option value="{{ $id }}"@selected(old('gender') == $id)>{{ $gender }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth')}}">
                          @error('date_of_birth')
                              <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                    </div>
                    <div class="mb-2">
                        <label for="contact_number">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number" value="{{old('contact_number')}}">
                        @error('contact_number')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control">
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control">
                        @error('address')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                        <div class="mb-2">
                            <label for="partent_name" class="form-label">Partent Name</label>
                            <input type="text" id="partent_name" name="partent_name"  value="{{old('partent_name')}}" class="form-control">
                                @error('partent_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="mb-2">
                            <label for="partent_contact" class="form-label">Partent Contact</label>
                            <input type="number" id="partent_number" name="partent_number" value="{{old('partent_contact')}}" class="form-control">
                            @error('partent_contact')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="text-center mb-2 ">
                            <br>
                            <button class="btn btn-warning">Update</button>
                        </div>
                </form>

            </div>
        </div>

    </div>
@endsection
