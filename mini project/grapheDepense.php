<?php 
require_once 'scr/scriptPhp/dbase.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit();
}

$user_id = $_SESSION['user']['id'];

// Mois choisi dans l'URL, par défaut le mois courant (format "2025-05")
$moisChoisi = $_GET['mois'] ?? date('Y-m');

// Validation du format AAAA-MM
if (preg_match('/^\d{4}-\d{2}$/', $moisChoisi)) {
  list($annee, $mois) = explode('-', $moisChoisi);
} else {
  $annee = date('Y');
  $mois = date('m');
}

// Requête SQL pour récupérer les dépenses par catégorie
$sql = $pdo->prepare("SELECT categorie, SUM(montant) as total FROM depenses WHERE user_id = ? AND YEAR(date) = ? AND MONTH(date) = ? GROUP BY categorie");
$sql->execute([$user_id, $annee, $mois]);

$categories = [];
$totaux = [];
while ($row = $sql->fetch()) {
  $categories[] = $row['categorie'];
  $totaux[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dépenses par catégorie</title>
  <link rel="stylesheet" href="scr/style/bootstrap.min.css">
  <link rel="stylesheet" href="scr/style/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tifinagh&family=Roboto:ital,wght@0,100..900;1,100..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=logout" />

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<div class="home">
  <div class="container">
      <?php include "scr/scriptPhp/nav.php"; ?>
  
<div class="container d-flex justify-content-center flex-column py-4">
  <div class="d-flex justify-content-center">
  <h4 class="text-center mb-4">Dépenses par catégorie - Mois sélectionné</h4>
  <form method="GET" class="mb-4 ">
    <input type="month" name="mois" id="mois" class="form-control w-25" value="<?= htmlspecialchars($moisChoisi) ?>" onchange="this.form.submit()">
  </form>
  </div>

  <canvas id="barChart" class="d-block mx-auto"  style="width: 900px;"></canvas>
</div>
    </div>
</div>

<?php include "scr/scriptPhp/footer.php"; ?>

<script>
const ctx = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($categories) ?>,
    datasets: [{
      label: 'Montant en MAD',
      data: <?= json_encode($totaux) ?>,
      backgroundColor: '#007bff',
      borderRadius: 6
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          callback: function(value) {
            return value + ' MAD';
          }
        }
      }
    }
  }
});
</script>

</body>
</html>