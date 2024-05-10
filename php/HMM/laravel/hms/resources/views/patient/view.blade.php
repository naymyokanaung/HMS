@extends('layouts.master')

@section('content')
    <section>
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Patient Information
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $patient->name }}</p>
                            <p><strong>Age:</strong> {{ $patient->age }}</p>
                            <p><strong>Phone:</strong> {{ $patient->phone }}</p>
                            <p><strong>Address:</strong> {{ $patient->address }}</p>
                            <p><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Appointment Details
                            </div>
                            <div class="card-body">
                                <p><strong>Patient Name:</strong> {{ $appointment->patient->name }}</p>
                                <p><strong>Doctor Name:</strong> {{ $appointment->doctor->name }}</p>
                                <p><strong>Date:</strong> {{ $appointment->date }}</p>
                                <p><strong>Time:</strong> {{ $appointment->time }}</p>
                                <p><strong>Initial Diagnosis:</strong> {{ $appointment->diagnosis }}</p>
                                <p><strong>Follow-up Date:</strong> {{ $appointment->follow_up_date }}</p>
                                <p><strong>Follow-up Time:</strong> {{ $appointment->follow_up_time }}</p>
                                <!-- Add other appointment details as needed -->
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('appointment.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('patient.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
