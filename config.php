<?php

return [
  'database' => [
    'name' => 'db_delicious_php',
    'username' => 'user_delicious_php',
    'password' => 'root',
    'connection' => 'mysql:host=localhost',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]
  ]
];