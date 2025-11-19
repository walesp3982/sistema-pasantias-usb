<?php

namespace App\Models\Information;

use App\Models\Postulation;
use App\Models\Student;
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
    public function students() {
        return $this->hasMany(Student::class);
    }
}
