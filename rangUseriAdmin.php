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
    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css'>
    <link rel = 'stylesheet' href= 'tabelsmecher.css'>
    <link rel = 'stylesheet' href= 'tabelsmecher2.scss'>
    <title>Red Dragon Food</title>
    <script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
    <script type='text/javascript' charset='utf8' src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js'></script>


    <script>
    $(document).ready(function() {
        $('#testblanabomba').DataTable( {
            'language': {
                'lengthMenu': 'Afiseaza _MENU_ intrari',
                'zeroRecords': 'Nu au fost gasite inregistrari care sa se potriveasca',
                'info': ' Se afiseaza de la _START_ la _END_ din _TOTAL_ intrari',
                'search': 'Cauta:',
                'paginate': {
                'next': 'Urmatoarea pagina',
                'previous': 'Pagina anterioara'
            },
            }
        } );
    } );
</script>

<script>   

$(document).ready( function () {
    $('#testblanabomba').DataTable();
} );

 </script>
 
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
            <li><a href = 'adminpage.php'>Administrare</a></li>
         <li><a href ='logout.php'>Deconectare</a></li>
    

        </ul>
    </nav>
    </header> ";
    




$id_utilizatori = $_GET['GetID'];
$queryUseri = "SELECT username, rang_utilizatori FROM utilizatori WHERE id_utilizatori = $id_utilizatori";
$rezultatquery = mysqli_query($conexiune, $queryUseri);
while($quer = mysqli_fetch_assoc($rezultatquery)) { 

    $username = $quer['username'];
    $rangActual = $quer['rang_utilizatori'];
  
}
echo "<div style = 'font-size:50px; color:white; position: absolute; left:35%; top:30%;'> Modifica utilizatorul: $username </div>
<div style = 'font-size:50px; color:white; position: absolute; left:35%; top:62%;'> Categorie actuala: $rangActual </div>
<div style= 'position: absolute; top:40%; left:20%; width: 1110px; '>";



echo "<form method = 'post' id = 'formRang' action ='updateRangAdmin.php?GetID=$id_utilizatori' class = 'formRang'> 
    <input type= 'submit' class = 'submitButton' name = 'submitRang' value = 'Modifica' style = 'position:absolute; top:130px; left:44%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border:none;'>
    <input type = 'hidden' class = 'idhidden' value = '$id_utilizatori'>

<label for= 'selectRang' style= 'color:white; position:relative; left:39%; bottom:35px; font-size:25px;' >Selecteaza o categorie</label>
<select id = 'selectRang' class = 'ranguseri' form = 'formRang' name = 'rangName' style = 'position: relative; top: 10px; left:20%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border:none;'>";
$arrayRanguri = array('Administrator', 'Bucatar', 'Client');

foreach($arrayRanguri as $array)  { 
    if($rangActual == $array)  { 
        echo  "<option selected = 'selected' value ='$array'>$array</option>";
        
    }
    else  { 
        echo  "<option value ='$array'>$array</option>";
    }
}


echo "</select>
</form>";








echo "</div>";

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
		$('.submitButton').click(function(e){

			
            var $reper = $(this).closest(".formRang");
            
               
              var rang = $reper.find(".ranguseri").val();
              var iduser = $reper.find(".idhidden").val();
            

             
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'updateRangAdmin.php',
					data: {rang_ajax: rang, iduser_ajax: iduser},
					success: function(data){
                        if(data == 0) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Schimbari salvate',
								'text': 'Rangul utilizatorului a fost editat!',
                               
								
								}).then(function(){
                                    window.location = 'ListaUtilizatori.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Rangul utilizatorului nu a fost editat!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});
	
</script>
 
</body>
</html>