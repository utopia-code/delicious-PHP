<?php

$id = isset($params[0]) ? (int)$params[0] : 1;

$recipe = $app['database']->selectById('receta_php', $id);

if ($recipe) {
    header('Content-Type: application/json');
    echo json_encode($recipe);
} else {
    echo json_encode(['error' => 'Receta no encontrada']);
}
