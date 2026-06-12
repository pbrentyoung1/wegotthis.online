@props([
    "name",
    "value" => "",
    "label" => null,
    "placeholder" => "",
    "required" => false,
    "emoji" => false,
])

@php($editorId = "rich-text-" . str($name)->replace(["[", "]", "."], "-") . "-" . uniqid())

<div {{ $attributes->merge(["data-rich-text-wrapper" => true]) }}>
    @if ($label)
        <label class="form-label" for="{{ $editorId }}">{{ $label }}</label>
    @endif
    <textarea class="hidden" data-rich-text-input id="{{ $editorId }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    <div class="min-h-36 rounded border border-default-300 bg-white" data-placeholder="{{ $placeholder }}" data-rich-text-editor></div>
    @if ($emoji)
        <div class="relative mt-2 flex justify-end">
            <button aria-expanded="false" aria-label="Add emoji" class="btn btn-sm bg-light text-default-600 hover:text-primary" data-emoji-toggle type="button">
                <span aria-hidden="true" class="text-base">😊</span>
                <span class="ms-1">Emoji</span>
            </button>
            <div class="absolute end-0 bottom-full z-20 mb-2 hidden w-72 rounded border border-default-200 bg-white p-3 shadow-lg" data-emoji-picker>
                <p class="text-default-400 mb-2 text-xs font-semibold uppercase">Add an emoji</p>
                <div class="grid grid-cols-8 gap-1">
                    @foreach (["👍", "❤️", "🙏", "😊", "🎉", "👏", "🙌", "✅", "👀", "🤔", "💡", "📌", "📅", "⏰", "🚩", "⚠️", "🔥", "✨", "🎨", "📷", "🎥", "🎵", "📝", "🔗"] as $symbol)
                        <button aria-label="Add {{ $symbol }}" class="hover:bg-light flex size-8 items-center justify-center rounded text-lg" data-emoji="{{ $symbol }}" type="button">{{ $symbol }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
