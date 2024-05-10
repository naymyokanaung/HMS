@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <h2 class="mb-4">Department Info for {{$dept->id}}</h2>
            <div class="row my-3">
                <div class="col-md-12">
                    <a href="{{ route('department.create') }}" class="btn btn-outline-primary">Add New Department</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $dept->name }}</h5>
                            <p class="card-text text-center">{{ $dept->description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Phone: {{ $dept->phone }}</li>
                                <li class="list-group-item">Location: {{ $dept->location }}</li>
                            </ul>
                            <div class="mt-3 text-center">
                                <a href="{{ route('department.index')}}" class="btn btn-info me-2">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
