<?php


if (!isset($_SESSION['username'])) {
    header("Location: login");
    exit();
}

$username = $_SESSION['username'];
$user = $app['database']->selectByUsername('users_pec3', $username);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = trim($_POST['name']);
  $surname = trim($_POST['surname']);
  $password = trim($_POST['password']);
  $confirm_password = trim($_POST['confirm_password']);

  if(empty($name) || empty($surname) || empty($password) || empty($confirm_password))  {
    $error = "Todos los campos son obligatorios";
  } else {
    if ($password !== $confirm_password) {
      $error = "Las contraseñas no se corresponden";
    } else {

      $hashed_password = password_hash($password, PASSWORD_BCRYPT);
      $data = [
        'name' => $name,
        'surname' => $surname,
        'password' => $hashed_password
      ];

      $app['database']->updateUser('users_pec3', $username, $data);
      $success = "El perfil de usuario se ha actualizado correctamente";
      $user = $app['database']->selectByUsername('users_pec3', $username);
    }
  }
  
}


require 'views/edit.view.php';