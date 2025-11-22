<?php

namespace App\Enums;

enum StatusInternshipEnum: string 
{
    //
    case PENDING = 'pending';
    case PROGRESS = 'progress';
    case FINISHED = 'finished';
    case SUSPEND = 'suspend';

    public function label(): string {
        return match ($this) {
            static::PENDING => 'Pendiente',
            static::PROGRESS => 'En Progreso',
            static::FINISHED => 'Finalizado',
            static::SUSPEND => 'Suspendido',
        };
    }

    // Return icon name fontawesome 
    // example fa-<icon-name>
    public function icon(): string {
        return match ($this) {
            static::PENDING => 'hourglass-half',
            static::PROGRESS => 'spinner',
            static::FINISHED => 'check-circle',
            static::SUSPEND => 'pause-circle',
        };
    }

    
}
