<?php

function convertInMinutes($time) {
  $timesplit = explode(':', $time);
  $min = ($timesplit[0] * 60) + ($timesplit[1]) + ($timesplit[2] > 30 ? 1 : 0);
  return $min.' Min'; 
}


function getLatest($item, $amount) {
  usort($item, function($a, $b) {
    return strtotime($b->date) - strtotime($a->date);
  });
    
  return array_slice($item, 0, $amount);
}


function setMaxWordsInView($text) {
  $totalWordsInText = explode(' ', $text);
  return  implode(' ', array_slice($totalWordsInText, 0, 30));
}


function sortByName($table, $order = 'asc') {
  usort($table, function($a, $b) use ($order) {
    if ($order === 'asc') {
      return strcmp($a->name, $b->name);
    } else {
      return strcmp($b->name, $a->name);
    }
  });

  return $table;
}


function sortByPreparationTime($table, $order = 'asc') {
  usort($table, function($a, $b) use ($order) {
    if ($order === 'asc') {
      return strtotime($a->cooking_time) - strtotime($b->cooking_time);
    } else {
      return strtotime($b->cooking_time) - strtotime($a->cooking_time);
    }
  });

  return $table;
}


function filterByCategory($table, $filter) {
  $filteredRecipes = array_filter($table, function ($recipe) use ($filter) {
      return $recipe->category === $filter;
  });

  return $filteredRecipes;
}


function filterByDifficultyLevel($table, $filter) {
  $filteredRecipes = array_filter($table, function ($recipe) use ($filter) {
      return $recipe->difficulty_level === $filter;
  });

  return $filteredRecipes;
}
