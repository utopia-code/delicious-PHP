<?php

require 'core/bootstrap.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

list($controller, $params) = Router::load('routes.php')->direct(Request::uri());

if (file_exists($controller)) {
  require $controller;
} else {
  throw new Exception('Controller not found');
}