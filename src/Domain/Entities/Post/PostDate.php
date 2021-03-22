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

    public function getCreate(): DateTimeInterface
    {
        return $this->create;
    }

    public function getUpdate(): ?DateTimeInterface
    {
        return $this->update;
    }

    public function getPublish(): ?DateTimeInterface
    {
        return $this->publish;
    }

    public function changeUpdate(?DateTimeInterface $dateTime): self
    {
        $this->update = $dateTime;
        return $this;
    }

    public function changePublish(?DateTimeInterface $dateTime): self
    {
        $this->publish = $dateTime;
        return $this;
    }
}
