<?php
include("db.php");
session_start();
$id_utilizatori = $_SESSION['id_utilizatori'];
if(isset($_POST)) {
        $idProd = $_POST['idprod'];
        
        $pret = $_POST['pret'];
        $cantitate = 0;
        
      
        $queryCart = "INSERT INTO cos_cumparaturi(cantitate, id_produse, id_utilizatori) SELECT * FROM(SELECT '$cantitate', '$idProd', '$id_utilizatori' b)  AS tmp  WHERE NOT EXISTS (SELECT id_produse FROM cos_cumparaturi  WHERE id_produse = $idProd AND id_utilizatori = $id_utilizatori);  ";
      $queryFetch = mysqli_query($conexiune, $queryCart);
      $fetch =  mysqli_fetch_assoc($queryFetch);
      if($fetch >= 0) {
        $queryCantitate = "UPDATE cos_cumparaturi SET cantitate = cantitate + 1 WHERE id_utilizatori = $id_utilizatori AND id_produse = $idProd;";
        mysqli_query($conexiune, $queryCantitate);

        $queryCostTotal =  "UPDATE cos_cumparaturi SET cost_total = cantitate * $pret WHERE id_utilizatori = $id_utilizatori AND id_produse = $idProd;";
        mysqli_query($conexiune, $queryCostTotal);


        
       

      } 

    }


    ?>