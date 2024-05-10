<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return view('patient.index', ["patients" => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $patient = Patient::latest()->first();
        $doctors = Doctor::all();
        return view('patient.create', ["patient" => $patient, "doctors" => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ], [
            'name.required' => "Enter Patient Name",
            'age.required' => "Enter Age",
            'phone.required' => "Enter Phone",
            'address.required' => "Enter Address",
            'gender.required' => "Enter Patient Gender",
        ]);
        $patient = Patient::create($request->except('_token'));
        if ($patient) {
            return response()->json(['success' => true, 'patient_id' => $patient->id]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $patient = Patient::find($id);
        $appointment = Appointment::with('patient')->find($id);
        dd($appointment);
        return view('patient.view', ['patient' => $patient, 'appointment' => $appointment]);
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
