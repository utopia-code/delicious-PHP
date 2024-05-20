<?php

$router->define([
  '' => 'controllers/index.php',
  'activity2' => 'controllers/activity_2.php',
  'recipes' => 'controllers/recipes.php',
  'recipe' => 'controllers/post.php',
  'login' => 'controllers/login.php',
  'signup' => 'controllers/signup.php',
  'edit' => 'controllers/edit.php',
  'logout' => 'controllers/logout.php',
  'api/recipes/(\d+)' => 'api/recipesAPI.php',
  'api/recipe/(\d+)' => 'api/recipeAPI.php',
]);
