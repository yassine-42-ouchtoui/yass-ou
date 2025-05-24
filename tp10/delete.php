<?php $id = $_GET['id']; ?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Confirmer suppression</title></head>
<body>
<h1>Confirmation</h1>
<p>Voulez-vous vraiment supprimer l'exercice #<?= $id ?> ?</p>
<a href="delete_action.php?id=<?= $id ?>">Oui</a> |
<a href="index.php">Non</a>
</body>
</html>