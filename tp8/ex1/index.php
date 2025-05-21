<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form  method="post">
        <input type="number" name="a" required>
        <select name="op">
    <option value="+">Addition</option>
    <option value="-">Soustraction</option>
    <option value="*">Multiplication</option>
    <option value="/">Division</option>
  </select>
        <input type="number" name="b" required>
        <button type="submit" name="clc">calculer</button>
       
    <?php
    if(isset($_POST['clc'])){
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
}
?>
 <span>Resultat : <?= $result ?></span>
    </form>
</body>

</html>