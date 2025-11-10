<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    //
    public function postulation() {
        return $this->hasOne(Postulation::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function student() {
        return $this->hasOneThrough(Student::class, Postulation::class);
    }

    public function company() {
        return $this->hasOneThrough(Company::class, Postulation::class);
    }
}
