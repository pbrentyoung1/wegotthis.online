<div class="space-y-5">
    <div>
        <label class="form-label" for="title">Task title <span class="text-danger">*</span></label>
        <input class="form-input @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title', $task->title ?? '') }}" />
        @error('title')<p class="form-error">{{ $message }}</p>@enderror
    </div>
    <x-rich-text-editor label="Description" name="description" :value="$task->description ?? ''" placeholder="Describe the work, context, and expected result..." />
    <div>
        <label class="form-label" for="task_type">Task type</label>
        <select class="form-select" id="task_type" name="task_type">
            <option value="work" @selected(old('task_type', isset($task) ? $task->taskType()->value : 'work') === 'work')>Work task</option>
            <option value="clarification" @selected(old('task_type', isset($task) ? $task->taskType()->value : 'work') === 'clarification')>Needs clarification</option>
        </select>
    </div>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label class="form-label" for="assigned_to_profile_id">Assignee</label>
            <select class="form-select" id="assigned_to_profile_id" name="assigned_to_profile_id">
                <option value="">Unassigned</option>
                @foreach ($assignableProfiles as $person)
                    <option value="{{ $person->id }}" @selected(old('assigned_to_profile_id', $task->assigned_to_profile_id ?? null) == $person->id)>{{ $person->display_name }}{{ $person->title ? ' · '.$person->title : '' }}{{ $person->department?->name ? ' · '.$person->department->name : '' }}</option>
                @endforeach
            </select>
            <p class="text-default-400 mt-1 text-xs">Tasks can be assigned to any active person in the organization.</p>
        </div>
        <div>
            <label class="form-label" for="status">Kanban status</label>
            <select class="form-select" data-task-status-select id="status" name="status">
                @foreach ($statuses as $status)
                    <option value="{{ $status->value }}" @selected(old('status', isset($task) ? $task->status->value : 'Not Started') === $status->value)>{{ $status->value }}</option>
                @endforeach
            </select>
            <button class="text-danger mt-2 hidden text-xs font-semibold hover:underline" data-edit-blocker type="button">Edit blocker details</button>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div>
            <label class="form-label" for="due_date">Due date</label>
            <input class="form-input" data-provider="flatpickr" id="due_date" name="due_date" placeholder="YYYY-MM-DD" value="{{ old('due_date', isset($task) ? $task->due_date?->format('Y-m-d') : '') }}" />
        </div>
        <div>
            <label class="form-label" for="time_budget_minutes">Time budget (minutes)</label>
            <input class="form-input" id="time_budget_minutes" min="1" name="time_budget_minutes" type="number" value="{{ old('time_budget_minutes', $task->time_budget_minutes ?? '') }}" />
        </div>
        <div>
            <label class="form-label" for="priority">Priority</label>
            <select class="form-select" id="priority" name="priority">
                @foreach (['Normal', 'High', 'Urgent'] as $priority)
                    <option value="{{ $priority }}" @selected(old('priority', $task->priority ?? 'Normal') === $priority)>{{ $priority }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex justify-end gap-3 border-t border-default-200 pt-5">
        <a class="btn bg-light text-default-600" href="{{ isset($task) ? route('tasks.show', [$project, $deliverable, $task]) : route('deliverables.show', [$project, $deliverable]) }}">Cancel</a>
        <button class="btn bg-primary text-white" type="submit">{{ $submitLabel }}</button>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="blocker-modal-title" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 p-4" data-blocker-modal role="dialog">
    <div class="card w-full max-w-lg shadow-xl">
        <div class="card-header flex items-center justify-between">
            <div>
                <h4 class="card-title" id="blocker-modal-title">What is blocking this task?</h4>
                <p class="text-default-400 mt-1 text-sm">This will alert the people responsible for helping clear the blocker.</p>
            </div>
            <button aria-label="Close blocker details" class="text-default-400 hover:text-default-700" data-blocker-cancel type="button"><i class="iconify tabler--x text-xl"></i></button>
        </div>
        <div class="card-body space-y-4">
            <div>
                <label class="form-label" for="blocker_type">Blocker type <span class="text-danger">*</span></label>
                <select class="form-select @error('blocker_type') is-invalid @enderror" id="blocker_type" name="blocker_type">
                    <option value="">Select a blocker type</option>
                    @foreach (['Over Capacity', 'Waiting on Department', 'Waiting on Approval', 'Vendor Needed', 'Missing Information', 'Missing Asset', 'Budget', 'Technical', 'Scheduling', 'Scope Decision'] as $type)
                        <option value="{{ $type }}" @selected(old('blocker_type', $task->blocker_type ?? null) === $type)>{{ $type }}</option>
                    @endforeach
                </select>
                @error('blocker_type')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="form-label" for="blocker_reason">Reason <span class="text-danger">*</span></label>
                <textarea class="form-textarea @error('blocker_reason') is-invalid @enderror" id="blocker_reason" name="blocker_reason" placeholder="What needs to happen before work can continue?" rows="4">{{ old('blocker_reason', $task->blocker_reason ?? '') }}</textarea>
                @error('blocker_reason')<p class="form-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="card-footer flex justify-end gap-3">
            <button class="btn bg-light text-default-600" data-blocker-cancel type="button">Cancel</button>
            <button class="btn bg-danger text-white" data-blocker-save type="button">Save blocker</button>
        </div>
    </div>
</div>

@once
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll("form").forEach((form) => {
            const status = form.querySelector("[data-task-status-select]");
            const modal = form.querySelector("[data-blocker-modal]");
            if (!status || !modal) return;

            const type = modal.querySelector("#blocker_type");
            const reason = modal.querySelector("#blocker_reason");
            const editButton = form.querySelector("[data-edit-blocker]");
            let previousStatus = status.value;

            const syncBlockedState = () => {
                const blocked = status.value === "Blocked";
                editButton.classList.toggle("hidden", !blocked);
                type.required = blocked;
                reason.required = blocked;
            };
            const openModal = () => {
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                modal.setAttribute("aria-hidden", "false");
                document.body.classList.add("overflow-hidden");
                type.focus();
            };
            const closeModal = () => {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
                modal.setAttribute("aria-hidden", "true");
                document.body.classList.remove("overflow-hidden");
            };

            status.addEventListener("focus", () => previousStatus = status.value);
            status.addEventListener("change", () => {
                syncBlockedState();
                if (status.value === "Blocked") openModal();
                else previousStatus = status.value;
            });
            editButton.addEventListener("click", openModal);
            modal.querySelectorAll("[data-blocker-cancel]").forEach((button) => button.addEventListener("click", () => {
                if (!type.value || !reason.value.trim()) status.value = previousStatus;
                syncBlockedState();
                closeModal();
            }));
            modal.querySelector("[data-blocker-save]").addEventListener("click", () => {
                if (!type.reportValidity() || !reason.reportValidity()) return;
                previousStatus = "Blocked";
                closeModal();
            });
            form.addEventListener("submit", (event) => {
                if (status.value === "Blocked" && (!type.value || !reason.value.trim())) {
                    event.preventDefault();
                    openModal();
                }
            });

            syncBlockedState();
            @if ($errors->has('blocker_type') || $errors->has('blocker_reason'))
                openModal();
            @endif
        });
    });
</script>
@endonce
