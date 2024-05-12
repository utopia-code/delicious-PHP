<nav>
  <ul>
    <li><a href="/delicious_php">Home</a></li>
    <li><a href="/delicious_php/activity2">Act_2</a></li>
    <li><a href="/delicious_php/recipes">Recetas</a></li>
    <li><a href="/delicious_php/api/recipes/1" target="_blank">API_recetas</a></li>
    <li><a href="/delicious_php/api/recipe/1" target="_blank">API_receta</a></li>

    <?php if (!isset($_SESSION['username'])) : ?>
      <li><a href="/delicious_php/login">Login</a></li>
      <li><a href="/delicious_php/signup">Sign up</a></li>
    <?php else : ?>
      <li><a href="/delicious_php/edit">Perfil de usuario</a></li>
      <li><a href="/delicious_php/logout">Logout</a></li>
    <?php endif; ?>

  </ul>
</nav>