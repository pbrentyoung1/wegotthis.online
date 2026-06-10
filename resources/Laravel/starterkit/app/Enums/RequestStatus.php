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
}
