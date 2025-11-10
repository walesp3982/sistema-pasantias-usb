<?php

namespace App\Models;

use App\Models\Files\Document;
use App\Models\Information\Location;
use App\Models\Information\Management;
use App\Models\Information\Phone;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public $timestamps = true;

    protected $fillable = [
        "first_name",
        "last_name",
        "identity_card",
        "user_id",
        "semester",
        "career_id",
        "shift_id"

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function phone() {
        return $this->morphTo(Phone::class);
    }

    public function location() {
        return $this->morphOne(Location::class, 'locatable');
    }

    public function postulations() {
        return $this->hasMany(Postulation::class);
    }

    public function managements() {
        return $this->hasMany(Management::class);
    }

    public function getFullNameAttribute() {
        return $this->first_name." ".$this->last_name;
    }
}
