<?php

$page = isset($params[0]) ? (int)$params[0] : 1;
$perPage = 10;
$startIndex = ($page - 1) * $perPage;

$recipes = $app['database']->selectByPage('receta_php', $startIndex, $perPage);

header('Content-Type: application/json');
echo json_encode($recipes);