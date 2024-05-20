<?php
$baseUrl = getenv('BASE_URL');

$sortByName = $_GET['name'] ?? null;
$sortByCookingTime = $_GET['cooking_time'] ?? null;
$filterByCategory = $_GET['category'] ?? null;
$filterByDifficultyLevel = $_GET['difficulty_level'] ?? null;

$recipes = $app['database']->selectAll('receta_php');

$listOptionsDifficultyLevel = [];
foreach($recipes as $recipe) {
    if(!in_array($recipe->difficulty_level, $listOptionsDifficultyLevel)) {
        $listOptionsDifficultyLevel[] = $recipe->difficulty_level;
    }
}

$listOptionsCategories = [];
foreach($recipes as $recipe) {
    if(!in_array($recipe->category, $listOptionsCategories)) {
        $listOptionsCategories[] = $recipe->category;
    }
}

$totalListRecipes = $recipes;

if (!empty($sortByName)) {
    $totalListRecipes = sortByName($totalListRecipes, $sortByName);
}

if (!empty($sortByCookingTime)) {
    $totalListRecipes = sortByPreparationTime($totalListRecipes, $sortByCookingTime);
} 

if (!empty($filterByCategory)) {
    $totalListRecipes = filterByCategory($totalListRecipes, $filterByCategory);
} 

if (!empty($filterByDifficultyLevel)) {
    $totalListRecipes = filterByDifficultyLevel($totalListRecipes, $filterByDifficultyLevel);
} 


$recipesPerPage = 5;
$totalRecipes = count($totalListRecipes);
$totalPages = ceil($totalRecipes / $recipesPerPage);

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

$startIndex = ($currentPage - 1) * $recipesPerPage;
$endIndex = $startIndex + $recipesPerPage;
$recipesPerPageInView = array_slice($totalListRecipes, $startIndex, $recipesPerPage);




require 'views/recipes.view.php';