<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use Paulmixxx\Blog\Email;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    /**
     * @covers \Paulmixxx\Blog\Email::__construct
     * @covers \Paulmixxx\Blog\Email::fromString
     * @covers \Paulmixxx\Blog\Email::ensureIsValidEmail
     */
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    /**
     * @covers \Paulmixxx\Blog\Email::__construct
     * @covers \Paulmixxx\Blog\Email::fromString
     * @covers \Paulmixxx\Blog\Email::ensureIsValidEmail
     */
    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    /**
     * @covers \Paulmixxx\Blog\Email::__construct
     * @covers \Paulmixxx\Blog\Email::__toString
     * @covers \Paulmixxx\Blog\Email::fromString
     * @covers \Paulmixxx\Blog\Email::ensureIsValidEmail
     */
    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
