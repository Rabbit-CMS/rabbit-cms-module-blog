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

    /**
     * @var PostId
     */
    private PostId $id;
    /**
     * @var PostSlug
     */
    private PostSlug $slug;
    /**
     * @var Author
     */
    private Author $author;
    /**
     * @var PostContent
     */
    private PostContent $content;
    /**
     * @var PostTagCollection
     */
    private PostTagCollection $tagCollection;
    /**
     * @var PostMetaData
     */
    private PostMetaData $meta;
    /**
     * @var PostDate
     */
    private PostDate $date;
    /**
     * @var PostStatus
     */
    private PostStatus $status;

    private function __construct(
        PostId $id,
        PostSlug $slug,
        Author $author,
        PostContent $content,
        PostTagCollection $tagCollection,
        PostMetaData $meta,
        PostDate $date,
        PostStatus $status
    ) {
        $this->id = $id;
        $this->slug = $slug;
        $this->author = $author;
        $this->content = $content;
        $this->tagCollection = $tagCollection;
        $this->meta = $meta;
        $this->date = $date;
        $this->status = $status;
    }

    public static function create(
        PostId $id,
        PostSlug $slug,
        Author $author,
        PostContent $content,
        PostTagCollection $tagCollection,
        PostMetaData $meta,
        PostDate $date,
        PostStatus $status
    ): self {
        $post = new self(
            $id,
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

    /**
     * @return PostId
     */
    public function getId(): PostId
    {
        return $this->id;
    }

    /**
     * @return PostSlug
     */
    public function getSlug(): PostSlug
    {
        return $this->slug;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return PostContent
     */
    public function getContent(): PostContent
    {
        return $this->content;
    }

    /**
     * @return PostTagCollection
     */
    public function getTagCollection(): PostTagCollection
    {
        return $this->tagCollection;
    }

    /**
     * @return PostMetaData
     */
    public function getMeta(): PostMetaData
    {
        return $this->meta;
    }

    /**
     * @return PostDate
     */
    public function getDate(): PostDate
    {
        return $this->date;
    }

    /**
     * @return PostStatus
     */
    public function getStatus(): PostStatus
    {
        return $this->status;
    }
}
