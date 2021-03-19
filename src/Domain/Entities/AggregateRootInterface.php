<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities;

use Paulmixxx\Blog\Domain\Events\EventInterface;

interface AggregateRootInterface
{
    /**
     * @return array<EventInterface>
     */
    public function releaseEvents(): array;
}
