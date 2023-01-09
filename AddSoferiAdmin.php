<?php 
session_start();
include("db.php");



  if(isset($_POST)) {
    
    $numeSofer = $_POST["numesofer_ajax"];
    $telefonSofer = $_POST["telefon_ajax"];
    $oras = $_POST["oras_ajax"];

    $queryCategorii = "INSERT INTO soferi(nume, telefon, oras) VALUES ('$numeSofer', '$telefonSofer', '$oras')";
    $rezultatquery = mysqli_query($conexiune, $queryCategorii);

      
        
    

}

?>