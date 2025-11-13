<?php

namespace App\Models;

use App\Models\Files\Document;
use Illuminate\Database\Eloquent\Model;

class DocumentPostulation extends Model
{
    public function document() {
        return $this->morphOne(Document::class, 'documentable');
    }
}
