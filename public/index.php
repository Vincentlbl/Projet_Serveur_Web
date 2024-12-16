<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = require_once __DIR__ . '/../src/router/routes.php';

$match = $router->match();

if ($match) {
    [$controllerClass, $method] = explode('#', $match['target']);
    
    if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
        $controller = new $controllerClass();
        call_user_func_array([$controller, $method], $match['params']);
    } else {
        http_response_code(404);
        echo "Erreur 404 - Contrôleur ou méthode introuvable.";
    }
} else {
    http_response_code(404);
    echo "Erreur 404 - Page introuvable.";
}
