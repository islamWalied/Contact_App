<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::all();
        return view('person.index',compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create',['business'=> Business::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'business_id' => 'required|numeric|exists:businesses,id',
            'email' => 'required|email',
        ]);
        Person::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'business_id' => $request->business_id,
            'email' => $request->email,
        ]);
        return redirect()->route('person.index')->with('success','Person Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('person.edit',['person' => $person,'business' => Business::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'business_id' => 'required|exists:businesses,id',
            'email' => 'required|email|unique:users',
        ]);
        $person->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'business_id' => $request->business_id,
            'email' => $request->email,
        ]);
        return redirect()->route('person.index')->with('success','Person Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index')->with('success','Person Deleted!');
    }
}
