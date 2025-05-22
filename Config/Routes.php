<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Tugas::index');

// rute untuk halaman login
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');

// rute untuk halaman tugas
$routes->get('/tugas', 'Tugas::index');
$routes->get('/tugas/tambah', 'Tugas::tambah');
$routes->post('/tugas/tambah', 'Tugas::tambah');
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1');
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1');
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1');
