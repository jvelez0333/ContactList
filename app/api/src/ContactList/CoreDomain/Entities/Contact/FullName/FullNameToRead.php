<?php

namespace ContactList\CoreDomain\Entities\Contact\FullName;


class FullNameToRead implements FullNameInterface
{
    public function __construct( private string $firstName,  private string $lastName)
    {
        //     die(' __construct FullNameToRead');
    }

    public function getFirstName(): string
    {
        return  $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}