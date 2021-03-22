<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

final class PostMetaData
{
    private ?string $title;
    private ?string $description;
    private ?string $keywords;

    public function __construct(?string $title = null, ?string $description = null, ?string $keywords = null)
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

    public function changeTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function changeDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function changeKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }
}
