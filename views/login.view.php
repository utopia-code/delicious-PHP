<?php require('partials/head.php'); ?>

<h1>Login</h1>

<?php if (isset($error)) : ?>
  <p class="error-message"><?php echo $error; ?></p>
<?php endif; ?>

<form action="login" method="POST">
  <div>
    <label for="username">Usuario</label>
    <input type="text" id="username" name="username"></input>
  </div>
  
  <div>
    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password"></input>
  </div>

  <button type="submit">Login</button>
</form>

<?php require('partials/footer.php'); ?>