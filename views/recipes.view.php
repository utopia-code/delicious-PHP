<?php require('partials/head.php'); ?>


<?php foreach ($recipesPerPageInView as $recipe) : ?>

<div class="row">

  <div class="card">

    <div>
      <img src="<?= $recipe->image; ?>" alt="imagen receta <?= strtolower($recipe->name); ?>">
    </div>

    <div>
      <h1><a href="recipe?id=<?= $recipe->id + 1; ?>">Receta de <?= strtolower($recipe->name); ?></a></h1>

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

<div class="nav-pagination">

  <?php if ($currentPage > 1) : ?>
    <a href="?page=<?= ($currentPage - 1); ?>">Anterior</a>
  <?php else : ?>
    <span class="disabled">Anterior</span>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
    <a href="?page=<?= $i; ?>" <?= ($i === $currentPage) ? 'class="active"' : ''; ?>><?= $i; ?></a>
  <?php endfor; ?>

  <?php if ($currentPage < $totalPages) : ?>
    <a href="?page=<?= ($currentPage + 1); ?>">Siguiente</a>
  <?php else : ?>
    <span class="disabled">Siguiente</span>
  <?php endif; ?>

</div>


<?php require('partials/footer.php'); ?>