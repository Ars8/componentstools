<?php
// Start a Session
if (!session_id()) @session_start();


require '../vendor/autoload.php';

use Delight\Auth\Auth;
use DI\ContainerBuilder;
use League\Plates\Engine;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
    Engine::class => function () {
        return new Engine('../app/views');
    },

    PDO::class => function () {
        $driver = "mysql";
        $host = "localhost";
        $database_name = "app3";
        $username = "root";
        $password = "root";

        return new PDO("$driver:host=$host;dbname=$database_name", $username, $password);
    },

    Auth::class => function ($container) {
        return new Auth($container->get('PDO'));
    },
]);
$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/componentstools/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/componentstools/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/componentstools/verification', ['App\controllers\HomeController', 'email_verification']);
    $r->addRoute('GET', '/componentstools/login', ['App\controllers\HomeController', 'login']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        break;
}
