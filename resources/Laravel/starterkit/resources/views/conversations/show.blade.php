@extends("shared.base", ["title" => $otherProfile?->display_name ?? "Conversation"])

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Messages", "title" => $otherProfile?->display_name ?? "Conversation"])
        @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Messages", "title" => $otherProfile?->display_name ?? "Conversation"])

                <div class="container-fluid">
                    <div class="mb-5">
                        <a class="text-primary text-sm hover:underline" href="{{ route('people.index') }}">
                            <i class="iconify tabler--arrow-left me-1"></i>Back to People
                        </a>
                    </div>

                    <div class="mx-auto max-w-3xl">
                        {{-- Header card --}}
                        <div class="card mb-base">
                            <div class="card-body py-4">
                                <div class="flex items-center gap-3">
                                    @if ($otherProfile?->avatar_url)
                                        <a href="{{ route('people.show', $otherProfile) }}">
                                            <img alt="{{ $otherProfile->display_name }}" class="size-10 rounded-full object-cover" src="{{ $otherProfile->avatar_url }}" />
                                        </a>
                                    @else
                                        <a class="bg-primary/10 text-primary flex size-10 items-center justify-center rounded-full font-semibold" href="{{ route('people.show', $otherProfile) }}">
                                            {{ str($otherProfile?->display_name ?? '?')->explode(' ')->filter()->map(fn ($p) => str($p)->substr(0, 1)->upper())->take(2)->implode('') }}
                                        </a>
                                    @endif
                                    <div>
                                        <a class="font-semibold hover:text-primary" href="{{ route('people.show', $otherProfile) }}">
                                            {{ $otherProfile?->display_name ?? 'Unknown' }}
                                        </a>
                                        @if ($otherProfile?->title)
                                            <p class="text-default-400 text-xs">{{ $otherProfile->title }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Messages thread --}}
                        <div class="card mb-base" id="messages-thread">
                            <div class="card-body space-y-4 p-6" id="messages-list">
                                @if ($messages->isEmpty())
                                    <div class="py-10 text-center">
                                        <i class="iconify tabler--message-circle text-default-300 mb-3 size-10"></i>
                                        <p class="font-semibold">Start the conversation</p>
                                        <p class="text-default-400 mt-1 text-sm">Send a message to {{ $otherProfile?->display_name ?? 'this person' }} below.</p>
                                    </div>
                                @else
                                    @foreach ($messages as $message)
                                        @php($isMine = $message->author_profile_id === $currentProfile->id)
                                        <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }} gap-3">
                                            @if (! $isMine)
                                                @if ($message->authorProfile?->avatar_url)
                                                    <img alt="{{ $message->authorProfile->display_name }}" class="size-8 shrink-0 rounded-full object-cover self-end" src="{{ $message->authorProfile->avatar_url }}" />
                                                @else
                                                    <div class="bg-primary/10 text-primary flex size-8 shrink-0 items-center justify-center rounded-full text-sm font-semibold self-end">
                                                        {{ str($message->authorProfile?->display_name ?? '?')->substr(0, 1)->upper() }}
                                                    </div>
                                                @endif
                                            @endif

                                            <div class="max-w-[75%] {{ $isMine ? 'items-end' : 'items-start' }} flex flex-col gap-1">
                                                <div class="{{ $isMine ? 'bg-primary text-white' : 'bg-light text-default-700' }} rounded-2xl px-4 py-2.5 text-sm leading-relaxed whitespace-pre-wrap">{{ $message->body }}</div>
                                                <span class="text-default-400 px-1 text-xs">{{ $message->created_at->format('M j, g:i A') }}</span>
                                            </div>

                                            @if ($isMine)
                                                @if ($currentProfile->avatar_url)
                                                    <img alt="{{ $currentProfile->display_name }}" class="size-8 shrink-0 rounded-full object-cover self-end" src="{{ $currentProfile->avatar_url }}" />
                                                @else
                                                    <div class="bg-primary/10 text-primary flex size-8 shrink-0 items-center justify-center rounded-full text-sm font-semibold self-end">
                                                        {{ str($currentProfile->display_name)->substr(0, 1)->upper() }}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- Reply form --}}
                        <div class="card">
                            <div class="card-body">
                                @include("auth.partials.messages")
                                <form action="{{ route('conversations.reply', $conversation) }}" method="POST" id="reply-form">
                                    @csrf
                                    <div class="flex gap-3 items-end">
                                        <textarea
                                            autofocus
                                            class="form-textarea flex-1 resize-none @error('body') is-invalid @enderror"
                                            id="reply-body"
                                            name="body"
                                            placeholder="Write a message..."
                                            rows="2"
                                        >{{ old('body') }}</textarea>
                                        <button class="btn bg-primary text-white hover:bg-primary-hover shrink-0" type="submit">
                                            <i class="iconify tabler--send-2 size-4"></i>
                                        </button>
                                    </div>
                                    @error('body')
                                        <p class="form-error mt-1">{{ $message }}</p>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")

    <script>
        // Scroll to bottom of messages on load
        document.addEventListener('DOMContentLoaded', () => {
            const list = document.getElementById('messages-list')
            if (list) list.scrollIntoView({ block: 'end' })

            // Submit on Enter (Shift+Enter for newline)
            const textarea = document.getElementById('reply-body')
            const form = document.getElementById('reply-form')
            if (textarea && form) {
                textarea.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault()
                        if (textarea.value.trim()) form.submit()
                    }
                })
            }
        })
    </script>
@endsection
