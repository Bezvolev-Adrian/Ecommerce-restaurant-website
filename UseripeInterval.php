<?php 
session_start();
include('db.php');
include('functiiPtLogare.php');

$user_data = verificare_login($conexiune);


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
    <title>Red Dragon Food</title>
    <script src='scripturinebune.js'></script>
    <script src ='validareFormJS.js'></script>
 
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
            <li><a href ='adminpage.php'>Administrare</a></li>
          <li><a href ='logout.php'>Deconectare</a></li>
              

               
          

        </ul>
    </nav>
    </header>
    

<div style = 'font-size:50px; color:white; position: absolute; left:30%; top:30%;'>Utilizatori inregistrati pe intervale de timp </div>
<div style = 'font-size:35px; color:white; position: absolute; left:25%; top:50%;'> Data inceput</div>
<div style = 'font-size:35px; color:white; position: absolute; left:51%; top:50%;'> Data sfarsit</div>
    
<div> 
<form method = 'post' action = 'useriInterval.php'>
<input type = 'date' id = 'dataInceputID' name = 'dataInceput' required style = 'position:absolute; top:50%; left:35%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border:none;'>
<input type = 'date' name = 'dataSfarsit' required style = 'position:absolute; top:50%; left:60%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border: none;'>
<input type = 'submit' name= 'submitIntervalUseri' value = 'Genereaza raport'style = 'position:absolute; top:65%; left:43%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border: none;'>
</form> 

</div>
";
}
else {  
    echo "<div class= 'prodCart_container_confirmare'>
    <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
    <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Acces neautorizat !</div> 
    <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
    
</div>";
}
?>

<script type='text/javascript'>


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;




document.getElementById("dataInceputID").setAttribute("max", today);


</script> 
</body>
</html>