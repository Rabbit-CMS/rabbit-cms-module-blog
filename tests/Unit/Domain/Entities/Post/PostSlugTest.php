<?php

namespace Tests\Unit\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\Post\PostSlug;
use PHPUnit\Framework\TestCase;

class PostSlugTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostSlug::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostSlug::getValue
     */
    public function testGetValue(): void
    {
        $slug = new PostSlug($value = 'slug');
        self::assertEquals($value, $slug->getValue());
    }
}
