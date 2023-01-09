<?php 
require_once("db.php");
if(isset($_POST)) {

     $id_metoda_plata = $_POST['idmetoda_ajax'];
     $denumiremetoda = $_POST['denumireMetoda_ajax'];
     $status = $_POST['statusMetoda_ajax'];

    $query = "UPDATE metode_plata SET metoda_plata = '$denumiremetoda', statusMetode = '$status' WHERE id_metoda_plata = '$id_metoda_plata' ;";
    $rezultat = mysqli_query($conexiune, $query);

 

    
}




?>