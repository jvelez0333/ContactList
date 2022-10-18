<?php

namespace ContactList\Application\DTOs\Request;

class ContactCreateRequest
{
    public function __construct(
        private string $id,
        private string $firstName,
        private string $lastName
    ){

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}