<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boxicons -->
  <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <title>ajouter produit</title>
</head>
<body>
<?php
session_start();
?>
<div class="home-content">
  <?php include('massage.php'); ?>
      <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Produit</nav>
<div class="container">
  <div class="text-center mb-4">
   
    <h4>Add New Produit</h4>
    <p class="text-muted">Complete the form below to add a new produit</p>
  </div>
  <div class="container d-flex justify-content-center"><form action="code.php" method="post" style="width:50vw; min-width:300px;">

<!--
  <div class="row mb-3">
  <div class="col">
    <label class="form-label">First Name:</label>
    <input type="text" class="form-control" name="first_name" placeholder="Albert">
  </div>
  <div class="col">
    <label class="form-label">Last Name:</label>
    <input type="text" class="form-control" name="last_name" placeholder="Alberttt">
  </div>
</div>
-->
<!--
  <div class="mb-3">
<label class="form-label">Reference du Produit:</label>
    <input type="number" class="form-control" name="refproduit" placeholder="Entrer la reference du produit">
</div>
-->
<div class="mb-3">
<label class="form-label">Nom Produit:</label>
    <input type="text" class="form-control" name="nomproduit" placeholder="Entrer le nom de produit" required>
</div>
<div class="mb-3">
<label class="form-label">Prix Unitaire:</label>
    <input type="number" class="form-control" name="prixunitaire" placeholder="Entrer le prix du produit" required>
</div>
<div class="mb-3">
<label class="form-label">Quantite de Stock:</label>
    <input type="number" class="form-control" name="qtestock" placeholder="Entrer la Quantite de Stock" required>
</div>
<div class="form-group mb-3">
  <label >Indisponible:</label> &nbsp;
  <input type="radio" class="form-check-input" name="indisponible" id="dispo" value='1' required>
<label for="dispo" class="form-input-label">Dispo</label>
&nbsp;
<input type="radio" class="form-check-input" name="indisponible" id="indispo" value='0' required>
<label for="indispo" class="form-input-label">Indispo</label>
</div>


  <button type="submit" class="btn btn-success btn-lg " name="submit">Save</button>
  <a href=produit.php class="btn btn-danger btn-lg ">Cancel</a>
</form></div>
</div>
</body>
</html>