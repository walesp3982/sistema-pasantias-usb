<?php

namespace App\Models\Information;

use App\Models\DocumentPostulation;
use Illuminate\Database\Eloquent\Model;

class TypeDocumentPostulation extends Model
{
    public $timestamps = false;

    public function documentPostulations() {
        return $this->hasMany(DocumentPostulation::class);
    }
}
