<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "name",
        "total_district"
    ];

    public function zone() {
        return $this->hasMany(Zone::class);
    }
}
