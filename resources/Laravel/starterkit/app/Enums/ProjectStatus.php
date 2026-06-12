<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Proposed = 'Proposed';
    case Planning = 'Planning';
    case Scheduled = 'Scheduled';
    case Active = 'Active';
    case Paused = 'Paused';
    case Completed = 'Completed';
    case Closeout = 'Closeout';
    case Archived = 'Archived';
}
