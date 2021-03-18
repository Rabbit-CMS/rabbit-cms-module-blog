<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities;

interface AggregateRootInterface
{
    public function releaseEvents();
}
