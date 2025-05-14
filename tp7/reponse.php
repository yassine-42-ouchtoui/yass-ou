<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
$nom =$_POST['nom'];
$prenom = $_POST['prenom'];
$mdp = $_POST['mdp'];
$dtn = $_POST['dtn'];
$sexe = $_POST['sexe'];

echo "<h1>Bonjour, " . $prenom . " " . $nom . "</h1>";
echo "<h2>Votre mot de passe est : " . $mdp . "</h2>";
echo "<h2>Votre date de naissance est : " . $dtn . "</h2>";
echo "<h2>Votre genre est : " . $sexe . "</h2>";
?>
</body>
</html>