<?php

namespace App\Exceptions;

use Psr\Container\NotFoundExceptionInterface;

class ContainerExceptionInterface implements \Psr\Container\ContainerInterface
{

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        // TODO: Implement has() method.
    }
}