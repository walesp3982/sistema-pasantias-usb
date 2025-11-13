<?php

namespace App\Models;

use App\Models\Information\Career;
use App\Models\Information\Location;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Intership extends Model
{
    //
    protected $casts = [
        "active" => "boolean",
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function career() {
        return $this->hasOne(Career::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    #[Scope]
    public function active(Builder $query) {
        return $query->where("active", true);
    }
}
