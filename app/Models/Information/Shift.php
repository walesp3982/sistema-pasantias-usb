<?php

namespace App\Models\Information;

use App\Enums\ShiftEnum;
use App\Models\Intership;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $timestamps = false;

    public $casts = [
        'id' => ShiftEnum::class,

    ];
    public function students() {
        return $this->hasMany(Student::class);
    }

}
