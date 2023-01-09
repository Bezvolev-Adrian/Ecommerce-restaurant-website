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
    <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>


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
    </header> ";
    




echo "<div style = 'font-size:50px; color:white; position: absolute; left:25%; top:30%;'>Top orase in functie de numarul de comenzi </div>";
echo "<div style= 'position: absolute; top:40%; left:25%; width: 860px; background-color: white;'>";

echo "<canvas id='myChart' width='auto' height='auto'></canvas>";

echo "</div>";

$queryTotalPerCategorie = "SELECT COUNT(id_comenzi) AS totalCantitatePerCateg, Oras_livrare FROM comenzi GROUP BY Oras_livrare ORDER BY COUNT(id_comenzi) DESC   ;";
$rezultatPerCategorie = mysqli_query($conexiune, $queryTotalPerCategorie);
$dataCategorie = array();

if(mysqli_num_rows($rezultatPerCategorie) > 0) { 
while($queryPer = mysqli_fetch_assoc($rezultatPerCategorie)) {

    $dataCategorie[] = $queryPer;  
 
}
}



foreach ($dataCategorie as $data) { 

    $arrayTotal[] = $data['totalCantitatePerCateg'];
    $arrayCateg[] = $data['Oras_livrare'];
    
    
        $encoded = json_encode($arrayCateg);
        $encodedTotal = json_encode($arrayTotal);
}

}
else {
    echo "<div class= 'prodCart_container_confirmare'>
    <i class='fa fa-times-circle' aria-hidden='true' style= 'position:relative; top:5%; left:41%; color:white; font-size:250px;'></i>
    <div class = 'mesajConfirmare' style= 'position:relative; top:7%; left:43%; color:white; font-size:25px; width:325px;'>Acces neautorizat !</div> 
    <a href = 'licenta2.php' style='position:relative; top:22%; left:42%; font-size:25px; box-shadow: 0px 12px 16px 0px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); padding:15px; border-radius: 10px; letter-spacing: 0.5px;'>Inapoi in magazin</a>
    
</div>";
}

?> 


<script>

var encoded = '<?=$encoded?>';
var encodedTotal = '<?=$encodedTotal?>';
var data = JSON.parse(encoded);
var dataTotal = JSON.parse(encodedTotal);



const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: data,
        datasets: [{
            label: 'Numar comenzi per oras',
            data: dataTotal,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
    
        scales: {
            y: {
                ticks: { 
                    color: 'black',
                    padding: 5
                  
                },
                beginAtZero: true
            },
            x: { 
                ticks: { 
                    color: 'black'
                }
            }
        },
        plugins: { 
        legend: { 
            labels: { 
                color: 'black'
            }
        }
    }
}
});
</script>


</body>
</html>