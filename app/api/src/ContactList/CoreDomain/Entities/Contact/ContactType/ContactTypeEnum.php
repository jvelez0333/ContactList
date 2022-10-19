<?php

namespace ContactList\CoreDomain\Entities\Contact\ContactType;


enum ContactTypeEnum {
    case PHONE;
    case EMAIL;
    case UNDEFINED ;

    public function value(): string
    {
        return match($this)
        {
            ContactTypeEnum::PHONE => 'phone',
            ContactTypeEnum::EMAIL => 'email',
            ContactTypeEnum::UNDEFINED => 'undefined',
        };
    }

}