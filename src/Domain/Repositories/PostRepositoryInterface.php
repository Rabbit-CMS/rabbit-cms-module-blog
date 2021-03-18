<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Repositories;

use Paulmixxx\Blog\Domain\Entities\Post\Post;
use Paulmixxx\Blog\Domain\Entities\Post\PostSlug;
use RuntimeException;

interface PostRepositoryInterface
{
    /**
     * @return Post|null
     */
    public function find(): ?Post;

    /**
     * @param PostSlug $slug
     * @return Post|null
     */
    public function findBySlug(PostSlug $slug): ?Post;

    /**
     * @param Post $post
     * @return bool
     * @throws RuntimeException
     */
    public function add(Post $post): bool;
}
