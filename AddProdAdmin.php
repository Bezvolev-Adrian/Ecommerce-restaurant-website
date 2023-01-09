<?php 
include('db.php');

if(isset($_POST))  { 

    $denumire =$_POST['denumireprod_ajax'];
    $pret = $_POST['pret_ajax'];
    $ingrediente = $_POST['ingrediente_ajax'];
    $gramaj = $_POST['gramaj_ajax'];
    $imagine_produs = $_POST['imagine_ajax'];
    $categorie_produse = $_POST['idcategorie_ajax'];


    $queryProduse = "INSERT INTO produse (denumire,pret,ingrediente,gramaj,imagini_produse, id_categorie) VALUES ('$denumire', '$pret', '$ingrediente', '$gramaj', '$imagine_produs', '$categorie_produse');";
    mysqli_query($conexiune, $queryProduse);
}




?>