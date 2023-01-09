<?php
include("db.php");
if(isset($_POST['submitCantitate'])) {

    $cantitate = $_POST["cantitateN"];
    $id_utilizatori = $_GET['IDuser'];
    $id_produse = $_POST['hiddenProdCant'];
    $pret = $_POST['hiddenPretCart']; 

    

$queryUpdateCantitate = "UPDATE cos_cumparaturi SET cantitate = '$cantitate' WHERE id_utilizatori = $id_utilizatori AND id_produse = $id_produse; ";
$queryCostTotal =  "UPDATE cos_cumparaturi SET cost_total = cantitate * $pret WHERE id_utilizatori = $id_utilizatori AND id_produse = $id_produse;";
  $rez =  mysqli_query($conexiune, $queryUpdateCantitate);
  $rezCost = mysqli_query($conexiune, $queryCostTotal);
  if($rez && $rezCost) {
    header("location:cart.php");
  }

  else {
    echo "ceva n-a mers";
  }

  

}


?>