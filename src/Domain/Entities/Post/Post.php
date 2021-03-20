<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\AggregateRootInterface;
use Paulmixxx\Blog\Domain\Entities\Author\Author;
use Paulmixxx\Blog\Domain\Entities\EventTrait;
use Paulmixxx\Blog\Domain\Events\Post\AfterPostCreatedEvent;

final class Post implements AggregateRootInterface
{
    use EventTrait;

    private PostId $uuid;
    private PostSlug $slug;
    private Author $author;
    private PostContent $content;
    private PostTagCollection $tagCollection;
    private PostMetaData $meta;
    private PostDate $date;
    private PostStatus $status;

    private function __construct(
        PostId $uuid,
        PostSlug $slug,
        Author $author,
        PostContent $content,
        PostTagCollection $tagCollection,
        PostMetaData $meta,
        PostDate $date,
        PostStatus $status
    ) {
        $this->uuid = $uuid;
        $this->slug = $slug;
        $this->author = $author;
        $this->content = $content;
        $this->tagCollection = $tagCollection;
        $this->meta = $meta;
        $this->date = $date;
        $this->status = $status;
    }

    public static function create(
        PostId $uuid,
        PostSlug $slug,
        Author $author,
        PostContent $content,
        PostTagCollection $tagCollection,
        PostMetaData $meta,
        PostDate $date,
        PostStatus $status
    ): self {
        $post = new self(
            $uuid,
            $slug,
            $author,
            $content,
            $tagCollection,
            $meta,
            $date,
            $status
        );
        $post->recordEvent(new AfterPostCreatedEvent($post));

        return $post;
    }

    public function getId(): PostId
    {
        return $this->uuid;
    }

    public function getSlug(): PostSlug
    {
        return $this->slug;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getContent(): PostContent
    {
        return $this->content;
    }

    public function getTagCollection(): PostTagCollection
    {
        return $this->tagCollection;
    }

    public function getMeta(): PostMetaData
    {
        return $this->meta;
    }

    public function getDate(): PostDate
    {
        return $this->date;
    }

    public function getStatus(): PostStatus
    {
        return $this->status;
    }
}
