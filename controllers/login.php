<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $user = $app['database']->selectByUsername('users_pec3', $username);

  $password_db = password_hash($user->password, PASSWORD_BCRYPT);

  if ($user && password_verify($password, $password_db)) {
    $_SESSION['username'] = $user->name;
    header("Location: /delicious_php");
    exit();
  } else {
    $error = "Incorrect credentials";
  }

}

require 'views/login.view.php';