<?php

namespace App\Models;

use App\Models\Files\Document;
use App\Models\Information\TypeDocumentPostulation;
use Illuminate\Database\Eloquent\Model;

class DocumentPostulation extends Model
{
    public $timestamps = false;

    public $fillable = [
        'postulation_id',
        'type_document_postulation_id',
        'verify'
    ];
    public function document() {
        return $this->morphOne(Document::class, 'documentable');
    }

    public function postulation() {
        return $this->belongsTo(Postulation::class);
    }

    public function typeDocument() {
        return $this->belongsTo(TypeDocumentPostulation::class);
    }
}
