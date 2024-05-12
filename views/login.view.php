<?php require('partials/head.php'); ?>

<h1>Login</h1>

<?php if (isset($error)) : ?>
  <p><?php echo $error; ?></p>
<?php endif; ?>

<form action="login" method="POST">
  <div>
    <label for="username">Usuario</label>
    <input type="text" id="username" name="username" required></input>
  </div>
  
  <div>
    <label for="password">Contraseña</label>
    <input type="text" id="password" name="password" required></input>
  </div>

  <button type="submit">Login</button>
</form>

<?php require('partials/footer.php'); ?>