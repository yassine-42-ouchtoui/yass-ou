<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "Bienvenue, " . $_SESSION['user'] . "!<br>";
    echo "<a href='logout.php'>Deconnexion</a>";
} else {
    echo "Acces refuse.";
}
?>