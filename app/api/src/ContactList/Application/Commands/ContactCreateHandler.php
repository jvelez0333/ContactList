<?php

namespace ContactList\Application\Commands;

use ContactList\Application\DTOs\Request\ContactCreateRequest;
use ContactList\CoreDomain\Entities\Contact\ContactId;
use ContactList\CoreDomain\Entities\Contact\ContactImpl;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeCollection;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeFactory;
use ContactList\CoreDomain\Repositories\IContactRepository;
use Shared\CoreDomain\Exceptions\EmptyValueException;
use Shared\CoreDomain\Exceptions\FormatValueException;

class ContactCreateHandler
{
    private IContactRepository $contactRepository;

    public function __construct(IContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @throws EmptyValueException
     * @throws FormatValueException
     */
    public function __invoke(ContactCreateRequest $createContactRequest): void
    {
        $contactId= new ContactId($createContactRequest->getId());
        $contactCollection=$this->buildContactCollection($contactId,$createContactRequest->getContacts());


        $newContact=ContactImpl::toCreate(
            $createContactRequest->getId(),
            $createContactRequest->getFirstName(),
            $createContactRequest->getLastName(),
            $contactCollection
        );

        $this->contactRepository->insert($newContact);
    }

    /**
     * @throws EmptyValueException
     * @throws FormatValueException
     */
    private function buildContactCollection(ContactId $contactId, array $contacts): ContactTypeCollection
    {
        $contactCollection = ContactTypeCollection::init();

        if (!empty($contacts)) {
            foreach ($contacts as $contact) {
                $id=array_key_exists('id',$contact)?$contact['id']:'';
                $type=array_key_exists('type',$contact)?$contact['type']:'';
                $value=array_key_exists('value',$contact)?$contact['value']:'';
                $description=array_key_exists('description',$contact)?$contact['description']:'';

                $contactType=ContactTypeFactory::toCreate(
                    ContactImpl::toBasic($contactId->value())
                    ,$id
                    , $type
                    , $value
                    , $description
                );

                $contactCollection->add($contactType);
            }
        }
        return $contactCollection;
    }
}