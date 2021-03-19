<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

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
}
