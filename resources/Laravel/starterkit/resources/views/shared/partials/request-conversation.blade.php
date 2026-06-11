@php
    $conversation = $ministryRequest->conversation;
    $messages = $conversation?->messages ?? collect();
    $rootMessages = $messages->whereNull("parent_message_id");
    $participants = collect([
        $ministryRequest->requesterProfile,
        $ministryRequest->assignedManagerProfile,
    ])->merge($conversation?->participants?->pluck("profile") ?? collect())
        ->merge($messages->pluck("authorProfile"))
        ->filter()
        ->unique("id")
        ->values();
    $canPost = $ministryRequest->status !== \App\Enums\RequestStatus::Draft
        && $ministryRequest->status !== \App\Enums\RequestStatus::Archived;
    $canRequestClarification = $currentProfile->hasPermission("requests.triage")
        && in_array($ministryRequest->status, [
            \App\Enums\RequestStatus::Submitted,
            \App\Enums\RequestStatus::InTriage,
        ], true);
@endphp

<div class="card">
    <div class="card-header">
        <div>
            <h4 class="card-title">Conversation</h4>
            <p class="text-default-400 mt-1 text-sm">Keep questions, answers, and decisions with this request.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex" aria-label="{{ $participants->count() }} conversation participants">
                @foreach ($participants->take(4) as $participant)
                    <div class="{{ $loop->first ? "" : "-ms-2" }}" title="{{ $participant->display_name }}">
                        @if ($participant->avatar_url)
                            <img alt="{{ $participant->display_name }}" class="size-8 rounded-full border-2 border-white object-cover" src="{{ $participant->avatar_url }}" />
                        @else
                            <span class="bg-light text-default-600 flex size-8 items-center justify-center rounded-full border-2 border-white text-xs font-semibold">{{ str($participant->display_name)->substr(0, 1) }}</span>
                        @endif
                    </div>
                @endforeach
                @if ($participants->count() > 4)
                    <span class="bg-light text-default-500 -ms-2 flex size-8 items-center justify-center rounded-full border-2 border-white text-xs font-semibold">+{{ $participants->count() - 4 }}</span>
                @endif
            </div>
            <button aria-label="Collapse conversation" class="btn size-6 rounded-full bg-light text-default-600 hover:text-primary" data-action="card-toggle" type="button">
                <i class="iconify tabler--chevron-up text-base"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="space-y-5">
            <div class="border-default-300 rounded border border-dashed p-5">
                <div class="flex gap-3">
                    @if ($ministryRequest->requesterProfile->avatar_url)
                        <img alt="{{ $ministryRequest->requesterProfile->display_name }}" class="size-9 shrink-0 rounded-full object-cover" src="{{ $ministryRequest->requesterProfile->avatar_url }}" />
                    @else
                        <div class="bg-light text-default-600 flex size-9 shrink-0 items-center justify-center rounded-full font-semibold">{{ str($ministryRequest->requesterProfile->display_name)->substr(0, 1) }}</div>
                    @endif
                    <div>
                        <h5 class="mb-1 font-semibold">
                            {{ $ministryRequest->requesterProfile->display_name }}
                            <span class="text-default-400 ms-1 text-xs font-normal">{{ $ministryRequest->submitted_at?->format("M j, Y g:i A") ?: $ministryRequest->created_at->format("M j, Y g:i A") }}</span>
                        </h5>
                        <p class="text-default-600 whitespace-pre-line">{{ $ministryRequest->ministry_need ?: "Request draft created." }}</p>
                    </div>
                </div>
            </div>

            @foreach ($rootMessages as $message)
                <div class="border-default-300 rounded border border-dashed p-5">
                    <div class="flex gap-3">
                        @if ($message->authorProfile?->avatar_url)
                            <img alt="{{ $message->authorProfile->display_name }}" class="size-9 shrink-0 rounded-full object-cover" src="{{ $message->authorProfile->avatar_url }}" />
                        @else
                            <div class="bg-primary/10 text-primary flex size-9 shrink-0 items-center justify-center rounded-full font-semibold">{{ str($message->authorProfile?->display_name ?: "System")->substr(0, 1) }}</div>
                        @endif
                        <div class="min-w-0 flex-1">
                            <div class="mb-1 flex flex-wrap items-center gap-2">
                                <h5 class="font-semibold">{{ $message->authorProfile?->display_name ?: "System" }}</h5>
                                <span class="text-default-400 text-xs">{{ $message->created_at->format("M j, Y g:i A") }}</span>
                                @if ($message->message_type === "Clarification Request")
                                    <span class="badge bg-warning/10 text-warning">Clarification requested</span>
                                @endif
                            </div>
                            <p class="text-default-600 whitespace-pre-line">{{ $message->body }}</p>
                            @if ($canPost)
                                <button class="badge bg-light text-default-500 mt-3 inline-flex items-center gap-1 hover:text-primary" data-reply-author="{{ $message->authorProfile?->display_name ?: "System" }}" data-reply-button data-reply-id="{{ $message->id }}" data-reply-preview="{{ str($message->body)->squish()->limit(120) }}" type="button">
                                    <i class="iconify tabler--corner-up-left text-base"></i>
                                    Reply
                                </button>
                            @endif

                            @foreach ($messages->where("parent_message_id", $message->id) as $reply)
                                <div class="mt-6 flex gap-3 border-s-2 border-default-200 ps-5">
                                    @if ($reply->authorProfile?->avatar_url)
                                        <img alt="{{ $reply->authorProfile->display_name }}" class="size-8 shrink-0 rounded-full object-cover" src="{{ $reply->authorProfile->avatar_url }}" />
                                    @else
                                        <div class="bg-primary/10 text-primary flex size-8 shrink-0 items-center justify-center rounded-full text-sm font-semibold">{{ str($reply->authorProfile?->display_name ?: "System")->substr(0, 1) }}</div>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-1 flex flex-wrap items-center gap-2">
                                            <h5 class="font-semibold">{{ $reply->authorProfile?->display_name ?: "System" }}</h5>
                                            <span class="text-default-400 text-xs">{{ $reply->created_at->format("M j, Y g:i A") }}</span>
                                        </div>
                                        <p class="text-default-600 whitespace-pre-line">{{ $reply->body }}</p>
                                        @if ($canPost)
                                            <button class="badge bg-light text-default-500 mt-3 inline-flex items-center gap-1 hover:text-primary" data-reply-author="{{ $message->authorProfile?->display_name ?: "System" }}" data-reply-button data-reply-id="{{ $message->id }}" data-reply-preview="{{ str($message->body)->squish()->limit(120) }}" type="button">
                                                <i class="iconify tabler--corner-up-left text-base"></i>
                                                Reply
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($messages->isEmpty())
                <p class="text-default-400 text-center text-sm">No follow-up messages yet.</p>
            @endif
        </div>

        @if ($canPost)
            <form action="{{ route("requests.messages.store", $ministryRequest) }}" class="mt-6 border-t border-default-200 pt-5" method="POST">
                @csrf
                <input id="conversation-parent-message-{{ $ministryRequest->id }}" name="parent_message_id" type="hidden" value="{{ old("parent_message_id") }}" />
                <div class="bg-light mb-3 hidden items-start justify-between gap-3 rounded p-3 text-sm" id="conversation-reply-context-{{ $ministryRequest->id }}">
                    <div class="min-w-0">
                        <p class="font-semibold">Replying to <span id="conversation-reply-author-{{ $ministryRequest->id }}"></span></p>
                        <p class="text-default-400 mt-1 truncate" id="conversation-reply-preview-{{ $ministryRequest->id }}"></p>
                    </div>
                    <button aria-label="Cancel reply" class="text-default-400 hover:text-danger" data-cancel-reply type="button">
                        <i class="iconify tabler--x text-base"></i>
                    </button>
                </div>
                <label class="form-label" for="conversation-message-{{ $ministryRequest->id }}">Add to the conversation</label>
                <textarea class="form-textarea mb-3" id="conversation-message-{{ $ministryRequest->id }}" name="message" placeholder="Write a helpful update or question..." required rows="4">{{ old("message") }}</textarea>
                <div class="flex flex-wrap justify-end gap-2">
                    <button class="btn bg-primary text-white hover:bg-primary-hover" name="intent" type="submit" value="message">
                        Send message
                        <i class="iconify tabler--send-2 ms-1"></i>
                    </button>
                    @if ($canRequestClarification)
                        <button class="btn bg-warning/10 text-warning hover:bg-warning hover:text-white" name="intent" type="submit" value="clarification">Ask for clarification</button>
                    @endif
                </div>
            </form>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const parentInput = document.getElementById("conversation-parent-message-{{ $ministryRequest->id }}")
        const replyContext = document.getElementById("conversation-reply-context-{{ $ministryRequest->id }}")
        const replyAuthor = document.getElementById("conversation-reply-author-{{ $ministryRequest->id }}")
        const replyPreview = document.getElementById("conversation-reply-preview-{{ $ministryRequest->id }}")
        const messageInput = document.getElementById("conversation-message-{{ $ministryRequest->id }}")

        if (!parentInput || !replyContext || !replyAuthor || !replyPreview || !messageInput) return

        const clearReply = () => {
            parentInput.value = ""
            replyContext.classList.add("hidden")
            replyContext.classList.remove("flex")
        }

        document.querySelectorAll("[data-reply-button]").forEach((button) => {
            button.addEventListener("click", () => {
                parentInput.value = button.dataset.replyId
                replyAuthor.textContent = button.dataset.replyAuthor
                replyPreview.textContent = button.dataset.replyPreview
                replyContext.classList.remove("hidden")
                replyContext.classList.add("flex")
                messageInput.focus()
            })
        })

        document.querySelector("[data-cancel-reply]")?.addEventListener("click", clearReply)
    })
</script>
