<?php 
include("db.php");
if(isset($_POST)) {

$idProd = $_POST['idprod_ajax'];
$id_utilizatori = $_POST['iduserAjax'];
$qCart = "DELETE FROM cos_cumparaturi WHERE id_produse = $idProd AND id_utilizatori = $id_utilizatori; ";
mysqli_query($conexiune, $qCart);


}

?>