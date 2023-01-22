<?php

    use DESIGN_PATTERN\Inc\Controllers\LoginController;
    use DESIGN_PATTERN\Inc\Controllers\RegisterController;

    // Base route class
    use DESIGN_PATTERN\Inc\Facades\Route;

    $routes = new Route();
    
    $routes->get('/login', LoginController::class);
    $routes->get('/register', RegisterController::class, 'login');

    // TODO: Support POST, PATCH & DELETE request 