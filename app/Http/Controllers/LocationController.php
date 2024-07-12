<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Location::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('map')->with('success', 'Location saved successfully!');
    }

    public function index()
    {
        $locations = Location::paginate(5);
        return view('map', compact('locations'));
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('location', compact('location'));
    }

    public function create()
    {
        return view('pin_location');
    }
}
