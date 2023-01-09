<?php 
        session_start();
        require_once('db.php');
        
        $id_soferi = $_GET['GetIDSoferi'];
        $query = "SELECT nume, telefon, oras FROM soferi WHERE id_soferi = $id_soferi;";
        $rezultat = mysqli_query($conexiune, $query);

        while($row =mysqli_fetch_assoc($rezultat)) {
            $numeSofer = $row['nume'];
            $telefonSofer = $row['telefon'];
            $oras = $row['oras'];
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
<input type = 'text' placeholder = 'Nume sofer' class ='email' name = 'numeSofer' value='$numeSofer'>
<input type = 'number' placeholder = 'Numar telefon' class ='username' name= 'telefonSofer' value='$telefonSofer'> ";

$arrayOrase = array('Bucuresti', 'Ploiesti', 'Constanta', 'Brasov', 'Timisoara', 'Sibiu', 'Targu Mures');
       echo "<select class ='password'  name='oras' style ='width:286px;' id ='oras'>";
           foreach($arrayOrase as $array) { 
               if($oras == $array)  { 
                   echo  "<option selected = 'selected' value ='$array'>$array</option>";
               }
               else  { 
                   echo "<option value = '$array'>$array</option>";
               }
           }
           
             echo" </select>";

echo "<input type = 'hidden' class ='idsofer' value = '$id_soferi'>
<input type = 'submit' class ='signup'  value ='Actualizati' name='submitSoferi'>
</form>
</div> ";
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
		$('.signup').click(function(e){

			
            var $reper = $(this).closest(".formsignup");
            
               
              var numeSofer = $reper.find(".email").val();
              var telefonSofer = $reper.find(".username").val();
              var oras = $reper.find(".password").val();
              var idSofer = $reper.find(".idsofer").val();
            

             
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'updateSoferi.php',
					data: {numeSofer_ajax: numeSofer, telefonSofer_ajax: telefonSofer, idSofer_ajax: idSofer, oras_ajax: oras},
					success: function(data){
                        if(data == 0) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Schimbari salvate',
								'text': 'Soferul a fost editat!',
                               
								
								}).then(function(){
                                    window.location = 'ListaSoferi.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Soferul nu a fost editat!'
								
								})
                            }
							
					}
                    
				
				});

				
		


		});		

		
	});
	
</script>

</body>
</html> 