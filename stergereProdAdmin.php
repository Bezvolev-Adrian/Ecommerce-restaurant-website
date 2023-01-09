<?php 
require_once("db.php");
if(isset($_GET['Del'])) {
    $id_produse = $_GET['Del'];
    $query = "DELETE FROM produse WHERE id_produse = '$id_produse' ;";
    $rezultat = mysqli_query($conexiune, $query);

    if($rezultat) {
        header("location:adminpage.php");
    }

    
}




?>