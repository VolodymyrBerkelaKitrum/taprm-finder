<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Location;
use DB;

class BeerController extends Controller
{
    public function create(Request $request)
    {
        $beer = new \App\Models\Beer();
        $beer->name = 'Lviv 1715';
        $beer->price = 10;

        $beer->save();

        $location = \App\Models\Location::find([1, 4]);
        $beer->locations()->attach($location);

        return 'Success';
    }

    public function show(\App\Models\Beer $beer)
    {
        return view('show', compact('beer'));
    }

    public function getAll()
    {

        $beers = DB::table('beers')->select('id','name', 'price')->get();

        return view('welcome', compact('beers'));
    }
}
