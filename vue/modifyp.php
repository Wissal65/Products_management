<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boxicons CDN Link -->
  <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Bostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <!-- botstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <title>modifier produit</title>
</head>
<body>
<?php
session_start();
require 'db_conn.php';
/*
include 'db_conn.php';

if(isset($_POST['submit'])){
  $refproduit=$_POST['refproduit'];
  $prix=$_POST['prix'];
  $nomproduit=$_POST['nomproduit'];
  $qte=$_POST['qte'];
  $dispo=$_POST['dispo'];
  $sql="INSERT INTO gestioncommerciale (refproduit,nomproduit,prixunitaire,qtestock,indisponible) VALUES($refproduit,'$nomproduit',$prix,$qte,'$dispo')";
  

  if(mysqli_query($conn, $sql)){
    header("Location: index.php?msg=New record created successfully");
  }
  else{
    echo"Failed: " . mysqli_error($conn);
     }
}

 */
?>
<div class="home-content">
  <?php include('massage.php'); ?>
      <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Produits</nav>
<div class="container">


  <div class="text-center mb-4">
   
    <h4>Edit Product Informations</h4>
    <p class="text-muted">Click update after changing any information</p>
  </div>
  <div class="container d-flex justify-content-center">
    
<?php
if(isset($_GET["refproduit"])){
  $ref=mysqli_real_escape_string($conn,$_GET["refproduit"] );
  $query="SELECT * FROM produit WHERE refproduit='$ref' ";
  $query_run=mysqli_query($conn, $query);
  if(mysqli_num_rows($query_run) > 0){
    $produit=mysqli_fetch_array($query_run);
    ?>
    

  <form action="code.php" method="post" style="width:50vw; min-width:300px;">
  <input type="hidden" name="ref" value="<?= $produit['refproduit'] ;?>">
<div class="mb-3">
<label class="form-label">Nom Produit:</label>
    <input type="text" class="form-control" name="nomproduit" placeholder="Entrer le nom de produit" value="<?= $produit['nomproduit'];?>" required>
</div>
<div class="mb-3">
<label class="form-label">Prix Unitaire:</label>
    <input type="number" class="form-control" name="prixunitaire" placeholder="Entrer le prix du produit" value="<?=$produit['prixunitaire'];?>" required>
</div>
<div class="mb-3">
<label class="form-label">Quantite de Stock:</label>
    <input type="number" class="form-control" name="qtestock" placeholder="Entrer la Quantite de Stock" value="<?=$produit['qtestock'];?>" required>
</div>
<div class="form-group mb-3">
  <label >Indisponible:</label> &nbsp;
<input type="radio" class="form-check-input" name="indisponible" id="dispo" value="1" <?php echo($produit['indisponible']=='1')?"checked":""; ?>>
<label for="dispo" class="form-input-label">Dispo</label>
&nbsp;
<input type="radio" class="form-check-input" name="indisponible" id="indispo" value="0" <?php echo($produit['indisponible']=='0')?"checked":""; ?>>
<!--
  <input type="radio" class="form-check-input" name="indisponible" id="indispo" value="<?=$produit['indisponible'];?>">
  -->
<label for="indispo" class="form-input-label">Indispo</label>
</div>


  <button type="submit" class="btn btn-success btn-lg " name="update">Update</button>
  <a href=produit.php class="btn btn-danger btn-lg ">Cancel</a>
<!--href=index.php-->



</form>
<?php
}
else{
echo'<h5>No Such RefProduct Found </h5>';
}
}
?>
</div>
</div>
</body>
</html>