
@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h2>Doctor Info</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('doctor.create') }}" class="btn btn-outline-primary">Add New Doctor</a>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Specialization</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$doctor->name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->phone}}</td>
                                    <td>{{$doctor->specialization}}</td>
                                    <td>{{$doctor->department->name}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('doctor.show',$doctor->id)}}" class="btn btn-info mx-2">Details</a>
                                        <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-warning mx-2">Edit</a>
                                       <form action="{{route('doctor.destroy',$doctor->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                       </form>
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