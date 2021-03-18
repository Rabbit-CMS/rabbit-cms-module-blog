<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Entities\Post;

use DateTimeInterface;
use Exception;

final class PostDate
{
    private DateTimeInterface $create;
    private ?DateTimeInterface $update;
    private ?DateTimeInterface $publish;

    /**
     * PostDate constructor.
     * @param DateTimeInterface $create
     * @param DateTimeInterface|null $update
     * @param DateTimeInterface|null $publish
     * @throws Exception
     */
    public function __construct(
        DateTimeInterface $create,
        ?DateTimeInterface $update = null,
        ?DateTimeInterface $publish = null
    ) {
        $this->create = $create;
        $this->update = $update;
        $this->publish = $publish;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreate(): DateTimeInterface
    {
        return $this->create;
    }

    /**
     * @return ?DateTimeInterface
     */
    public function getUpdate(): ?DateTimeInterface
    {
        return $this->update;
    }

    /**
     * @return ?DateTimeInterface
     */
    public function getPublish(): ?DateTimeInterface
    {
        return $this->publish;
    }
}
