<?php

namespace App\Models;

use App\Models\Files\Picture;
use App\Models\Information\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    use HasFactory;
    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'sector_id',
        'email',
        'name_manager',
    ];

    public function locations() {
        return $this->morphMany(Location::class,'locatable');
    }


    public function sector() {
        return $this->belongsTo(Sector::class);
    }
    public function logo() {
        return $this->hasOne(Picture::class);
    }

    public function internships() {
        return $this->hasMany(Internship::class);
    }

    public function activeLocations() {
        return $this->locations()
            ->whereHas('companyDetails', function($query) {
                $query->where('active', true);
            });
    }
}
