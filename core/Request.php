<?php

class Request {
  public static function uri() {
      $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
      $basePath = 'delicious_php'; 
      if (strpos($uri, $basePath) === 0) {
          $uri = substr($uri, strlen($basePath));
      }
      $uri = trim($uri, '/');
      return $uri;
  }
}