@php($briefAnswers = $ministryRequest->answers->keyBy("question_key"))

@if ($briefAnswers->whereNotNull("answer_value")->isNotEmpty() || $briefAnswers->get("existing_assets")?->answer_json || $ministryRequest->ideas->isNotEmpty())
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5">Additional ministry brief details</h4>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                @foreach ([
                    "success_looks_like" => "Success looks like",
                    "key_message" => "Key message",
                    "reviewers_approvals" => "Reviewers and approvals",
                    "sensitivities" => "Sensitivities or pastoral concerns",
                ] as $key => $label)
                    @if ($briefAnswers->get($key)?->answer_value)
                        <div>
                            <h5 class="mb-2 font-semibold">{{ $label }}</h5>
                            <p class="text-default-500 whitespace-pre-line">{{ $briefAnswers->get($key)->answer_value }}</p>
                        </div>
                    @endif
                @endforeach
            </div>

            @if ($briefAnswers->get("existing_assets")?->answer_value || $briefAnswers->get("existing_assets")?->answer_json)
                <div class="mt-6">
                    <h5 class="mb-2 font-semibold">Existing branding, assets, examples, and links</h5>
                    <ul class="space-y-2 text-sm">
                        @foreach (collect(preg_split("/\R/", (string) $briefAnswers->get("existing_assets")?->answer_value))->merge(collect($briefAnswers->get("existing_assets")?->answer_json ?? [])->filter(fn ($value) => is_string($value)))->filter()->unique() as $assetReference)
                            <li class="flex items-start gap-2">
                                <i class="iconify tabler--link text-default-400 mt-0.5"></i>
                                @if (filter_var($assetReference, FILTER_VALIDATE_URL))
                                    <a class="text-primary break-all hover:underline" href="{{ $assetReference }}" rel="noopener noreferrer" target="_blank">{{ $assetReference }}</a>
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
