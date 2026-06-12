@php
    $conversation = $deliverable->conversation;
    $messages = $conversation?->messages ?? collect();
    $rootMessages = $messages->whereNull('parent_message_id');
    $participants = ($conversation?->participants?->pluck('profile') ?? collect())
        ->merge($messages->pluck('authorProfile'))
        ->filter()
        ->unique('id')
        ->values();
@endphp

<div class="card-body">
    @if ($participants->isNotEmpty())
        <div class="mb-5 flex items-center gap-3" aria-label="{{ $participants->count() }} conversation participants">
            <div class="flex">
                @foreach ($participants->take(4) as $participant)
                    <div class="{{ $loop->first ? '' : '-ms-2' }}" title="{{ $participant->display_name }}">
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
            <p class="text-default-400 text-xs">{{ $participants->pluck('display_name')->implode(', ') }}</p>
        </div>
    @endif

    <div class="space-y-5">
        @foreach ($rootMessages as $message)
            <div class="border-default-300 rounded border border-dashed p-5">
                <div class="flex gap-3">
                    @if ($message->authorProfile?->avatar_url)
                        <img alt="{{ $message->authorProfile->display_name }}" class="size-9 shrink-0 rounded-full object-cover" src="{{ $message->authorProfile->avatar_url }}" />
                    @else
                        <div class="bg-primary/10 text-primary flex size-9 shrink-0 items-center justify-center rounded-full font-semibold">{{ str($message->authorProfile?->display_name ?: 'System')->substr(0, 1) }}</div>
                    @endif
                    <div class="min-w-0 flex-1">
                        <div class="mb-1 flex flex-wrap items-center gap-2">
                            <h5 class="font-semibold">{{ $message->authorProfile?->display_name ?: 'System' }}</h5>
                            <span class="text-default-400 text-xs">{{ $message->created_at->format('M j, Y g:i A') }}</span>
                        </div>
                        <x-rich-text :value="$message->body" />
                        <button class="badge bg-light text-default-500 mt-3 inline-flex items-center gap-1 hover:text-primary" data-reply-author="{{ $message->authorProfile?->display_name ?: 'System' }}" data-reply-button data-reply-id="{{ $message->id }}" data-reply-preview="{{ str(\App\Support\RichText::plainText($message->body))->squish()->limit(120) }}" type="button">
                            <i class="iconify tabler--corner-up-left text-base"></i>
                            Reply
                        </button>

                        @foreach ($messages->where('parent_message_id', $message->id) as $reply)
                            <div class="mt-6 flex gap-3 border-s-2 border-default-200 ps-5">
                                @if ($reply->authorProfile?->avatar_url)
                                    <img alt="{{ $reply->authorProfile->display_name }}" class="size-8 shrink-0 rounded-full object-cover" src="{{ $reply->authorProfile->avatar_url }}" />
                                @else
                                    <div class="bg-primary/10 text-primary flex size-8 shrink-0 items-center justify-center rounded-full text-sm font-semibold">{{ str($reply->authorProfile?->display_name ?: 'System')->substr(0, 1) }}</div>
                                @endif
                                <div class="min-w-0 flex-1">
                                    <div class="mb-1 flex flex-wrap items-center gap-2">
                                        <h5 class="font-semibold">{{ $reply->authorProfile?->display_name ?: 'System' }}</h5>
                                        <span class="text-default-400 text-xs">{{ $reply->created_at->format('M j, Y g:i A') }}</span>
                                    </div>
                                    <x-rich-text :value="$reply->body" />
                                    <button class="badge bg-light text-default-500 mt-3 inline-flex items-center gap-1 hover:text-primary" data-reply-author="{{ $message->authorProfile?->display_name ?: 'System' }}" data-reply-button data-reply-id="{{ $message->id }}" data-reply-preview="{{ str(\App\Support\RichText::plainText($message->body))->squish()->limit(120) }}" type="button">
                                        <i class="iconify tabler--corner-up-left text-base"></i>
                                        Reply
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        @if ($messages->isEmpty())
            <p class="text-default-400 text-center text-sm">No internal discussion yet. Start the conversation when work begins.</p>
        @endif
    </div>

    <form action="{{ route('deliverables.messages.store', [$project, $deliverable]) }}" class="mt-6 border-t border-default-200 pt-5" method="POST">
        @csrf
        <input id="deliverable-parent-message-{{ $deliverable->id }}" name="parent_message_id" type="hidden" value="{{ old('parent_message_id') }}" />
        <div class="bg-light mb-3 hidden items-start justify-between gap-3 rounded p-3 text-sm" id="deliverable-reply-context-{{ $deliverable->id }}">
            <div class="min-w-0">
                <p class="font-semibold">Replying to <span id="deliverable-reply-author-{{ $deliverable->id }}"></span></p>
                <p class="text-default-400 mt-1 truncate" id="deliverable-reply-preview-{{ $deliverable->id }}"></p>
            </div>
            <button aria-label="Cancel reply" class="text-default-400 hover:text-danger" data-cancel-reply type="button">
                <i class="iconify tabler--x text-base"></i>
            </button>
        </div>
        <x-rich-text-editor class="mb-3" emoji label="Add to the conversation" name="message" placeholder="Internal discussion, questions, or notes for the team..." required />
        <div class="flex justify-end">
            <button class="btn bg-primary text-white hover:bg-primary-hover" type="submit">
                Send message
                <i class="iconify tabler--send-2 ms-1"></i>
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const parentInput = document.getElementById('deliverable-parent-message-{{ $deliverable->id }}')
        const replyContext = document.getElementById('deliverable-reply-context-{{ $deliverable->id }}')
        const replyAuthor = document.getElementById('deliverable-reply-author-{{ $deliverable->id }}')
        const replyPreview = document.getElementById('deliverable-reply-preview-{{ $deliverable->id }}')
        const messageInput = parentInput?.closest('form')?.querySelector('[name="message"]')

        if (!parentInput || !replyContext || !replyAuthor || !replyPreview || !messageInput) return

        const clearReply = () => {
            parentInput.value = ''
            replyContext.classList.add('hidden')
            replyContext.classList.remove('flex')
        }

        document.querySelectorAll('[data-reply-button]').forEach((button) => {
            button.addEventListener('click', () => {
                parentInput.value = button.dataset.replyId
                replyAuthor.textContent = button.dataset.replyAuthor
                replyPreview.textContent = button.dataset.replyPreview
                replyContext.classList.remove('hidden')
                replyContext.classList.add('flex')
                messageInput.focus()
            })
        })

        document.querySelector('[data-cancel-reply]')?.addEventListener('click', clearReply)
    })
</script>
