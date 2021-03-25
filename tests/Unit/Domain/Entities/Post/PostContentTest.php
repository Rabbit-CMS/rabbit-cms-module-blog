<?php

namespace Tests\Unit\Domain\Entities\Post;

use InvalidArgumentException;
use Paulmixxx\Blog\Domain\Entities\Post\PostContent;
use PHPUnit\Framework\TestCase;

class PostContentTest extends TestCase
{
    /**
     * @dataProvider dataFailProvider
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::__construct
     * @param $header
     * @param $previewText
     * @param $detailText
     */
    public function testFailCreate($header, $previewText, $detailText): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PostContent(
            $header,
            $previewText,
            $detailText
        );
    }
    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::getHeader
     * @param $header
     * @param $previewText
     * @param $detailText
     */
    public function testGetHeader($header, $previewText, $detailText): void
    {
        $postContent = new PostContent(
            $header,
            $previewText,
            $detailText
        );
        self::assertEquals($header, $postContent->getHeader());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::getPreviewText
     * @param $header
     * @param $previewText
     * @param $detailText
     */
    public function testGetPreviewText($header, $previewText, $detailText): void
    {
        $postContent = new PostContent(
            $header,
            $previewText,
            $detailText
        );
        self::assertEquals($previewText, $postContent->getPreviewText());
    }

    /**
     * @dataProvider dataProvider
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::__construct
     * @covers       \Paulmixxx\Blog\Domain\Entities\Post\PostContent::getDetailText
     * @param $header
     * @param $previewText
     * @param $detailText
     */
    public function testGetDetailText($header, $previewText, $detailText): void
    {
        $postContent = new PostContent(
            $header,
            $previewText,
            $detailText
        );
        self::assertEquals($detailText, $postContent->getDetailText());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changeHeader
     */
    public function testChangeHeader(): void
    {
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changeHeader($value = 'New Header');
        self::assertEquals($value, $postContent->getHeader());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changeHeader
     */
    public function testFailChangeHeader(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changeHeader($this->generateRandomString(255 + 1));
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changePreviewText
     */
    public function testChangePreviewText(): void
    {
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changePreviewText($value = 'New PreviewText');
        self::assertEquals($value, $postContent->getPreviewText());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changePreviewText
     */
    public function testFailChangePreviewText(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changePreviewText($this->generateRandomString(65535 + 1));
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changeDetailText
     */
    public function testChangeDetailText(): void
    {
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changeDetailText($value = 'New DetailText');
        self::assertEquals($value, $postContent->getDetailText());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostContent::changeDetailText
     */
    public function testFailChangeDetailText(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $postContent = new PostContent(
            'Title'
        );
        $postContent->changeDetailText($this->generateRandomString(65535 + 1));
    }

    public function dataProvider(): array
    {
        return [
            ['Title', null, null],
            ['Title', 'Small text...', 'Big text...'],
        ];
    }

    public function dataFailProvider(): array
    {
        return [
            ['', '', ''],
            [$this->generateRandomString(255 + 1), null, null],
            ['title', $this->generateRandomString(65535 + 1), null],
            ['title', null, $this->generateRandomString(65535 + 1)],
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
