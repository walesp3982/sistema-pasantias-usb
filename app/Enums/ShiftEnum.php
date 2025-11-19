<?php

namespace App\Enums;

enum ShiftEnum: int
{
    case MORNING = 1;
    case AFTERNOON = 2;
    case NIGHT = 3;

    public function label() {
        return match($this) {
            static::MORNING => "Mañana",
            static::AFTERNOON => "Tarde",
            static::NIGHT => "Noche"
        };
    }
}
