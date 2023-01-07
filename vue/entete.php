<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php 
          echo ucfirst(str_replace(".php","",basename($_SERVER["PHP_SELF"])));
          ?></title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css"/>
    <link rel="stylesheet" href="../public/css/style.css"/>
    <link rel="stylesheet" href="../public/css/chart.css"/>
    <link rel="stylesheet" href="../public/css/style.css"/>
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Bostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--barchart-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
 
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- botstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <div class="sidebar">
      <div class="logo-details">
      <i class="bi bi-code-slash"></i>
        
        <span class="logo_name"> WS-SITE</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashbord.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="client.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="produit.php">
          <i class="bi bi-bag"></i>
            <span class="links_name">Produit</span>
          </a>
        </li>
        <li>
          <a href="commandes.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commande</span>
          </a>
        </li>
        <li>
          <a href="lignecommande.php">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Ligne Commmande</span>
          </a>
        </li>
        <li>
          <a href="archive.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Archive</span>
          </a>
        </li>
        <li>
          <a href="analyses.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analyses</span>
          </a>
        </li>
        
        
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="index.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"><?php //Dashbord
          echo ucfirst(str_replace(".php","",basename($_SERVER["PHP_SELF"])));
          ?></span>
        </div>
        <form >
        <div class="search-box">
          <input  type="text" id="myInput" onkeyup="myFunction()"
          placeholder="Recherche... " style="width:33vw;" />
          <button type="submit" style="border:0 ;right:45px;  "class="bx bx-search"></button>
        </div>
        </form>
        <!--
          <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        -->

        <div class="profile-details">
          <img src="../public/img/wissal.jpg" alt="">
          <span class="admin_name">Wissal salma</span>
          <i class="bx bx-chevron-down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class='dropdown-toggle' role="button"></i>

          <div class="dropdown-menu" class="mb-3">
  <a class="dropdown-item" href="#"><i class="bi bi-gear" arria-hidden="true"></i>  Configuration</a>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="index.php"><i class="bi bi-box-arrow-right" arria-hidden="true"></i> Déconnexion</a>
</div>
        </div>
      </nav>

      <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
        
    