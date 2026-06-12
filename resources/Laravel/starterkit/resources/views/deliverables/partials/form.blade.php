@php
    $isEdit = isset($deliverable);
@endphp

<div class="space-y-5">
    <div>
        <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
        <input class="form-input @error('title') is-invalid @enderror" id="title" name="title" required type="text" value="{{ old('title', $deliverable->title ?? '') }}" />
        @error('title')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="form-label" for="deliverable_type_id">Type</label>
        <select class="form-select @error('deliverable_type_id') is-invalid @enderror" id="deliverable_type_id" name="deliverable_type_id">
            <option value="">— Select type —</option>
            @foreach ($deliverableTypes as $type)
                <option value="{{ $type->id }}" @selected(old('deliverable_type_id', $deliverable->deliverable_type_id ?? null) == $type->id)>{{ $type->name }}</option>
            @endforeach
        </select>
        @error('deliverable_type_id')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <x-rich-text-editor label="Description / Brief" name="description" :value="$deliverable->description ?? ''" placeholder="Describe this deliverable and any specific requirements..." />

    <x-rich-text-editor label="Purpose" name="purpose" :value="$deliverable->purpose ?? ''" placeholder="Why is this deliverable needed?" />

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label class="form-label" for="audience">Audience</label>
            <input class="form-input @error('audience') is-invalid @enderror" id="audience" name="audience" type="text" value="{{ old('audience', $deliverable->audience ?? '') }}" />
            @error('audience')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="desired_action">Desired action</label>
            <input class="form-input @error('desired_action') is-invalid @enderror" id="desired_action" name="desired_action" type="text" value="{{ old('desired_action', $deliverable->desired_action ?? '') }}" />
            @error('desired_action')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label class="form-label" for="owner_profile_id">Owner</label>
            <select class="form-select @error('owner_profile_id') is-invalid @enderror" id="owner_profile_id" name="owner_profile_id">
                <option value="">— Unassigned —</option>
                @foreach ($teamProfiles as $profile)
                    <option value="{{ $profile->id }}" @selected(old('owner_profile_id', $deliverable->owner_profile_id ?? null) == $profile->id)>{{ $profile->display_name }}</option>
                @endforeach
            </select>
            @error('owner_profile_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="internal_reviewer_profile_id">Internal reviewer</label>
            <select class="form-select @error('internal_reviewer_profile_id') is-invalid @enderror" id="internal_reviewer_profile_id" name="internal_reviewer_profile_id">
                <option value="">— None —</option>
                @foreach ($teamProfiles as $profile)
                    <option value="{{ $profile->id }}" @selected(old('internal_reviewer_profile_id', $deliverable->internal_reviewer_profile_id ?? null) == $profile->id)>{{ $profile->display_name }}</option>
                @endforeach
            </select>
            @error('internal_reviewer_profile_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if ($isEdit)
        <div>
            <label class="form-label" for="stakeholder_reviewer_profile_id">Stakeholder reviewer</label>
            <select class="form-select @error('stakeholder_reviewer_profile_id') is-invalid @enderror" id="stakeholder_reviewer_profile_id" name="stakeholder_reviewer_profile_id">
                <option value="">— None —</option>
                @foreach ($teamProfiles as $profile)
                    <option value="{{ $profile->id }}" @selected(old('stakeholder_reviewer_profile_id', $deliverable->stakeholder_reviewer_profile_id ?? null) == $profile->id)>{{ $profile->display_name }}</option>
                @endforeach
            </select>
            @error('stakeholder_reviewer_profile_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label class="form-label" for="due_date">Due date</label>
            <input class="form-input @error('due_date') is-invalid @enderror" data-provider="flatpickr" id="due_date" name="due_date" type="text" value="{{ old('due_date', isset($deliverable) ? $deliverable->due_date?->format('Y-m-d') : '') }}" placeholder="YYYY-MM-DD" />
            @error('due_date')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="publish_date">Publish date</label>
            <input class="form-input @error('publish_date') is-invalid @enderror" data-provider="flatpickr" id="publish_date" name="publish_date" type="text" value="{{ old('publish_date', isset($deliverable) ? $deliverable->publish_date?->format('Y-m-d') : '') }}" placeholder="YYYY-MM-DD" />
            @error('publish_date')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if ($isEdit)
        <div>
            <label class="form-label" for="attention_state">Attention state</label>
            <select class="form-select @error('attention_state') is-invalid @enderror" id="attention_state" name="attention_state">
                @foreach (["On Track", "Needs Attention", "At Risk", "On Hold"] as $state)
                    <option value="{{ $state }}" @selected(old('attention_state', $deliverable->attention_state ?? 'On Track') === $state)>{{ $state }}</option>
                @endforeach
            </select>
            @error('attention_state')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div class="flex justify-end gap-3 border-t border-default-200 pt-5">
        <a class="btn bg-light text-default-600" href="{{ $isEdit ? route("deliverables.show", [$project, $deliverable]) : route("projects.show", $project) }}">Cancel</a>
        <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">{{ $submitLabel }}</button>
    </div>
</div>
