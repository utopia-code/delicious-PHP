<?php

$baseUrl = getenv('BASE_URL');

$menu_default = [
  [
    'url' => $baseUrl,
    'name' => 'Home',
    'target' => ''
  ],
  [
    'url' => 'activity2',
    'name' => 'Act_2',
    'target' => ''
  ],
  [
    'url' => 'recipes',
    'name' => 'Recetas',
    'target' => ''
  ],
  [
    'url' => 'api/recipes/1',
    'name' => 'API_recetas',
    'target' => '_blank'
  ],
  [
    'url' => 'api/recipe/1',
    'name' => 'API_receta',
    'target' => '_blank'
  ],
  [
    'url' => 'login',
    'name' => 'Login',
    'target' => ''
  ],
  [
    'url' => 'signup',
    'name' => 'Sign up',
    'target' => ''
  ]
];

$menu_user = [
  [
    'url' => $baseUrl,
    'name' => 'Home',
    'target' => ''
  ],
  [
    'url' => 'activity2',
    'name' => 'Act_2',
    'target' => ''
  ],
  [
    'url' => 'recipes',
    'name' => 'Recetas',
    'target' => ''
  ],
  [
    'url' => 'api/recipes/1',
    'name' => 'API_recetas',
    'target' => '_blank'
  ],
  [
    'url' => 'api/recipe/1',
    'name' => 'API_receta',
    'target' => '_blank'
  ],
  [
    'url' => 'edit',
    'name' => 'Perfil de usuario',
    'target' => ''
  ],
  [
    'url' => 'logout',
    'name' => 'Logout',
    'target' => ''
  ]
];

$current_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

function isActive($url, $current_url) {
  global $baseUrl;

  if (empty($current_url)) {
    return '';
  }

  $current_path = parse_url($current_url, PHP_URL_PATH);
  $full_url_path = $url === $baseUrl ? $baseUrl : $baseUrl . $url;
  $menu_path = parse_url($full_url_path, PHP_URL_PATH);
  return $menu_path === $current_path ? 'class="active"' : '';
}

function setMenu($menu) {
  global $current_url;
  foreach($menu as $link) {
    echo '<li><a href="' . $link['url'] . '" ' . isActive($link['url'], $current_url). 'target="' . $link['target'] . '" >' . $link['name'] . '</a></li>';
  }
}

?>

<nav>
  <div class="icon-menu">
    <svg class="burger-menu" viewBox="0 0 120 80" width="40" height="40">
      <rect class="bar1" x="15" width="90" height="15" rx="10"></rect>
      <rect class="bar2" x="15" y="30" width="90" height="15" rx="10"></rect>
      <rect class="bar3" x="15" y="60" width="90" height="15" rx="10"></rect>
    </svg>
  </div>

  <ul>

    <?php if (!isset($_SESSION['username'])) : ?>
      <?= setMenu($menu_default) ?>
    <?php else : ?>
      <?= setMenu($menu_user) ?>
    <?php endif; ?>

  </ul>
</nav>

<script>
  document.querySelector('.icon-menu').addEventListener('click', function() {
    document.querySelector('nav ul').classList.toggle('is-open');
    document.querySelector('.burger-menu').classList.toggle('open');
  });
</script>
