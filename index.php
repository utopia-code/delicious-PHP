<?php

require 'core/bootstrap.php';

list($controller, $params) = Router::load('routes.php')->direct(Request::uri());

if (file_exists($controller)) {
    require $controller;
} else {
    throw new Exception('Controller not found');
}