@php($editing = isset($ministryRequest))
@php($requestDates = $editing ? ($ministryRequest->key_dates_json ?? []) : [])
@php($requestAnswers = $editing ? $ministryRequest->answers->keyBy("question_key") : collect())
@php($existingAssetsAnswer = $requestAnswers->get("existing_assets"))
@php($existingAssetsDefault = $existingAssetsAnswer?->answer_value ?: collect($existingAssetsAnswer?->answer_json ?? [])->filter(fn ($value) => is_string($value))->implode("\n"))
@php($requesterIdeasDefault = $editing ? $ministryRequest->ideas->where("source", "Requester")->pluck("title")->implode("\n") : "")

@include("auth.partials.messages")

<div class="mb-7.5">
    <h4 class="card-title mb-1.5">
        @if ($editing && $ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification)
            Respond to the clarification request
        @else
            {{ $editing ? "Update your request" : "Tell us what your ministry needs" }}
        @endif
    </h4>
    <p class="text-default-400">Start with the outcome, audience, and timing. The communications team will help determine the right deliverables.</p>
</div>

@if ($editing && $ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification)
    <div class="mb-5 rounded-lg bg-warning/10 p-4 text-sm text-warning">
        <p class="font-semibold">Communications needs more information:</p>
        <p class="mt-1 whitespace-pre-line">{{ data_get($ministryRequest->missing_information_json, "message") }}</p>
    </div>
@endif

<div class="grid grid-cols-1 gap-x-base gap-y-5 lg:grid-cols-2">
    <div class="lg:col-span-2">
        <label class="form-label" for="title">Request title</label>
        <input class="form-input" id="title" name="title" required type="text" value="{{ old("title", $ministryRequest->title ?? "") }}" />
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="ministry_need">What does your ministry need?</label>
        <textarea class="form-textarea" id="ministry_need" name="ministry_need" rows="5">{{ old("ministry_need", $ministryRequest->ministry_need ?? "") }}</textarea>
        <p class="text-default-400 mt-1 text-xs">Required when you submit. Describe the ministry outcome, not a specific design or deliverable.</p>
    </div>

    <div>
        <label class="form-label" for="department_id">Department</label>
        <select class="form-select" id="department_id" name="department_id">
            <option value="">Select a department</option>
            @foreach ($departments as $department)
                <option @selected((string) old("department_id", $ministryRequest->department_id ?? "") === (string) $department->id) value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="form-label" for="audience">Who needs to know?</label>
        <input class="form-input" id="audience" name="audience" type="text" value="{{ old("audience", $ministryRequest->audience ?? "") }}" />
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="why_it_matters">Why does this matter?</label>
        <textarea class="form-textarea" id="why_it_matters" name="why_it_matters" rows="3">{{ old("why_it_matters", $ministryRequest->why_it_matters ?? "") }}</textarea>
    </div>

    <div>
        <label class="form-label" for="desired_action">What should people do?</label>
        <textarea class="form-textarea" id="desired_action" name="desired_action" rows="3">{{ old("desired_action", $ministryRequest->desired_action ?? "") }}</textarea>
    </div>

    <div>
        <label class="form-label" for="desired_tone">What should it feel like?</label>
        <textarea class="form-textarea" id="desired_tone" name="desired_tone" rows="3">{{ old("desired_tone", $ministryRequest->desired_tone ?? "") }}</textarea>
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="success_looks_like">What would success look like?</label>
        <textarea class="form-textarea" id="success_looks_like" name="success_looks_like" rows="3">{{ old("success_looks_like", $requestAnswers->get("success_looks_like")?->answer_value) }}</textarea>
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="key_message">What key message must people understand?</label>
        <textarea class="form-textarea" id="key_message" name="key_message" rows="3">{{ old("key_message", $requestAnswers->get("key_message")?->answer_value) }}</textarea>
    </div>

    <div>
        <label class="form-label" for="event_date">Event or launch date</label>
        <input class="form-input" id="event_date" name="event_date" type="date" value="{{ old("event_date", data_get($requestDates, "event_date")) }}" />
    </div>

    <div>
        <label class="form-label" for="action_deadline">When do people need to act?</label>
        <input class="form-input" id="action_deadline" name="action_deadline" type="date" value="{{ old("action_deadline", data_get($requestDates, "action_deadline")) }}" />
    </div>

    <div>
        <label class="form-label" for="needed_by">When do you need communications support?</label>
        <input class="form-input" id="needed_by" name="needed_by" type="date" value="{{ old("needed_by", data_get($requestDates, "needed_by")) }}" />
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="existing_assets_links">What existing branding, assets, examples, or links should Communications use?</label>
        <textarea class="form-textarea" id="existing_assets_links" name="existing_assets_links" placeholder="Add Google Drive folders, brand guides, logos, registration pages, previous examples, Canva or Figma links, and related references. Use one item per line." rows="5">{{ old("existing_assets_links", $existingAssetsDefault) }}</textarea>
        <p class="text-default-400 mt-1 text-xs">External and Google Drive links are supported now. File uploads will be added with the asset-linking milestone.</p>
    </div>

    <div>
        <label class="form-label" for="reviewers_approvals">Who needs to review or approve this?</label>
        <textarea class="form-textarea" id="reviewers_approvals" name="reviewers_approvals" rows="4">{{ old("reviewers_approvals", $requestAnswers->get("reviewers_approvals")?->answer_value) }}</textarea>
    </div>

    <div>
        <label class="form-label" for="sensitivities">Are there sensitivities or pastoral concerns?</label>
        <textarea class="form-textarea" id="sensitivities" name="sensitivities" rows="4">{{ old("sensitivities", $requestAnswers->get("sensitivities")?->answer_value) }}</textarea>
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="requester_ideas">What communication ideas do you already have?</label>
        <textarea class="form-textarea" id="requester_ideas" name="requester_ideas" placeholder="Social posts&#10;Parent email&#10;Service announcement slide" rows="5">{{ old("requester_ideas", $requesterIdeasDefault) }}</textarea>
        <p class="text-default-400 mt-1 text-xs">Use one idea per line. These are suggestions; Communications will shape the final plan.</p>
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="known_constraints">Known constraints or important context</label>
        <textarea class="form-textarea" id="known_constraints" name="known_constraints" rows="4">{{ old("known_constraints", $ministryRequest->known_constraints ?? "") }}</textarea>
    </div>
</div>

<div class="mt-7 flex flex-wrap items-center justify-between gap-3 border-t border-default-200 pt-5">
    <a class="btn bg-light text-default-700 hover:bg-default-200" href="{{ $editing ? route("requests.show", $ministryRequest) : route("requests.index") }}">Cancel</a>
    <div class="flex flex-wrap gap-2">
        <button class="btn bg-light text-default-700 hover:bg-default-200" name="intent" type="submit" value="draft">{{ $editing && $ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification ? "Save update" : "Save draft" }}</button>
        <button class="btn bg-primary text-white hover:bg-primary-hover" name="intent" type="submit" value="submit">{{ $editing && $ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification ? "Resubmit request" : "Submit request" }}</button>
    </div>
</div>
