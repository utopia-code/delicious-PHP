<?php

$baseUrl = getenv('BASE_URL');

session_start();
session_unset();
session_destroy();
header("Location: $baseUrl");
exit();

require 'views/logout.view.php';