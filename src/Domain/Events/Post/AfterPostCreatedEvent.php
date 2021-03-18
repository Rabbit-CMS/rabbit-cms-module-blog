<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Events\Post;

use Paulmixxx\Blog\Domain\Entities\Post\Post;
use Paulmixxx\Blog\Domain\Events\EventInterface;

final class AfterPostCreatedEvent implements EventInterface
{
    private Post $entity;

    public function __construct(Post $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity(): Post
    {
        return $this->entity;
    }
}
