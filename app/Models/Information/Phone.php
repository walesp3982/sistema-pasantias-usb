<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'phone_number'
    ];

    public function phoneable() {
        return $this->morphTo();
    }


}
