<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\BreweryLocation;
use App\Models\Location;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function create(Request $request)
    {
        $beer = new Beer();
        $beer->name = 'Stepanivske';
        $beer->price = 10;
        $beer->brewery_id = 1;

        $beer->save();

        $location = Location::find([13]);
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
        $locations = Location::select(['id','title', 'address', 'phone', 'image_url'])->get();

        $breweries = Brewery::all();
        $breweryLocations = BreweryLocation::select(['id','title', 'address', 'phone', 'image_url', 'lon', 'lat'])->get();

//        $a = Beer::find(2);
//        $b = $a->locations;

        return view('welcome', compact('beers', 'locations', 'breweries', 'breweryLocations'));
    }

    public function getBeerByName($beer_name){
        $beers = Beer::where('name', $beer_name)->get();
        if(count($beers) == 0){
            return "Empty";
        } else {
            return$this->showLocationsById($beers[0]['id']);
        }

    }
}
