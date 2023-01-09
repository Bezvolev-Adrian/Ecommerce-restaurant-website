<?php 
session_start();
include("db.php");
include("functiiPtLogare.php");

$user_data = verificare_login($conexiune);


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
            <li ><a href="adminpage.php">Administrare</a></li>
            <li><a href = "AdaugareProduse.php">Adaugare produse</a></li>
            <li><a href = "ListaProduse.php">Lista produse</a></li>
            
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

echo "<div style = 'font-size:50px; color:white; position: absolute; left:40%; top:30%;'> Lista Produse </div>";
echo "<div style= 'position: absolute; top:40%; left:20%; width: 1110px; '>";

echo "<table id='testblanabomba' class='display' style='width:100%'>
<thead>
   <tr>
      <th>Denumire</th>
      <th>Pret</th>
      <th>Ingrediente</th>
      <th>Gramaj</th>
      <th>Categorie</th>
      <th>Imagine</th>
      <th>Stergere</th>
      <th>Editare</th>
      
   </tr>
</thead>
<tbody>
  
   
   
";

$queryProduseiesire = "SELECT id_produse,denumire,pret,ingrediente,gramaj,categorie_produse,imagini_produse FROM produse ORDER BY denumire;";
$rezultatqueryIesire = mysqli_query($conexiune, $queryProduseiesire);
while($queryiesire = mysqli_fetch_assoc($rezultatqueryIesire)) {
    $id_produse = $queryiesire["id_produse"];
    $denumire = $queryiesire["denumire"];
    $pret = $queryiesire["pret"];
    $ingrediente = $queryiesire["ingrediente"];
    $gramaj = $queryiesire["gramaj"];
    $categorie_produse = $queryiesire["categorie_produse"];
    $imagine_produs = $queryiesire["imagini_produse"];


    echo " <tr>
    <td>$denumire</td>
    <td>$pret</td>
    <td>$ingrediente</td>
    <td>$gramaj</td>
    <td>$categorie_produse</td>
    <td>$imagine_produs</td>
    <td><a href ='stergereProdAdmin.php?Del=$id_produse' style = 'color:blue;'>Sterge</a> </td>
    <td><a href ='editareProdAdmin.php?GetID=$id_produse' style = 'color:blue;'>Editeaza</a> </td>
    
    
 </tr>";
    
}

echo "</tbody>

</table> ";
echo "</div>";
?> 


</body>
</html>