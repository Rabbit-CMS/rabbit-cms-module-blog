<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Commands\Post\Create;

use DateTimeImmutable;
use Exception;
use League\Event\EventDispatcher;
use Paulmixxx\Blog\Application\Commands\Post\Create\CreatePostCommand;
use Paulmixxx\Blog\Application\Commands\Post\Create\CreatePostHandler;
use Paulmixxx\Blog\Domain\Events\Post\AfterPostCreatedEvent;
use Paulmixxx\Blog\Domain\Repositories\PostRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;

class CreatePostHandlerTest extends TestCase
{
    private EventDispatcherInterface $dispatcher;
    private PostRepositoryInterface $postRepository;

    public function setUp(): void
    {
        $this->dispatcher = new EventDispatcher();
        $this->postRepository = $this->createMock(PostRepositoryInterface::class);
    }

    /**
     * @covers \Paulmixxx\Blog\Application\Commands\Post\Create\CreatePostHandler::handle
     * @throws Exception
     */
    public function testSuccess(): void
    {
        $command = new CreatePostCommand(
            '4c87589e-0dd5-4326-b009-f23089cd6df0',
            'new-post',
            'New post',
            ['IT', 'DDD']
        );
        $command->previewText = null;
        $command->detailText = null;
        $command->metaTitle = null;
        $command->metaDescription = null;
        $command->metaKeywords = null;
        $command->dateCreate = '2021-03-18T22:07:10.746707+0000';
        $command->dateUpdate = null;
        $command->datePublish = null;
        $command->publish = false;

        /** @phpstan-ignore-next-line */
        $this->dispatcher->subscribeTo(AfterPostCreatedEvent::class, function (AfterPostCreatedEvent $event) use ($command) {
            $post = $event->getEntity();
            $this->assertEquals($command->authorId, $post->getAuthor()->getValue());
            $this->assertEquals($command->header, $post->getContent()->getHeader());
            $this->assertEquals($command->previewText, $post->getContent()->getPreviewText());
            $this->assertEquals($command->detailText, $post->getContent()->getDetailText());
            $this->assertEquals($command->slug, $post->getSlug()->getValue());
            $this->assertEquals($command->tags, $post->getTagCollection()->getArray());
            $this->assertEquals($command->metaTitle, $post->getMeta()->getTitle());
            $this->assertEquals($command->metaDescription, $post->getMeta()->getDescription());
            $this->assertEquals($command->metaKeywords, $post->getMeta()->getKeywords());
            $this->assertEquals(
                /** @phpstan-ignore-next-line */
                $command->dateCreate ? new DateTimeImmutable($command->dateCreate) : new DateTimeImmutable(),
                $post->getDate()->getCreate()
            );
            $this->assertEquals(
                /** @phpstan-ignore-next-line */
                $command->dateUpdate ? new DateTimeImmutable($command->dateUpdate) : $command->dateUpdate,
                $post->getDate()->getUpdate()
            );
            $this->assertEquals(
                /** @phpstan-ignore-next-line */
                $command->datePublish ? new DateTimeImmutable($command->datePublish) : $command->datePublish,
                $post->getDate()->getPublish()
            );
            $this->assertEquals($command->publish, $post->getStatus()->getValue());
        });

        $handler = new CreatePostHandler($this->postRepository, $this->dispatcher);
        $handler->handle($command);
    }
}
