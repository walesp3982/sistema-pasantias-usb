<?php

namespace App\Enums;

use App\Models\Information\TypeDocumentPostulation;

enum DocPostulationEnum: int {
    case CURRICULUM = 1;
    case CARNET = 2;
    case CARTA = 3;
    case HISTORIAL = 4;

    public function getFullName() {
        return TypeDocumentPostulation::find($this->value);
    }
}