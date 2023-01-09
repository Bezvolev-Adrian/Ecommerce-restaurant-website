<?php 
session_start();
ob_start();
include("db.php");


if(isset($_SESSION['username'])){
    $id_utilizatori = $_SESSION['id_utilizatori'];
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
            <li ><a href="Despre.php">Despre</a></li>
        
            
            
           
            
            
           <?php 

           if(!isset($_SESSION['username'])) {
            $_SESSION['rang_utilizatori'] = 'Client';

           }
           
           if($_SESSION['rang_utilizatori'] == 'Administrator') {
            echo "<li><a href ='adminpage.php'>Administrare</a></li>
                 <li><a href ='KitchenScreen.php'>Bucatarie</a></li> ";
           
            
           }

           if($_SESSION['rang_utilizatori'] == 'Bucatar') {
            echo "<li><a href ='KitchenScreen.php'>Bucatarie</a></li> ";
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


                

        if(isset($_SESSION['username'])) {
           
                 echo "<li><a href = 'afisareProfil.php?GetProfileID=$id_utilizatori'>Profil</a></li>";

            
    
        }

        else {
            
        }


        if(isset($_SESSION['username'])) {
            echo "<li ><a href='IstoricComenzi.php'>Istoric Comenzi</a></li>";
            echo "<li ><a href='cart.php'><i class='fa fa-shopping-cart' style='font-size:36px'></i></a></li>";
            
        }

          
           
          
           ?>

        

        
        </ul>
    </nav>
    </header>
</div>




<?php  
        $queryCategorii = "SELECT id_categorie, categorie FROM categorie_produse WHERE statusCategorie = 'activ' ";
        $rezultatCateg = mysqli_query($conexiune, $queryCategorii);
        while($queryQ = mysqli_fetch_assoc($rezultatCateg)) {
            $categorie = $queryQ["categorie"];
            $id_categorie = $queryQ["id_categorie"];
            
            echo "<div class='produse_principal_container'>";
      
            echo "<div style='position: relative; left:45%; top:30%; display: table; font-size:50px; color:white; font-family: Times New Roman; background-color: #921f1c;  padding:15px; margin:15px; border-radius:10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)'>$categorie</div>";
      

   
     $queryProd = "SELECT p.id_produse, p.denumire, p.pret, p.ingrediente, p.gramaj, p.imagini_produse, p.statusProdus, c.categorie FROM produse as p INNER JOIN categorie_produse as c ON c.id_categorie = p.id_categorie WHERE p.id_categorie = $id_categorie AND p.statusProdus = 'activ' ;";
    $rezultatquery = mysqli_query($conexiune, $queryProd);


   
   if(mysqli_num_rows($rezultatquery) == 0 )   {
    echo "<div style= 'position:relative; top:7%; left:36%; color:white; font-size:25px; display:table; '>Niciun produs disponibil momentan in aceasta categorie !</div>";
   }

   else { 
    
   }
   
   
    while($qu = mysqli_fetch_assoc($rezultatquery)) {
        $denumire = $qu["denumire"];
        $pret = $qu["pret"];
        $ingrediente = $qu["ingrediente"];
        $gramaj = $qu["gramaj"];
        $imagini_produse = $qu["imagini_produse"];
        $id_produse = $qu["id_produse"];
        $statusProdus = $qu["statusProdus"];
        $g = 'g';
        


   if(isset($_SESSION['username']) ) { 

    if($statusProdus == 'activ') {
   echo" <div class ='produse_container'>
   

            <form class = 'formAdauga' method='post' >    
            <input type = 'hidden' class = 'hiddenProdID' value = '$id_produse' name= 'nameProd'>
            <input type = 'hidden' class = 'hiddenPret' value = '$pret' name ='namePret' >
            <input type = 'submit' class='butonAdauga' name='addProd' value='Adauga' >
            </form>

            
            
            
            <div class = 'tooltip'> <i class='fas fa-info-circle'></i>
                <span class = 'tooltiptext'> Gramaj: $gramaj$g Ingrediente: $ingrediente</span>
            
             </div>

             <div class ='produse_imagine' > 
             <img src= '$imagini_produse' style = 'width:100%; height:100%; border-radius:25%;'> 
         </div>

        <div class= 'produse_text' >
        <h2>$denumire</h2>
        <div class = 'produse_pret'> $pret lei </div>
        

        </div>
        <div class = 'produse_buton'>

        </div>
    </div> "; 

            }
            else { 
                
            }
        
    }

    

    else {

        echo" <div class ='produse_container'>
            <form   class = 'formAdauga'>
            <input type = 'submit' class='butonAdaugaFail' value='Adauga'>
            </form>

            <div class = 'tooltip'> <i class='fas fa-info-circle'></i>
                <span class = 'tooltiptext'>Gramaj: $gramaj$g Ingrediente: $ingrediente</span>
            
             </div>

        <div class ='produse_imagine' > 
        <img src= '$imagini_produse' style = 'width:100%; height:100%; border-radius:25%;'> 
        </div>

        <div class= 'produse_text' >
        <h2>$denumire</h2>
        <div class = 'produse_pret'> $pret lei </div>
        

        </div>
        <div class = 'produse_buton'>

        </div>
    </div> ";

        
    }
} 


    
echo "</div>"; 
}


 
 ?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>
	$(function(){
		$('.butonAdauga').click(function(e){

			
            var $reper = $(this).closest(".formAdauga");
            
               
              var idprod= $reper.find(".hiddenProdID").val();
              console.log(idprod);
              var pret = $reper.find(".hiddenPret").val();
              console.log(pret);
             
          
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'ajaxAddCart.php',
					data: {idprod: idprod, pret: pret},
					success: function(data){
                        if(data) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Produs adaugat',
								'text': 'Produsul ales a fost adaugat in cosul de cumparaturi!',
                               
								
								})

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Produsul nu a fost adaugat in cosul de cumparaturi!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});
	
</script>

<script type='text/javascript'>
	$(function(){
		$('.butonAdaugaFail').click(function(e){

				e.preventDefault();	

				
					Swal.fire({ 
                                'icon': 'error',
								'title': 'Atentie!',
								'text': 'Trebuie sa fiti conectat pentru a putea adauga produse in cosul de cumparaturi!',
                               
								
								})


		});		

		
	});
	
</script>



</body>
</html>
