<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Beer;
use DB;

class LocationController extends Controller
{
    public function show(\App\Models\Location $location)
    {
//        $location = $location->with('beers')->get();

        return view('show-location', compact('location'));
    }
    public function getAll()
    {
        $locations = DB::table('locations')->select('id','title')->get();
        return view('welcome', compact('locations'));
    }
}
