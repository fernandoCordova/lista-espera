<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para el home
$routes->group('home', function ($routes) {
    $routes->post('iniciarSesion', 'Home::iniciarSesion');
    $routes->get('cerrarSesion', 'Home::cerrarSesion');
    $routes->post('recuperarClave', 'Home::recuperarClave');
    $routes->post('registrarUsuario', 'Home::registrarUsuario');
});

// Rutas para el dashboard
$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
