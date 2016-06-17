<?php

// Add routes: httpMethod, route, handler
$routes = [];

// Default page
$routes[] = ['GET', '/', 'App\Controller\IndexController->index'];

// JSON-RPC 2.0 handler
$routes[] = ['POST', '/rpc', 'App\Controller\RpcController->index'];

// Controller action
// Object method call with Class->method
$routes[] = ['GET', '/users', 'App\Controller\UserController->index'];

// {id} must be a number (\d+)
$routes[] = ['GET', '/user/{id:\d+}', 'App\Controller\UserController->edit'];

return $routes;
