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
     * @var array<string>|null
     */
    public ?array $tags = null;
    public ?string $metaTitle = null;
    public ?string $metaDescription = null;
    public ?string $metaKeywords = null;
    public ?string $dateCreate = null;
    public ?string $dateUpdate = null;
    public ?string $datePublish = null;
    public bool $publish = false;
}
