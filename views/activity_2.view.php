<?php require('partials/head.php'); ?>


<?php foreach ($recipes as $recipe) : ?>
  <?php if ($recipe->id === 7) : ?>    

    <h1>Receta de <?= strtolower($recipe->name); ?></h1>

    <div class="page-content">

      <div class="page-img">
        <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
      </div>

      <aside class="page-aside">

        <span><strong>Fecha de publicación:</strong> <?= date("d/m/Y", strtotime($recipe->date)); ?> </span>

        <ul>
          <li><strong>Categoría:</strong> <?= $recipe->category; ?></li>
          <li><strong>Nivel de dificultad:</strong> <?= $recipe->difficulty_level; ?></li>
          <li><strong>Tiempo de preparación:</strong> <?= convertInMinutes($recipe->cooking_time) ?></li>
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

      </aside>

      <div class="page-description">
        <h2>Modo de preparación</h2>
        <p><?= str_replace("\r\n\r", '</p><p>', $recipe->instructions); ?></p>
      </div>

    </div>

  <?php endif; ?>
<?php endforeach; ?>



<?php require('partials/footer.php'); ?>
