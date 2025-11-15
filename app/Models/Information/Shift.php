<?php

namespace App\Models\Information;

use App\Models\Intership;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function students() {
        return $this->hasMany(Student::class);
    }

}
