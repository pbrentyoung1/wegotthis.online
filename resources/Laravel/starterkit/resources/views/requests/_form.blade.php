@php($editing = isset($ministryRequest))
@php($requestDates = $editing ? ($ministryRequest->key_dates_json ?? []) : [])

@include("auth.partials.messages")

<div class="mb-7.5">
    <h4 class="card-title mb-1.5">{{ $editing ? "Update your request" : "Tell us what your ministry needs" }}</h4>
    <p class="text-default-400">Start with the outcome, audience, and timing. The communications team will help determine the right deliverables.</p>
</div>

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

    <div>
        <label class="form-label" for="event_date">Event or launch date</label>
        <input class="form-input" id="event_date" name="event_date" type="date" value="{{ old("event_date", data_get($requestDates, "event_date")) }}" />
    </div>

    <div>
        <label class="form-label" for="needed_by">When do you need communications support?</label>
        <input class="form-input" id="needed_by" name="needed_by" type="date" value="{{ old("needed_by", data_get($requestDates, "needed_by")) }}" />
    </div>

    <div class="lg:col-span-2">
        <label class="form-label" for="known_constraints">Known constraints or important context</label>
        <textarea class="form-textarea" id="known_constraints" name="known_constraints" rows="4">{{ old("known_constraints", $ministryRequest->known_constraints ?? "") }}</textarea>
    </div>
</div>

<div class="mt-7 flex flex-wrap items-center justify-between gap-3 border-t border-default-200 pt-5">
    <a class="btn bg-light text-default-700 hover:bg-default-200" href="{{ $editing ? route("requests.show", $ministryRequest) : route("requests.index") }}">Cancel</a>
    <div class="flex flex-wrap gap-2">
        <button class="btn bg-light text-default-700 hover:bg-default-200" name="intent" type="submit" value="draft">Save draft</button>
        <button class="btn bg-primary text-white hover:bg-primary-hover" name="intent" type="submit" value="submit">Submit request</button>
    </div>
</div>
