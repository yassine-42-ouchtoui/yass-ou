<?php
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$mdp = strip_tags($_POST['mdp']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);


$host = 'localhost';
$dbname = 'tp9_bd';
$user = 'root';
$pass = ''; 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
 $sql = $pdo->prepare("INSERT INTO utilisateurs (nom,prenom,mdp,email,message) values(?,?,?,?,?)");
 $sql->execute([$nom,$prenom,$mdp,$email,$message]);


?>
