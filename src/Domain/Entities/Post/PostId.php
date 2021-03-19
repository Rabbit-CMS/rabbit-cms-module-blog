<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Ramsey\Uuid\Uuid;

final class PostId
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
