<?php

namespace Shared\CoreDomain\Exceptions;

class FormatValueException extends  DomainException
{

    public function __construct(private readonly string $name,private readonly string $type)
    {
        parent::__construct(
            "incorrect_format_value",
            "el valor del campo [ ".$this->name." ] debe de ser [ ".$this->type." ]."
        );
    }
}