<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Author;

use Paulmixxx\Blog\Domain\Entities\ValueInterface;

final class Author implements ValueInterface
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
