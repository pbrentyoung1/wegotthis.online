@props(["value"])

<div {{ $attributes->class(["rich-text prose prose-sm max-w-none text-default-600"]) }}>
    {!! \App\Support\RichText::toHtml($value) !!}
</div>
