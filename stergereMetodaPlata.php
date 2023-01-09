<?php 
require_once("db.php");
if(isset($_GET['DelMetoda'])) {
     $id_metoda_plata = $_GET['DelMetoda'];
    $query = "DELETE FROM metode_plata WHERE id_metoda_plata = '$id_metoda_plata' ;";
    $rezultat = mysqli_query($conexiune, $query);

    if($rezultat) {
        header("location:adminpage.php");
    }

    
}




?>