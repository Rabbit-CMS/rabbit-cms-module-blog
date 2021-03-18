<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Application\Commands\Post\Create;

final class CreatePostCommand
{
    /**
     * @var string
     */
    public string $authorId;
    /**
     * @var string
     */
    public string $slug;
    /**
     * @var string
     */
    public string $header;
    /**
     * @var string|null
     */
    public ?string $previewText = null;
    /**
     * @var string|null
     */
    public ?string $detailText = null;
    /**
     * @var array|null
     */
    public ?array $tags = null;
    /**
     * @var string|null
     */
    public ?string $metaTitle = null;
    /**
     * @var string|null
     */
    public ?string $metaDescription = null;
    /**
     * @var string|null
     */
    public ?string $metaKeywords = null;
    /**
     * @var string|null
     */
    public ?string $dateCreate = null;
    /**
     * @var string|null
     */
    public ?string $dateUpdate = null;
    /**
     * @var string|null
     */
    public ?string $datePublish = null;
    /**
     * @var false
     */
    public bool $publish = false;
}
