<?php

namespace App\Models\Geography;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public $timestamps = false;

    public $fillable = [
        "name",
        "district_number",
        "municipality_id",
    ];


    public function municipality() {
        return $this->belongsTo(Municipality::class);
    }
}
