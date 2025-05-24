<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM exercice ORDER BY id DESC");
$exercices = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Liste des Exercices</title>
<link rel="stylesheet" href="style.css"></head>
<body>
<h1>Ajouter un exercice</h1>
<form method="POST" action="insert.php">
    <label>Titre: <input type="text" name="titre" required></label><br>
    <label>Auteur: <input type="text" name="auteur" required></label><br>
    <label>Date: <input type="date" name="date_creation" required></label><br>
    <button type="submit">Ajouter</button>
</form>
<h2>Liste des exercices</h2>
<table border="1">
<tr><th>ID</th><th>Titre</th><th>Auteur</th><th>Date</th><th>Actions</th></tr>
<?php foreach ($exercices as $exo): ?>
<tr>
    <td><?= $exo['id'] ?></td>
    <td><?= htmlspecialchars($exo['titre']) ?></td>
    <td><?= htmlspecialchars($exo['auteur']) ?></td>
    <td><?= $exo['date_creation'] ?></td>
    <td>
        <a href="edit.php?id=<?= $exo['id'] ?>">Modifier</a> |
        <a href="delete.php?id=<?= $exo['id'] ?>">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>