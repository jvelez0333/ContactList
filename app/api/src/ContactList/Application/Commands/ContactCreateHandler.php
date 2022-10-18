<?php

namespace ContactList\Application\Commands;

use ContactList\Application\DTOs\Request\ContactCreateRequest;
use ContactList\CoreDomain\Entities\Contact\ContactImpl;
use ContactList\CoreDomain\Repositories\IContactRepository;

class ContactCreateHandler
{
    private IContactRepository $contactRepository;

    public function __construct(IContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke(ContactCreateRequest $createContactRequest): void
    {
        $newContact=ContactImpl::toCreateFromPrimitive(
            (string)$createContactRequest->getId(),
            (string)$createContactRequest->getFirstName(),
            (string)$createContactRequest->getLastName()
        );

        $this->contactRepository->insert($newContact);
    }
}