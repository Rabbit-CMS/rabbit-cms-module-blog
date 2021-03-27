<?php

namespace Tests\Unit\Domain\Entities\Post;

use InvalidArgumentException;
use Paulmixxx\Blog\Domain\Entities\Post\PostTag;
use PHPUnit\Framework\TestCase;

class PostTagTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostTag::__construct
     */
    public function testCreateSuccess(): void
    {
        $tag = new PostTag($value = 'tag');
        self::assertInstanceOf(PostTag::class, $tag);
    }

    /**
     * @dataProvider dataProviderFail
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostTag::__construct
     * @param $value
     */
    public function testCreateFail($value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $tag = new PostTag($value);
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostTag::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostTag::getValue
     */
    public function testGetValue(): void
    {
        $tag = new PostTag($value = 'tag');
        self::assertEquals($value, $tag->getValue());
    }

    public function dataProviderFail(): array
    {
        return [
            [''],
            [$this->generateRandomString(255 + 1)],
        ];
    }

    private function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
