<?php 
 require_once 'scr/scriptPhp/dbase.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location:index:php");
}

// Connexion à la base
    include "scr/scriptPhp/dbase.php";

    // Requête pour regrouper les dépenses par année et mois
    $sql = $pdo->prepare("SELECT 
              DATE_FORMAT(date, '%Y') AS annee, 
              DATE_FORMAT(date, '%M') AS mois, 
              SUM(montant) AS total 
            FROM depenses 
            where user_id=?
            GROUP BY annee, mois 
            ORDER BY annee DESC, MONTH(date) DESC;");

    $sql->execute([$_SESSION['user']['id']]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sqlSaliare = $pdo->prepare("SELECT * FROM salaire WHERE id_user=?");

    $sqlSaliare->execute([$_SESSION['user']['id']]);
    $sal = $sqlSaliare->fetch(PDO::FETCH_ASSOC);
    $salaire =$sal['montant'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des Dépenses</title>
  <link rel="stylesheet" href="scr/style/bootstrap.min.css">
  <link rel="stylesheet" href="scr/style/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tifinagh&family=Roboto:ital,wght@0,100..900;1,100..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=logout" />


</head>
<body class="bg-body-secondary">

<div class="home">
  <div class="container">

    <?php include "scr/scriptPhp/nav.php"; ?>
      <h2 class="mt-5">Dépenses par Mois et par Année</h2>

<table class="table table-striped table-bordered text-center mt-3">
  <thead class="table-dark">
    <tr>
      <th>Année</th>
      <th>Mois</th>
      <th>Total des Dépenses (DH)</th>
      <th>Reste du salaire</th>
    </tr>
  </thead>
  <tbody>
    <?php
    

    // Affichage des données
    foreach ($result as $row) { ?>
        <tr>
                <td><?= $row['annee']?></td>
                <td><?= $row['mois']?></td>
                <td><?= $row['total']?> DH</td>
                <?php if($salaire - $row['total'] >0) { ?>
                <td class="text-success fw-bold"><?=  $salaire - $row['total']?> DH</td>
                
                <?php }else{?>
                  <td class="text-danger fw-bold"><?=  $salaire - $row['total']?> DH</td>
                  <?php }?>
              </tr>
    <?php } ?>
  </tbody>
</table>

    

</div>
</div>
<?php include "scr/scriptPhp/footer.php"; ?>
<script src="scr/script/bootstrap.min.js"></script>
</body>
</html>
 