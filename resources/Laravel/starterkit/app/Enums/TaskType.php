<?php

namespace App\Enums;

enum TaskType: string
{
    case Work = 'work';
    case Clarification = 'clarification';

    public function label(): string
    {
        return match ($this) {
            self::Work => 'Work task',
            self::Clarification => 'Needs clarification',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Work => 'tabler--list-check',
            self::Clarification => 'tabler--message-question',
        };
    }

    public function badgeClasses(): string
    {
        return match ($this) {
            self::Work => 'bg-primary/10 text-primary',
            self::Clarification => 'bg-info/10 text-info',
        };
    }

    public function cardClasses(): string
    {
        return match ($this) {
            self::Work => 'border-default-300 hover:border-primary/40',
            self::Clarification => 'border-info/40 bg-info/5 hover:border-info',
        };
    }
}
