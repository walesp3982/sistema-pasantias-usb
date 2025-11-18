<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RolesEnum;
use App\Models\Files\Picture;
use App\Models\CareerDepartament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property-read CareerDepartament|null $careerDepartament
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile() {
        return $this->morphOne(Picture::class, 'pictureable');
    }

    public function role() {
        $roleName = $this->getRoleNames()->first();
        $roleEnum = RolesEnum::from($roleName);
        return $roleEnum;
    }

    public function student() {
        return $this->hasOne(Student::class);
    }

    public function careerDepartament() {
        return $this->hasOne(CareerDepartament::class);
    }    
}
