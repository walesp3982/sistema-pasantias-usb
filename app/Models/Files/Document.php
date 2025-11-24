<?php

namespace App\Models\Files;

use App\Models\Postulation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public $timestamps = true;

    protected $fillable = [
        'uuid',
        'name',
        'extension',
        'path',
        'size',
        'user_id',
        'documentable_type',
        'documentable_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function postulation() {
        return $this->hasOne(Postulation::class);
    }

    public function documentable() {
        return $this->morphTo();
    }



}
