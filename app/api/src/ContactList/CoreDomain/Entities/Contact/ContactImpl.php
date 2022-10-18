<?php

namespace ContactList\CoreDomain\Entities\Contact;

use ContactList\CoreDomain\Entities\Contact\FullName\FullNameFactory;
use ContactList\CoreDomain\Entities\Contact\FullName\FullNameInterface;

class ContactImpl implements Contact
{
    public function __construct(
        private ContactId $id,
        private FullNameInterface $fullName)
    {

    }
    /*
     * Permite obtener una instancia de [contacto] CON validaciones de creación, a partir de datos primitivos.
     */
    public static function toCreateFromPrimitive(
        string $id,
        string $firstName,
        string $lastName):ContactImpl
    {
        $id= new ContactId($id);

        $fullName=FullNameFactory::toCreate($firstName,$lastName);

        return  new  ContactImpl($id,$fullName);
    }
    /*
    * Permite obtener una instancia de [contacto] SIN validaciones, a partir de datos primitivos.
    */
    public static function toReadFromPrimitive(
        string $id,
        string $firstName,
        string $lastName):ContactImpl
    {
        $id= new ContactId($id);

        $fullName=FullNameFactory::toRead($firstName,$lastName);

        return new ContactImpl($id,$fullName);
    }
    public function getId(): ContactId
    {
        return $this->id;
    }

    public function getFullName(): FullNameInterface
    {
        return $this->fullName;
    }

}