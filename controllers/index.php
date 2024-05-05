<?php

$recipes = $app['database']->selectAll('receta_php');

$latest_recipes = getLatest($recipes, 5);



require 'views/index.view.php';