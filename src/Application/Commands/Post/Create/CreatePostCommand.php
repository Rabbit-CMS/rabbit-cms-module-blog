<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Application\Commands\Post\Create;

final class CreatePostCommand
{
    public string $authorId;
    public string $slug;
    public string $header;
    public ?string $previewText = null;
    public ?string $detailText = null;
    /**
     * @var array<string>
     */
    public array $tags;
    public ?string $metaTitle = null;
    public ?string $metaDescription = null;
    public ?string $metaKeywords = null;
    public ?string $dateCreate = null;
    public ?string $dateUpdate = null;
    public ?string $datePublish = null;
    public ?bool $publish = false;

    /**
     * @param array<string> $tags
     */
    public function __construct(
        string $authorId,
        string $slug,
        string $header,
        array $tags
    ) {
        $this->authorId = $authorId;
        $this->slug = $slug;
        $this->header = $header;
        $this->tags = $tags;
    }
}
