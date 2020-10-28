<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Location;

class BeerController extends Controller
{
    public function create(Request $request)
    {
        $beer = new \App\Models\Beer();
        $beer->name = 'Corona';
        $beer->price = 20;

        $beer->save();

        $location = \App\Models\Location::find([1, 2, 4]);
        $beer->locations()->attach($location);

        return 'Success';
    }

    public function show(\App\Models\Beer $beer)
    {
        return view('show', compact('beer'));
    }
}
