<?php

namespace ContactList\Infrastructure\Controllers;

use ContactList\Application\DTOs\Request\GetContactsRequest;
use ContactList\Application\Queries\GetContactsHandler;
use Exception;
use Shared\CoreDomain\Exceptions\DomainException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetContactController
{

    private GetContactsHandler $contactsHandler;

    public function __construct(GetContactsHandler $contactsHandler )
    {

        $this->contactsHandler = $contactsHandler;
    }

    public function __invoke(Request $request)
    {
        try {
            $pageNumber=(int)$request->get('page');

            $contacts = ($this->contactsHandler)(
                new GetContactsRequest($pageNumber));

            $response = new JsonResponse(
                [
                    'data' =>
                        $contacts->toArray(),

                ],
                status: 200);

        } catch (DomainException $e) {
            $response = new JsonResponse([
                'code' => $e->getDomainCode(),
                'msn' => $e->getMsn()
            ], 400);
        }
        catch (Exception $e) {
            $response = new JsonResponse([
                'code' => $e->getCode(),
                'error'=>$e->getMessage(),
                'msn' => 'Error interno #['.$e->getCode(). '] notificar a soporte técnico de la app.'
            ], 500);
        }

        return $response;

    }
}