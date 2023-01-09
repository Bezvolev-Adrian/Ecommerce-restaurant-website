<?php 
session_start();
include("db.php");



  if(isset($_POST)) {
    
    $categorie = $_POST["categorie_ajax"];

    $queryCategorii = "INSERT INTO categorie_produse(categorie) VALUES ('$categorie')";
    $rezultatquery = mysqli_query($conexiune, $queryCategorii);

 
     

}

?>