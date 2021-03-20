<?php

declare(strict_types=1);

namespace Paulmixxx\Blog\Domain\Exceptions;

use DomainException;

final class PostAlreadyExistsException extends DomainException
{
    /** @phpstan-ignore-next-line */
    protected $message = 'Post already exist.';
}
