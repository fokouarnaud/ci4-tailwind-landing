<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
$routes->setAutoRoute(true);

// Home
$routes->get('/', 'Home::index');
$routes->get('about', 'About::index');
$routes->get('services', 'Services::index');
$routes->get('portfolio', 'Portfolio::index');
$routes->get('contact', 'Contact::index');

// Language switcher
$routes->get('language/(:segment)', 'Home::language/$1');

$routes->get('(:any)', 'Pages::view/$1');
