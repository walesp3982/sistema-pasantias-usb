<?php

namespace App\Models;

use App\Models\Files\Picture;
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
    ];
    public function companyLocations() {
        return $this->hasMany(CompanyLocation::class);
    }

    public function sector() {
        return $this->belongsTo(Sector::class);
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
}
