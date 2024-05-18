<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = trim($_POST['username']);
  $name = trim($_POST['name']);
  $surname = trim($_POST['surname']);
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  if(empty($username) 
    || empty($name) 
    || empty($surname) 
    || empty($password) 
    || empty($confirm_password))  
  {
    $error = "Todos los campos son obligatorios";
  } else {
    if ($password !== $confirm_password) {
      $error = "Las contraseñas no se corresponden";
    } else {
      $isUserDB = $app['database']->selectByUsername('users_pec3', $username);
      
      if ($isUserDB) {
        $error = "El nombre de usuario no está disponible";
  
      } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
  
        $app['database']->insertUser('users_pec3', [
          'username' => $username,
          'name' => $name,
          'surname' => $surname,
          'password' => $hashed_password
        ]);
        
        header("Location: login");
        exit();
      }
    }

  }
  
}

require 'views/signup.view.php';