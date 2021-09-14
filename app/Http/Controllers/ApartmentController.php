<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::with('rooms')->get();
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
     * Show form to create new room in this apartment
     * 
     * @param $apartment_id
     */
    public function createRoom($apartment_id)
    {
        $apartment = Apartment::findOrFail($apartment_id);

        $room_types = Room::$room_types;
        array_push($room_types, 'EXTRA');

        return view('apartments.create-room', ['apartment' => $apartment, 'room_types' => $room_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('apartments'),
            ],
        ])->validate();

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
        $apartment = Apartment::with('rooms')->findOrFail($id);
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
     * @param  ApartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                Rule::unique('apartments')->ignore($id),
            ],
        ])->validate();

        $apartment = Apartment::findOrFail($id);
        $apartment->name = $request->input('name'); // can use validated['name']
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
