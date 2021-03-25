<?php

namespace Tests\Unit\Domain\Entities\Post;

use InvalidArgumentException;
use Paulmixxx\Blog\Domain\Entities\Post\PostId;
use PHPUnit\Framework\TestCase;

class PostIdTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostId::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostId::getValue
     */
    public function testCreateSuccess(): void
    {
        $postId = new PostId($uuid = '4c87589e-0dd5-4326-b009-f23089cd6df0');
        self::assertEquals($uuid, $postId->getValue());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostId::__construct
     */
    public function testCreateFail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PostId($uuid = 'invalid-uuid');
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostId::generate
     */
    public function testGenerate(): void
    {
        self::assertInstanceOf(PostId::class, PostId::generate());
    }
}
