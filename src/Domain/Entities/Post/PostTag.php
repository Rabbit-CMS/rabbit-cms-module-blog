<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\ValueInterface;
use Webmozart\Assert\Assert;

final class PostTag implements ValueInterface
{
    private string $value;

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
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
