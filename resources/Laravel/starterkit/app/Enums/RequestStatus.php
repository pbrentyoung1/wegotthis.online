<?php

namespace App\Enums;

enum RequestStatus: string
{
    case Draft = 'Draft';
    case Submitted = 'Submitted';
    case NeedsClarification = 'Needs Clarification';
    case InTriage = 'In Triage';
    case Accepted = 'Accepted';
    case Deferred = 'Deferred';
    case Rejected = 'Rejected';
    case Converted = 'Converted';
    case Archived = 'Archived';

    public function badgeClasses(): string
    {
        return match ($this) {
            self::Draft, self::Archived => 'bg-light text-default-600',
            self::Submitted, self::InTriage => 'bg-primary/10 text-primary',
            self::NeedsClarification, self::Deferred => 'bg-warning/10 text-warning',
            self::Accepted, self::Converted => 'bg-success/10 text-success',
            self::Rejected => 'bg-danger/10 text-danger',
        };
    }

    public function dotClass(): string
    {
        return match ($this) {
            self::Draft, self::Archived => 'bg-default-300',
            self::Submitted, self::InTriage => 'bg-primary',
            self::NeedsClarification, self::Deferred => 'bg-warning',
            self::Accepted, self::Converted => 'bg-success',
            self::Rejected => 'bg-danger',
        };
    }
}
