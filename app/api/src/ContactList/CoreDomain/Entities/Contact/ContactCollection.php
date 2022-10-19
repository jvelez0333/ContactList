<?php

namespace ContactList\CoreDomain\Entities\Contact;

use Shared\CoreDomain\Collections\ObjectCollection;

class ContactCollection extends ObjectCollection
{
    protected function className(): string
    {
        return ContactImpl::class;
    }
}