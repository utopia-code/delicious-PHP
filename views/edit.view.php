<?php require('partials/head.php'); ?>

<h1>Perfil de usuario</h1>

<?php if (isset($error)) : ?>
  <p class="error-message"><?php echo $error; ?></p>
<?php elseif (isset($success)) : ?>
  <p class="success-message"><?php echo $success; ?></p>
  <meta http-equiv="refresh" content="3;url=edit">
<?php endif; ?>

<form action="edit" method="POST">
  <div>
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="<?= $user->name; ?>"><br>
  </div>

  <div>
    <label for="surname">Apellidos:</label>
    <input type="text" id="surname" name="surname" value="<?= $user->surname; ?>"><br>
  </div>

  <div>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br>
  </div>

  <div>
    <label for="confirm_password">Confirmar Contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br>
  </div>

  <button type="submit">Actualizar Perfil</button>
</form>

<?php require('partials/footer.php'); ?>