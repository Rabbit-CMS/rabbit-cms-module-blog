<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\ValueInterface;

final class PostStatus implements ValueInterface
{
    private const DRAFT = false;
    private const PUBLISH = true;

    private bool $value;

    private function __construct(bool $value)
    {
        $this->value = $value;
    }

    public static function draft(): self
    {
        return new self(self::DRAFT);
    }

    public static function publish(): self
    {
        return new self(self::PUBLISH);
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}
