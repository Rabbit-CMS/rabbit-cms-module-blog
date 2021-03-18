<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Author;

final class Author
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
