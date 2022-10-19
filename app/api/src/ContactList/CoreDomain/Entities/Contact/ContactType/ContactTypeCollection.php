<?php

namespace ContactList\CoreDomain\Entities\Contact\ContactType;

use Shared\CoreDomain\Collections\ObjectCollection;

class ContactTypeCollection extends ObjectCollection
{
    protected function className(): string
    {
        return ContactTypeFactory::class;
    }
}