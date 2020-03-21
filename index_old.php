<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);

$mid01 = function(Request $request, Response $response, $next){
    $response->getBody()->write("DENTRO DO MIDDLEWARE 01<br>");
    $response = $next($request, $response);
    $response->getBody()->write("<br>DENTRO DO MIDDLEWARE 02");

    return $response;
};

$app->get('/', function (Request $request, Response $response, array $args) {       
    $response->getBody()->write("Hello");

    return $response;
});

$app->get('/hello/[{name}]', function (Request $request, Response $response, array $args) {    
    $name = isset($args['name']) ?? "";

    $response->getBody()->write("Hello $name");

    return $response;
});

$app->get('/produtos[/{nome}]', function (Request $request, Response $response, array $args) {    
    $limit = $request->getQueryParams()['limit'] ?? 10; //GET
    //$limit = $_GET["limit"];

    $nome = $args['nome'] ?? 'mouse';

    $response->getBody()->write("{$limit} Produtos com o nome {$nome}");

    return $response;
});

//POST que chama um middleware
$app->post('/produto', function (Request $request, Response $response, array $args) : Response {    
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    $response->getBody()->write("Produto {$nome} (POST)");

    return $response; 
})->add($mid01);

$app->put('/produto', function (Request $request, Response $response, array $args) {    
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write("Produto {$nome} (PUT)");
});

$app->delete('/produto', function (Request $request, Response $response, array $args) {    
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write("Produto {$nome} (DELETE)");
});

$app->run();

?>