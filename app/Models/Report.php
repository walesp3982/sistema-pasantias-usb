<?php

namespace App\Models;

use App\Models\Files\Document;
use App\Models\Information\TypeReport;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function intern() {
        return $this->belongsTo(Intern::class);
    }

    public function document() {
        return $this->morphOne(Document::class, "documentable");
    }

    public function typeReport() {
        return $this->belongsTo(TypeReport::class);
    }
}
