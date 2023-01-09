<?php 

 //$licenta2 =mysqli_connect("localhost", "root", "", "licenta2");
// if(mysqli_connect_errno()){
  //   echo "Eroare".mysqli_connect_error();
  //   exit();
// }
$dbhost ="localhost";
$dbuser = "root";
$dbpass ="";
$dbname ="licenta2";

if(!$conexiune = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("N-a mers conexiunea");
}
