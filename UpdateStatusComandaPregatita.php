<?php 
include("db.php");

if(isset($_POST)) {
    
    $id_comenzi = $_POST['idcomanda_ajax'];
    $id_soferi = $_POST['idsofer_ajax'];


    $queryUpdateStatus = "UPDATE comenzi SET id_soferi = '$id_soferi', status_Comanda = 'Livrata' WHERE id_comenzi = $id_comenzi";
    $rezultatStatus = mysqli_query($conexiune, $queryUpdateStatus);

    
}

?>