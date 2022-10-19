<?php



namespace ContactList\CoreDomain\Entities\Contact\ContactType\Undefined;

use ContactList\CoreDomain\Entities\Contact\Contact;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeEnum;
use ContactList\CoreDomain\Entities\Contact\ContactType\ContactTypeId;
use Shared\CoreDomain\Exceptions\EmptyValueException;

class UndefinedImpl implements Undefined
{
    public function __construct(
        private readonly Contact $contact
        ,private readonly ContactTypeId $id
        ,private readonly string $value
        ,private readonly string $description
    ){}

    /**
     * @param string $id
     * @param string $value
     * @param string $description
     * @return Undefined
     * @throws EmptyValueException
     */
    public static function toCreate(Contact $contact, string $id, string $value, string $description): Undefined
    {

        if(empty($value)){
            throw new EmptyValueException("NI");
        }

        return new static($contact,new ContactTypeId($id), $value,$description);
    }

    /**
     * @throws EmptyValueException
     */
    public static function toRead(Contact $contact, string $id, string $value, string $description):Undefined{
        return new static($contact,new ContactTypeId($id),$value,$description);
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
        return $this->value;
    }
    public function getType(): ContactTypeEnum
    {
        return ContactTypeEnum::UNDEFINED;
    }
    public function getId():ContactTypeId{
        return $this->id;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }
}