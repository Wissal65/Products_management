<?php
session_start();
if ( isset($_GET["numclient"]) || isset($_GET["numcommande"] )   ) {
    $numclient = $_GET["numclient"];
    include 'db_conn.php';
  
    $sql ="SELECT * FROM commande WHERE numclient = $numclient";
    $result = mysqli_query($conn, $sql);
// Étape 3 : exécuter la requête et récupérer les résultats


// Étape 4 : préparer la requête INSERT INTO

$sql="INSERT INTO archive ( numcommande,numclient,datecommande)
   SELECT numcommande,numclient,datecommande
   FROM commande
   WHERE  numclient = $numclient";

$result = mysqli_query($conn, $sql);


// Étape 6 : préparer la requête DELETE

$query = "DELETE FROM lignecommande
 WHERE numcommande IN (
   SELECT numcommande FROM commande
   WHERE numcommande IN (
    Select numcommande from commande
    WHERE numclient = $numclient)

 )
 ";
 $result = mysqli_query($conn, $query);


    $ssql = "delete from commande where numclient in (select numclient from clients where numclient=$numclient)";
    $result = mysqli_query($conn, $ssql);

    $sql = "DELETE FROM clients WHERE numclient=$numclient";
    $result = mysqli_query($conn, $sql);

   // $_SESSION['message'] = "Delete Success : Client a été bien supprimé ainsi que";

   // $conn->query($sql);
}


if( $result){
    $_SESSION["message"]="Record Deleted successfully";
   header("Location: client.php");
   exit(0); 
   } else{
    $_SESSION["message"]="Record Not Deleted ";
   header("Location: client.php");
   exit(0);
   } 


?>



