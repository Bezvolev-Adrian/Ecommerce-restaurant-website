<?php 
        require_once('db.php');
        session_start();
        include('functiiPtLogare.php');
        $id_produse = $_GET['GetID'];
        $query = "SELECT p.id_produse, p.denumire, p.pret, p.ingrediente, p.gramaj, p.imagini_produse, c.categorie, p.id_categorie, p.statusProdus FROM produse as p INNER JOIN categorie_produse as c ON c.id_categorie = p.id_categorie WHERE id_produse ='".$id_produse."';";
        $rezultat = mysqli_query($conexiune, $query);

        while($row =mysqli_fetch_assoc($rezultat)) {
            $id_produse = $row['id_produse'];
            $denumire = $row['denumire'];
            $pret = $row['pret'];
            $ingrediente = $row['ingrediente'];
            $gramaj = $row['gramaj'];
            $categorie_produse = $row['categorie'];
            $id_categorie = $row['id_categorie'];
            $imagine_produs = $row['imagini_produse'];
            $statusProdus = $row['statusProdus'];
     }
     


        
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
    <div class ='signupsection'>
<form id = 'formProduse' class = 'formsignup' method='post'> 
<input type = 'text' placeholder = 'Denumire produs' class ='email' name = 'denumire' value='$denumire'>
<input type = 'number' placeholder = 'Pret' class ='username' min = '1' step = 'any' name= 'pret' value='$pret'>
<input type = 'text' placeholder = 'Ingrediente' class ='password' name= 'ingrediente' value='$ingrediente' >
<input type = 'number' placeholder = 'Gramaj' class ='passwordCheck' min = '1' step ='any' name = 'gramaj' value='$gramaj'>
<input type = 'text' name = 'imagine_produs' placeholder = 'Link imagine' class = 'prenume' value='$imagine_produs' >
<input type = 'hidden' class = 'hiddenid' value = '$id_produse'>
<input type = 'submit' class ='signup'  value ='Actualizati' name='updateProd'>

";

echo "<select form = 'formProduse' class ='numefamilie' style = 'width:246px;' name='id_categorie'>";

$queryCategorii = "SELECT id_categorie, categorie FROM categorie_produse;";
$rezultatQuery = mysqli_query($conexiune, $queryCategorii);



while($query = mysqli_fetch_assoc($rezultatQuery)) {
    $categorie = $query['categorie'];
    $idCateg = $query['id_categorie'];
    
    if($id_categorie == $idCateg)  {
        echo "<option selected = 'selected' value = '$id_categorie'>$categorie_produse</option>";
    }

    else {  
        echo "<option value ='$idCateg'>$categorie</option>";
    }

   
}

echo "</select>";




echo  "<select class = 'statusProdus' form = 'formProduse' name = 'statusProdus_name'>";


$arrayStatusuri = array('activ', 'inactiv');

foreach($arrayStatusuri as $array)
if($statusProdus == $array)  { 
    echo  "<option selected = 'selected' value ='$array'>$array</option>";
    
}
else  { 
    echo  "<option value ='$array'>$array</option>";
}
   
    
echo "</select>
</div>";  } 

else  { 
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
		$('.signup').click(function(e){

			
            var $reper = $(this).closest(".formsignup");
            
               
              var denumireProdus = $reper.find(".email").val();
              var pret = $reper.find(".username").val();
              var ingrediente = $reper.find(".password").val();
              var gramaj = $reper.find(".passwordCheck").val();
              var imagine = $reper.find(".prenume").val();
              var idprod = $reper.find(".hiddenid").val();
              var categorie = $reper.find(".numefamilie").val();
              var status = $reper.find(".statusProdus").val();

             
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'updateProdAdmin.php',
					data: {denumireProdus_ajax: denumireProdus, pret_ajax: pret, ingrediente_ajax: ingrediente, gramaj_ajax: gramaj, imagine_ajax: imagine, idprod_ajax: idprod, categorie_ajax: categorie, status_ajax: status },
					success: function(data){
                        if(data == 0) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Schimbari salvate',
								'text': 'Produsul a fost editat!',
                               
								
								})

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Produsul nu a fost editat!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});
	
</script>
</body>
</html>