<?php require('partials/head.php'); ?>

<div class="card-component">

<?php foreach ($latest_recipes as $recipe) : ?>

  <div class="card">

    <div class="card-img">
      <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
    </div>

    <div class="card-content">
      <h2 class="card-title">
        <a href="recipe?id=<?= $recipe->id + 1; ?>">Receta de <?= strtolower($recipe->name); ?></a>
      </h2>
      
      <span class="card-date"><?= date("d/m/Y", strtotime($recipe->date)); ?> </span>

      <ul class="card-list">
        <li><strong>Categoría:</strong> <?= $recipe->category; ?></li>
        <li><strong>Tiempo de preparación:</strong> <?= convertInMinutes($recipe->cooking_time) ?></li>
        <li><strong>Nivel de dificultad:</strong> <?= $recipe->difficulty_level; ?></li>
      </ul>

      <h3>Instrucciones</h3>
      <p><?= setMaxWordsInView($recipe->instructions);  ?>...</p>
    </div>

  </div>

<?php endforeach; ?>

</div>

<?php require('partials/footer.php'); ?>