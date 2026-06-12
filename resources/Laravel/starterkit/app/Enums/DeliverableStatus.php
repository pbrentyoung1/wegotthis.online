<?php

namespace App\Enums;

enum DeliverableStatus: string
{
    case Proposed = 'Proposed';
    case Planning = 'Planning';
    case InProduction = 'In Production';
    case ReadyForReview = 'Ready for Review';
    case InReview = 'In Review';
    case Revision = 'Revision';
    case Approved = 'Approved';
    case Delivery = 'Delivery';
    case PublishedRunning = 'Published / Running';
    case Ended = 'Ended';
    case Archived = 'Archived';

    public function badgeClasses(): string
    {
        return match ($this) {
            self::Proposed => 'bg-light text-default-600',
            self::Planning => 'bg-primary/10 text-primary',
            self::InProduction => 'bg-warning/10 text-warning',
            self::ReadyForReview => 'bg-info/10 text-info',
            self::InReview => 'bg-warning/10 text-warning',
            self::Revision => 'bg-danger/10 text-danger',
            self::Approved => 'bg-success/10 text-success',
            self::Delivery => 'bg-primary/10 text-primary',
            self::PublishedRunning => 'bg-success/10 text-success',
            self::Ended, self::Archived => 'bg-light text-default-500',
        };
    }

    public function dotClass(): string
    {
        return match ($this) {
            self::Proposed, self::Ended, self::Archived => 'bg-default-300',
            self::Planning, self::Delivery, self::PublishedRunning => 'bg-primary',
            self::InProduction, self::ReadyForReview, self::InReview => 'bg-warning',
            self::Revision => 'bg-danger',
            self::Approved => 'bg-success',
        };
    }
}
