<?php require('partials/head.php'); ?>


<?php foreach ($latest_recipes as $recipe) : ?>

<div class="row">

  <div class="card">

    <div>
      <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
    </div>

    <div>
      <h1>Receta de <?= strtolower($recipe->name); ?></h1>

      <span><?= date($recipe->date); ?> </span>

      <ul>
        <li>Categoría: <?= $recipe->category; ?></li>
        <li>Tiempo de preparación: <?= convertInMinutes($recipe->cooking_time) ?></li>
        <li>Nivel de dificultad: <?= $recipe->difficulty_level; ?></li>
      </ul>

      <h2>Instrucciones</h2>
      <p><?= setMaxWordsInView($recipe->instructions);  ?>...</p>
    </div>

  </div>

</div>

<?php endforeach; ?>


<?php require('partials/footer.php'); ?>