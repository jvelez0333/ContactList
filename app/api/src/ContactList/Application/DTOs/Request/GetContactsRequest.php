<?php

namespace ContactList\Application\DTOs\Request;

class GetContactsRequest
{

    public function __construct(private int $pageNumber)
    {
    }

    /**
     * @return int
     */
    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }
}