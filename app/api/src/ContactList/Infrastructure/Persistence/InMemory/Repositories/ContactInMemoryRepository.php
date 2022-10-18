<?php

namespace ContactList\Infrastructure\Persistence\InMemory\Repositories;

use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactCollection;
use ContactList\CoreDomain\Entities\Contact\ContactImpl;
use ContactList\CoreDomain\Repositories\IContactRepository;

class ContactInMemoryRepository implements IContactRepository
{
    private array $contacts;

    public function __construct()
    {
        $this->contacts[] =ContactImpl::toReadFromPrimitive(
            '1'
        ,'Manuel Arqumedes'
        ,'Vélez Andújar') ;

        $this->contacts[] =ContactImpl::toReadFromPrimitive(
            '2'
            ,'Olgalina'
            ,'Vélez Andújar') ;
        $this->contacts[] =ContactImpl::toReadFromPrimitive(
            '3'
            ,'Juan Luis'
            ,'Vélez Andújar') ;
        $this->contacts[] =ContactImpl::toReadFromPrimitive(
            '4'
            ,'Kelvin L.'
            ,'Vélez Andújar') ;
    }

    public function insert(Contact $contact)
    {
        $this->contacts[]=$contact;
    }

    public function getAllByPageNumber(int $page): ContactCollection
    {

        $contactCollection = new ContactCollection();

        array_map(function ($contacto) use ($contactCollection) {

            $contactCollection->add($contacto);
        }, $this->contacts);

        return $contactCollection;
    }
}