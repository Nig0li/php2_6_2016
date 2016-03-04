<?php

require __DIR__ . '/autoload.php';

$router = new \App\Components\Router();
$route = $router->process($_GET);
$controllerName = $route['controller'];
$actionName = $route['action'];

$controller = new $controllerName();
$setError = new \App\Controllers\Error();

try {
    $controller->action($actionName);
} catch (\App\Exceptions\Db $e) {
    $setError->actionDbError($e);
} catch (\App\Exceptions\E404 $e) {
    $setError->actionE404($e);
}