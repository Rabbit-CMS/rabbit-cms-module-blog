<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities;

interface CollectionInterface
{
    public function all(): array;

    public function add(ValueInterface $postTag): bool;

    public function remove(int $index): bool;

    public function clear(): void;

    public function count(): int;

    public function toArray(): array;
}
