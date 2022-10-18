<?php


namespace ContactList\Application\DTOs\Response;




use ContactList\CoreDomain\Entities\Contact\Contact;

class ContactResponse
{
       private string $id;

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
       private string $firstName;
       private string $lastName;

    public function __construct(Contact $contact)
    {
        $this->id = $contact->getId()->value();
        $this->firstName = $contact->getFullName()->getFirstName();
        $this->lastName = $contact->getFullName()->getLastName();

    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];
    }
}