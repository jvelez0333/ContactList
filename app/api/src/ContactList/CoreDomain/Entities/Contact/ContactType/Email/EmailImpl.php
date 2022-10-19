<?php



namespace ContactList\CoreDomain\Entities\Contact\ContactType\Email;

use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeEnum;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeId;
use Shared\CoreDomain\Exceptions\EmptyValueException;

class EmailImpl implements Email
{
    public function __construct(
        private readonly Contact $contact
        ,private readonly ContactTypeId $id
        ,private readonly string $email
        ,private readonly string $description
    ){}

    /**
     * @param string $id
     * @param string $email
     * @param string $description
     * @return Email
     * @throws EmptyValueException
     */
    public static function toCreate(Contact $contact,string $id, string $email, string $description):Email{
        if(empty($email)){
            throw new EmptyValueException("Email");
        }

        return new static($contact,new ContactTypeId($id), $email,$description);
    }

    /**
     * @throws EmptyValueException
     */
    public static function toRead(Contact $contact,string $id, string $email, string $description):Email{
        return new static($contact,new ContactTypeId($id),$email,$description);
    }
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->email;
    }
    public function getType(): ContactTypeEnum
    {
        return ContactTypeEnum::EMAIL;
    }
    public function getId():ContactTypeId{
        return $this->id;
    }

    public function getContact(): Contact
    {
       return $this->contact;
    }
}