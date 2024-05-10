<?php require('partials/head.php'); ?>

<form action="" method="GET">

  <label for="name">Ordenar por nombre:</label>
  <select name="name" id="name">
    <option value=""></option>
    <option value="asc">Ascendente</option>
    <option value="desc">Descendente</option>
  </select>

  <label for="cooking_time">Ordenar por tiempo de preparación:</label>
  <select name="cooking_time" id="cooking_time">
    <option value=""></option>
    <option value="asc">Ascendente</option>
    <option value="desc">Descendente</option>
  </select>

  <label for="difficulty_level">Filtrar por nivel de dificultad:</label>
  <select name="difficulty_level" id="difficulty_level">
    <option value=""></option>
    <?php $listDifficultyLevel = []; ?>
    <?php foreach ($recipes as $recipe) : ?>
      <?php if (!in_array($recipe->difficulty_level, $listDifficultyLevel)) : ?>
        <?php $listDifficultyLevel[] = $recipe->difficulty_level ?>
        <option value="<?= $recipe->difficulty_level ?>"><?= $recipe->difficulty_level ?></option>
      <?php endif; ?>
    <?php endforeach; ?>
  </select>

  <label for="category">Filtrar por categoría:</label>
  <select name="category" id="category">
    <option value=""></option>
    <?php $listCategories = []; ?>
    <?php foreach ($recipes as $recipe) : ?>
      <?php if (!in_array($recipe->category, $listCategories)) : ?>
        <?php $listCategories[] = $recipe->category ?>
        <option value="<?= $recipe->category ?>"><?= $recipe->category ?></option>
      <?php endif; ?>
    <?php endforeach; ?>
  </select>

  <button type="submit">Filtrar</button>
</form>

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