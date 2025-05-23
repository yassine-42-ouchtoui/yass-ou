<?php 
 require_once 'scr/scriptPhp/dbase.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location:index:php");
}
?>


<?php

if (isset($_POST['ajouter_salire'])) {
    $salire = $_POST['salire']; 
    $id_user = $_SESSION['user']['id'];

    $sqlStat = $pdo->prepare("INSERT INTO salaire (montant, id_user) VALUES (?, ?)");
    $sqlStat->execute([$salire, $id_user]);
}

if(isset($_POST["depense"])){#
  $id_user = $_SESSION['user']['id'];
  $montant= $_POST['montant'];
  $categorie= $_POST['categorie'];
  $description= $_POST['description'];
  $date= $_POST['date'];
  $sqldepense = $pdo->prepare("INSERT INTO depenses (montant	,categorie	,description	,date, user_id	) VALUES (?,?,?,?,?)");
    $sqldepense->execute([$montant,$categorie,$description,$date,$id_user]);
}
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
<div class="">
  <div class="container">
    <?php include "scr/scriptPhp/nav.php"; ?>

  <!--################## form ajouter une deponse ###############-->
    <form method="post" class="container my-3 p-4 bg-white rounded shadow" style="max-width: 600px;">
    <h2 class="mb-4 text-center text-primary">
  Bonjour Mr. <?= ucfirst(strtolower($_SESSION['user']['nom'])) . " " . ucfirst(strtolower($_SESSION['user']['prenom'])) ?>
</h2>
  <div class="mb-3">
    <label for="montant" class="form-label">Montant (DH)</label>
    <input type="number" name="montant" id="montant" class="form-control" placeholder="Entrez le montant en DH" required>
  </div>

  <div class="mb-3">
    <label for="categorie" class="form-label">Catégorie</label>
    <select name="categorie" id="categorie" class="form-select" required>
      <option value="" disabled selected>Choisissez une catégorie</option>
      <option value="alimentation">Alimentation</option>
      <option value="transport">Transport</option>
      <option value="logement">Logement</option>
      <option value="factures">Factures</option>
      <option value="loisirs">Loisirs</option>
      <option value="sante">Santé</option>
      <option value="autres">Autres</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control no-resize" rows="3" placeholder="Ajoutez une description (facultatif)"></textarea>
  </div>

  <div class="mb-3">
    <label for="date" class="form-label">Date de la dépense</label>
    <input type="date" name="date" id="date" class="form-control" required>
  </div>

  <div class="d-grid">
    <button type="submit" class="btn btn-success" name="depense">Ajouter la dépense</button>
  </div>
</form>

  <!--################## Affecher Salaire ###############-->
<?php
  $sqlSalire = $pdo->prepare("SELECT * FROM salaire WHERE id_user=?");
  $sqlSalire->execute([$_SESSION["user"]["id"]]);
  if($sqlSalire->rowCount()>=1){
    $salireUser= $sqlSalire->fetch($pdo::FETCH_ASSOC);
  

?>
<div class="salaire-form my-3 p-4 bg-white rounded shadow ">
  <h3 class="d-flex  justify-content-center">Votre Salaire :</h3>
  <form >
    <h3 class="d-flex text-success justify-content-center fw-bold"><?= $salireUser["montant"]?> DH</h3>
  </form>
</div>
<?php
 
    }else{

?>
<div class="salaire-form my-3 p-4 bg-white rounded shadow">
  <h3>Salaire mensuel</h3>
  <form method="post" >
    <input type="number" name="salire" class="form-control mb-3" placeholder="Entrez votre salaire (DH)" required>
    <button type="submit" name="ajouter_salire" data-bs-toggle="modal" data-bs-target="#loginModalLabel" class="btn btn-success mx-auto d-flex">Enregistrer</button>
  </form>
</div>
<?php
  }
?>
    
  </div>
</div>


<?php include "scr/scriptPhp/footer.php"; ?>

<script src="scr/script/bootstrap.min.js"></script>
</body>
</html>
