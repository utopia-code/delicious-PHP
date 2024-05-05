<?php

$recipes = $app['database']->selectAll('receta_php');

require 'views/activity_2.view.php';