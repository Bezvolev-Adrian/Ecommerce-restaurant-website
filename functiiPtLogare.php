<?php 

function verificare_login($conexiune) {
    if(isset($_SESSION['username'])) {
        $id = $_SESSION['username'];
        $query = "SELECT * FROM utilizatori WHERE username = '$id' limit 1";

        $rezultat = mysqli_query($conexiune, $query);
        if($rezultat && mysqli_num_rows($rezultat) > 0) {
             
            $user_data = mysqli_fetch_assoc($rezultat);
            return $user_data;
        }
    }
    
    // redirect catre login page

   
}
 // generare cod de user random
function numar_random($lungime) {
    $text = "";
    if($lungime < 5) {
        $lungime = 5;
    }

    $lun = rand(4, $lungime);
    for ($i=0; $i < $lun; $i++) { 
        
        $text .= rand(0,9);
    }
    return $text;

}