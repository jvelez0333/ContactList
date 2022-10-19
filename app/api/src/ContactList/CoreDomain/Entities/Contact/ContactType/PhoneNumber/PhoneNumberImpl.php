<?php



namespace ContactList\CoreDomain\Entities\Contact\ContactType\PhoneNumber;


use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeEnum;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeId;
use Shared\CoreDomain\Exceptions\EmptyValueException;
use Shared\CoreDomain\Exceptions\FormatValueException;

class PhoneNumberImpl implements PhoneNumber
{
    /**
     * @param ContactTypeId $id
     * @param string $phoneNumber
     * @param string $description
     */
    public function __construct(
        private readonly Contact $contact
        ,private readonly ContactTypeId $id
        ,private readonly string $phoneNumber
        ,private readonly string $description
    ){}

    /**
     * @return ContactTypeId
     */
    public function getId(): ContactTypeId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public static function toCreate(Contact $contact ,string $id, string $phoneNumber,string $description):PhoneNumber{

        if(empty($phoneNumber)){
            throw new EmptyValueException("Teléfono");
        }
        if(!is_numeric($phoneNumber)){
            throw new FormatValueException('Teléfono','sólo números, sin guión, ni otros caracteres.');
        }
        return new static( $contact, new ContactTypeId($id), $phoneNumber,$description);
    }

    /**
     * @throws EmptyValueException
     */
    public static function toRead(Contact $contact, string $id, string $phoneNumber, string $description):PhoneNumber{
        return new static($contact, new ContactTypeId($id),$phoneNumber,$description);
    }
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->phoneNumber;
    }
    public function getType():ContactTypeEnum{
        return ContactTypeEnum::PHONE;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }
}