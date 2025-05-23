<?php
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$mdp = strip_tags($_POST['mdp']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réponse</title>
</head>
<body>
    <h1>Bonjour, <?php echo $prenom; ?> <?php echo $nom; ?></h1>
    <h2>Votre mot de passe est : <?php echo $mdp; ?></h2>
    <p>Email : <?php echo $email; ?></p>
    <p>Message : <?php echo $message; ?></p>
</body>
</html>
