<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    //
    public function postulation() {
        return $this->belongsTo(Postulation::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

}
