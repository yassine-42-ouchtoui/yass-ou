<nav>
    <a class="a" href="" >Masrouf</a>
    <ul>
        <?php
         if(!isset($_SESSION["user"])){
          ?>
        <li><a class="a" href="">Accueil</a></li>
        <li><a class="a" href="">Contact</a></li>
        <li class="bg-secondary-subtle"><a class="a" href="" data-bs-toggle="modal" data-bs-target="#loginModal" >Login </a></li>
        <li class="bg-success"><a class="a" href="" data-bs-toggle="modal" data-bs-target="#registerModal">Register </a></li>
        <?php
         }else{

          ?>
        <li><a class="a" href="despose.php">Dépenser</a></li>
        <li><a class="a" href="myDepense.php">Mes depenses</a></li>
        <li><a class="a" href="grapheDepense.php">Graphe</a></li>
        <li class=" bg-danger logOut"><a  href="deconnexion.php"  class="a text-light">LoginOut </a><span class="material-symbols-outlined text-light mx-1 ">
logout
</span></li>
        <?php
         }
          ?>
    </ul>
</nav>