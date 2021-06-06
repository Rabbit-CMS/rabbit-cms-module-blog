<?php

namespace Tests\Unit\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\Post\PostTag;
use Paulmixxx\Blog\Domain\Entities\Post\PostTagCollection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostTagCollection
 */
class PostTagCollectionTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCreateSuccess($data, $expect): void
    {
        $collection = new PostTagCollection($data);
        self::assertEquals($expect, $collection->all());
    }

    public function testAdd(): void
    {
        $collection = new PostTagCollection([
            $tag1 = new PostTag('New'),
            $tag2 = new PostTag('New'),
            $tag3 = new PostTag('Old'),
            $tag4 = new PostTag('new'),
            $tag5 = new PostTag('old'),
            $tag6 = new PostTag('Old'),
        ]);
        $collection->add($tag7 = new PostTag('New tag'));
        self::assertEquals([$tag1, $tag3, $tag4, $tag5, $tag7], $collection->all());
    }

    public function testRemove(): void
    {
        $collection = new PostTagCollection([
            $tag1 = new PostTag('New'),
            $tag2 = new PostTag('New'),
            $tag3 = new PostTag('Old'),
            $tag4 = new PostTag('new'),
            $tag5 = new PostTag('old'),
            $tag6 = new PostTag('Old'),
        ]);
        $collection->remove(1);
        self::assertEquals([$tag1, $tag4, $tag5], $collection->all());
    }

    public function testCount(): void
    {
        $collection = new PostTagCollection([
            $tag1 = new PostTag('New'),
            $tag2 = new PostTag('New'),
            $tag3 = new PostTag('Old'),
            $tag4 = new PostTag('new'),
            $tag5 = new PostTag('old'),
            $tag6 = new PostTag('Old'),
        ]);
        self::assertEquals(count([$tag1, $tag3, $tag4, $tag5]), $collection->count());
    }

    public function testClear(): void
    {
        $collection = new PostTagCollection([
            $tag1 = new PostTag('New'),
            $tag2 = new PostTag('New'),
            $tag3 = new PostTag('Old'),
            $tag4 = new PostTag('new'),
            $tag5 = new PostTag('old'),
            $tag6 = new PostTag('Old'),
        ]);
        $collection->clear();
        self::assertEquals([], $collection->all());
    }

    public function testGetArray(): void
    {
        $collection = new PostTagCollection([
            $tag1 = new PostTag('New'),
            $tag2 = new PostTag('New'),
            $tag3 = new PostTag('Old'),
            $tag4 = new PostTag('new'),
            $tag5 = new PostTag('old'),
            $tag6 = new PostTag('Old'),
        ]);
        self::assertEquals(['New', 'Old', 'new', 'old'], $collection->toArray());
    }

    public function dataProvider(): array
    {
        return [
            [
                [
                    $tag1 = new PostTag('New'),
                    $tag2 = new PostTag('New'),
                    $tag3 = new PostTag('Old'),
                    $tag4 = new PostTag('new'),
                    $tag5 = new PostTag('old'),
                    $tag6 = new PostTag('Old'),
                ],
                [
                    $tag1,
                    $tag3,
                    $tag4,
                    $tag5
                ]
            ],
            [[], []],
            [
                [
                    $tag1 = new PostTag('New'),
                    $tag2 = new PostTag('Old'),
                ],
                [
                    $tag1,
                    $tag2,
                ]
            ],
        ];
    }
}
