<?php require('partials/head.php'); ?>


<h1>Receta de <?= strtolower($recipe->name); ?></h1>

<span><?= date($recipe->date); ?> </span>

<div>
  <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
</div>

<ul>
  <li>Categoría: <?= $recipe->category; ?></li>
  <li>Nivel de dificultad: <?= $recipe->difficulty_level; ?></li>
  <li>Tiempo de preparación: <?= convertInMinutes($recipe->cooking_time) ?></li>
</ul>

<h2>Ingredientes</h2>
<?php $ingredients = explode("\n", $recipe->ingredients); ?>

<strong><?= $ingredients[0] ?></strong>

<ul>
  <?php foreach ($ingredients as $index => $itemList) : ?>
    <?php if ($index > 0) : ?>
        
      <li>
        <?= $itemList; ?>
      </li>

    <?php endif; ?>
  <?php endforeach; ?>
</ul>

<h2>Modo de preparación</h2>
<p><?= str_replace("\r\n\r", '</p><p>', $recipe->instructions); ?></p>




<?php require('partials/footer.php'); ?>