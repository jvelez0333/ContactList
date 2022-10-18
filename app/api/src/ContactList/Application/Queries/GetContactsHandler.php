<?php

namespace ContactList\Application\Queries;

use ContactList\Application\DTOs\Request\GetContactsRequest;
use ContactList\Application\DTOs\Response\ContactCollectionResponse;
use ContactList\CoreDomain\Repositories\IContactRepository;

class GetContactsHandler
{

    private IContactRepository $contactRepository;

    public function __construct(IContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke(GetContactsRequest $contactsRequest)
    {
        $contacts=$this->contactRepository->getAllByPageNumber($contactsRequest->getPageNumber());
        return new ContactCollectionResponse($contacts);
    }
}