<?php

namespace ContactList\CoreDomain\Entities\Contact\FullName;


use Shared\CoreDomain\Exceptions\EmptyValueException;

class FullNameToCreate implements FullNameInterface
{
    /**
     * @throws EmptyValueException
     */
    public function __construct(private string $firstName, private string $lastName)
    {
        $this->validate();
    }
    public function getFirstName(): string
    {
        return (string) $this->firstName;
    }

    public function getLastName(): string
    {
        return (string)$this->lastName;
    }

    /**
     * @throws EmptyValueException
     */
    private function validate()
    {
        if(is_null($this->firstName) or empty($this->firstName)){
            throw new EmptyValueException("Primer Nombre");
        }
    }
}