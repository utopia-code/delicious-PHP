<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
</head>
<body>

<?php require('nav.php'); ?>


<?php if (isset($_SESSION['username'])) : ?>
    <h1>Bienvenido/a, <?= $_SESSION['username'] ?> </h1>
<?php endif ?>