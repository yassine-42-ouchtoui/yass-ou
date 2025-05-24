<?php
require 'db.php';
$id = $_POST['id'];
$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$date_creation = $_POST['date_creation'];
$sql = "UPDATE exercice SET titre = ?, auteur = ?, date_creation = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titre, $auteur, $date_creation, $id]);
header("Location: index.php");
exit;
