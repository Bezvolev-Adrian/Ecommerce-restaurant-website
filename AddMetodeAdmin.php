<?php  
include("db.php");

if(isset($_POST)) {
    
    $metoda_plata = $_POST["denumiremetoda_ajax"];

    $querymetode = "INSERT INTO metode_plata(metoda_plata) VALUES ('$metoda_plata')";
    $rezultatquery = mysqli_query($conexiune, $querymetode);

     
      
        
    
    
    

}

?>