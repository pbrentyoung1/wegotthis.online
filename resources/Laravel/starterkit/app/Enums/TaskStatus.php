<?php

namespace App\Enums;

enum TaskStatus: string
{
    case NotStarted = 'Not Started';
    case InProgress = 'In Progress';
    case Blocked = 'Blocked';
    case ReadyForReview = 'Ready for Review';
    case Done = 'Done';
    case Deferred = 'Deferred';
    case Canceled = 'Canceled';

    public function badgeClasses(): string
    {
        return match ($this) {
            self::NotStarted, self::Deferred, self::Canceled => 'bg-light text-default-600',
            self::InProgress => 'bg-primary/10 text-primary',
            self::Blocked => 'bg-danger/10 text-danger',
            self::ReadyForReview => 'bg-warning/10 text-warning',
            self::Done => 'bg-success/10 text-success',
        };
    }
}
