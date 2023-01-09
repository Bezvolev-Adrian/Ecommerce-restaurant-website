<?php 
session_start();
include("db.php");


$id_utilizatori = $_SESSION['id_utilizatori'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
    <link rel = "stylesheet" href= "stilizare.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel = "stylesheet" href= "tabelsmecher.css">
    <link rel = "stylesheet" href= "tabelsmecher2.scss">
    <title>Red Dragon Food</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <script>
    $(document).ready(function() {
        $('#testblanabomba').DataTable( {
            "language": {
                "lengthMenu": "Afiseaza _MENU_ intrari",
                "zeroRecords": "Nu au fost gasite inregistrari care sa se potriveasca",
                "info": " Se afiseaza de la _START_ la _END_ din _TOTAL_ intrari",
                "search": "Cauta:",
                "paginate": {
                "next": "Urmatoarea pagina",
                "previous": "Pagina anterioara"
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
    

 <div>
    <header class = "recipient"> 
        </div>

     <a href="licenta2.php">
        <img src = "logoChinese2_75.png" class ="logo" alt = "logo">
     </a> 
     

    <nav class ="baradenavigatie"> 
        <ul class = "baradenavigatielista">
            <li ><a href="licenta2.php">Acasa</a></li>
  
           
            
           <?php if(isset($_SESSION['username'])) {
               echo "<li><a href ='logout.php'>Deconectare</a></li>";
               echo "<li><a>Bun venit, " . $_SESSION['username']. " </a></li>";

               
           }
           else {
               echo "<li><a href='paginaSIGNUP.php'>Signup</a></li>
                    <li><a href = 'paginaLOGIN.php'>Login</a></li> ";
           }
           ?>

            

        
        </ul>
    </nav>
    </header>
    


<?php  

echo "<div style = 'font-size:50px; color:white; position: absolute; left:40%; top:30%;'>Istoric comenzi </div>";
echo "<div style= 'position: absolute; top:40%; left:20%; width: 1110px; '>";

echo "<table id='testblanabomba' class='display' style='width:100%'>
<thead>
   <tr>
      <th>Nr</th>
      <th>Metoda plata</th>
      <th>Total (Lei)</th>
      <th>Data</th>
      <th>Status</th>
      <th>Detalii</th>
      
      
      
      
   </tr>
</thead>
<tbody>
  
   
   
";

$queryUseri = "SELECT c.id_comenzi, c.costCos, c.status_Comanda, c.data_Comanda, u.username, h.metoda_plata FROM comenzi as c INNER JOIN utilizatori as u ON c.id_utilizatori = u.id_utilizatori INNER JOIN metode_plata as h ON c.id_metoda_plata = h.id_metoda_plata WHERE c.id_utilizatori = $id_utilizatori ;";
$rezultatquery = mysqli_query($conexiune, $queryUseri);
$totalTotal = 0;
$numarComenzi = 0;
while($quer = mysqli_fetch_assoc($rezultatquery)) { 

    $id_comenzi = $quer["id_comenzi"];
    $total = $quer["costCos"];
    $metoda_plata = $quer["metoda_plata"];
    $status = $quer["status_Comanda"];
    $data = $quer["data_Comanda"];
    

    $totalTotal += $total;
    $numarComenzi++;


    echo " <tr>
    <td>$numarComenzi</td>
    <td>$metoda_plata</td>
    <td>$total</td>
    <td>$data</td>
    <td>$status</td>
    <td><a href ='detaliiComandaIstoric.php?GetID=$id_comenzi&NrComanda=$numarComenzi' style = 'color:blue;'>Detalii</a> </td>
    

    
    
 </tr>";

}

echo "</tbody>

</table> ";

echo "<div style = 'font-size:50px; color:white; position: relative; left:25%; top:70%; width:600px;'> Total $numarComenzi comenzi: $totalTotal Lei </div>";
echo "</div>";







?> 

 
</body>
</html>