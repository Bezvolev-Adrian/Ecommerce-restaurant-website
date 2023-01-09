<?php 

require_once("db.php");

    if(isset($_POST)) {

        $id_produse = $_POST['idprod_ajax'];

    $denumire = $_POST["denumireProdus_ajax"];
    $pret = $_POST["pret_ajax"];
    $ingrediente = $_POST["ingrediente_ajax"];
    $gramaj = $_POST["gramaj_ajax"];
    $id_categorie = $_POST["categorie_ajax"];
    $imagine_produs = $_POST["imagine_ajax"];
    $statusProdus  = $_POST["status_ajax"];

    $query = "UPDATE produse SET denumire = '$denumire', pret = '$pret', ingrediente ='$ingrediente', gramaj = '$gramaj', id_categorie ='$id_categorie', imagini_produse = '$imagine_produs', statusProdus = '$statusProdus' WHERE id_produse ='$id_produse' ;";
    $rezultat = mysqli_query($conexiune, $query);
   


    }
?>