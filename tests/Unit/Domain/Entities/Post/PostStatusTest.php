<?php

namespace Tests\Unit\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\Post\PostStatus;
use PHPUnit\Framework\TestCase;

class PostStatusTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::draft
     */
    public function testDraft(): void
    {
        $status = PostStatus::draft();
        self::assertInstanceOf(PostStatus::class, $status);
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::publish
     */
    public function testPublish(): void
    {
        $status = PostStatus::publish();
        self::assertInstanceOf(PostStatus::class, $status);
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostStatus::getValue
     */
    public function testGetValue(): void
    {
        $status = PostStatus::draft();
        self::assertFalse($status->getValue());

        $status = PostStatus::publish();
        self::assertTrue($status->getValue());
    }
}
