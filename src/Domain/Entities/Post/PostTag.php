<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Webmozart\Assert\Assert;

final class PostTag
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::lengthBetween($value, 1, 255);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
