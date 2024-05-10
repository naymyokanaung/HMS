<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $depts = Department::all();
        // dd($depts);
        return view('department.index', ["depts" => $depts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'location' => 'required',
            ],
            [
                'name.required' => "Please enter Department Name",
                'description.required' => "Please enter Description",
                'phone.required' => "Please enter Phone Number",
                'location.required' => "Please enter Location",
            ]
        );

        Department::create($request->except('_token'));
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dept = Department::find($id);
        return view('department.view', ['dept' => $dept]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dept = Department::find($id);
        // dd($dept);
        return view('department.edit', ["dept" => $dept]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dept = Department::find($id);
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'location' => 'required',
            ],
            [
                'name.required' => "Please enter Department Name",
                'description.required' => "Please enter Description",
                'phone.required' => "Please enter Phone Number",
                'location.required' => "Please enter Location",
            ]
        );

        $dept->update($request->except('_token'));
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Department::destroy($id);
        return redirect()->route('department.index');
    }
}
