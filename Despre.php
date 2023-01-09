<?php 
session_start();
ob_start();
include("db.php");
include("functiiPtLogare.php");

if(isset($_SESSION['username'])){
    $id_utilizatori = $_SESSION['id_utilizatori'];
}




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
    <title>Red Dragon Food</title>


</head>
<body>
    

 <div>
    <header class = "recipient"> 
 
     <a href="licenta2.php">
        <img src = "logoChinese2_75.png" class ="logo" alt = "logo">
     </a> 
     

    <nav class ="baradenavigatie"> 
        <ul class = "baradenavigatielista">
            <li ><a href="licenta2.php">Acasa</a></li>
            <li ><a href="Despre.php">Despre</a></li>
         
            
            
           
            
            
           <?php 

           if(!isset($_SESSION['username'])) {
            $_SESSION['rang_utilizatori'] = 'Client';

           }
           
           if($_SESSION['rang_utilizatori'] == 'Administrator') {
            echo "<li><a href ='adminpage.php'>Administrare</a></li>";
            
           }

           if($_SESSION['rang_utilizatori'] == 'Administrator') {
                echo "<li><a href ='KitchenScreen.php'>Bucatarie</a></li>";

           }
           
           
           
           if(isset($_SESSION['username'])) {
               echo "<li><a href ='logout.php'>Deconectare</a></li>";
               
               
               echo "<li><a>Bun venit, " . $_SESSION['username']. " </a></li>";

               
           }
           else {
               echo "<li><a href='paginaSIGNUP.php'>Inregistrare</a></li>
                    <li><a href = 'paginaLOGIN.php'>Conectare</a></li>
                    ";
           }


           if(isset($_SESSION['username'])) {
            $query = "SELECT id_utilizatori FROM utilizatori WHERE id_utilizatori = $id_utilizatori;";
            $rezultat = mysqli_query($conexiune, $query);
            $count = mysqli_num_rows($rezultat);
        }    
                
        
           
                

        if(isset($_SESSION['username'])) {
            if($count == 1 ) {
                 echo "<li><a href = 'afisareProfil.php?GetProfileID=$id_utilizatori'>Profil</a></li>";

            }
        
           

            else  {
                echo "<li><a href = 'formCreareprofilUtilizator.php'>Profil</a></li>";
            }
        }

        else {
            
        }


        if(isset($_SESSION['username'])) {
            echo "<li ><a href='cart.php'><i class='fa fa-shopping-cart' style='font-size:36px'></i></a></li>";
        }

          
           
          
           ?>

        

        
        </ul>
    </nav>
    </header>
</div>

</div>

<a id="Despre">
<div class ="Aboutcontainer">
        <div class="aboutext" >
            <h1>Despre noi</h1>
            <h5>Ne-am propus sa aducem romanilor gustul Asiei, la care se va adauga o parte din bucataria moderna. Din 2008 pana in prezent am reusit sa respectam aceasta promisiune fata de client, secretul fiind un amestec de ingrediente proaspete de care s-au indragostit clientii nostri. Din 2008, am gatit aceleasi produse delicioase si am reusit sa extindem rapid reteaua noastra de locatii. 
               </h5>
            </div>
         
         <div class ="soupImage" alt="imagine">
        </div>

        <div class ="dumplingsImage">
        </div>

        <div class ="noodlesImage">          
        </div>  
        <div class = "aboutext2">
            <p>
                
            </p>
            <h4>In prezent, suntem localizati in Bucuresti, Ploiesti, Constanta, Brasov, Timisoara, Sibiu, Targu Mures.</h4>
        </div>
    </div>
</a>



</body>
</html>
