<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function beers()
    {
        return $this->belongsToMany(Beer::class);
    }
    public function brewery_locations()
    {
        return $this->belongsToMany(BreweryLocation::class);
    }

}
