@php($editing = isset($ministryRequest))
@php($requestDates = $editing ? ($ministryRequest->key_dates_json ?? []) : [])
@php($requestAnswers = $editing ? $ministryRequest->answers->keyBy("question_key") : collect())
@php($existingAssetsAnswer = $requestAnswers->get("existing_assets"))
@php($legacyAssetLinks = collect(preg_split("/\R/", (string) $existingAssetsAnswer?->answer_value))->map(function ($line) { preg_match("/https?:\/\/\S+/", $line, $matches); return ["label" => trim(str_replace($matches[0] ?? "", "", $line), " :-"), "url" => $matches[0] ?? ""]; })->filter(fn ($link) => filled($link["url"])))
@php($assetLinks = collect(old("asset_links", collect($existingAssetsAnswer?->answer_json ?? [])->filter(fn ($link) => is_array($link))->merge($legacyAssetLinks)->values()->all()))->filter(fn ($link) => is_array($link)))
@php($assetLinks = $assetLinks->isNotEmpty() ? $assetLinks : collect([["label" => "", "url" => ""]]))
@php($reviewerProfileIds = collect(old("reviewer_profile_ids", collect($requestAnswers->get("reviewers_approvals")?->answer_json ?? [])->pluck("profile_id")->all()))->map(fn ($id) => (string) $id))
@php($canSubmitRequest = ! $editing || in_array($ministryRequest->status, [\App\Enums\RequestStatus::Draft, \App\Enums\RequestStatus::NeedsClarification], true))

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
        <x-rich-text-editor label="What does your ministry need?" name="ministry_need" :value="$ministryRequest->ministry_need ?? ''" placeholder="Describe the ministry outcome, not a specific design or deliverable." />
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

    <x-rich-text-editor class="lg:col-span-2" label="Why does this matter?" name="why_it_matters" :value="$ministryRequest->why_it_matters ?? ''" />

    <x-rich-text-editor label="What should people do?" name="desired_action" :value="$ministryRequest->desired_action ?? ''" />

    <x-rich-text-editor label="What should it feel like?" name="desired_tone" :value="$ministryRequest->desired_tone ?? ''" />

    <x-rich-text-editor class="lg:col-span-2" label="What would success look like?" name="success_looks_like" :value="$requestAnswers->get('success_looks_like')?->answer_value ?? ''" />

    <x-rich-text-editor class="lg:col-span-2" label="What key message must people understand?" name="key_message" :value="$requestAnswers->get('key_message')?->answer_value ?? ''" />

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
        <div class="mb-2 flex items-center justify-between gap-3">
            <label class="form-label mb-0">What existing branding, assets, examples, or links should Communications use?</label>
            <button class="btn bg-light text-default-700 hover:bg-default-200" data-add-asset-link type="button">
                <i class="iconify tabler--plus me-1"></i>Add link
            </button>
        </div>
        <div class="space-y-3" data-asset-links>
            @foreach ($assetLinks as $index => $assetLink)
                <div class="grid grid-cols-1 gap-3 rounded border border-default-200 p-3 md:grid-cols-[minmax(0,1fr)_minmax(0,2fr)_auto]" data-asset-link-row>
                    <input class="form-input" name="asset_links[{{ $index }}][label]" placeholder="Label, such as Brand guide" type="text" value="{{ $assetLink["label"] ?? "" }}" />
                    <input class="form-input" name="asset_links[{{ $index }}][url]" placeholder="https://..." type="url" value="{{ $assetLink["url"] ?? "" }}" />
                    <button aria-label="Remove link" class="btn bg-light text-default-500 hover:text-danger" data-remove-asset-link type="button"><i class="iconify tabler--trash"></i></button>
                </div>
            @endforeach
        </div>
        <p class="text-default-400 mt-2 text-xs">Add a verified web, Google Drive, Canva, or Figma URL. File uploads will come with the asset-linking milestone.</p>
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="reviewer_profile_ids">Who should be included when this work is ready for review?</label>
        <select class="form-input" data-choices data-choices-removeitem data-placeholder="Select reviewers" id="reviewer_profile_ids" multiple name="reviewer_profile_ids[]">
            @foreach ($reviewerProfiles as $reviewerProfile)
                <option @selected($reviewerProfileIds->contains((string) $reviewerProfile->id)) value="{{ $reviewerProfile->id }}">{{ $reviewerProfile->display_name }}{{ $reviewerProfile->title ? " · ".$reviewerProfile->title : "" }}{{ $reviewerProfile->department?->name ? " · ".$reviewerProfile->department->name : "" }}</option>
            @endforeach
        </select>
        <p class="text-default-400 mt-1 text-xs">Choose one or more people from your organization. Communications can refine the approval path during planning.</p>
        @if ($requestAnswers->get("reviewers_approvals")?->answer_value)
            <p class="mt-2 rounded bg-warning/10 p-3 text-xs text-warning">Previously entered reviewer note: {{ $requestAnswers->get("reviewers_approvals")->answer_value }}. Select specific people above when they are known.</p>
        @endif
    </div>

    <x-rich-text-editor label="Are there sensitivities or pastoral concerns?" name="sensitivities" :value="$requestAnswers->get('sensitivities')?->answer_value ?? ''" />

    <div class="lg:col-span-2">
        <x-rich-text-editor label="Is there anything Communications should plan around?" name="known_constraints" :value="$ministryRequest->known_constraints ?? ''" />
        <p class="text-default-400 mt-1 text-xs">For example: dates that cannot move, information still being confirmed, budget limits, accessibility needs, or people who should be consulted.</p>
    </div>
