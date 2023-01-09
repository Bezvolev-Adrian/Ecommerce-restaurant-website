<?php
require_once("db.php");
if(isset($_POST)) { 
    $id_utilizatori =$_POST['iduser_ajax'];
    $queryStergere = "DELETE FROM cos_cumparaturi WHERE id_utilizatori = $id_utilizatori; ";
$qStergere = mysqli_query($conexiune, $queryStergere);



}


?>