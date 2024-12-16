<?php

// Dans index.php ou config.php
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/');

// Inclure l'autoloader généré par Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Charger les routes depuis le fichier routes.php
$router = require_once __DIR__ . '/../src/router/routes.php';

// Correspondance de la route actuelle
$match = $router->match();

if ($match) {
    // Extraire le contrôleur et la méthode de la cible
    [$controllerClass, $method] = explode('#', $match['target']);
    
    // Vérifier si la classe et la méthode existent
    if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
        $controller = new $controllerClass();
        call_user_func_array([$controller, $method], $match['params']);
    } else {
        // Classe ou méthode non trouvée
        http_response_code(404);
        echo "Erreur 404 - Contrôleur ou méthode introuvable.";
    }
} else {
    // Route non correspondante
    http_response_code(404);
    echo "Erreur 404 - Page introuvable.";
}
