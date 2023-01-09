<?php 
session_start();
include('db.php');





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
            <li><a href = 'AdaugareProduse.php'>Adaugare produse</a></li>
            <li><a href = 'AdaugareMetode.php'>Adaugare Metode de plata</a></li>
            <li><a href = 'AdaugareCategorii.php'>Adaugare Categorii Produse</a></li>
            <li><a href = 'AdaugareSoferi.php'>Adaugare Soferi</a></li>
            <li><a href = 'ListaCategorii.php'>Lista categorii produse</a></li>
            <li><a href = 'ListaMetode.php'>Lista metode de plata</a></li>
            <li><a href = 'ListaProduse.php'>Lista produse</a></li>
            <li><a href = 'ListaUtilizatori.php'>Lista Utilizatori</a></li>
            <li><a href = 'ListaComenzi.php'>Lista Comenzi</a></li>
            <li><a href = 'ListaSoferi.php'>Lista Soferi</a></li>
            <li><a href = 'AlocareSoferi.php'>Alocare soferi</a></li>
           
            

        </ul>
    </nav>
    </header>
    

<div style = 'font-size:50px; color:white; position: absolute; left:45%; top:30%;'>Rapoarte</div>
<ul style = 'position:absolute; top:40%;'>

<li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'ComenzipeInterval.php' >Comenzi pe interval de timp </a>
 </li>

<li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'UseripeInterval.php' >Utilizatori inregistrati pe interval de timp </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'UseriOcomanda.php' >Utilizatori cu cel putin o comanda efectuata </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'Top10produse.php' >Top 10 cele mai vandute produse </a>
 </li>
 
 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'metodeplata.php' >Procentaj metode de plata din total vanzari </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'Top10produseCategTimp.php' >Top 10 produse vandute pe categorii si interval de timp </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'ProcentajCategorii.php' >Procentaj categorii din total vanzari </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'GraficPopCateg.php' >Grafic popularitate categorii de produse </a>
 </li>

 <li>
<a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'GraficSoferi.php' >Grafic activitate soferi </a>
 </li>

 <li>
 <a style = ' font-family: Times New Roman; font-size:30px; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'href = 'GraficOrase.php' >Grafic popularitate orase in functie de numarul de comenzi </a>
  </li>

</ul>

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
       

</body>
</html>