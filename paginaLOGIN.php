<?php 
session_start();



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
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>
	$(function(){
		$('#submitLoginID').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


               
              var username = $('#usernameLogin').val();
              var password = $('#parolaLogin').val();
          
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'ajaxLogin.php',
					data: {username: username, password: password},
					success: function(data){
                        if(data == 0) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Conectare reusita',
								'text': 'Te-ai conectat cu succes!',
                               
								
								}).then(function(){
                                    window.location = 'licenta2.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare la conectare',
								'text': data
								
								})
                            }
							
					}
				
				});

				
			}else{
				
			}


		});		

		
	});
	
</script>


</head>
<body>
    <?php 
    
    if(isset($_SESSION['username']))  { 
        echo "<div class= 'prodCart_container_confirmare'>
        <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
        <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Sunteti deja conectat!</div> 
        <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
        
    </div>";

    }
    else { 
         echo "<div>
         <header class = 'recipient'> 
             
     
          <a href='licenta2.php'>
             <img src = 'logoChinese2_75.png' class ='logo' alt = 'logo'>
          </a> 
     
         <nav class ='baradenavigatie'> 
             <ul class = 'baradenavigatielista'>
                 <li ><a href='licenta2.php'>Acasa</a></li>
                 <li><a href='paginaSIGNUP.php'>Inregistrare</a></li>
                 
             
             
             </ul>
         </nav>
         </header>
     </div>
      <?php 
     
     ?> 
     
     <div class ='loginsection' id= 'javascriptLogin'> 
         <form class ='formlogin' method= 'POST' >
             <input type='password' class ='password' name = 'password' placeholder='Parola' id = 'parolaLogin'>  
             <input type='text' class ='username' name = 'username' placeholder='Nume utilizator' id ='usernameLogin'required> 
              <label for = 'usernameLogin' class = 'labelOras' style = 'top:16%; left:5%;'>Username :</label>
              <label for = 'parolaLogin' class = 'labelOras' style = 'top:26%; left:5%;'>Parola :</label>
             <input type = 'submit' class='login' name='login' value ='Conectare' id = 'submitLoginID'>   
         </form>
     
     </div> ";
    }

 

?>
 
</body>
</html>