<?php

namespace ContactList\CoreDomain\Entities\Contact\ContactType;

use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactId;
use ContactList\CoreDomain\Entities\Contact\ContactType\Email\EmailImpl;
use ContactList\CoreDomain\Entities\Contact\ContactType\PhoneNumber\PhoneNumberImpl;
use ContactList\CoreDomain\Entities\Contact\ContactType\Undefined\UndefinedImpl;
use Shared\CoreDomain\Exceptions\EmptyValueException;
use Shared\CoreDomain\Exceptions\FormatValueException;

class ContactTypeFactory implements ContactType
{

    public function __construct(
        private readonly ContactTypeId $id
        ,private readonly string $value
        ,private readonly ContactTypeEnum $contactTypeEnum
        ,private readonly string $description
        ,private readonly Contact $contact
    ){}

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @throws EmptyValueException
     * @throws FormatValueException
     */
    public static function toCreate(
            Contact $contact,
            string $id,
            string $type,
            string $value,
            string $description
    ): static
    {

        $contactType= match ($type) {
            ContactTypeEnum::PHONE->value() => PhoneNumberImpl::toCreate($contact,$id,$value, $description),
            ContactTypeEnum::EMAIL->value() => EmailImpl::toCreate($contact,$id,$value, $description),

            default => UndefinedImpl::toCreate(
                $contact
                ,$id
                ,$value
                ,$description),
        };

        return new  static(
            $contactType->getId()
            ,$contactType->getValue()
            ,$contactType->getType()
            ,$contactType->getDescription()
            ,$contact
        );
    }

    /**
     * @throws EmptyValueException
     */
    public static function toRead(
        Contact $contact,
        string $id,
        string $type,
        string $value,
        string $description
    ):static
    {

        $contactType= match ($type) {
            ContactTypeEnum::PHONE->value() => PhoneNumberImpl::toRead($contact,$id,$value, $description),
            ContactTypeEnum::EMAIL->value() => EmailImpl::toRead($contact,$id,$value, $description),

            default => UndefinedImpl::toRead(
                $contact
                ,$id
                ,$value
                ,$description),
        };

        return new  static(
            $contactType->getId()
            ,$contactType->getValue()
            ,$contactType->getType()
            ,$contactType->getDescription()
            ,$contact
        );

    }

    public function getId(): ContactTypeId
    {
       return $this->id;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getType(): ContactTypeEnum
    {
        return $this->contactTypeEnum;
    }
}