<?php


namespace ContactList\Application\DTOs\Response;


use ContactList\CoreDomain\Entities\Contact\ContactCollection;

class ContactCollectionResponse
{
    private array $contacts;

    public function __construct(ContactCollection $contactCollection)
    {
        $this->contacts = [];
        foreach ($contactCollection->getCollection() as $contact) {
            $this->contacts[] = new ContactResponse($contact);
        }
    }

    public function contacts(): array
    {
        return $this->contacts;
    }

    public function toArray()
    {
        return array_map(function ($contact) {
            return $contact->toArray();
        }, $this->contacts());
    }
}