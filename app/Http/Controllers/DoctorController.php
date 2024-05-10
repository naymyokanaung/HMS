<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        return view('doctor.index', ["doctors" => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('doctor.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'specialization' => 'required',
            'department_id' => 'required'
        ], [
            'name.required' => "Please Enter Doctor Name",
            'email.required' => "Please Enter Email",
            'phone.required' => "Please Enter Phone Number",
            'specialization.required' => "Please Enter Specialization",
            'department_id.required' => "Please Enter Department",
        ]);
        Doctor::create($request->except('_token'));
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $doctor = Doctor::find($id);
        return view('doctor.view', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $doctor = Doctor::find($id);
        $departments = Department::all();
        return view('doctor.edit', ['doctor' => $doctor, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $doctor = Doctor::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'specialization' => 'required',
            'department_id' => 'required'
        ], [
            'name.required' => "Please Enter Doctor Name",
            'email.required' => "Please Enter Email",
            'phone.required' => "Please Enter Phone Number",
            'specialization.required' => "Please Enter Specialization",
            'department_id.required' => "Please Enter Department",
        ]);
        $doctor->update($request->except('_token'));
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Doctor::destroy($id);
        return redirect()->route('doctor.index');
    }
}
