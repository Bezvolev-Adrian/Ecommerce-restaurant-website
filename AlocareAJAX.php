<?php 
include("db.php");


$queryComenziID = "SELECT id_comenzi, Detalii_suplimentare, data_Comanda, Oras_livrare FROM comenzi WHERE status_Comanda = 'pregatita' ";
$rezultatComenziID = mysqli_query($conexiune, $queryComenziID);





$id_form = 0;
while($whileID = mysqli_fetch_assoc($rezultatComenziID)) {
    $id_comenzi = $whileID['id_comenzi'];
    $detalii = $whileID['Detalii_suplimentare'];
    $data_comanda = $whileID['data_Comanda'];
    $oras_livrare = $whileID['Oras_livrare'];
    $id_form++;

$queryKS = "SELECT p.denumire, c.cantitate FROM produse as p INNER JOIN produse_comenzi as c ON p.id_produse= c.id_produse WHERE id_comenzi = $id_comenzi ";
$rezultatQueryKS = mysqli_query($conexiune, $queryKS);

$querySoferi = "SELECT id_soferi, nume FROM soferi WHERE NOT id_soferi = 2 AND oras = '$oras_livrare'";
$rezultatQsoferi = mysqli_query($conexiune, $querySoferi);

echo "<div  style= 'background-image: url(backgroundproduse.svg); background-repeat: no-repeat; display: inline-block; height: 500px; width: 510px; margin-top: 10px; margin-left: 50px;'  >";
echo "<div class = 'nrcomanda' style='position:relative; top:6%; left:33%; color:white; font-size:25px; width:200px;'> Comanda nr. $id_comenzi</div>
        <div  style='position:relative; top: 6%; left:33%; color:white; font-size:20px; width:200px;'> $data_comanda</div>
        <div  style='position:relative; top: 65%; left:40%; color:white; font-size:20px; width:200px;'>$oras_livrare</div>
      <form method = 'post' class = 'formUpdate_status' id= '$id_form'> 
      <input type= 'submit' name= 'submitAlocare' class = 'butonAlocare' value = 'Aloca' style= 'font-size:35px; position:relative; top:10%; left:78%; background-color: #921f1c; border:none; color:white; cursor:pointer; border-radius: 10px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>
      <input type = 'hidden' value = '$id_comenzi' name = 'hiddenIDcomenziPregatite' class = 'idcomanda'>";
      echo "<select form ='$id_form' class = 'idsofer' name = 'soferiValue' style = 'position: relative; top: 55px; left:55%; font-size:25px; background-color: #921f1c; cursor:pointer; padding:7px; border-radius:10px;  color:white; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border:none; width:100px;'>";

while($queryS = mysqli_fetch_assoc($rezultatQsoferi)) { 
        $id_soferi = $queryS["id_soferi"];
        $numeSoferi = $queryS["nume"];

    echo "<option value='$id_soferi'>$numeSoferi</option>";
}
echo "</select>";
    
    echo "</form> ";

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



?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script type='text/javascript'>
	$(function(){
		$('.butonAlocare').click(function(e){

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
            
               
              var idcomanda= $form_reper.find(".idcomanda").val();
            console.log(idcomanda);
              var idsofer= $form_reper.find(".idsofer").val();
              console.log(idsofer);
				

				$.ajax({
					type: 'POST',
					url: 'UpdateStatusComandaPregatita.php',
					data: {idcomanda_ajax: idcomanda, idsofer_ajax: idsofer},
					success: function(data){
                        if(data == 0 ) {
                            
                        
                        
					Swal.fire({ 
                                'icon': 'success',
								'title': 'Comanda pregatita',
								'text': 'Comanda a fost trimisa mai departe catre livrare!',
                               
								
								}).then(function(){
                                    window.location = 'AlocareSoferi.php';
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