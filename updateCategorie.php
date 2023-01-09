<?php 
include("db.php");



if(isset($_POST)) {
    $id_categorie = $_POST["idcategorie_ajax"];
    $categorie = $_POST['denumireCategorie_ajax'];
    $status = $_POST['statusCategorie_ajax'];
    $queryUpdate = "UPDATE categorie_produse SET categorie = '$categorie', statusCategorie = '$status' WHERE id_categorie = $id_categorie ";
    $rezultatUpdate = mysqli_query($conexiune, $queryUpdate);
  

    

}


?>