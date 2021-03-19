<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Repositories;

use Paulmixxx\Blog\Domain\Entities\Post\Post;
use Paulmixxx\Blog\Domain\Entities\Post\PostSlug;
use RuntimeException;

interface PostRepositoryInterface
{
    public function find(): ?Post;

    public function findBySlug(PostSlug $slug): ?Post;

    /**
     * @throws RuntimeException
     */
    public function add(Post $post): bool;
}
