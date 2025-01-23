<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::all();
        $title = 'Location Management Data';
        return view('', compact('location', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_name' => 'required| string| max:255',
        ]);

        Location::create($validated);
        return redirect()->back()->with('Success', 'Location created successfully!');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validated = $request->validate([
            'location_name' => 'required| string| max:255',
        ]);

        $location->update($validated);
        return redirect()->back()->with('Success', 'Location updated successfully!');
    }

    public function delete($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->back()->with('Success', 'Location deleted successfully!');
    }
}
