<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use InvalidArgumentException;

final class PostTagCollection
{
    /**
     * @var array<PostTag>
     */
    private array $collection = [];

    /**
     * @param array<PostTag> $collection
     */
    public function __construct(array $collection = [])
    {
        /** @psalm-suppress DocblockTypeContradiction */
        foreach ($collection as $item) {
            if (! ($item instanceof PostTag)) {
                throw new InvalidArgumentException(
                    sprintf('A collection can only contain a %s.', PostTag::class)
                );
            }
        }

        $this->collection = $collection;
    }

    /**
     * @return array<string>
     */
    public function getArray(): array
    {
        $array = [];

        foreach ($this->collection as $item) {
            $array[] = $item->getValue();
        }

        return $array;
    }
}
