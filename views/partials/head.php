<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="public/style.css">
</head>
<body>

<?php require('nav.php'); ?>

<div class="container">

<?php if (isset($_SESSION['username'])) : ?>
    <h2 class="user-session">Bienvenido/a, <?= $_SESSION['username'] ?> </h2>
<?php endif ?>