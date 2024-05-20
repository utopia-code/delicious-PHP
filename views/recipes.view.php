<?php require('partials/head.php'); ?>

<form action="" method="GET">

  <div class="form-container">
    <div class="form-field">
      <label for="name">Ordenar por nombre:</label>
      <select name="name" id="name">
        <option value="" disabled selected hidden>Selecciona una opción</option>
        <option value="asc">Ascendente</option>
        <option value="desc">Descendente</option>
      </select>
    </div>

    <div class="form-field">
      <label for="cooking_time">Ordenar por tiempo de preparación:</label>
      <select name="cooking_time" id="cooking_time">
        <option value="" disabled selected hidden>Selecciona una opción</option>
        <option value="asc">Ascendente</option>
        <option value="desc">Descendente</option>
      </select>
    </div>

    <div class="form-field">
      <label for="difficulty_level">Filtrar por nivel de dificultad:</label>
      <select name="difficulty_level" id="difficulty_level">
        <option value="" disabled selected hidden>Selecciona una opción</option>

        <?php foreach ($listOptionsDifficultyLevel as $difficulty_level) : ?>
            <option value="<?= $difficulty_level ?>"><?= $difficulty_level ?></option>
        <?php endforeach; ?>

      </select>
    </div>

    <div class="form-field">
      <label for="category">Filtrar por categoría:</label>
      <select name="category" id="category">
        <option value="" disabled selected hidden>Selecciona una opción</option>

        <?php foreach ($listOptionsCategories as $category) : ?>
          <option value="<?= $category ?>"><?= $category ?></option>
        <?php endforeach; ?>

      </select>
    </div>
  </div>

  <div class="row center">
    <button class="button primary" type="submit">Filtrar</button>
    <div class="button secondary">
      <a href="/delicious_php/recipes">Limpiar filtros</a>
    </div>
  </div>
  
  

</form>


<div class="card-component">

  <?php foreach ($recipesPerPageInView as $recipe) : ?>

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
          <li>Categoría: <?= $recipe->category; ?></li>
          <li>Tiempo de preparación: <?= convertInMinutes($recipe->cooking_time) ?></li>
          <li>Nivel de dificultad: <?= $recipe->difficulty_level; ?></li>
        </ul>

        <h3>Instrucciones</h3>
        <p><?= setMaxWordsInView($recipe->instructions);  ?>...</p>
      </div>

    </div>

  <?php endforeach; ?>

</div>

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