<?php

namespace ContactList\Infrastructure\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetContactController
{

    public function __construct()
    {

    }

    public function __invoke()
    {
        return new JsonResponse([
            'status' => 'ok',
        ]);
    }
}