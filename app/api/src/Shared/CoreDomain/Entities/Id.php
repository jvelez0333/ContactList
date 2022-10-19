<?php

namespace Shared\CoreDomain\Entities;

use Shared\CoreDomain\Exceptions\EmptyValueException;

abstract class Id
{
    private string $value;

    /**
     * @throws EmptyValueException
     */
    public function __construct(string $value)
    {
        if(empty($value)) {
            throw new EmptyValueException("Id");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

}