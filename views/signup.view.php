<?php require('partials/head.php'); ?>

<h1>Registro de Usuario</h1>

<?php if (isset($error)) : ?>
  <p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>

<form class="form-column" action="signup" method="POST">
  <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br>
  </div>

  <div>
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name"><br>
  </div>

  <div>
    <label for="surname">Apellidos:</label>
    <input type="text" id="surname" name="surname"><br>
  </div>

  <div>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br>
  </div>

  <div>
    <label for="confirm_password">Confirmar Contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br>
  </div>

  <button class="button primary" type="submit">Registrarse</button>
</form>

<?php require('partials/footer.php'); ?>