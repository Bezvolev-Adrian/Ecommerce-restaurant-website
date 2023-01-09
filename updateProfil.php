<?php 
require_once("db.php");


if(isset($_POST)) {

$id_utilizatori = $_POST["iduser"];
$nume_prenume = $_POST["nume_prenume"];
$nrtelefon = $_POST["nrtelefon"];
$oras = $_POST["oras"];
$adresa = $_POST["adresa"];

$query = "UPDATE utilizatori SET nume_prenume  = '$nume_prenume', oras = '$oras', nrtelefon ='$nrtelefon', strada_numar_bloc ='$adresa' WHERE id_utilizatori ='$id_utilizatori' ;";
$rezultat = mysqli_query($conexiune, $query);
if($rezultat) {
    echo "0";
}
else  { 
    echo "1";
}


}

