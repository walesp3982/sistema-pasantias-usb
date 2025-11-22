<?php

namespace App\Enums;

enum StatePostulationEnum: string
{
    //
    case CREATED = 'create';
    case SEND = 'send';
    case VERIFY = 'verify';

    case REJECT = 'reject';

    case ACCEPT = 'accept';

    public function label(): string {
        return match($this) {
            static::CREATED => "Creado",
            static::SEND => "Enviado",
            static::VERIFY => "Verificado",
            static::REJECT => "Rechazado",
            static::ACCEPT => "Aceptado",
        };
    }

}
