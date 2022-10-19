<?php

namespace ContactList\CoreDomain\Entities\Contact;

use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeCollection;
use ContactList\CoreDomain\Entities\Contact\FullName\FullNameFactory;
use ContactList\CoreDomain\Entities\Contact\FullName\FullNameInterface;
use Shared\CoreDomain\Exceptions\EmptyValueException;

class ContactImpl implements Contact
{
    public function __construct(
        private readonly ContactId         $id,
        private readonly FullNameInterface $fullName,
        private readonly ContactTypeCollection $contactTypeCollection)
    {

    }
    /**
     * @return ContactTypeCollection
     */
    public function getContactTypeCollection(): ContactTypeCollection
    {
        return $this->contactTypeCollection;
    }

    /**
     * @throws EmptyValueException
     */
    public static function toCreate(
        string $id,
        string $firstName,
        string $lastName,
        ContactTypeCollection $contactTypeCollection):Contact
    {
        $fullName=FullNameFactory::toCreate($firstName,$lastName);

        if($contactTypeCollection->count()<1){
            throw new EmptyValueException("Contacto");
        }
      return new  static(new ContactId($id),$fullName,$contactTypeCollection);
    }

    /**
     * @throws EmptyValueException
     */
    public static function toBasic(string $contactId):Contact{

    $fullName=FullNameFactory::toRead('','');

    return new ContactImpl(
                new ContactId($contactId)
                ,$fullName
            ,ContactTypeCollection::init()
            );
}
    /**
     * @throws EmptyValueException
     */
    public static function toRead(
        string $id,
        string $firstName,
        string $lastName,
        ContactTypeCollection $contactTypeCollection):Contact
    {
        $fullName=FullNameFactory::toRead($firstName,$lastName);

        return  new  static(new ContactId($id),$fullName, $contactTypeCollection);
    }

    public function getId(): ContactId
    {
        return $this->id;
    }

    public function getFullName(): FullNameInterface
    {
        return $this->fullName;
    }

    public function getContactCollection(): ContactTypeCollection
    {
        return $this->contactTypeCollection;
    }
}