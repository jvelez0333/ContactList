<?php

namespace ContactList\CoreDomain\Entities\Contact\FullName;

interface FullNameInterface
{
    public function getFirstName(): string;
    public function getLastName(): string;
}