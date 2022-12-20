<?php
session_start();
require "db_conn.php";

if(isset($_POST['delete'])){
  $ref=mysqli_real_escape_string($conn,$_POST['delete']) ;
  $query="DELETE FROM produit
   WHERE refproduit='$ref'";
   $query_run=mysqli_query($conn, $query);
   if($query_run){
     $_SESSION['message']="Record Deleted Successefully";
     header("Location: produit.php");
     exit(0);
   }
   else{
     $_SESSION["message"]="Record Not Deleted";
     header("Location: produit.php");
     exit(0);
   }
}
//delete Dcommande
if(isset($_POST['delete1'])){
  $numcommande=mysqli_real_escape_string($conn,$_POST['delete1']) ;
  $numcommande = intval($numcommande);
 // $query="DELETE FROM lignecommande
// WHERE refproduit='$ref'";

   $query="INSERT INTO archive ( numcommande,numclient,datecommande)
   SELECT numcommande,numclient,datecommande
   FROM commande
   WHERE  numcommande = $numcommande;
  ";
   
   if(mysqli_query($conn, $query)){
    //$query="DELETE FROM lignecommande WHERE  numcommande = $numcommande";
    $query = "DELETE FROM lignecommande
  WHERE numcommande IN (
    SELECT numcommande FROM commande
    WHERE numcommande = $numcommande
  )
";
mysqli_query($conn, $query);
$query = "DELETE FROM commande WHERE numcommande = $numcommande";
    if(mysqli_query($conn, $query)){
      $_SESSION['message']="Record Deleted Successefully";
      header("Location: lignecommande.php");
      exit(0);
    }
    else{
      $_SESSION["message"]="Record Not Deleted";
      header("Location: lignecommande.php");
      exit(0);
    }
   }
   
}
//update product
if(isset($_POST['update'])){
  $ref=mysqli_real_escape_string($conn,$_POST['ref']) ;

  $prixunitaire=mysqli_real_escape_string($conn,$_POST['prixunitaire']) ;
  $prixunitaire = intval($prixunitaire);
  $nomproduit=mysqli_real_escape_string($conn,$_POST['nomproduit']) ;
  $qtestock=mysqli_real_escape_string($conn,$_POST['qtestock']) ;
  $qtestock = intval($qtestock);
  $indisponible=mysqli_real_escape_string($conn,$_POST['indisponible']) ;
  $query="UPDATE produit  SET nomproduit='$nomproduit', prixunitaire=$prixunitaire, qtestock=$qtestock, indisponible='$indisponible' 
  WHERE refproduit='$ref'";
  $query_run=mysqli_query($conn, $query);
  if($query_run){
    $_SESSION['message']="Information Update Successefully";
    header("Location: produit.php");
    exit(0);
  }
  else{
    $_SESSION["message"]="Information Not Updated";
    header("Location: produit.php");
    exit(0);
  }
}
//update Dcommande
if(isset($_POST['update1'])){
 // $ref=mysqli_real_escape_string($conn,$_POST['ref']) ;

  $numcommande=mysqli_real_escape_string($conn,$_POST['numcommande']) ;
  $numcommande = intval($numcommande);
  $refproduit=mysqli_real_escape_string($conn,$_POST['refproduit']) ;
  $refproduit = intval($refproduit);
  $quantite=mysqli_real_escape_string($conn,$_POST['quantite']) ;
  $quantite = intval($quantite);
  $query="UPDATE lignecommande   SET quantite=$quantite
  WHERE refproduit=$refproduit AND numcommande= $numcommande";
  $query_run=mysqli_query($conn, $query);
  if($query_run){
    $_SESSION['message']="Information Update Successefully";
    header("Location: lignecommande.php");
    exit(0);
  }
  else{
    $_SESSION["message"]="Information Not Updated";
    header("lignecommande: lignecommande.php");
    exit(0);
  }
}



//add product
if(isset($_POST['submit'])){
 /* $refproduit=mysqli_real_escape_string($conn,$_POST['refproduit']) ;
  $refproduit = intval($refproduit);*/
  $prixunitaire=mysqli_real_escape_string($conn,$_POST['prixunitaire']) ;
  $prixunitaire = intval($prixunitaire);
  $nomproduit=mysqli_real_escape_string($conn,$_POST['nomproduit']) ;
  $qtestock=mysqli_real_escape_string($conn,$_POST['qtestock']) ;
  $qtestock = intval($qtestock);
  $indisponible=mysqli_real_escape_string($conn,$_POST['indisponible']) ;

  $query="INSERT INTO produit (nomproduit,prixunitaire,qtestock,indisponible) VALUES('$nomproduit',$prixunitaire,$qtestock,'$indisponible')";
  $query_run=mysqli_query($conn, $query);
  if( $query_run){
    $_SESSION["message"]="New record created successfully";
   header("Location: produit.php");
   exit(0); 
  }
  else{
    $_SESSION["message"]="New record Not created";
   header("Location: produit.php");
   exit(0);
  }

 
}

//for ligne commande
if(isset($_POST['submit1'])){
  /* $refproduit=mysqli_real_escape_string($conn,$_POST['refproduit']) ;
   $refproduit = intval($refproduit);*/
   $refproduit=mysqli_real_escape_string($conn,$_POST['refproduit']) ;
   $refproduit = intval($refproduit);
   $numcommande=mysqli_real_escape_string($conn,$_POST['numcommande']) ;
   $numcommande = intval($numcommande);
   $quantite=mysqli_real_escape_string($conn,$_POST['quantite']) ;
   $quantite = intval($quantite);
  
 //testing 
 $sql_produit = "SELECT * FROM produit WHERE refproduit=$refproduit";
 $result_produit = mysqli_query($conn, $sql_produit);
 
 $sql_commande = "SELECT * FROM commande WHERE numcommande=$numcommande";
 $result_commande = mysqli_query($conn, $sql_commande);
// Si la référence du produit et le numéro de commande existent, ajout de la ligne à la table detailscommande
if (mysqli_num_rows($result_produit) > 0 && mysqli_num_rows($result_commande) > 0) {
   $query="INSERT INTO lignecommande(numcommande,refproduit,quantite) VALUES($numcommande,$refproduit,$quantite)";
   $query_run=mysqli_query($conn, $query);
   if( $query_run){
     $_SESSION["message"]="New record created successfully";
    header("Location: lignecommande.php");
    exit(0); 
    } else{
     $_SESSION["message"]="New record Not created";
    header("Location: lignecommande.php");
    exit(0);
    } 
  }
  else {
    $_SESSION["message"]="La reference du produit ou le numero de commande n'existent pas dans les tables respectives";
    header("Location: lignecommande.php");
    exit(0);
}
  
 }
?>