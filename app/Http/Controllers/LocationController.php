<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Township;
use App\Models\Street;

class LocationController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('locations.index', compact('districts'));
    }

    public function getTownships($district_id)
    {
        $townships = Township::where('district_id', $district_id)->get();
        return response()->json($townships);
    }

    public function getStreets($township_id)
    {
        $streets = Street::where('township_id', $township_id)->get();
        return response()->json($streets);
    } //
}
