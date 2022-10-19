<?php



namespace ContactList\Infrastructure\Persistence\Doctrine\Entity;


use ContactList\CoreDomain\Entities\Contact\Contact as ContactDomain;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;



class Contact
{
    public string $id;
    public string $firstName;
    public  string $lastName;
    public Collection $contactCollection;

    /**
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @param Collection $contactCollection
     */
    public function __construct(string $id, string $firstName, string $lastName, Collection $contactCollection)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->contactCollection = $contactCollection;
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


    public static function fromDomain(ContactDomain $contact): Contact
    {

        $contactTypes= new ArrayCollection();

        $contactCollection=$contact->getContactCollection();


        if(!$contactCollection->isEmpty()){
            foreach ($contact->getContactCollection()->getCollection() as $contactTypeDomain){
                $contactTypeEntity=ContactType::fromDomain($contactTypeDomain);

                $contactTypes->add($contactTypeEntity);
            }
        }

      return new  Contact(
            $contact->getId()->value(),
            $contact->getFullName()->getFirstName(),
            $contact->getFullName()->getLastName(),
            $contactTypes
        );
    }
}