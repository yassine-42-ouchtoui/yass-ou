<?php
session_start();
$valid_user = "yassine";
$valid_pass = "1234";

if ($_POST['login'] === $valid_user && $_POST['pass'] === $valid_pass) {
    $_SESSION['user'] = $valid_user;
    header("Location: welcome.php");
} else {
    echo "Identifiants invalides.";
}
?>