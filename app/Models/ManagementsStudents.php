<?php

namespace App\Models;

use App\Models\Information\Career;
use App\Models\Information\Management;
use Illuminate\Database\Eloquent\Model;

class ManagementsStudents extends Model
{
    //
    public function management() {
        return $this->belongsTo(Management::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function career() {
        return $this->belongsTo(Career::class);
    }
}
