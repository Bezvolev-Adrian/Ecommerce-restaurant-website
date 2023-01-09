<?php 

include("db.php");
include("functiiPtLogare.php");

if(isset($_POST)) {

    $username =$_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $nume_prenume = $_POST["numeprenume"];
    $varsta = $_POST["varsta"];
    $oras = $_POST["oras"];
    $strada_numar_bloc = $_POST["strada"];
    $nrtelefon = $_POST["nrtelefon"];
    $cod_useri = numar_random(11);


        $queryEmail = "SELECT * FROM utilizatori WHERE email = '$email'"; 
        $rezultatQueryEmail = mysqli_query($conexiune, $queryEmail);

        $queryUsername = "SELECT * FROM utilizatori WHERE username = '$username'";
        $rezultatQueryUsername = mysqli_query($conexiune, $queryUsername);

    if(mysqli_num_rows($rezultatQueryEmail) == 0 && mysqli_num_rows($rezultatQueryUsername )  == 0) {
        $query = "INSERT INTO utilizatori (cod_useri,username,email,parola, nume_prenume, varsta, oras, strada_numar_bloc, nrtelefon) VALUES ('$cod_useri','$username','$email','$password', '$nume_prenume', '$varsta', '$oras', '$strada_numar_bloc', '$nrtelefon');";
       $rezultat = mysqli_query($conexiune, $query);

       if($rezultat && mysqli_num_rows($rezultatQueryEmail) == 0 && mysqli_num_rows($rezultatQueryUsername )  == 0 )  {
        echo "0";
     }
     else { 
         echo "1";
     }
 
    }

    else if(mysqli_num_rows($rezultatQueryEmail) > 0) { 
        echo "Un cont cu acest email exista deja!";
    }
    
    else { 
        echo "Acest nume de utilizator este deja folosit!";
    }
 
      
       
    
    

    
}





?>

