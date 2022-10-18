<?php

namespace Shared\CoreDomain\Exceptions;

use Exception;

abstract class DomainException extends Exception
{
    public function __construct(private string $domainCode, private string $msn)
    {
        parent::__construct(
           $this->msn
        );
    }
    /**
     * @return string
     */
    public function getDomainCode(): string
    {
        return $this->domainCode;
    }
    /**
     * @return string
     */
    public function getMsn(): string
    {
        return $this->msn;
    }
}