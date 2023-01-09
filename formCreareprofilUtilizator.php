<?php
session_start();
include("db.php");
include("functiiPtLogare.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $last_name = $_POST["numefamilie"];
    $first_name = $_POST["prenume"];
    $nr_telefon = $_POST["numartelefon"];
    $sex = $_POST["sex"];
    $varsta = $_POST["varsta"];
    $oras = $_POST["oras"];
    $strada = $_POST["strada"];
    $id_utilizatori = $_SESSION['profil'];

    if(!empty($last_name) && !empty($first_name) && !empty($nr_telefon) && !empty($sex) && !empty($varsta) && !empty($oras) && !empty($strada)) {

        $queryprofil = "INSERT INTO profil_utilizatori (last_name, first_name, nr_telefon, sex, varsta, oras, strada, id_utilizatori) VALUES('$last_name', '$first_name', '$nr_telefon', '$sex', '$varsta', '$oras', '$strada', '$id_utilizatori');";
        mysqli_query($conexiune, $queryprofil);

        header("Location: licenta2.php");
    }


}

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
    <div class ="signupsection">
<form class = "formsignup" method="post" > 
<input type = "text" placeholder = "Numele de familie" class ="email" name ="numefamilie" >
<input type = "text" placeholder = "Prenumele" class ="username" name="prenume" >
<input type = "tel" pattern = "[0-9]{10}" placeholder = "Numar telefon" class ="password" name="numartelefon" >
<input type = "text" placeholder = "Sex" class = "passwordCheck" name ="sex" >
<input type = "number" placeholder = "Varsta" class = "numefamilie" min = "1" name= "varsta" >
<input type="text" class ="prenume"   placeholder = "Oras\Judet"  name="oras" >
<input type="text" class ="nrtelefon"  placeholder = "Strada"  name="strada" >
<input type = "submit" class ="signup"  value ="Salveaza" name= "updateProfile">

</form>
</div>

</body>
</html>