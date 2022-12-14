<?php

namespace ContactList\CoreDomain\Entities\Contact;

use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeCollection;
use ContactList\CoreDomain\Entities\Contact\FullName\FullNameInterface;

interface Contact
{
    public function getId():ContactId;
    public function getFullName():FullNameInterface;
    public function getContactCollection():ContactTypeCollection;
}