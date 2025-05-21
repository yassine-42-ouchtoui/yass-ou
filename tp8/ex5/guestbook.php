<?php
$nom = strip_tags($_POST['nom']);
$message = strip_tags($_POST['message']);
$date = date("Y-m-d H:i:s");

file_put_contents("livre_or.txt", "$date - $nom : $message\n", FILE_APPEND);

echo "<h2>Messages :</h2>";
echo nl2br(file_get_contents("livre_or.txt"));
?>