<?php

namespace App\Faker;

use Faker\Provider\Base;

class CompanyProvider extends Base
{
    protected static $prefixes = [
        'Grupo',
        'Industrial',
        'Tecno',
        'Servicios',
        'Constructora',
        'Consultora'
    ];

    protected static $suffixes = [
        'S.A.',
        'SRL',
        'Corp',
        'Group',
        'Holding'
    ];

    public function prefix() {
        $prefix = static::randomElement(static::$prefixes);
        return $prefix;
    }

    public function suffix() {
        $suffix = static::randomElement(static::$suffixes);
        return $suffix;
    }
    public function company()
    {
        $prefix = static::randomElement(static::$prefixes);
        $name = $this->generator->lastName();
        $suffix = static::randomElement(static::$suffixes);

        return "$prefix $name $suffix";
    }
}
