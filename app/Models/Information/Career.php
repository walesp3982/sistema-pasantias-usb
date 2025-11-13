<?php

namespace App\Models\Information;

use App\Models\Postulation;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
    //
    public function postulations() {
        return $this->belongsTo(Postulation::class);
    }

}
