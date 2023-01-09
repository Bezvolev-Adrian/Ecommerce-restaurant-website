<?php
include("db.php");


if(isset($_POST)) {

    $id_utilizatori = $_POST['IDuser_ajax'];
    $id_metoda_plata = $_POST['formaPlata_ajax'];
    $detalii = $_POST['detalii_ajax'];

$queryProduse = "SELECT p.denumire, cantitate, cost_total, c.id_produse FROM cos_cumparaturi as c INNER JOIN produse as p ON c.id_produse = p.id_produse WHERE c.id_utilizatori = $id_utilizatori;";
$rez = mysqli_query($conexiune, $queryProduse);
$costCos = 0;


$queryAdresa = "SELECT oras, strada_numar_bloc, nrtelefon FROM utilizatori WHERE id_utilizatori = '$id_utilizatori' ;";
$rezultatAdresa = mysqli_query($conexiune, $queryAdresa);
$queAdresa = mysqli_fetch_assoc($rezultatAdresa);
$oras = $queAdresa['oras'];
$strada = $queAdresa['strada_numar_bloc'];
$nrtelefon = $queAdresa['nrtelefon'];

while($check = mysqli_fetch_assoc($rez)) {

    $cost_total = $check['cost_total'];
    $costCos += $cost_total;
    
}


$queryLanseaza = "INSERT INTO comenzi(id_utilizatori, costCos, id_metoda_plata, Oras_livrare, Strada_livrare, Detalii_suplimentare, numar_telefon) VALUES('$id_utilizatori', '$costCos', '$id_metoda_plata', '$oras', '$strada', '$detalii', '$nrtelefon')";
$rezultatLanseaza = mysqli_query($conexiune, $queryLanseaza);
$id_produse_comenzi = mysqli_insert_id($conexiune);

$queryCosCheck = "SELECT id_produse, cost_total, cantitate  FROM cos_cumparaturi WHERE id_utilizatori = $id_utilizatori";
$rezultatCosCheck = mysqli_query($conexiune, $queryCosCheck);

while($produs_cos = mysqli_fetch_assoc($rezultatCosCheck)) {
    $id_produse = $produs_cos['id_produse'];
    $cantitate = $produs_cos['cantitate'];
    $cost_total = $produs_cos['cost_total'];
    $queryProduseComenzi = "INSERT INTO produse_comenzi(id_comenzi, id_produse, cost_total, cantitate) VALUES($id_produse_comenzi, $id_produse, $cost_total, $cantitate)";
    $rezultatProduseComenzi = mysqli_query($conexiune, $queryProduseComenzi);
}



$queryStergereCart = "DELETE FROM cos_cumparaturi WHERE id_utilizatori = $id_utilizatori ";
$rezultatStergereCart = mysqli_query($conexiune, $queryStergereCart);





}


?>
