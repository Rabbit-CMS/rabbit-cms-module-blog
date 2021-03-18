<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Application\Commands\Post\Create;

use DateTimeImmutable;
use Exception;
use Paulmixxx\Blog\Domain\Entities\Author\Author;
use Paulmixxx\Blog\Domain\Entities\Post\PostContent;
use Paulmixxx\Blog\Domain\Entities\Post\PostDate;
use Paulmixxx\Blog\Domain\Entities\Post\PostId;
use Paulmixxx\Blog\Domain\Entities\Post\PostMetaData;
use Paulmixxx\Blog\Domain\Entities\Post\Post;
use Paulmixxx\Blog\Domain\Entities\Post\PostStatus;
use Paulmixxx\Blog\Domain\Entities\Post\PostSlug;
use Paulmixxx\Blog\Domain\Entities\Post\PostTag;
use Paulmixxx\Blog\Domain\Entities\Post\PostTagCollection;
use Paulmixxx\Blog\Domain\Exceptions\PostAlreadyExistsException;
use Paulmixxx\Blog\Domain\Repositories\PostRepositoryInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

final class CreatePostHandler
{
    /**
     * @var PostRepositoryInterface
     */
    private PostRepositoryInterface $postRepository;
    /**
     * @var EventDispatcherInterface
     */
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        PostRepositoryInterface $postRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->postRepository = $postRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param CreatePostCommand $command
     * @throws Exception
     */
    public function handle(CreatePostCommand $command): void
    {
        $slug = new PostSlug($command->slug);
        $author = new Author($command->authorId);
        $content = new PostContent(
            $command->header,
            $command->previewText,
            $command->detailText
        );
        $tagCollection = new PostTagCollection(array_map(static fn($tag) => new PostTag($tag), $command->tags));
        $meta = new PostMetaData(
            $command->metaTitle,
            $command->metaDescription,
            $command->metaKeywords
        );
        $date = new PostDate(
            $command->dateCreate ? new DateTimeImmutable($command->dateCreate) : new DateTimeImmutable(),
            $command->dateUpdate ? new DateTimeImmutable($command->dateUpdate) : $command->dateUpdate,
            $command->datePublish ? new DateTimeImmutable($command->datePublish) : $command->datePublish
        );
        $status = $command->publish ? PostStatus::publish() : PostStatus::draft();

        if ($this->postRepository->findBySlug($slug)) {
            throw new PostAlreadyExistsException();
        }

        $post = Post::create(
            $id = PostId::generate(),
            $slug,
            $author,
            $content,
            $tagCollection,
            $meta,
            $date,
            $status
        );
        $this->postRepository->add($post);

        foreach ($post->releaseEvents() as $event) {
            $this->eventDispatcher->dispatch($event);
        }
    }
}
