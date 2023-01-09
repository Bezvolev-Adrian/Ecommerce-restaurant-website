<?php 
include("db.php");



if(isset($_POST)) {
    $rang_utilizatori = $_POST['rang_ajax'];
    $id_utilizatori = $_POST["iduser_ajax"];
    $queryUpdate = "UPDATE utilizatori SET rang_utilizatori = '$rang_utilizatori' WHERE id_utilizatori = $id_utilizatori; ";
    $rezultatUpdate = mysqli_query($conexiune, $queryUpdate);
   

}


?>