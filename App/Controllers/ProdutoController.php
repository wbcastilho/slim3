<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\LojasDAO;

final class ProdutoController
{
    public function getProdutos(Request $request, Response $response, array $args) : Response
    {
        $response = $response->withJson([
            'message'=>'Hello World'
        ]);

        return $response;
    }

    public function inserProduto(Request $request, Response $response, array $args) : Response
    {
        $response = $response->withJson([
            'message'=>'Hello World'
        ]);

        return $response;
    }

    public function updateProduto(Request $request, Response $response, array $args) : Response
    {
        $response = $response->withJson([
            'message'=>'Hello World'
        ]);

        return $response;
    }

    public function deleteProduto(Request $request, Response $response, array $args) : Response
    {
        $response = $response->withJson([
            'message'=>'Hello World'
        ]);
        
        return $response;
    }
}