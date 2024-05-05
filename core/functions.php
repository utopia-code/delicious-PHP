<?php

function convertInMinutes($time) {
    $timesplit = explode(':', $time);
    $min = ($timesplit[0] * 60) + ($timesplit[1]) + ($timesplit[2] > 30 ? 1 : 0);
    return $min.' Min'; 
}