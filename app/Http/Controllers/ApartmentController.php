<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::get();
        return view("apartments.index", ['apartments' => $apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apartments = new Apartment();
        $apartments->name = $request->input('name');
        $apartments->floors = $request->input('floors');
        $apartments->save();
        return redirect()->route('apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrfail($id);
        return view('apartments.show', ['apartment' => $apartment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit', ['apartment' => $apartment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->name = $request->input('name');
        $apartment->floors = $request->input("floors");
        $apartment->save();
        return redirect()->route('apartments.show', ['apartment' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $apartment = Apartment::findOrFail($id);
        if ($apartment->name === $request->input('destroy')) {
            $apartment->delete();
            return redirect()->route('apartments.index');
        }
        return redirect()->back();
    }
}
