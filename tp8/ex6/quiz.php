<?php
$score = 0;
$rep = ["q1" => "rabat", "q2" => "4"];

foreach ($rep as $q => $corr) {
    if (isset($_POST[$q])) {
        $user = $_POST[$q];
        if ($user == $corr) {
            echo "$q : Bonne réponse !<br>";
            $score++;
        } else {
            echo "$q : Mauvaise réponse (réponse correcte : $corr)<br>";
        }
    } else {
        echo "$q : Non répondu<br>";
    }
}
echo "<br>Score : $score / " . count($rep);
?>