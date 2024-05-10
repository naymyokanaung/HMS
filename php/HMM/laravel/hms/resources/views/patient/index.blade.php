@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h2>Patient Info</h2>
            </div>
            <div class="col-md-2">
                <a href="{{route('patient.create')}}" class="btn btn-outline-primary">Add Patient</a>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td>{{$patient->address}}</td>
                                    <td>
                                        <a href="{{route('patient.show', $patient->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection