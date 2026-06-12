<?php

namespace App\Services;

use App\Enums\TaskType;
use App\Models\Message;
use App\Models\MinistryRequest;
use Carbon\CarbonImmutable;

class ClarificationFollowUpService
{
    /**
     * @return array<string, mixed>
     */
    public function markForFutureTask(MinistryRequest $request, Message $message): array
    {
        $dueAt = $this->nextWorkdayDueAt($request);
        $futureTask = [
            'task_type' => TaskType::Clarification->value,
            'assigned_to_profile_id' => $request->requester_profile_id,
            'due_at' => $dueAt->toIso8601String(),
            'status' => 'Planned',
            'create_when_tasks_launch' => true,
        ];

        $message->update([
            'metadata_json' => [
                ...($message->metadata_json ?? []),
                'future_task' => $futureTask,
            ],
        ]);

        return $futureTask;
    }

    private function nextWorkdayDueAt(MinistryRequest $request): CarbonImmutable
    {
        $timezone = $request->organization?->timezone ?: config('app.timezone');
        $dueAt = CarbonImmutable::now($timezone)->addDay();

        while ($dueAt->isWeekend()) {
            $dueAt = $dueAt->addDay();
        }

        return $dueAt->endOfDay()->utc();
    }
}
