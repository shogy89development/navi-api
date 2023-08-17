<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Http\Requests\StoreApartmentRequest;


class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return response()->json(['apartments' => $apartments]);
    }

    public function show($id)
    {
        $apartment = Apartment::find($id);
        if (!$apartment) {
            return response()->json(['message' => 'Apartment not found'], 404);
        }
        return response()->json(['apartment' => $apartment]);
    }
    
    public function store(StoreApartmentRequest $request)
    {
        $apartment = Apartment::create($request->all());
        return response()->json(['message' => 'Apartment created', 'apartment' => $apartment], 201);
    }

    public function update(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        if (!$apartment) {
            return response()->json(['message' => 'Apartment not found'], 404);
        }
        $apartment->update($request->all());
        return response()->json(['message' => 'Apartment updated', 'apartment' => $apartment]);
    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        if (!$apartment) {
            return response()->json(['message' => 'Apartment not found'], 404);
        }
        $apartment->delete();
        return response()->json(['message' => 'Apartment deleted']);
    }
}
