<?php 
session_start();
ob_start();
include("db.php");
include("functiiPtLogare.php");
$id_utilizatori = $_SESSION['id_utilizatori'];



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
    <script src="scripturinebune.js"></script>
    <script src ="validareFormJS.js"></script>
   
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
                 echo "<li><a href = 'afisareProfil.php?GetProfileID=$id_utilizatori'>Profil</a></li>";

            }
        
           

            else  {
                echo "<li><a href = 'formCreareprofilUtilizator.php'>Profil</a></li>";
            }
        }

        else {
            
        }


        if(isset($_SESSION['username'])) {
            echo "<li><a href='cart.php'><i class='fa fa-shopping-cart' style='font-size:36px'></i></a></li>";
        }

  
          
           ?>
        


        </ul>
    </nav>
    </header>
</div>

<?php 



$queryCart = "SELECT p.id_produse, p.denumire, p.ingrediente, p.pret, p.gramaj, p.imagini_produse, c.cantitate, c.cost_total FROM produse as p inner JOIN cos_cumparaturi as c ON p.id_produse = c.id_produse WHERE c.id_utilizatori = $id_utilizatori; ";
$rezultatQuery = mysqli_query($conexiune, $queryCart);
$check = mysqli_num_rows($rezultatQuery);
if($check == 0) { echo "<div class= 'prodCart_container_confirmare'>
    <i class='fa fa-shopping-cart' aria-hidden='true' style= 'position:relative; top:5%; left:40%; color:white; font-size:250px;'></i>
    <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:40%; color:white; font-size:25px; width:325px;'>Cosul de cumparaturi este gol !</div> 
    <a href = 'licenta2.php' style='position:relative; top:22%; left:43%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
    
</div>"; }

else { 
    

while($qu = mysqli_fetch_assoc($rezultatQuery)) {
    $denumire = $qu["denumire"];
        $pret = $qu["pret"];
        $ingrediente = $qu["ingrediente"];
        $gramaj = $qu["gramaj"];
        $imagini_produse = $qu["imagini_produse"];
        $id_produse = $qu["id_produse"];
        $cantitate = $qu["cantitate"];
        $costTotal = $qu["cost_total"];   
       

echo"
<div class= 'prodCart_container'> 

  <div class = 'prodCart_imagine'> 
  
  <img src= '$imagini_produse' style = 'width:100%; height:100%; border-radius:25%;'> 

  
    </div> 
    
    <div class = 'prodCart_denumire'> 
       $denumire
    </div> 


    <div class = 'prodCart_pret'>
    Pret: $costTotal lei
    </div> 
    
  <div class = 'prodCart_info' style = 'padding:45px; left: 71%;'> 
   Ingrediente: $ingrediente 
    </div>

    <div class = 'prodCart_info' style = 'bottom:85%; left:22.5%;'> 
   Gramaj: $gramaj
     </div>

    <div> 
        <form method = 'post' action = 'UpdateCantitateCart.php?IDuser=$id_utilizatori' class = 'formUpdateCantitate'> 
        <label class ='prodCart_cantitateLabel' >Cantitate  </label>
        <input type = 'hidden' id = 'hiddenUserID' value = '$id_utilizatori'>
        <input type ='number' class = 'prodCart_cantitatee' size= '9' min = '1' value = '$cantitate' name = 'cantitateN'>
        <input type ='hidden' value = '$id_produse' name= 'hiddenProdCant'>
        <input type ='hidden' value ='$pret' name = 'hiddenPretCart'>
        <input type ='submit' class = 'prodCart_btnUpdate' value = 'Actualizeaza' name = 'submitCantitate'>
        </form>
    </div>



    <form action = ' ' class = 'formStergere' method='post'>
    <input type ='hidden' value = '$id_produse' name = 'hiddenProd' class = 'hiddenProdID'>
    <input type ='hidden' value = '$id_utilizatori' class = 'userID'>
    <input type = 'submit' class ='prodCart_btnDelete' name = 'DeleteProd' value ='Sterge'>
       
     </form>

    
</div> ";



}


echo " <button type ='button' class = 'prodCart_btnDeleteAll'> Sterge Cos 
</button>";
echo "<a href ='ConfirmareComanda.php' class = 'prodCart_btnConfirma'> Confirma comanda </a>";





}




?> 
    
</table>






<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>
	$(function(){
		$('.prodCart_btnDeleteAll').click(function(e){

              var iduser= $('#hiddenUserID').val();
              console.log(iduser);
           
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'StergereProdCartAll.php',
					data: {iduser_ajax: iduser},
					success: function(data){
                        if(data == 0) {
                            
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Produse sterse',
								'text': 'Toate produsele din cosul de cumparaturi au fost sterse!',
                               
								
								}).then(function(){
                                    window.location = 'cart.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Produsele nu au fost sterse!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});

    


	
</script>

<script type = 'text/javascript'> 
$(function(){
		$('.prodCart_btnDelete').click(function(e){

            var $form = $(this).closest(".formStergere");

            var idprod= $form.find(".hiddenProdID").val();
              console.log(idprod);

            var userid= $form.find(".userID").val();
           console.log(userid);

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'StergereProdCart.php',
					data: {idprod_ajax: idprod, iduserAjax: userid},
					success: function(data){
                        if(data == 0) {
                            
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Produs sters',
								'text': 'Produsul a fost sters din cosul de cumparaturi!',
                               
								
								}).then(function(){
                                    window.location = 'cart.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Produsul nu a fost sters!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});


</script>
</body>
</html>
