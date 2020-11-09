<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreweryLocation extends Model
{
    use HasFactory;

    public function breweries()
    {
        return $this->belongsToMany(Brewery::class);
    }
}
