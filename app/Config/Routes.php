<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group("api-test-edii/api", function ($routes) {
  $routes->post("register", "RegisterController::index");
  $routes->post("login", "LoginController::index");
  $routes->get("data", "ProfileController::index", ['filter' => 'authFilter']);
  $routes->post("entry", "ProfileController::entry", ['filter' => 'authFilter']);
  $routes->put("update", "ProfileController::update", ['filter' => 'authFilter']);
  $routes->delete("delete", "ProfileController::delete", ['filter' => 'authFilter']);
});
