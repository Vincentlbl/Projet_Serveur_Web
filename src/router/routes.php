<?php

// Retirez "use AltoRouter" si vous utilisez "\AltoRouter" directement
$router = new \AltoRouter();

// Définir le chemin de base
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Définition des routes principales
$router->map('GET', '/', 'App\Controllers\MainController#home', 'home');
$router->map('GET', '/catalog', 'App\Controllers\MainController#catalog', 'catalog');
$router->map('GET', '/login', 'App\Controllers\MainController#login', 'login');
$router->map('GET', '/register', 'App\Controllers\MainController#register', 'register');
$router->map('GET', '/products', 'App\Controllers\MainController#productList', 'product_list');
$router->map('GET', '/product', 'App\Controllers\MainController#product', 'product');
$router->map('GET', '/test-db', 'App\Controllers\MainController#testDatabase', 'test_database');

// Routes pour le panier (cart)
$router->map('GET|POST', '/cart', 'App\Controllers\MainController#cart', 'cart'); // Route principale du panier
$router->map('POST', '/cart?action=remove', 'App\Controllers\MainController#removeFromCart', 'cart_remove'); // Supprimer un produit
$router->map('POST', '/cart?action=applyPromo', 'App\Controllers\MainController#applyPromo', 'cart_promo'); // Appliquer un code promo

// Route pour valider le panier
$router->map('POST', '/checkout', 'App\Controllers\MainController#checkout', 'checkout');

return $router;
