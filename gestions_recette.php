<?php
require_once('templates/header.php');
require_once('lib/category.php');

if (!isset($_SESSION['user'])) {
  header('location: login.php');
}
$recipes = getRecipes($pdo)
?>

<h1>Gestions des recettes</h1>
<a href="ajout_recette.php" class="btn btn-primary">Créer une nouvelle recette</a>
<form>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recipes as $recipe) { ?>
        <tr>
          <td><?= htmlspecialchars($recipe['id']); ?></td>
          <td><?= htmlspecialchars($recipe['title']); ?></td>
          <td><?= htmlspecialchars($recipe['description']); ?></td>
          <td>
            <button class="btn btn-warning btn-edity"'>
              Modifier
            </button>
          </td>
          <td>
            <a href="lib/supprimer_recette.php?id=<?= $recipe['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">Supprimer</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  
</form>


<?php
require_once('templates/footer.php');
?>