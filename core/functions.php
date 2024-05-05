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