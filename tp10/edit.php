<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM exercice WHERE id = ?");
$stmt->execute([$id]);
$exercice = $stmt->fetch();
if (!$exercice) {
    echo "Exercice non trouvé."; exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Modifier</title></head>
<body>
<h1>Modifier l'exercice</h1>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $exercice['id'] ?>">
    <label>Titre: <input type="text" name="titre" value="<?= htmlspecialchars($exercice['titre']) ?>" required></label><br>
    <label>Auteur: <input type="text" name="auteur" value="<?= htmlspecialchars($exercice['auteur']) ?>" required></label><br>
    <label>Date: <input type="date" name="date_creation" value="<?= $exercice['date_creation'] ?>" required></label><br>
    <button type="submit">Enregistrer</button>
</form>
<a href="index.php">Retour</a>
</body>
</html>