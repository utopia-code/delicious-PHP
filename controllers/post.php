<?php

$recipes = $app['database']->selectAll('receta_php');

foreach ($recipes as $item) {
  if (($item->id + 1) === (int)$_GET['id']) {
    $recipe = $item;
  }
}



require 'views/post.view.php';