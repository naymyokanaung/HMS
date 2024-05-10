@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{route('doctor.update', $doctor->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mt-4">
                            <label for="" class="form-label">Doctor Name</label>
                            <input type="text" name="name" id="" placeholder="Doctor Name" class="form-control" value="{{$doctor->name}}">
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">  
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" id="" placeholder="Email" class="form-control" value="{{$doctor->email}}">
                            <span class="text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="" placeholder="Phone Number" class="form-control" value="{{$doctor->phone}}">
                            <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">Specialization</label>
                            <input type="text" name="specialization" id="" placeholder="Specialization" class="form-control" value="{{$doctor->specialization}}">
                            <span class="text-danger">
                                @error('specialization')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="department" class="form-label">Department</label>
                            <select name="department_id" id="department" class="form-select">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $doctor->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('department')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-dark">Update Department</button>
                            <a href="{{route('doctor.index')}}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection