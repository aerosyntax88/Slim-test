<?php

namespace App\Http\controller;

use Psr\Http\Message\ResponseInterface;

class WelcomeController
{
    public function __invoke(ResponseInterface $response, $name)
    {
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}
