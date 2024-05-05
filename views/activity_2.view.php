<?php require('partials/head.php'); ?>


<?php foreach ($recipes as $recipe) : ?>
  <?php if ($recipe->id === 7) : ?>    

    <h1>Receta de <?= strtolower($recipe->name); ?></h1>

    <span><?= date($recipe->date); ?> </span>

    <div>
      <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
    </div>

    <ul>
      <li>Categoría: <?= $recipe->category; ?></li>
      <li>Niver de dificultad: <?= $recipe->difficulty_level; ?></li>
      <li>Tiempo de preparación: <?= convertInMinutes($recipe->cooking_time) ?></li>
    </ul>

    <h2>Ingredientes</h2>
    <?php $ingredients = explode("\n", $recipe->ingredients); ?>
  
    <?php foreach ($ingredients as $itemList) : ?>
      <?php if ($itemList === $ingredients[0]) : ?>

        <strong><?= $ingredients[0] ?></strong>

      <?php else: ?>

        <ul>
          <li>
            <?= $itemList; ?>
          </li>
        </ul>

      <?php endif; ?>
    <?php endforeach; ?>

    <h2>Modo de preparación</h2>
    <p><?= str_replace("\r\n\r", '</p><p>', $recipe->instructions); ?></p>

    
  <?php endif; ?>
<?php endforeach; ?>



<?php require('partials/footer.php'); ?>