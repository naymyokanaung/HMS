
@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h2>Department Info</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('department.create') }}" class="btn btn-outline-primary">Add New Department</a>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depts as $dept)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dept->name}}</td>
                                    <td>{{$dept->description}}</td>
                                    <td>{{$dept->phone}}</td>
                                    <td>{{$dept->location}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('department.show',$dept->id)}}" class="btn btn-info mx-2">Details</a>
                                        <a href="{{route('department.edit',$dept->id)}}" class="btn btn-warning mx-2">Edit</a>
                                       <form action="{{route('department.destroy',$dept->id)}}" method="POST">
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