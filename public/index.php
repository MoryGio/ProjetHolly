<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

session_start();

            //print_r($_SESSION); // Pour le debug, affiche la session utilisateur

// Table des routes minimaliste
$routes = [
    ['GET', '/', [Mini\Controllers\HomeController::class, 'acceuil']],
    ['GET', '/users', [Mini\Controllers\HomeController::class, 'users']],
    ['GET', '/acceuil', [Mini\Controllers\HomeController::class, 'acceuil']],
    ['GET', '/produit', [Mini\Controllers\HomeController::class, 'FicheProduit']],
    ['GET', '/nosproduits', [Mini\Controllers\HomeController::class, 'nosproduits']],
    ['GET', '/contact', [Mini\Controllers\HomeController::class, 'contact']],
    ['GET', '/identification', [Mini\Controllers\HomeController::class, 'identification']],
    ['GET', '/cart', [Mini\Controllers\CartController::class, 'index']],
    // Panier

    // Authentification
    ['POST', '/auth/register', [Mini\Controllers\RegisterController::class, 'register']],
    ['GET', '/auth/deconnexion', [Mini\Controllers\RegisterController::class, 'deconnexion']],
    ['POST', '/auth/cart', [Mini\Controllers\RegisterController::class, 'show']],
    ['POST', '/cart/add-from-form', [Mini\Controllers\CartController::class, 'addFromForm']],
    ['POST', '/cart/update', [Mini\Controllers\CartController::class, 'update']],
    ['POST', '/cart/remove', [Mini\Controllers\CartController::class, 'remove']],
    ['POST', '/cart/clear', [Mini\Controllers\CartController::class, 'clear']],
    ['GET', '/cart/show', [Mini\Controllers\CartController::class, 'show']],

    
    //deconnexion
];

// Bootstrap du router
$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


