<?php

namespace Tests\Unit;

use App\Support\RichText;
use Tests\TestCase;

class RichTextTest extends TestCase
{
    public function test_it_renders_supported_delta_formatting_and_escapes_unsafe_content(): void
    {
        $delta = json_encode([
            'ops' => [
                ['insert' => '<script>alert(1)</script>', 'attributes' => ['bold' => true]],
                ['insert' => "\n"],
            ],
        ]);

        $html = RichText::toHtml($delta)->toHtml();

        $this->assertStringContainsString('<strong>&lt;script&gt;alert(1)&lt;/script&gt;</strong>', $html);
        $this->assertStringNotContainsString('<script>', $html);
    }

    public function test_it_preserves_legacy_plain_text(): void
    {
        $this->assertSame("Legacy\ntext", RichText::plainText("Legacy\ntext"));
        $this->assertStringContainsString('Legacy<br', RichText::toHtml("Legacy\ntext")->toHtml());
    }

    public function test_it_rejects_non_http_links(): void
    {
        $delta = json_encode(['ops' => [['insert' => 'Unsafe', 'attributes' => ['link' => 'javascript:alert(1)']]]]);

        $this->assertStringNotContainsString('<a ', RichText::toHtml($delta)->toHtml());
    }

    public function test_it_preserves_emoji_in_delta_content(): void
    {
        $delta = json_encode(['ops' => [['insert' => "Looks good 👍🎉\n"]]], JSON_UNESCAPED_UNICODE);

        $this->assertStringContainsString('Looks good 👍🎉', RichText::toHtml($delta)->toHtml());
        $this->assertSame("Looks good 👍🎉\n", RichText::plainText($delta));
    }
}
