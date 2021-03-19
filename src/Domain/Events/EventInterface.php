<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Events;

use Paulmixxx\Blog\Domain\Entities\AggregateRootInterface;

interface EventInterface
{
    public function getEntity(): AggregateRootInterface;
}
