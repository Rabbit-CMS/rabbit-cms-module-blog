<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Events;

interface EventInterface
{
    public function getEntity();
}
