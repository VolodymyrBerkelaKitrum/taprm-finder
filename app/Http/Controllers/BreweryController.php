<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BreweryLocation;


class BreweryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breweries = Brewery::all();
        return response()->json(['message'=>'Success','data'=>$breweries],200);
    }

    public function create(Request $request)
    {
        $brewery = new Brewery();
        $brewery->title = 'Test5';
        $brewery->slug = "10";
        $brewery->body = "1";

        $brewery->save();

        $brewery_location = BreweryLocation::find([1, 2]);
        $brewery->brewery_locations()->attach($brewery_location);

        return 'Success';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = $this->validateBrewery();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Brewery::create($validator->validate())){
            return response()->json(['message'=>'Brewery Created','data'=>$validator->validate()],200);
        }
        return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brewery $brewery)
    {
        return response()->json(['message'=>'Success','data'=>$brewery],200);
    }

    public function show_beers(Brewery $brewery){
        $beers = $brewery->beers;

        return $beers;
    }

    public function show_best_beer(Brewery $brewery){
        $beer = Beer::find($brewery->best_beer_id);
        return response()->json(['message'=>'Success','data'=>$beer],200);
    }


    /**
     * @param Brewery $article
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Brewery $brewery)
    {
        if($brewery->delete()){
            return response()->json(['message'=>'Brewery Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }

    public function validateBrewery(){
        return Validator::make(request()->all(), [
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:25',
            'body' => 'required|string|min:5|max:255',
        ]);
    }
    public  function getAll()
    {
        $breweries = Brewery::all();
        $breweryLocations = BreweryLocation::select(['id','title', 'address', 'phone', 'image_url'])->get();

//        $a = Beer::find(2);
//        $b = $a->locations;

        return view('welcome', compact('breweries', 'breweryLocations'));
    }

    public function showBreweryLocationsById($brewery)
    {
        $a = Brewery::find($brewery);
        $b = $a->brewery_locations;
        return $b;
    }
}
