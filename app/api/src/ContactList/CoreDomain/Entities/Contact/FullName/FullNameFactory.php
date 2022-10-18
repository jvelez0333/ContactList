<?php

namespace ContactList\CoreDomain\Entities\Contact\FullName;

use Shared\CoreDomain\Exceptions\EmptyValueException;

class FullNameFactory
{
    /**
     * @throws EmptyValueException
     */
    public static function toCreate(string $firstName, string $lastName): FullNameToCreate
    {
        return new FullNameToCreate($firstName,$lastName);
    }

    public static function toRead(string $firstName, string $lastName): FullNameToRead
    {
        return new FullNameToRead($firstName,$lastName);
    }
}