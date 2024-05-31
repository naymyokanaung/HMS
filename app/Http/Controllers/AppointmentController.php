<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $appointments = Appointment::Paginate(10);
        $patients = Patient::all();
        // foreach ($appointments as $appointment) {
        //     $patient = Patient::find($appointment->patient_id);
        //     $patients[index] = $patient->name;
        //     index++;
        // }
        $doctors = [];
        $index = 0;
        foreach ($appointments as $appointment) {
            $doctor = Doctor::find($appointment->doctor_id);
            $doctors[$index] = $doctor->name;
            $index++;
        }
        return view('appointments', ["appointments" => $appointments, "patients" => $patients, "doctors" => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $doctors = Doctor::all();
        return view('appointment', ["doctors" => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
            'date1' => 'required',
            'time1' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png,svg|max:1024',
        ], [
            'file.max' => "Your file exceeds 1 MB.",
            'file.image' => "Your file type is not allowed.",
        ]);

        // Appointment::create($request->except('_token'));
        // return redirect()->route('patient.index');

        $patient = Patient::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);
        $patient_id = $patient->id;

        $imageName = time() . "." . $request->file->extension();
        // $success = $request->file->move(public_path('uploads'), $imageName);
        //Store in app/public/images
        $success = $request->file->storeAs('images', $imageName);
        if ($success) {
            //mass assignment
            $appointment = Appointment::create([
                'patient_id' => $patient_id, // Set the patient_id here
                'doctor_id' => $request->doctor_id,
                'date1' => $request->date1,
                'time1' => $request->time1,
                'date2' => $request->date2,
                'time2' => $request->time2,
                'diagnosis' => $request->diagnosis,
                'file' => $imageName,
            ]);
        }
        //assign one by one
        // $appointment = new Appointment();
        // $appointment->patient_id = $patient_id;
        // $appointment->doctor_id = $request->doctor_id;
        // $appointment->date1 = $request->date1;
        // $appointment->time1 = $request->time1;
        // $appointment->date2 = $request->date2;
        // $appointment->time2 = $request->doctor_id;
        // $appointment->diagnosis = $request->diagnosis;
        // $appointment->file = $request->file;
        // $appointment->save();
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
    public function approve($id)
    {
        //
        echo "hello";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
