<?php 
session_start();
include('db.php');
?>


<!DOCTYPE html>
<html lang='en'>
<head>
    
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css' integrity='sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU' crossorigin='anonymous'> 
    <link rel = 'stylesheet' href= 'stilizare.css'>
    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css'>
    <link rel = 'stylesheet' href= 'tabelsmecher.css'>
    <link rel = 'stylesheet' href= 'tabelsmecher2.scss'>
    <title>Red Dragon Food</title>
    <script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js'></script>


    <script>
    $(document).ready(function() {
        $('#testblanabomba').DataTable( {
            'language': {
                'lengthMenu': 'Afiseaza _MENU_ intrari',
                'zeroRecords': 'Nu au fost gasite inregistrari care sa se potriveasca',
                'info': ' Se afiseaza de la _START_ la _END_ din _TOTAL_ intrari',
                'search': 'Cauta:',
                'paginate': {
                'next': 'Urmatoarea pagina',
                'previous': 'Pagina anterioara'
            },
            }
        } );
    } );
</script>

<script>   

$(document).ready( function () {
    $('#testblanabomba').DataTable();
} );

 </script>
 
</head>
<body>

<?php   
if($_SESSION['rang_utilizatori'] == 'Administrator') {
    echo "

 <div>
    <header class = 'recipient'> 
        </div>

     <a href='licenta2.php'>
        <img src = 'logoChinese2_75.png' class ='logo' alt = 'logo'>
     </a> 
     

    <nav class ='baradenavigatie'> 
        <ul class = 'baradenavigatielista'>
            <li ><a href='licenta2.php'>Acasa</a></li>
            <li><a href = 'adminpage.php'>Administrare</a></li>
            <li><a href ='logout.php'>Deconectare</a></li>

        
        </ul>
    </nav>
    </header>";
    


 
if(isset($_POST['submitDate'])) {
    $dataInceput = $_POST['dataInceput'];
    $dataSfarsit = $_POST['dataSfarsit'];
    $id_categorie = $_POST['id_categorie'];
    
    $dataInceputConvertita = date('Y-m-d', strtotime($dataInceput));
    $dataSfarsitConvertita = date('Y-m-d', strtotime($dataSfarsit));
    
    $querycateg = "SELECT categorie FROM categorie_produse WHERE id_categorie = $id_categorie";
    $rezultatqcateg = mysqli_query($conexiune, $querycateg);
    while($querycategorie = mysqli_fetch_assoc($rezultatqcateg)) {
        $categ = $querycategorie['categorie'];
    }
    
    $queryProduseInterval = "SELECT SUM(c.cantitate) AS total, p.denumire, p.pret, h.categorie, z.data_Comanda FROM produse as p INNER JOIN produse_comenzi as c ON p.id_produse= c.id_produse INNER JOIN categorie_produse as h ON p.id_categorie = h.id_categorie INNER JOIN comenzi as z ON c.id_comenzi = z.id_comenzi WHERE cast(z.data_Comanda as date) BETWEEN '$dataInceputConvertita' AND '$dataSfarsitConvertita' AND p.id_categorie = $id_categorie GROUP BY p.id_produse ORDER BY SUM(c.cantitate) DESC LIMIT 10   ";
    $rezultatQueryProd = mysqli_query($conexiune, $queryProduseInterval); }


echo "<div style= 'position: absolute; top:40%; left:20%; width: 1110px; '>";

echo "<table id='testblanabomba' class='display' style='width:100%'>
<thead>
   <tr>
      <th>Denumire produs</th>
      <th>Categorie</th>
      <th>Cantitate vanduta (Buc.)</th>
      <th>Incasari (Lei)</th>
      
      
      
   </tr>
</thead>
<tbody>
  
   
   
";

$totalIncasari = 0;
while($quer  = mysqli_fetch_assoc($rezultatQueryProd))  {    
    $denumire = $quer['denumire'];
    $total = $quer['total'];
    $categorie = $quer['categorie'];
    $pret = $quer ['pret'];

    $incasari = $total * $pret;
    $totalIncasari += $incasari;
 

    echo " <tr>
    <td>$denumire</td>
    <td>$categorie</td>
    <td>$total </td>
    <td>$incasari</td>
 
    

    
    
 </tr>";

}




echo "</tbody>

</table> ";
echo "<div style = 'font-size:50px; color:white; position: relative; left:25%; top:70%; display:table; '> Total incasari: $totalIncasari Lei </div>";
echo "</div>";

echo "<div style = 'font-size:45px; color:white; position: absolute; left:10%; top:30%;'> Produse vandute din categoria: $categ in intervalul: $dataInceputConvertita - $dataSfarsitConvertita  </div>";


}
else { 
    echo "<div class= 'prodCart_container_confirmare'>
    <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
    <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Acces neautorizat !</div> 
    <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
    
</div>";
}


?> 

 
</body>
</html>