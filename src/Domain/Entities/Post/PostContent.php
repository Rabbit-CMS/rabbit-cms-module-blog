<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Webmozart\Assert\Assert;

final class PostContent
{
    private string $header;
    private ?string $previewText;
    private ?string $detailText;

    public function __construct(
        string $header,
        ?string $previewText = null,
        ?string $detailText = null
    ) {
        Assert::stringNotEmpty($header);
        Assert::maxLength($header, 255);
        Assert::maxLength($previewText, 65535);
        Assert::maxLength($detailText, 65535);

        $this->header = $header;
        $this->previewText = $previewText;
        $this->detailText = $detailText;
    }

    public function getHeader(): string
    {
        return $this->header;
    }

    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }

    public function getDetailText(): ?string
    {
        return $this->detailText;
    }

    public function changeHeader(string $header): self
    {
        Assert::stringNotEmpty($header);
        Assert::maxLength($header, 255);

        $this->header = $header;

        return $this;
    }

    public function changePreviewText(?string $previewText): self
    {
        Assert::maxLength($previewText, 65535);

        $this->previewText = $previewText;

        return $this;
    }

    public function changeDetailText(?string $detailText): self
    {
        Assert::maxLength($detailText, 65535);

        $this->detailText = $detailText;

        return $this;
    }
}
