<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

final class PostTag
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
