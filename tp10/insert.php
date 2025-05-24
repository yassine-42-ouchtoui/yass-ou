<?php
require 'db.php';
$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$date_creation = $_POST['date_creation'];
$sql = "INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titre, $auteur, $date_creation]);
header("Location: index.php");
exit;
