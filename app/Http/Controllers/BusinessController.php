<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Tag;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $business = Business::with('tags','categories')->get();
        return view('business.index',compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string',
            'contact_email' => 'nullable|email',
        ]);
        Business::create([
           'business_name' => $request->business_name,
           'contact_email' => $request->contact_email,
        ]);
        return redirect()->route('business.index')->with('success','Business Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        return view('business.details',compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        return view('business.edit',[
            'business' =>$business,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        $request->validate([
            'business_name' => 'required|string',
            'contact_email' => 'nullable|email',
        ]);
        $business->update([
            'business_name' => $request->business_name,
            'contact_email' => $request->contact_email,
        ]);
        $business->tags()->sync($request->tags);

        return redirect()->route('business.index')->with('success','Business Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('business.index')->with('success','Business Deleted!');
    }

    public function trash()
    {
        $business = Business::onlyTrashed()->latest()->get();
        return view('business.trash',compact('business'));
    }
    public function forceDelete($id)
    {
        $business = Business::withTrashed()->findOrFail($id);
        $business->forceDelete();
        return redirect()->route('business.trash')->with('success','Business Deleted!');
    }
}