</div>

<template id="asset-link-row-template">
    <div class="grid grid-cols-1 gap-3 rounded border border-default-200 p-3 md:grid-cols-[minmax(0,1fr)_minmax(0,2fr)_auto]" data-asset-link-row>
        <input class="form-input" data-asset-label placeholder="Label, such as Brand guide" type="text" />
        <input class="form-input" data-asset-url placeholder="https://..." type="url" />
        <button aria-label="Remove link" class="btn bg-light text-default-500 hover:text-danger" data-remove-asset-link type="button"><i class="iconify tabler--trash"></i></button>
    </div>
</template>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const links = document.querySelector("[data-asset-links]")
        const template = document.getElementById("asset-link-row-template")
        const addButton = document.querySelector("[data-add-asset-link]")

        if (!links || !template || !addButton) return

        const reindex = () => {
            links.querySelectorAll("[data-asset-link-row]").forEach((row, index) => {
                row.querySelector("[data-asset-label], input[name$='[label]']")?.setAttribute("name", `asset_links[${index}][label]`)
                row.querySelector("[data-asset-url], input[name$='[url]']")?.setAttribute("name", `asset_links[${index}][url]`)
            })
        }

        links.addEventListener("click", (event) => {
            const removeButton = event.target.closest("[data-remove-asset-link]")
            if (!removeButton) return
            removeButton.closest("[data-asset-link-row]")?.remove()
            reindex()
        })

        addButton.addEventListener("click", () => {
            links.append(template.content.cloneNode(true))
            reindex()
            links.querySelector("[data-asset-link-row]:last-child input")?.focus()
        })
    })
</script>

<div class="mt-7 flex flex-wrap items-center justify-between gap-3 border-t border-default-200 pt-5">
    <a class="btn bg-light text-default-700 hover:bg-default-200" href="{{ $editing ? route("requests.show", $ministryRequest) : route("requests.index") }}">Cancel</a>
    <div class="flex flex-wrap gap-2">
        <button class="btn bg-light text-default-700 hover:bg-default-200" name="intent" type="submit" value="draft">{{ $editing && $ministryRequest->status !== \App\Enums\RequestStatus::Draft ? "Save changes" : "Save draft" }}</button>
        @if ($canSubmitRequest)
            <button class="btn bg-primary text-white hover:bg-primary-hover" name="intent" type="submit" value="submit">{{ $editing && $ministryRequest->status === \App\Enums\RequestStatus::NeedsClarification ? "Resubmit request" : "Submit request" }}</button>
        @endif
    </div>
</div>
