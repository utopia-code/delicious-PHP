<?php

class Request {
  public static function uri() {
      $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
      $basePath = trim(getenv('BASE_URL'), '/');

      if ($basePath && strpos($uri, $basePath) === 0) {
          $uri = substr($uri, strlen($basePath));
      }
      return trim($uri, '/');
  }
}
