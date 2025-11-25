<?php

namespace App\Models;

use App\Enums\StatusInternshipEnum;
use App\Models\Information\Career;
use App\Models\Information\Location;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 */
class Internship extends Model
{
    use HasFactory;
    //
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'career_id',
        'start_date',
        'end_date',
        'postulation_limit_date',
        'entry_time',
        'exit_time',
        'vacant',
        'location_id',
        'suspend',
    ];
    protected $casts = [
        "active" => "boolean",
        "start_date" => 'date',
        "end_date" => 'date',
        "postulation_limit_date" => 'date',
        "entry_time" => "datetime:H:i",
        "exit_time" => "datetime:H:i",
        //"status" => StatusInternshipEnum::class,
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function career() {
        return $this->belongsTo(Career::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    #[Scope]
    public function active(Builder $query) {
        return $query->where("active", true);
    }
}
