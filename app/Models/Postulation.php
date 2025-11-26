<?php

namespace App\Models;

use App\Enums\StatePostulationEnum;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        "student_id",
        "internship_id",
        "status",
    ];

    protected function casts(): array
    {
        return [
            'status' => StatePostulationEnum::class,
        ];
    }
    //
    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function intern() {
        return $this->hasOne(Internship::class);
    }

    public function documents() {
        return $this->hasMany(DocumentPostulation::class);
    }

    public function internship() {
        return $this->belongsTo(Internship::class);
    }

    #[Scope]
    protected function status(Builder $query, StatePostulationEnum $state): Builder {
        return $query->where('status', $state);
    }

    #[Scope]
    protected function current(Builder $query): Builder {
        return $query->whereHas('internship', function (Builder $query) {
            $query->current();
        });
    }


    #[Scope]
    protected function wait(Builder $query): Builder {
        return $query->whereHas('internship', function (Builder $query) {
            $query->wait();
        });
    }


    #[Scope]
    protected function finished(Builder $query): Builder {
        return $query->whereHas('internship', function (Builder $query) {
            $query->finished();
        });
    }


}
