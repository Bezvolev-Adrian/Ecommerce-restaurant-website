<?php 
session_start();
require_once("db.php");
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
    <title>Red Dragon Food</title>
    <script src="scripturinebune.js"></script>
    <script src ="validareFormJS.js"></script>
 
</head>
<body>
    


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
           
           ?>

            

        
        </ul>
    </nav>
    </header>


    <?php 


    $queryProfilAfisare = "SELECT nume_prenume, oras, strada_numar_bloc, nrtelefon FROM utilizatori WHERE id_utilizatori = '$id_utilizatori' ;";
    $rezultat = mysqli_query($conexiune, $queryProfilAfisare);
    $queryProf = mysqli_fetch_assoc($rezultat); 
       
           $nume_prenume = $queryProf['nume_prenume'];
           $oras = $queryProf['oras'];
           $strada_numar_bloc = $queryProf['strada_numar_bloc'];
           $nrtelefon = $queryProf['nrtelefon'];


       echo "<div = class = 'divProfil'> 
           <label class = 'labelFamilie'> Nume  </label>
           <div class = 'numeFamilieProfil' > $nume_prenume</div>
           <label class = 'labelPrenume'> Oras </label>
           <div class = 'prenumeProfil' > $oras </div>
           <label class = 'labelNrTel'> Adresa </label>
           <div class = 'NrTelProfil' >  $strada_numar_bloc</div>
           <label class = 'labelSex'> Numar telefon </label>
           <div class = 'SexProfil' >  $nrtelefon</div>
      
           
           <a class ='butonEditeazaProfil' href = 'actualizareProfil.php'>Editeaza</a> 
       
       
       
       </div> " 
    

    ?>




</body>
</html>