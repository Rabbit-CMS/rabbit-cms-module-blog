<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use Paulmixxx\Blog\Domain\Entities\CollectionInterface;
use Paulmixxx\Blog\Domain\Entities\ValueInterface;

final class PostTagCollection implements CollectionInterface
{
    private array $hashmap = [];
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

    /**
     * @param PostTag $postTag
     * @return bool
     */
    public function add(ValueInterface $postTag): bool
    {
        if ($this->hasIndexHashmap($postTag)) {
            return false;
        }

        $this->collection[] = $postTag;
        $this->hashmap[$postTag->getValue()] = \current($this->collection);

        return true;
    }

    public function remove(int $index): bool
    {
        if (!\array_key_exists($index, $this->collection)) {
            return false;
        }

        unset($this->collection[$index]);
        $this->collection = \array_values($this->collection);

        return true;
    }

    /**
     * @return array<PostTag>
     */
    public function all(): array
    {
        return $this->collection;
    }

    public function count(): int
    {
        return \count($this->collection);
    }

    public function clear(): void
    {
        $this->collection = [];
    }

    /**
     * @return array<string>
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this->collection as $item) {
            $array[] = $item->getValue();
        }

        return $array;
    }

    private function hasIndexHashmap(PostTag $postTag): bool
    {
        return \array_key_exists($postTag->getValue(), $this->hashmap);
    }
}
