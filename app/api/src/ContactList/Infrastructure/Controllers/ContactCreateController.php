<?php

namespace ContactList\Infrastructure\Controllers;


use ContactList\Application\Commands\ContactCreateHandler;
use ContactList\Application\DTOs\Request\ContactCreateRequest;

use Exception;

use Shared\CoreDomain\Exceptions\DomainException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactCreateController
{
    private ContactCreateHandler $contactCreateHandler;

    public function __construct(ContactCreateHandler $contactCreateHandler)
    {

        $this->contactCreateHandler = $contactCreateHandler;
    }

    public function __invoke(Request $request):  Response
    {
        //dita...
        $data = $request->toArray();
        $newContact = ($this->contactCreateHandler)(new ContactCreateRequest(
            (string)$data['id'],
            (string)$data['firstName'],
            (string)$data['lastName'],
            $data['contacts'],
        ));
        try {


            $response = new Response(status: 201);

        } catch (DomainException $e) {
            $response = new JsonResponse([
                'code' => $e->getDomainCode(),
                'msn' => $e->getMsn()
            ], 400);
        } catch (Exception $e) {

            if($e->getCode()==1062){
                $response = new JsonResponse([
                    'code' => $e->getCode(),
                    'msn' => 'El id [ '.$data['id'].' ] ya está registrado'
                ], 400);
            }else{
                $response = new JsonResponse([
                    'code' => $e->getCode(),
                    'exc' => $e->getMessage(),
                    'msn' => 'Error #[ '.$e->getCode().' ] contacte al administrador del sistema.'
                ], 500);
            }

        }
        return $response;
    }
}