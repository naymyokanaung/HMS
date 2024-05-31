@extends('layouts.master')

@section('content')
    <section>
        <div>
            @if (Session::has('status'))
            <p class="text-success">Successful</p>
            @endif
        </div>
        <a href="{{route('nextsession')}}">Go to next page</a>
    </section>
@endsection