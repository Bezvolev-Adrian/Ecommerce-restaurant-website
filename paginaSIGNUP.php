<?php 
session_start();
include("db.php");
include("functiiPtLogare.php");

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <script type="text/javascript">
	$(function(){
		$('#submitAlert').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


                var email = $('#email').val();
              var username = $('#username').val();
              var password = $('#password').val();
              var numeprenume = $('#numeprenume').val();
              var varsta = $('#varsta').val();
              var oras = $('#oras').val();
              var strada = $('#strada').val();
              var nrtelefon = $('#nrtelefon').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'testAJAX.php',
					data: {email: email, username: username, password: password, numeprenume: numeprenume, varsta: varsta, oras: oras, strada: strada, nrtelefon: nrtelefon},
					success: function(ceva){
                        if(ceva == 0) {
                            
                        
                        
					Swal.fire({ 
                'icon': 'success',
								'title': 'Inregistrare completa',
								'text': 'Contul a fost creat cu succes!',
                'footer': 'Vei fi redirectionat catre pagina de conectare'
								
								}).then(function(){
                                    window.location = 'paginaLOGIN.php';
                                })
                            } 
                          else { 
                                Swal.fire({ 
                'icon': 'error',
								'title': 'Inregistrarea nu s-a putut finaliza!',
								'text': ceva,
								
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
    

 <div>
    <header class = "recipient"> 
      
     <a href="licenta2.php">
        <img src = "logoChinese2_75.png" class ="logo" alt = "logo">
     </a> 

    <nav class ="baradenavigatie"> 
        <ul class = "baradenavigatielista">
            <li ><a href="licenta2.php">Acasa</a></li>
            <li><a href = "paginaLOGIN.php">Conectare</a></li> 
            
        
        </ul>
    </nav>
    </header>
</div>

<div class= "signupsection" id= "javascriptSignup">
                <form class ="formsignup" method="post" style = 'width:650px' >
             <input type="email" class ="email" name = "email" placeholder="email" id ='email' required >
             <input type="text" class ="username" name = "username" placeholder="Nume de utilizator"  id ='username' required>
             <input type="password" class ="password" name = "password" placeholder="Parola" id ='password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Parola trebuie sa contina cel putin un numar, o litera mica, o majuscula si sa contina minim 8 caractere"required>
             <input type = "text" placeholder = "Nume & Prenume" class = "passwordCheck" name ="numeprenume"  id ='numeprenume' pattern = "^[A-Za-z \s*]+$" required>
             <input type = "number" placeholder = "Varsta" class = "numefamilie" min = "10" max = '100' name= "varsta" id ='varsta' style = 'width: 288px;'required>
            

             <label for = 'selectoras' class = 'labelOras' style = 'top:56%; left:19%;'>Orasul :</label>
             <label for = 'email' class = 'labelOras' style = 'top:6%; left:19%;'>Email :</label>
             <label for = 'username' class = 'labelOras' style = 'top:16%; left:15%;'>Username :</label>
             <label for = 'password' class = 'labelOras' style = 'top:26%; left:19%;'>Parola :</label>
             <label for = 'numeprenume' class = 'labelOras' style = 'top:36%; left:19%;'>Nume :</label>
             <label for = 'varsta' class = 'labelOras' style = 'top:46%; left:19%;'>Varsta :</label>
             <label for = 'strada' class = 'labelOras' style = 'top:66%; left:19%;'>Adresa :</label>
             <label for = 'nrtelefon' class = 'labelOras' style = 'top:76%; left:18%;'>Telefon :</label>
             <select class ="prenume"  name="oras" style ='width:288px;' id ='oras'>
             <option value = 'Bucuresti'>Bucuresti</option>
             <option value = 'Ploiesti'>Ploiesti</option>
             <option value = 'Constanta'>Constanta</option>
             <option value = 'Brasov'>Brasov</option>
             <option value = 'Timisoara'>Timisoara</option>
             <option value = 'Sibiu'>Sibiu</option>
             <option value = 'Targu Mures'>Targu Mures</option>
              </select>

             <input type="text" class ="nrtelefon"  placeholder = "Strada & numar & bloc"  name="strada" id = 'strada'required >
             <input type="tel" class = "subNrTelefon" placeholder = "0744811425" name = 'nrtelefon' id = 'nrtelefon' pattern = '[0]{1}[1-9]{9}'required  >
             <input type ="submit" class ="signup" name ="signup" value="Inscriere" style = 'bottom:2%; left:43%;' id ='submitAlert'>
               </form> 
</div>


<div id="message">
  <h3>Parola trebuie sa contina:</h3>
  <p id="letter" class="invalid">O litera mica</p>
  <p id="capital" class="invalid">O majuscula</p>
  <p id="number" class="invalid">Un numar</p>
  <p id="length" class="invalid">Minimum 8 caractere</p>
</div>


</div>


<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "inline-block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>