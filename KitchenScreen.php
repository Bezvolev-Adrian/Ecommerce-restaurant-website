<?php 
session_start();
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script> 
            $(document).ready(function() 
            { 
                setInterval(function(){
                   $("#testJQ").load("KSajax.php");

                }, 5000);


            });

    
    </script> 
    
</head>
<body>
<?php 
$queryBucatar = "SELECT oras FROM utilizatori WHERE id_utilizatori = $id_utilizatori ";
$rezultatB = mysqli_query($conexiune, $queryBucatar);
while($rezB = mysqli_fetch_assoc($rezultatB))  { 
    $orasBucatar = $rezB['oras'];
}
if($_SESSION['rang_utilizatori'] == 'Administrator' || $_SESSION['rang_utilizatori'] == 'Bucatar') {
    echo " 

 <div>
    <header class = 'recipient'> 
       

     <a href='licenta2.php'>
        <img src = 'logoChinese2_75.png' class ='logo' alt = 'logo'>
     </a> 
     

    <nav class ='baradenavigatie'> 
        <ul class = 'baradenavigatielista'>
            <li ><a href='licenta2.php'>Acasa</a></li>
            <li><a href ='logout.php'>Deconectare</a></li>
           
        </ul>
    </nav>
    </header>
</div>
<div style = 'font-size:35px; color:white; position: absolute; left:40%; top:28%;'>Comenzi in asteptare - $orasBucatar</div> ";




$queryComenziID = "SELECT id_comenzi, Detalii_suplimentare, data_Comanda  FROM comenzi WHERE status_Comanda = 'preluat' AND Oras_livrare = '$orasBucatar' ";
$rezultatComenziID = mysqli_query($conexiune, $queryComenziID);


echo "
<div class='produse_principal_container' id =  'testJQ'>";


while($whileID = mysqli_fetch_assoc($rezultatComenziID)) {
    $id_comenzi = $whileID['id_comenzi'];
    $detalii = $whileID['Detalii_suplimentare'];
    $data_comanda = $whileID['data_Comanda'];


$queryKS = "SELECT p.denumire, c.cantitate FROM produse as p INNER JOIN produse_comenzi as c ON p.id_produse= c.id_produse WHERE id_comenzi = $id_comenzi ";
$rezultatQueryKS = mysqli_query($conexiune, $queryKS);


echo "<div  style= 'background-image: url(backgroundproduse.svg); background-repeat: no-repeat; display: inline-block; height: 500px; width: 510px; margin-top: 10px; margin-left: 50px;'  >";
echo "<div class = 'nrcomanda' style='position:relative; top:6%; left:33%; color:white; font-size:25px; width:200px;'> Comanda nr. $id_comenzi</div>
      <div  style='position:relative; top: 6%; left:33%; color:white; font-size:20px; width:200px;'> $data_comanda</div>
      <form method = 'post' class = 'formUpdate_status'> 
      <input type = 'hidden' value = '$id_comenzi' name = 'hiddenIDcomenzi' class = 'hiddenIDcomanda'>
      <input type= 'submit' name= 'submitStatus' value = 'X' class ='butonX' style= 'font-size:35px; position:relative; top:10%; left:85%; background-color: #921f1c; border:none; color:white; cursor:pointer; border-radius: 10px; width: 40px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>
      </form>";
     if(strlen($detalii) > 0 )  {
         echo " 
         <div style = 'position: absolute;'>
         <div class = 'tooltip' style = 'top: -40px; left:70%;'> 
                <i class='fas fa-info-circle'></i>
                <span class = 'tooltiptext'>$detalii </span>
             </div> 
             </div>
             
             "; }
             else { 

             }

            
echo "<div class = 'containerProduseComandate' style ='position:absolute; width:300px; height:262px; overflow: auto;'>";    
      while($whileProduse = mysqli_fetch_assoc($rezultatQueryKS)) {
        $denumire = $whileProduse['denumire'];
        $cantitate = $whileProduse['cantitate'];
        $X = 'X';
  
    echo "
        

        <div class = 'produseComandate' style = '; position:relative ;top:7%; left:10%; color:white; font-size:25px; width:250px; height: 30px;'>$cantitate$X $denumire </div>
        
         ";
        
    }
echo "</div>";
  echo"  </div> ";
}


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
		$('.butonX').click(function(e){

            e.preventDefault();
            Swal.fire({

                title: 'Esti sigur?',
                text: "Nu vei putea inversa aceasta actiune!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Anuleaza',
                confirmButtonText: 'Da, sunt sigur!'
}).then((result) => {
  if (result.isConfirmed) {


            var $form_reper = $(this).closest(".formUpdate_status");
            
               
              var idcomanda= $form_reper.find(".hiddenIDcomanda").val();
              console.log(idcomanda);
           
				

				$.ajax({
					type: 'POST',
					url: 'UpdateStatusComanda.php',
					data: {idcomanda_ajax: idcomanda},
					success: function(data){
                        if(data == 0 ) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Comanda pregatita',
								'text': 'Comanda a fost trimisa mai departe catre livrare!',
                               
								
								}).then(function(){
                                    window.location = 'KitchenScreen.php';
                                })

                            } else { 
                                Swal.fire({ 
                                'icon': 'error',
								'title': 'Eroare',
								'text': 'Comanda nu a fost trimisa mai departe catre livrare!'
								
								})
                            }
							
					}
                    
				
				});
  }
})
		     

		});		

		
	});
	
</script>

</body>
</html>