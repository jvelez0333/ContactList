<?php

namespace ContactList\Infrastructure\Persistence\Doctrine\Entity;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactType as ContactTypeDomain;

class ContactType
{
    public string $id;
    public string $type;
    public string $value;
    public string $description;
    public Contact $contact;

    /**
     * @param string $id
     * @param string $type
     * @param string $value
     * @param string $description
     * @param Contact $contact
     */
    public function __construct(string $id, string $type, string $value, string $description, Contact $contact)
    {
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
        $this->description = $description;
        $this->contact = $contact;
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public static function fromDomain(ContactTypeDomain $contactType): static
    {
        return new static(
            $contactType->getId()->value(),
            $contactType->getType()->value(),
            $contactType->getValue(),
            $contactType->getDescription(),
            Contact::fromDomain($contactType->getContact())
        );
    }
}