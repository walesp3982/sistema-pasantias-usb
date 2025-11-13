<?php

namespace App\Models;

use App\Models\Files\Picture;
use App\Models\Information\Location;
use App\Models\Information\Phone;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function locations() {
        return $this->morphMany(Location::class, 'locatable');
    }

    public function locationDetails() {
        return $this->hasMany(CompanyLocationDetail::class);
    }

    public function logo() {
        return $this->hasOne(Picture::class);
    }

    public function interships() {
        return $this->hasMany(Intership::class);
    }

    public function activeLocations() {
        return $this->locations()
            ->whereHas('companyDetails', function($query) {
                $query->where('active', true);
            });
    }

    public function phones() {
        return $this->morphMany(Phone::class, 'phoneable');
    }

}
