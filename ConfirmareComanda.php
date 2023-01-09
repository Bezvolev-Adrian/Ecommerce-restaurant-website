<?php 
session_start();
ob_start();
include("db.php");

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
   
   
</head>
<body>
    

    

 <div>
    <header class = 'recipient'> 
       

     <a href='licenta2.php'>
        <img src = 'logoChinese2_75.png' class ='logo' alt = 'logo'>
     </a> 
     

    <nav class ='baradenavigatie'> 
        <ul class = 'baradenavigatielista'>
            <li ><a href='licenta2.php'>Acasa</a></li>
        



            <?php
           
           if($_SESSION['rang_utilizatori'] == 2) {
            echo "<li><a href ='adminpage.php'>Administrare</a></li>";
            
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
                $query = "SELECT id_utilizatori FROM utilizatori WHERE id_utilizatori = $id_utilizatori;";
                $rezultat = mysqli_query($conexiune, $query);
                $count = mysqli_num_rows($rezultat);

        if(isset($_SESSION['username'])) {
            if($count == 1 ) {
                 echo "<li><a href = 'afisareProfil.php'>Profil</a></li>";

            }
        }

       

        if(isset($_SESSION['username'])) {
            echo "<li ><a href='cart.php'><i class='fa fa-shopping-cart' style='font-size:36px'></i></a></li>";
        }

  
          
    
    
    
        ?>
        


        </ul>
    </nav>
    </header>
</div>

<?php

$queryCos = "SELECT * FROM cos_cumparaturi WHERE id_utilizatori = '$id_utilizatori'";
    $rezultatQC = mysqli_query($conexiune, $queryCos);

    
    if(mysqli_fetch_assoc($rezultatQC) > 0 ) {


$queryAfisare = "SELECT p.denumire, cantitate, cost_total FROM cos_cumparaturi as c INNER JOIN produse as p ON c.id_produse = p.id_produse WHERE c.id_utilizatori = $id_utilizatori;";
$rezultatQuery = mysqli_query($conexiune, $queryAfisare);
$costCos = 0;

echo"<div class= 'prodCart_container_confirmare'> ";    
echo "<div class = 'prodCart_container_produse'>";

while($check = mysqli_fetch_assoc($rezultatQuery)){ 
    
    $denumire = $check['denumire'];
    $cantitate = $check['cantitate'];
    $cost_total = $check['cost_total'];

    $costCos += $cost_total;

    $x = 'X';
    


    echo "<div class = 'prodCart_denumire_confirmare' > $cantitate$x $denumire   </div>";
}
echo "</div>";
echo "</div>";

echo "<label class = 'prodCart_confirmare_label'>Produse</label>";
echo "<label class = 'prodCart_confirmare_total_label'>Total</label>";
echo "<label class ='prodCart_confirmare_total_label_valoare'>$costCos Lei</label>";
echo "<label class = 'prodCart_confirmare_metoda_plata_label'>Metoda de plata</label>";
echo "<label class = 'prodCart_confirmare_adresa_livrare_label'>Detalii de livrare</label>";
echo "<label class= 'prodCart_confirmare_detalii_suplimentare_label'>Detalii Optionale</label>";

$queryAdresa = "SELECT oras, strada_numar_bloc, nrtelefon FROM utilizatori WHERE id_utilizatori = '$id_utilizatori' ;";
$rez = mysqli_query($conexiune, $queryAdresa);
$queAdresa = mysqli_fetch_assoc($rez);

$oras = $queAdresa['oras'];
$strada = $queAdresa['strada_numar_bloc'];
$nrtelefon = $queAdresa['nrtelefon'];


echo"<form method ='post'  class = 'formConfirmare'>
    <input type = 'hidden' value = '$id_utilizatori' id = 'userID_id'>
    ";


$queryMetode = "SELECT id_metoda_plata, metoda_plata FROM metode_plata WHERE statusMetode = 'activ' ;";
$rezultatMetode = mysqli_query($conexiune, $queryMetode);

echo "<select class ='username'  name='metoda_plata' style ='width:275px; top:2%; left:7% ' id ='metoda_plata'>";

while($metode = mysqli_fetch_assoc($rezultatMetode)) {
    $id_metoda_plata = $metode["id_metoda_plata"];
    $metoda_plata = $metode["metoda_plata"];
    
    echo "<option value = '$id_metoda_plata'>$metoda_plata</option>"; 

    }

    echo "</select>";

   echo " <label class = 'formConfirmare_checkbox_label' style = 'left:50%; bottom: 73%;'> Adresa: $oras, $strada, Telefon: $nrtelefon 

 
    </label>";

   echo " <textarea class = 'textarea_detalii' id = 'detalii' name = 'textarea_detalii_suplimentare' placeholder ='Detalii suplimentare legate de comanda'></textarea>
    <input type = 'submit' value = 'Lanseaza comanda' class = 'prodCart_btnLanseazaComanda' name = 'submitComanda'>";

echo    "</form>"; 
    
echo " </div> "; 

    } 

    else {  
        echo "<div class= 'prodCart_container_confirmare'>
        <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
        <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Acces neautorizat !</div> 
        <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
        
    </div>";
    }



?>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>

	$(function(){
		$('.prodCart_btnLanseazaComanda').click(function(e){

            var valid = this.form.checkValidity();

        if(valid){

            var user = $('#userID_id').val();
            console.log(user);

            var forma_plata = $('#metoda_plata').val();
            console.log(forma_plata);

             var detalii = $('#detalii').val();
             console.log(detalii);
             
           
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'LanseazaComanda.php',
					data: {formaPlata_ajax: forma_plata, detalii_ajax: detalii, IDuser_ajax: user},
					success: function(data){
                        if(data == 0 ) {
                            
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Comanda efectuata',
								'text': 'Comanda dumnevoastra a fost preluata!',
                               
								
								}).then(function(){
                                    window.location = 'cart.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Comanda nu a fost preluata!'
								
								})
                            }
							
					}
                    
				
				});

        }	
		


		});		

		
	});

    


	
</script>

</body>
</html>
