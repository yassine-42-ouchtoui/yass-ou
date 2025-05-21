<?php
if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    echo "<h1>Message reçu</h1>";
    echo "Nom : " . htmlspecialchars($_POST['nom']) . "<br>";
    echo "Email : " . htmlspecialchars($_POST['email']) . "<br>";
    echo "Message : " . nl2br(htmlspecialchars($_POST['message']));
} else {
    echo "Veuillez remplir tous les champs.";
}
?>