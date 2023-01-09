<?php 
include("db.php");

if(isset($_POST)) {
    
    $id_comenzi = $_POST['idcomanda_ajax'];


    $queryUpdateStatus = "UPDATE comenzi SET status_Comanda = 'pregatita' WHERE id_comenzi = $id_comenzi";
    $rezultatStatus = mysqli_query($conexiune, $queryUpdateStatus);

    
}

?>