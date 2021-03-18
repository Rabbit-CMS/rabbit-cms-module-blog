<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use JetBrains\PhpStorm\Pure;

class PostStatus
{
    private const DRAFT = false;
    private const PUBLISH = true;

    private bool $value;

    private function __construct(bool $value)
    {
        $this->value = $value;
    }

    #[Pure]
    public static function draft(): self
    {
        return new self(self::DRAFT);
    }

    #[Pure]
    public static function publish(): self
    {
        return new self(self::PUBLISH);
    }

    /**
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }
}
