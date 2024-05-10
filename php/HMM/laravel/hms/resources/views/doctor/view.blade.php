@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <h2 class="mb-4">Doctor Info for {{ $doctor->id }}</h2>
            <div class="row my-3">
                <div class="col-md-12">
                    <a href="{{ route('doctor.create') }}" class="btn btn-outline-primary">Add New Doctor</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $doctor->name }}</h5>
                            <p class="card-text text-center">{{ $doctor->email }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Phone: {{ $doctor->phone }}</li>
                                <li class="list-group-item">Specialization: {{ $doctor->specialization }}</li>
                                <li class="list-group-item">Department: {{ $doctor->department->name }}</li>
                            </ul>
                            <div class="mt-3 text-center">
                                <a href="{{ route('doctor.index') }}" class="btn btn-info me-2">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
