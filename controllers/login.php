<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if(empty($username) || empty($password)) {
    $error = "Todos los campos son obligatorios";
  } else {
    $user = $app['database']->selectByUsername('users_pec3', $username);

    if ($user && password_verify($password, $user->password)) {
    
      session_start();
      $_SESSION['username'] = $user->name;
  
      header("Location: /delicious_php");
      exit();
  
    } else {
      $error = "Las credenciales son incorrectas";
    }
  
  }

}


require 'views/login.view.php';
