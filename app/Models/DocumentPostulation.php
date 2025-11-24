<?php

namespace App\Models;

use App\Models\Files\Document;
use App\Models\Information\TypeDocumentPostulation;
use Illuminate\Database\Eloquent\Model;

class DocumentPostulation extends Model
{
    public $timestamps = true;

    public $fillable = [
        'postulation_id',
        'type_document_postulation_id'
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
