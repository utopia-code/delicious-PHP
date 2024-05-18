<?php

require 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

$scss = new Compiler();

$inputFile = 'public/scss/style.scss';

$outputFile = 'public/style.css';

file_put_contents($outputFile, $scss->compile(file_get_contents($inputFile)));