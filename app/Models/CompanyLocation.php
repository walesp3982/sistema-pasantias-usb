<?php

namespace App\Models;

use App\Models\Information\Location;
use App\Models\Information\Phone;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;


class CompanyLocation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'company_id',
        'active',
        'name_administrador',
        'principal'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function location() {
        return $this->morphOne(Location::class,'locatable');
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    #[Scope]
    public function active(Builder $query) {
        return $query->where('active', true);
    }

    public function phone() {
        return $this->morphOne(Phone::class, 'phoneable');
    }
}
