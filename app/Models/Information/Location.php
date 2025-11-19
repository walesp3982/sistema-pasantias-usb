<?php

namespace App\Models\Information;

use App\Models\Geography\Zone;
use App\Models\Postulation;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

#[UseFactory(LocationFactory::class)]
class Location extends Model
{
    use HasFactory;
    // public function city() {
    //     return $this->hasOne(City::class);
    // }
    public $timestamps = false;
    protected $fillable = [
        'locatable_id',
        'locatable_type',
        'zone_id',
        'street',
        'number_door',
        'reference',
        'principal',
        'phone_number'
    ];
    public function locatable() {
        return $this->morphTo();
    }

    public function postulations() {
        return $this->hasMany(Postulation::class);
    }

    public function zone() {
        return $this->belongsTo(Zone::class);
    }

    public function municipality() {
        return $this->through('zone')->has('municipality');
    }

    protected function fullAddress():Attribute {
        return Attribute::make(
            get: function(){
                if(!$this->zone) {
                    "Algo salió mal";
                }

                return trim(sprintf(
                    '%s, %s. %s #%s',
                    $this->zone->municipality->name ?? '',
                    $this->zone->name ?? '',
                    $this->street ?? '',
                    $this->number_door ?? ''

            ));
            } 
        );
    }

    public function isStudentLocation() {
        return $this->locatable_type == Student::class;
    }
}
