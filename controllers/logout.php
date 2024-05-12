<?php

session_start();
session_unset();
session_destroy();
header("Location: /delicious_php");
exit();

require 'views/logout.view.php';