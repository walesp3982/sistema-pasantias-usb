<?php

namespace App\Models;

use App\Enums\StatePostulationEnum;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "student_id",
        "internship_id",
        "status",
    ];

    protected function casts(): array
    {
        return [
            'status' => StatePostulationEnum::class,
        ];
    }
    //
    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function intern() {
        return $this->hasOne(Internship::class);
    }
    
    public function documents() {
        return $this->hasMany(DocumentPostulation::class);
    }

    public function internship() {
        return $this->belongsTo(Internship::class);
    }
  
}
