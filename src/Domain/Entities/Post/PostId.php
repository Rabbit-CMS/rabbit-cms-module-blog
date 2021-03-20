<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

final class PostId
{
    private string $value;

    /** @SuppressWarnings(PHPMD) */
    public function __construct(string $value)
    {
        Assert::uuid($value);
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
