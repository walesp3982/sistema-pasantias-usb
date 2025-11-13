<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'path',
        'path_medium',
        'path_thumbnail',
    ];

    public function pictureable() {
        return $this->morphTo();
    }
}
