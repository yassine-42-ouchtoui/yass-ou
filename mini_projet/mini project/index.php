<?php 
 session_start();
// ###################  code pour regeistre ###################
if(isset($_POST['register'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $modpass=$_POST['modpasse'];
  $dateNaiss=$_POST['dateNaiss'];

  require_once 'scr/scriptPhp/dbase.php';
  $sqlStat = $pdo->prepare('INSERT INTO users (nom,prenom,email,password,date_naiss) values (?,?,?,?,?)');
  $sqlStat->execute([$nom,$prenom,$email,$modpass,$dateNaiss]);
}
// ###################  code pour login ###################

if(isset($_POST['login'])){
  $emailLog=$_POST['emailLog'];
  $pswlog=$_POST['pswLog'];

  require_once 'scr/scriptPhp/dbase.php';
  $SqlLog=$pdo->prepare('SELECT * FROM users WHERE email=? AND password=?');
  $SqlLog->execute([$emailLog,$pswlog]);
  if($SqlLog->rowCount()>=1){
      $usr=$SqlLog->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user']= $usr;
    header('Location: despose.php');
    exit();
      

}

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
</head>
<body class="bg-body-secondary">
<div class="home">
  <div class="container">
    <?php include "scr/scriptPhp/nav.php";?>


    <section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="hero-title">Bienvenue dans votre système de gestion des dépenses</h1>
        <p class="hero-description">Gérez facilement vos dépenses mensuelles, suivez vos achats, contrôlez votre budget et prenez de meilleures décisions financières au quotidien.</p>
        <a href="#" class="btn btn-primary btn-lg">Commencer</a>
      </div>
      <div class="col-md-6">
        <img src="imag/home_img.png" alt="Hero Image" class="img-fluid hero-image">
      </div>
    </div>
  </div>
</section>
  </div>
</div>


<!-- ###################   Login Modal   ##################### -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="email"  class="form-label">Email address</label>
                        <input type="email" name="emailLog" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="pswLog" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ###################   register Modal   ##################### -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3 d-flex">
                        <input type="text" name="nom" class="form-control mx-2" id="name" placeholder="Enter votre nome" required>
                        <input type="text" name="prenom" class="form-control mx-2" id="prenom" required placeholder="Enter votre prénome">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control "  placeholder="Enter voter email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="modpasse" class="form-control " id="password" placeholder="Enter voter mot de passe" required>
                    </div>
                    
                    <div class="mb-3">
                        <input type="date" name="dateNaiss" class="form-control " id="date"  required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "scr/scriptPhp/footer.php"; ?>

<script src="scr/script/bootstrap.min.js"></script>
</body>
</html>
