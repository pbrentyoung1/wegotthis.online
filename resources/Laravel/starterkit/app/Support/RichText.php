<?php

namespace App\Support;

use Illuminate\Support\HtmlString;

class RichText
{
    public static function toHtml(?string $value): HtmlString
    {
        if (blank($value)) {
            return new HtmlString('');
        }

        $delta = json_decode($value, true);

        if (! is_array($delta) || ! isset($delta['ops']) || ! is_array($delta['ops'])) {
            return new HtmlString(nl2br(e($value)));
        }

        $html = '';
        $line = '';

        foreach ($delta['ops'] as $operation) {
            $insert = $operation['insert'] ?? '';
            $attributes = is_array($operation['attributes'] ?? null) ? $operation['attributes'] : [];

            if (! is_string($insert)) {
                continue;
            }

            $parts = explode("\n", $insert);

            foreach ($parts as $index => $part) {
                if ($part !== '') {
                    $line .= self::formatInline($part, $attributes);
                }

                if ($index < count($parts) - 1) {
                    $html .= self::wrapLine($line, $attributes);
                    $line = '';
                }
            }
        }

        if ($line !== '') {
            $html .= self::wrapLine($line, []);
        }

        return new HtmlString($html);
    }

    public static function plainText(?string $value): string
    {
        if (blank($value)) {
            return '';
        }

        $delta = json_decode($value, true);

        if (! is_array($delta) || ! isset($delta['ops'])) {
            return $value;
        }

        return collect($delta['ops'])
            ->pluck('insert')
            ->filter(fn (mixed $insert) => is_string($insert))
            ->implode('');
    }

    private static function formatInline(string $text, array $attributes): string
    {
        $formatted = e($text);

        foreach (['bold' => 'strong', 'italic' => 'em', 'underline' => 'u', 'strike' => 's'] as $attribute => $tag) {
            if (! empty($attributes[$attribute])) {
                $formatted = "<{$tag}>{$formatted}</{$tag}>";
            }
        }

        $scheme = isset($attributes['link']) ? parse_url($attributes['link'], PHP_URL_SCHEME) : null;
        if (isset($attributes['link']) && in_array($scheme, ['http', 'https'], true) && filter_var($attributes['link'], FILTER_VALIDATE_URL)) {
            $url = e($attributes['link']);
            $formatted = "<a href=\"{$url}\" rel=\"noopener noreferrer\" target=\"_blank\">{$formatted}</a>";
        }

        return $formatted;
    }

    private static function wrapLine(string $line, array $attributes): string
    {
        $line = $line === '' ? '<br>' : $line;

        if (($attributes['list'] ?? null) === 'ordered') {
            return "<ol><li>{$line}</li></ol>";
        }

        if (($attributes['list'] ?? null) === 'bullet') {
            return "<ul><li>{$line}</li></ul>";
        }

        if (! empty($attributes['blockquote'])) {
            return "<blockquote>{$line}</blockquote>";
        }

        $header = (int) ($attributes['header'] ?? 0);
        if (in_array($header, [2, 3], true)) {
            return "<h{$header}>{$line}</h{$header}>";
        }

        return "<p>{$line}</p>";
    }
}
