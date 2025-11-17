<?php

namespace App\Enums;

use App\Models\Information\Career;

enum CareerEnum: int
{
    case EDUCACION = 1;
    case SISTEMAS = 2;
    case CONTADURIA = 3;
    case DERECHO = 4;
    case PSICOMOTRICIDAD = 5;
    case PARVULARIA = 6;
    case EDUCACIÓN_INCLUSIVA = 7;
    case PEDAGOGIA_ADULTO = 8;
    case COMERCIAL = 9;
    case GASTRONOMIA = 10;

    public function label() {
        return Career::findOrFail($this->value)
            ->name;
    }
}
