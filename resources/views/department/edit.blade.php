@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{route('department.update', $dept->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mt-4">
                            <label for="" class="form-label">Dept Name</label>
                            <input type="text" name="name" id="" placeholder="Department Name" class="form-control" value="{{$dept->name}}">
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">Description</label>
                            <input type="text" name="description" id="" placeholder="Description" class="form-control" value="{{$dept->description}}">
                            <span class="text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="" placeholder="Phone Number" class="form-control" value="{{$dept->phone}}">
                            <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">Location</label>
                            <input type="text" name="location" id="" placeholder="Location" class="form-control" value="{{$dept->location}}">
                            <span class="text-danger">
                                @error('location')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-dark">Update Department</button>
                            <a href="{{route('department.index')}}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection