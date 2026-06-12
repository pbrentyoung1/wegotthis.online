<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Enums\TaskType;
use App\Models\Deliverable;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyTaskController extends Controller
{
    public function index(Request $request): View
    {
        $profile = $request->user()->profiles()->where('status', 'Active')->firstOrFail();
        $tasks = Task::query()
            ->where('organization_id', $profile->organization_id)
            ->where('assigned_to_profile_id', $profile->id)
            ->whereNotIn('status', [TaskStatus::Done->value, TaskStatus::Canceled->value])
            ->with(['deliverable.project'])
            ->orderByRaw("CASE WHEN status = 'Blocked' THEN 0 WHEN status = 'In Progress' THEN 1 ELSE 2 END")
            ->orderByRaw("CASE priority WHEN 'Urgent' THEN 0 WHEN 'High' THEN 1 ELSE 2 END")
            ->orderBy('due_date')
            ->paginate(25);
        $blockedAlerts = $profile->workNotifications()
            ->where('notification_type', 'Blocked')
            ->whereNull('read_at')
            ->where('subject_type', Task::class)
            ->whereIn('subject_id', Task::query()
                ->where('organization_id', $profile->organization_id)
                ->where('status', 'Blocked')
                ->select('id'))
            ->latest()
            ->limit(10)
            ->get();
        $approvalAlerts = $profile->workNotifications()
            ->where('notification_type', 'Needs Approval')
            ->whereNull('read_at')
            ->where(function ($query) use ($profile) {
                $query->where(function ($taskAlerts) use ($profile) {
                    $taskAlerts->where('subject_type', Task::class)
                        ->whereIn('subject_id', Task::query()
                            ->where('organization_id', $profile->organization_id)
                            ->where('status', TaskStatus::ReadyForReview->value)
                            ->select('id'));
                })->orWhere(function ($deliverableAlerts) use ($profile) {
                    $deliverableAlerts->where('subject_type', Deliverable::class)
                        ->whereIn('subject_id', Deliverable::query()
                            ->where('organization_id', $profile->organization_id)
                            ->where('lifecycle_status', 'Ready for Review')
                            ->select('id'));
                });
            })
            ->latest()
            ->limit(10)
            ->get();
        $taskGroups = collect([
            TaskType::Clarification->value => $tasks->getCollection()->filter(fn (Task $task) => $task->taskType() === TaskType::Clarification),
            TaskType::Work->value => $tasks->getCollection()->filter(fn (Task $task) => $task->taskType() === TaskType::Work),
        ]);

        return view('tasks.index', compact('profile', 'tasks', 'blockedAlerts', 'approvalAlerts', 'taskGroups'));
    }
}
