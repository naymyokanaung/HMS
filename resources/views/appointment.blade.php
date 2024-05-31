@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Patient Information</h2>
    <form method="POST" action="{{route('appointment.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" value='{{old('name')}}'>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" name="age" placeholder="Enter age" value='{{old('age')}}'>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" value='{{old('phone')}}'>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address" value='{{old('address')}}'>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
    </div> <!-- Close Patient Inform ation Section -->

    <hr>

    <div class="container"> <!-- Open Appointment Details Section -->
        <h2>Appointment Details</h2>
        <div>
            <form method="POST" action="{{route('appointment.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="doctor_id" class="form-label">Doctor ID</label>
                    <select class="form-select" name="doctor_id">
                        <option selected>Select Doctor</option>
                        @foreach ($doctors as $doctor)
                          <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date1">Preferred Date 1:</label>
                    <input type="date" class="form-control" name="date1" value='{{old('date1')}}'>
                </div>
                <div class="form-group">
                    <label for="time1">Preferred Time 1:</label>
                    <input type="time" class="form-control" name="time1" value='{{old('time1')}}'>
                </div>
                <div class="form-group">
                    <label for="date2">Follow-up Date:</label>
                    <input type="date" class="form-control" name="date2" value='{{old('date2')}}'>
                </div>
                <div class="form-group">
                    <label for="time2">Follow-up Time:</label>
                    <input type="time" class="form-control" name="time2" value='{{old('time2')}}'>
                </div>
                <div class="form-group">
                    <label for="diagnosis">Diagnosis:</label>
                    <textarea class="form-control" name="diagnosis" rows="3" value='{{old('diagnosis')}}'></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Upload File:</label>
                    <input type="file" class="form-control" name="file">
                    <span class="text-danger">
                        @error('file')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> <!-- Close Appointment Details Section -->
</div> <!-- Close Container -->

@endsection
