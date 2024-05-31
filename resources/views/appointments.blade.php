@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Date 1</th>
                                <th>Time 1</th>
                                <th>Date 2</th>
                                <th>Time 2</th>
                                <th>Approved</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index=0;
                            @endphp
                            @foreach ($appointments as $appt)
                                <tr id='{{$appt->id}}'>
                                    <td>{{ (($appointments->currentPage() * 10 ) -10 ) + $loop->iteration}}</td>
                                    <td>
                                        @foreach ($patients as $patient)
                                            @if ($appt->patient_id == $patient->id)
                                                {{$patient->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$doctors[$index]}}</td>
                                    <td>{{$appt->date1}}</td>
                                    <td>{{$appt->time1}}</td>
                                    <td>
                                        @if ($appt->date2==null)
                                        {{"-"}}
                                        @else
                                        {{$appt->date2}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($appt->time2==null)
                                        {{"-"}}
                                        @else
                                        {{$appt->time2}}
                                        @endif
                                    </td>
                                    @if ($appt->approvedBy==0)
                                    <td><button class="btn btn-danger approve">Approve</button></td>
                                    @else
                                    <td><button class="btn btn-info">Confirmed</button></td>
                                    @endif
                                    <td><a href="" class="btn btn-success">Details</a></td>
                                </tr>
                                @php
                                $index++
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $appointments->links() }}
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $('.approve').click(function(){
            let tr=this.parentElement.parentElement
            let id=tr.getAttribute('id')
            
            $.ajax({
            method:'post',
            url:`appointment/approve/${id}`,
            dataType:'json',
            success:function(response){
                console.log(response);
                alert(response.success);
                location.reload();// refresh current url page
            }
         })
        })
    });

    </script>
@endsection