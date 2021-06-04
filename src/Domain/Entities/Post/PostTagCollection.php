<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

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
        foreach ($collection as $item) {
            $this->add($item);
        }
    }

    public function add(PostTag $postTag): void
    {
        $this->collection[] = $postTag;
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
