<?php

namespace ContactList\CoreDomain\Repositories;

use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactCollection;

interface IContactRepository
{
    public function getAllByPageNumber(int $page): ContactCollection;
    public function insert(Contact $contact);
}