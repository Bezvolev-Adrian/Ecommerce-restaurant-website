<?php 
include("db.php");



if(isset($_POST)) {
    $id_soferi = $_POST["idSofer_ajax"];
    $numeSoferi = $_POST['numeSofer_ajax'];
    $telefonSoferi = $_POST['telefonSofer_ajax'];
    $oras = $_POST['oras_ajax'];
    
    $queryUpdate = "UPDATE soferi SET nume = '$numeSoferi', telefon = '$telefonSoferi', oras = '$oras' WHERE id_soferi = $id_soferi ";
    $rezultatUpdate = mysqli_query($conexiune, $queryUpdate);
  

}


?>