<?php

namespace Tests\Unit\Blog\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\Post\PostMetaData;
use PHPUnit\Framework\TestCase;

class PostMetaDataTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::getTitle
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testGetTitle($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        self::assertEquals($title, $postMetaData->getTitle());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::getDescription
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testGetDescription($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        self::assertEquals($description, $postMetaData->getDescription());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::getKeywords
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testGetKeywords($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        self::assertEquals($keywords, $postMetaData->getKeywords());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::changeTitle
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testChangeTitle($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        $postMetaData->changeTitle($newTitle = 'new title');
        self::assertNotEquals($title, $postMetaData->getTitle());
        self::assertEquals($newTitle, $postMetaData->getTitle());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::changeDescription
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testChangeDescription($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        $postMetaData->changeDescription($newDescription = 'new Description');
        self::assertNotEquals($description, $postMetaData->getDescription());
        self::assertEquals($newDescription, $postMetaData->getDescription());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostMetaData::changeKeywords
     * @param $title
     * @param $description
     * @param $keywords
     */
    public function testChangeKeywords($title, $description, $keywords): void
    {
        $postMetaData = new PostMetaData(
            $title,
            $description,
            $keywords
        );
        $postMetaData->changeKeywords($newKeywords = 'new Keywords');
        self::assertNotEquals($keywords, $postMetaData->getKeywords());
        self::assertEquals($newKeywords, $postMetaData->getKeywords());
    }

    public function dataProvider(): array
    {
        return [
            [null, null, null],
            ['title', 'description', 'keywords'],
        ];
    }
}
