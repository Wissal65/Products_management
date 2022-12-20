
<?php
session_start();
if ( isset($_GET["numcommande"]) ) {
    $numcommande = $_GET["numcommande"];

    include 'db_conn.php';

//     $sql = "DELETE FROM commandes WHERE numcommande=$numcommande";
//     $result = mysqli_query($conn, $sql);

//    // $conn->query($sql);

// Étape 2 : préparer la requête SELECT
//$numcommande = 123;
$sql ="SELECT * FROM commande WHERE numcommande = $numcommande";
$result = mysqli_query($conn, $sql);
// Étape 3 : exécuter la requête et récupérer les résultats


// Étape 4 : préparer la requête INSERT INTO

$sql="INSERT INTO archive ( numcommande,numclient,datecommande)
   SELECT numcommande,numclient,datecommande
   FROM commande
   WHERE  numcommande = $numcommande";

$result = mysqli_query($conn, $sql);


// Étape 6 : préparer la requête DELETE

$query = "DELETE FROM lignecommande
 WHERE numcommande IN (
   SELECT numcommande FROM commande
   WHERE numcommande = $numcommande
 )
 ";
 $result = mysqli_query($conn, $query);

$sql = "DELETE FROM commande WHERE numcommande = $numcommande";
$result = mysqli_query($conn, $sql);


}
if( $result){
  $_SESSION["message"]="New record created successfully";
 header("Location: commandes.php");
 exit(0); 
 } else{
  $_SESSION["message"]="New record Not created";
 header("Location: commandes.php");
 exit(0);
 } 
?>