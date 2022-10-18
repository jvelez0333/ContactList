<?php



namespace ContactList\Infrastructure\Persistence\Doctrine\Entity;


use ContactList\CoreDomain\Entities\Contact\Contact as ContactDomain;
use ContactList\CoreDomain\Entities\Contact\ContactImpl;

class Contact
{
    public function __construct(
        private string $id,
        private string $firstName,
        private string $lastName
    ){}

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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function toDomain(): ContactDomain
    {
        return ContactImpl::toReadFromPrimitive(
            $this->getId(),
            $this->firstName,
            $this->lastName
        );
    }
    public static function fromDomain(ContactDomain $contact): static
    {
        return new  static(
            $contact->getId()->value(),
            $contact->getFullName()->getFirstName(),
            $contact->getFullName()->getLastName(),
        );
    }

}