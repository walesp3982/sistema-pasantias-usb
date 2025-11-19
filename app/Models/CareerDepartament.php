<?php

namespace App\Models;

use App\Models\Information\Career;
use Illuminate\Database\Eloquent\Model;

class CareerDepartament extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'career_id',
    ];

    public function career() {
        return $this->belongsTo(Career::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    //
}
