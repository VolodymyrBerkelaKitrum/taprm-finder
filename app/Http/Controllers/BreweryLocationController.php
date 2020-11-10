<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BreweryLocationController extends Controller
{
    public function show(\App\Models\BreweryLocation $breweryLocation)
    {
//        $location = $location->with('beers')->get();
        //dd($breweryLocation);
        return view('breweries_locations', compact('breweryLocation'));

    }
    public function getAll()
    {
        $breweryLocations = DB::table('brewery_locations')->select('id','title','address', 'lon', 'let','image_url')->get();
        return view('welcome', compact('breweryLocations'));
    }
}
