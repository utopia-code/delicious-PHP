<?php

$recipes = $app['database']->selectAll('receta_php');

$recipesPerPage = 5;
$totalRecipes = count($recipes);
$totalPages = ceil($totalRecipes / $recipesPerPage);

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

$startIndex = ($currentPage - 1) * $recipesPerPage;
$endIndex = $startIndex + $recipesPerPage;
$recipesPerPageInView = array_slice($recipes, $startIndex, $recipesPerPage);



require 'views/recipes.view.php';