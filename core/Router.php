<?php

class Router {

  protected $routes = [];

  public static function load($file) {
    $router = new static;
    require $file;
    return $router;
  }

  public function define($routes) {
    $this->routes = $routes;
  }

  public function direct($uri) {
    foreach ($this->routes as $route => $controller) {
      if (preg_match('#^' . $route . '$#', $uri, $matches)) {
        array_shift($matches); 
        return [$controller, $matches];
      }
    }
    throw new Exception('No route defined for this URI');
  }
}