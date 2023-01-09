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
            <li ><a href='adminpage.php'>Administrare</a></li>
            <li><a href ='logout.php'>Deconectare</a></li>
           </ul>
    </nav>
    </header>

 

 <div class ='signupsection'>
<form class = 'formsignup' method='post' id ='formProduse'> 
<input type = 'text' placeholder = 'Denumire produs' class ='email' name = 'denumire' required>
<input type = 'number' placeholder = 'Pret' class ='username' min = '1' step = 'any' name= 'pret' required>
<input type = 'text' placeholder = 'Ingrediente' class ='password' name= 'ingrediente' required >
<input type = 'number' placeholder = 'Gramaj' class ='passwordCheck' min = '1' step ='any' name = 'gramaj' required>
<input type = 'text' name = 'imagine_produs' placeholder = 'Link imagine' class = 'prenume' required>";

$queryCategorii = "SELECT id_categorie, categorie FROM categorie_produse ;";
$rezultatQuery = mysqli_query($conexiune, $queryCategorii);

echo "<select form = 'formProduse' class ='numefamilie' style = 'width:246px;' name= 'categorie'>";

while($query = mysqli_fetch_assoc($rezultatQuery)) {
    $categorie = $query['categorie'];
    $id_categorie = $query['id_categorie'];

    echo "<option value = '$id_categorie'>$categorie</option>";
}

echo "</select>";
echo "<input type = 'submit' class ='signup'  value ='Introduce'>
</form>" ;





}


else  { 
    echo "<div class= 'prodCart_container_confirmare'>
        <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
        <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Acces neautorizat !</div> 
        <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
        
    </div>";
}


?>



</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>
	$(function(){
		$('.signup').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

            var $reper = $(this).closest(".formsignup");
            
               
              var denumireprod= $reper.find(".email").val();
              console.log(denumireprod);
              var pret = $reper.find(".username").val();
              console.log(pret);
              var ingrediente = $reper.find(".password").val();
              console.log(ingrediente);
              var gramaj = $reper.find(".passwordCheck").val();
              console.log(gramaj);
              var imagine = $reper.find(".prenume").val();
              console.log(imagine);
              var idcategorie = $reper.find(".numefamilie").val();
              console.log(idcategorie);

             
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'AddProdAdmin.php',
					data: {denumireprod_ajax: denumireprod, pret_ajax: pret, ingrediente_ajax: ingrediente, gramaj_ajax: gramaj, imagine_ajax: imagine, idcategorie_ajax: idcategorie},
					success: function(data){
                        if(data == 0) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Produs adaugat',
								'text': 'Produsul a fost adaugat in oferta restaurantului!',
                               
								
								})

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Produsul nu a fost adaugat!'
								
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