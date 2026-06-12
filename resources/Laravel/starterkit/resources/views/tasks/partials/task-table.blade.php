<div class="overflow-x-auto">
    <table class="table">
        <thead><tr><th>Task</th><th>Project / Deliverable</th><th>Status</th><th>Due</th><th>Time budget</th></tr></thead>
        <tbody>
            @foreach($sectionTasks as $task)
                <tr>
                    <td><a class="text-primary font-semibold hover:underline" href="{{ route('tasks.show', [$task->deliverable->project, $task->deliverable, $task]) }}"><i class="iconify {{ $task->taskType()->icon() }} me-1"></i>{{ $task->title }}</a></td>
                    <td><a class="text-primary font-medium hover:underline" href="{{ route('projects.show', $task->deliverable->project) }}">{{ $task->deliverable->project->title }}</a><div class="text-xs"><a class="text-default-400 hover:text-primary hover:underline" href="{{ route('deliverables.show', [$task->deliverable->project, $task->deliverable]) }}">{{ $task->deliverable->title }}</a></div></td>
                    <td><span class="badge {{ $task->status->badgeClasses() }}">{{ $task->status->value }}</span></td>
                    <td>{{ $task->due_date?->format('M j, Y') ?: 'Not set' }}</td>
                    <td>{{ $task->formattedTimeBudget() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
