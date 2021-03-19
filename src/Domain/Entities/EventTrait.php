<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities;

use Paulmixxx\Blog\Domain\Events\EventInterface;

trait EventTrait
{
    /**
     * @var array<EventInterface>
     */
    private array $events = [];

    /**
     * @return array<EventInterface>
     */
    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    protected function recordEvent(EventInterface $event): void
    {
        $this->events[] = $event;
    }
}
