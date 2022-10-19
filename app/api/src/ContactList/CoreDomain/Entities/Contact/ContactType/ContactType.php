<?php

namespace ContactList\CoreDomain\Entities\Contact\ContactType;

use ContactList\CoreDomain\Entities\Contact\Contact;

interface ContactType
{
    public function getContact():Contact;
    /**
     * @return ContactTypeId
     */
    public function getId():ContactTypeId;

    /**
     * @return string
     */
    public function getValue():string;

    /**
     * @return string
     */
    public function getDescription():string;

    /**
     * @return ContactTypeEnum
     */
    public function getType():ContactTypeEnum;
}