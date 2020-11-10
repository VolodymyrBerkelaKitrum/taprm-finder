<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'body',
    ];
    protected $table = 'breweries';
    public function beers(){
        return $this->hasMany(Beer::class);
    }

    public function brewery_locations()
    {
        return $this->belongsToMany(BreweryLocation::class);
    }

    public function set_best_beer($beer){
        $this->best_beer_id = $beer->id;
        return $this->save();
    }
}
