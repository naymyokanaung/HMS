<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $session_data = $request->session->all();
        // dd($session_data);
        Session::put('name', "KaNaung");
        $items = ['item1', 'item2', 'item3'];
        Session::put('items', $items);
        // $data = Session::all();

        if (Session::exists('items')) {
            // dd(Session::get('items'));
        }

        Session::forget('name');
        Session::flash('status', 'successful');
        Session::flash('confirm', 'yes');
        // dd(Session::all());

        return view('session');
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
