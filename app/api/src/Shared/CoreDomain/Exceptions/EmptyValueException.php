<?php

namespace Shared\CoreDomain\Exceptions;

class EmptyValueException extends  DomainException
{

    public function __construct(private string $valueName)
    {
        parent::__construct(
            "empty_value",
            $this->valueName." es un valor requerido."
        );
    }
}