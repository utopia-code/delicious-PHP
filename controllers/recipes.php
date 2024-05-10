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



$sortByName = $_GET['name'] ?? null;

if ($sortByName) {

    $sortRecipesByName = sortByName($recipes, $sortByName);

    $recipesPerPageInView = $sortByName;
}



$sortByCookingTime = $_GET['cooking_time'] ?? null;

if ($sortByCookingTime) {

    $sortRecipesByCookingTime = sortByPreparationTime($recipes, $sortByCookingTime);

    $recipesPerPageInView = $sortRecipesByCookingTime;
} 


$filterByCategory = $_GET['category'] ?? null;

if ($filterByCategory) {

    $filterRecipesByCategory = filterByCategory($recipes, $filterByCategory);

    $recipesPerPageInView = $filterRecipesByCategory;
} 

$filterByDifficultyLevel = $_GET['difficulty_level'] ?? null;

if ($filterByDifficultyLevel) {

    $filterRecipesByDifficultyLevel = filterByDifficultyLevel($recipes, $filterByDifficultyLevel);

    $recipesPerPageInView = $filterRecipesByDifficultyLevel;
} 





require 'views/recipes.view.php';