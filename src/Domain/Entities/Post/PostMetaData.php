<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

final class PostMetaData
{
    private ?string $title = null;
    private ?string $description = null;
    private ?string $keywords = null;

    public function __construct(?string $title, ?string $description, ?string $keywords)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }
}
