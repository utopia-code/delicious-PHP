<?php

$recipes = $app['database']->selectAll('receta_php');

foreach ($recipes as $recipe) {

    if ($recipe->id === 7) {
        // var_dump(convertInMinutes($recipe->cooking_time));

        // var_dump(str_replace('\r\n','<br/>', $recipe->ingredients));
    }
    
}



require 'views/activity_2.view.php';