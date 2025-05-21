<?php
$a = $_POST['a'];
$b = $_POST['b'];
$op = $_POST['op'];
$result = "";

if ($op == "/" && $b == 0) {
    $result = "Erreur : Division par zéro.";
} else {
    switch ($op) {
        case "+": $result = $a + $b; break;
        case "-": $result = $a - $b; break;
        case "*": $result = $a * $b; break;
        case "/": $result = $a / $b; break;
    }
}
echo "Résultat : $result";
?>