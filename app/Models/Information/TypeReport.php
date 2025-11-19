<?php

namespace App\Models\Information;

use App\Models\Report;
use Illuminate\Database\Eloquent\Model;

class TypeReport extends Model
{
    public function reports() {
        return $this->hasMany(Report::class);
    }
}
