@php($briefAnswers = $ministryRequest->answers->keyBy("question_key"))

@if ($briefAnswers->contains(fn ($answer) => filled($answer->answer_value) || filled($answer->answer_json)) || $ministryRequest->ideas->isNotEmpty())
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Additional ministry brief details</h4>
            <button aria-label="Collapse additional ministry brief details" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                <i class="iconify tabler--chevron-up text-base"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                @foreach ([
                    "success_looks_like" => "Success looks like",
                    "key_message" => "Key message",
                    "sensitivities" => "Sensitivities or pastoral concerns",
                ] as $key => $label)
                    @if ($briefAnswers->get($key)?->answer_value)
                        <div>
                            <h5 class="mb-2 font-semibold">{{ $label }}</h5>
                            <x-rich-text :value="$briefAnswers->get($key)->answer_value" />
                        </div>
                    @endif
                @endforeach
            </div>

            @if ($briefAnswers->get("reviewers_approvals")?->answer_value || $briefAnswers->get("reviewers_approvals")?->answer_json)
                <div class="mt-6">
                    <h5 class="mb-2 font-semibold">Reviewers and approvals</h5>
                    @if ($briefAnswers->get("reviewers_approvals")?->answer_json)
                        <div class="flex flex-wrap gap-2">
                            @foreach ($briefAnswers->get("reviewers_approvals")->answer_json as $reviewer)
                                <span class="badge bg-light text-default-600">{{ $reviewer["display_name"] }}{{ filled($reviewer["title"] ?? null) ? " · ".$reviewer["title"] : "" }}</span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-default-500 whitespace-pre-line">{{ $briefAnswers->get("reviewers_approvals")->answer_value }}</p>
                    @endif
                </div>
            @endif

            @if ($briefAnswers->get("existing_assets")?->answer_value || $briefAnswers->get("existing_assets")?->answer_json)
                <div class="mt-6">
                    <h5 class="mb-2 font-semibold">Existing branding, assets, examples, and links</h5>
                    <ul class="space-y-2 text-sm">
                        @foreach (collect($briefAnswers->get("existing_assets")?->answer_json ?? [])->filter(fn ($value) => is_array($value) && filled($value["url"] ?? null)) as $assetReference)
                            <li class="flex items-start gap-2">
                                <i class="iconify tabler--link text-default-400 mt-0.5"></i>
                                <a class="text-primary break-all hover:underline" href="{{ $assetReference["url"] }}" rel="noopener noreferrer" target="_blank">{{ filled($assetReference["label"] ?? null) ? $assetReference["label"] : $assetReference["url"] }}</a>
                            </li>
                        @endforeach
                        @foreach (collect(preg_split("/\R/", (string) $briefAnswers->get("existing_assets")?->answer_value))->filter() as $assetReference)
                            <li class="flex items-start gap-2">
                                <i class="iconify tabler--link text-default-400 mt-0.5"></i>
                                <span class="text-default-500">{{ $assetReference }}</span>
                            </li>
                        @endforeach
                        @foreach (collect($briefAnswers->get("existing_assets")?->answer_json ?? [])->filter(fn ($value) => is_string($value)) as $label => $assetReference)
                            <li class="flex items-start gap-2">
                                <i class="iconify tabler--link text-default-400 mt-0.5"></i>
                                @if (filter_var($assetReference, FILTER_VALIDATE_URL))
                                    <a class="text-primary break-all hover:underline" href="{{ $assetReference }}" rel="noopener noreferrer" target="_blank">{{ is_string($label) ? str($label)->replace("_", " ")->title() : $assetReference }}</a>
                                @else
                                    <span class="text-default-500">{{ $assetReference }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($ministryRequest->ideas->isNotEmpty())
                <div class="mt-6">
                    <h5 class="mb-2 font-semibold">Requester ideas</h5>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($ministryRequest->ideas as $idea)
                            <span class="badge bg-light text-default-600">{{ $idea->title }} · {{ $idea->triage_decision }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
