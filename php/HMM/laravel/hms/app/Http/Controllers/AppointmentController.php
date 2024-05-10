<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        echo "hello";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'date1' => 'required',
            'time1' => 'required',
            'diagnosis' => 'required',
            'date2' => 'required',
            'time2' => 'required',
        ], [
            'patient_id.required' => "Enter Patient Name",
            'doctor_id.required' => "Enter Doctor Name",
            'date1.required' => "Enter the date",
            'time1.required' => "Enter the time",
            'diagnosis.required' => "Enter Diagnosis",
            'date2.required' => "Enter the date",
            'time2.required' => "Enter the time",
        ]);

        Appointment::create($request->except('_token'));
        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
