<?php

namespace App\Enums;

enum RolesEnum: string
{
    case STUDENT = "student";
    case CAREER = "carrer-departmen";
    case AGREEMENTS = "agreements-departament";

    case ADMIN = "admin";

    public function label(): string {
        return match($this) {
            static::STUDENT => 'Estudiante',
            static::CAREER => 'Personal de Dirección de Carrera',
            static::AGREEMENTS => 'Personal de Dirección de Convenios',
            static::ADMIN => 'Administrador'
        };
    }

    public function abrLabel(): string {
        return match($this) {
            static::STUDENT => 'est',
            static::CAREER => 'carr',
            static::AGREEMENTS => 'conv',
            static::ADMIN => 'adm',
        };
    }
}
