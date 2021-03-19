<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Application\Commands\Post\Create;

use DateTimeImmutable;
use Exception;
use Paulmixxx\Blog\Domain\Entities\Author\Author;
use Paulmixxx\Blog\Domain\Entities\Post\Post;
use Paulmixxx\Blog\Domain\Entities\Post\PostContent;
use Paulmixxx\Blog\Domain\Entities\Post\PostDate;
use Paulmixxx\Blog\Domain\Entities\Post\PostId;
use Paulmixxx\Blog\Domain\Entities\Post\PostMetaData;
use Paulmixxx\Blog\Domain\Entities\Post\PostSlug;
use Paulmixxx\Blog\Domain\Entities\Post\PostStatus;
use Paulmixxx\Blog\Domain\Entities\Post\PostTag;
use Paulmixxx\Blog\Domain\Entities\Post\PostTagCollection;
use Paulmixxx\Blog\Domain\Exceptions\PostAlreadyExistsException;
use Paulmixxx\Blog\Domain\Repositories\PostRepositoryInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

final class CreatePostHandler
{
    private PostRepositoryInterface $postRepository;
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        PostRepositoryInterface $postRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->postRepository = $postRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @throws Exception
     */
    public function handle(CreatePostCommand $command): void
    {
        $id = $this->getPostId();
        $slug = $this->getSlug($command);
        $author = $this->getAuthor($command);
        $content = $this->getPostContent($command);
        $tagCollection = $this->getPostTagCollection($command);
        $meta = $this->getPostMetaData($command);
        $date = $this->getPostDate($command);
        $status = $this->getPostStatus($command);

        if ($this->postRepository->findBySlug($slug)) {
            throw new PostAlreadyExistsException();
        }

        $post = Post::create($id, $slug, $author, $content, $tagCollection, $meta, $date, $status);
        $this->postRepository->add($post);

        foreach ($post->releaseEvents() as $event) {
            $this->eventDispatcher->dispatch($event);
        }
    }

    private function getPostId(): PostId
    {
        return PostId::generate();
    }

    private function getSlug(CreatePostCommand $command): PostSlug
    {
        return new PostSlug($command->slug);
    }

    private function getAuthor(CreatePostCommand $command): Author
    {
        return new Author($command->authorId);
    }

    private function getPostContent(CreatePostCommand $command): PostContent
    {
        return new PostContent(
            $command->header,
            $command->previewText,
            $command->detailText
        );
    }

    private function getPostTagCollection(CreatePostCommand $command): PostTagCollection
    {
        return new PostTagCollection(array_map(static fn (string $tag) => new PostTag($tag), $command->tags));
    }

    private function getPostMetaData(CreatePostCommand $command): PostMetaData
    {
        return new PostMetaData(
            $command->metaTitle,
            $command->metaDescription,
            $command->metaKeywords
        );
    }

    /**
     * @throws Exception
     */
    private function getPostDate(CreatePostCommand $command): PostDate
    {
        return new PostDate(
            $command->dateCreate === null ? new DateTimeImmutable() : new DateTimeImmutable($command->dateCreate),
            $command->dateUpdate === null ? $command->dateUpdate : new DateTimeImmutable($command->dateUpdate),
            $command->datePublish === null ? $command->datePublish : new DateTimeImmutable($command->datePublish)
        );
    }

    private function getPostStatus(CreatePostCommand $command): PostStatus
    {
        return $command->publish ? PostStatus::publish() : PostStatus::draft();
    }
}
