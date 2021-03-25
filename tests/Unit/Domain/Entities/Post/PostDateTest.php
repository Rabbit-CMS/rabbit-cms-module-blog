<?php

namespace Tests\Unit\Domain\Entities\Post;

use DateTimeImmutable;
use Exception;
use Paulmixxx\Blog\Domain\Entities\Post\PostDate;
use PHPUnit\Framework\TestCase;

class PostDateTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::getCreate
     * @throws Exception
     */
    public function testGetCreate(): void
    {
        $date = new PostDate(
            $create = new DateTimeImmutable(),
            $update = new DateTimeImmutable(),
            $publish = new DateTimeImmutable()
        );
        self::assertEquals($create, $date->getCreate());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::getUpdate
     * @throws Exception
     */
    public function testGetUpdate(): void
    {
        $date = new PostDate(
            $create = new DateTimeImmutable(),
            $update = new DateTimeImmutable(),
            $publish = new DateTimeImmutable()
        );
        self::assertEquals($update, $date->getUpdate());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::__construct
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::getPublish
     * @throws Exception
     */
    public function testGetPublish(): void
    {
        $date = new PostDate(
            $create = new DateTimeImmutable(),
            $update = new DateTimeImmutable(),
            $publish = new DateTimeImmutable()
        );
        self::assertEquals($publish, $date->getPublish());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::changeUpdate
     * @throws Exception
     */
    public function testChangeUpdate(): void
    {
        $date = new PostDate(
            $create = new DateTimeImmutable(),
            $update = new DateTimeImmutable(),
            $publish = new DateTimeImmutable()
        );
        $date->changeUpdate($newDate = (new DateTimeImmutable())->modify('+1 day'));
        self::assertNotEquals($date, $date->getUpdate());
        self::assertEquals($newDate, $date->getUpdate());
    }

    /**
     * @covers \Paulmixxx\Blog\Domain\Entities\Post\PostDate::changePublish
     * @throws Exception
     */
    public function testChangePublish(): void
    {
        $date = new PostDate(
            $create = new DateTimeImmutable(),
            $update = new DateTimeImmutable(),
            $publish = new DateTimeImmutable()
        );
        $date->changePublish($newDate = (new DateTimeImmutable())->modify('+1 day'));
        self::assertNotEquals($date, $date->getPublish());
        self::assertEquals($newDate, $date->getPublish());
    }
}
