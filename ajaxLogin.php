<?php 

session_start();
include("db.php");
	
if(isset($_POST)) {  
    $username = $_POST["username"];
    $password  = $_POST["password"];

    $query  = "SELECT * FROM utilizatori WHERE username = '$username' AND parola = BINARY '$password' ";
    $rezultat = mysqli_query($conexiune, $query);

    if(mysqli_num_rows($rezultat) > 0 )  { 
        $user_data = mysqli_fetch_assoc($rezultat);

        if($user_data['parola'] == $password)  { 
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['rang_utilizatori'] = $user_data['rang_utilizatori'];
            $_SESSION['id_utilizatori'] = $user_data['id_utilizatori'];
        }

       

    } 

   else  { 
       echo  "Nume de utilizator sau parola gresita!";
   }

    


}








?>