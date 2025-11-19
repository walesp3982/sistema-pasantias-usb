<?php

namespace App\Enums;

enum InternStatusEnum: string
{
    //
    case WAIT = "wait";
    case ACTIVE = "active";
    case FINISHED = "finished";
    case ABANDONED = "abandoned";

    public function label():string {
        return match($this) {
            static::WAIT => "Espera",
            static::ABANDONED => "Abandono",
            static::ACTIVE => "Activo",
            static::FINISHED => "Finalizado",
        } ;
    }
}
