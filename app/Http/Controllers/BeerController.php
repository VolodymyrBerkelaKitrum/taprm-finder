<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Location;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function create(Request $request)
    {
        $beer = new Beer();
        $beer->name = 'Corona';
        $beer->price = 10;

        $beer->save();

        $location = Location::find([1, 2]);
        $beer->locations()->attach($location);

        return 'Success';
    }

    /**
     * @param $beer
     * @return mixed
     */
    public function showLocationsById($beer)
    {
        $a = Beer::find($beer);
        $b = $a->locations;
        return $b;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public  function getAll()
    {
        $beers = Beer::select(['id','name', 'price'])->get();
        $locations = Location::select(['id','title', 'address', 'phone'])->get();

        $a = Beer::find(2);
        $b = $a->locations;

        return view('welcome', compact('beers', 'locations', 'b'));
    }
}
