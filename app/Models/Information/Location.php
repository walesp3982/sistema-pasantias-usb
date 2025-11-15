<?php

namespace App\Models\Information;

use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\Geography\Zone;
use App\Models\Geography\Municipality;
use App\Models\Postulation;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
    // public function city() {
    //     return $this->hasOne(City::class);
    // }
    protected $fillable = [
        'locatable_id',
        'locatable_type',
        'zone',
        'street',
        'number_door',
        'reference',
    ];
    public function locatable() {
        return $this->morphTo();
    }

    public function companyDetails()
    {
        return $this->hasOne(CompanyLocation::class);
    }

    public function postulations() {
        return $this->hasMany(Postulation::class);
    }

    public function zone() {
        return $this->belongsTo(Zone::class);
    }

    public function municipality() {
        return $this->through('zone')->has('municipality');
    }

    public function getFullAddressAttribute() {
        return "{$this->street} #{$this->number_door}, zona {$this->zone->name}";
    }

    public function isCompanyLocation() {
        return $this->locatable_type == Company::class;
    }

    public function isStudentLocation() {
        return $this->locatable_type == Student::class;
    }
}
