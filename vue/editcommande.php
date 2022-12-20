<?php
session_start();
include 'db_conn.php';
use LDAP\result;
$numcommande = "";
$numclient = "";
$datecommande = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET method: Show the data of the commande
    if (!isset($_GET["numcommande"]) ){
        header("Location: commandes.php");
        exit;
    }
    $numcommande = $_GET["numcommande"];

//read the row of the selected commande from database table
    $sql = "SELECT * FROM commande where numcommande=$numcommande ";
    $result = mysqli_query($conn, $sql);

   // $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: commandes.php");
        exit;
    }
    $numcommande = $row["numcommande"];
    $numclient = $row["numclient"];
    $datecommande = $row["datecommande"];
 

}else {
//POST method: update the data of the commande
    $numcommande = $_POST["numcommande"];
    $numclient = $_POST["numclient"];
    $datecommande = $_POST["datecommande"];


    do {
        if (empty($numcommande) ||empty($numclient) || empty($datecommande) ) {
            $errorMessage = "All the fields are required";
            break;
        }
// update data
        $sql = "UPDATE commande " .
            "SET datecommande = '$datecommande' " .
            "WHERE numcommande = $numcommande";

        $result = mysqli_query($conn, $sql);
        // $result = $conn->query($sql);
        /*if($result){
          $_SESSION['message']="Information Update Successefully";
          header("Location: commandes.php");
          exit(0);
        }
        else{
          $_SESSION["message"]="Information Not Updated";
          header("Location: commandes.php");
          exit(0);
        }*/
        if(!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Date commande updated correctly";

        header("location: commandes.php");
    } while (false);
    
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> <!-- //to close errorMessage -->

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
    <title>Edit Commande</title>
</head>

<body>
<?php include('massage.php'); ?>
<nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Gestion des Commandes</nav>
    <div class="container" >
    
    <div class="text-center mb-4">
   
   <h4>Edit Commande Informations</h4>
   <p class="text-muted">Click update after changing any information</p>
 </div>

        <!-- test it it's empty -->
        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <stong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
<div class="container d-flex justify-content-center">
        <form method="post" style="width:50vw; min-width:300px;">
            
        <input type="hidden" name="numclient" value="<?php echo $numclient; ?>">

            <div class=" mb-3">
                <label class="form-label">Num Commande:</label>
                    <input type="text" class="form-control" name="numcommande" 
                    value="<?php echo $numcommande; ?> " readonly>
            </div>

           

            <div class=" mb-3">
                <label class="form-label">Num Client:</label>
                    <input type="text" class="form-control"
                    name="numclient" value="<?php echo $numclient; ?>" readonly>
            </div>

            <div class=" mb-3">
                <label class="form-label">Date Commande:</label>
                    <input type="text" class="form-control"
                    name="datecommande" value="<?php echo $datecommande; ?>">
            </div>

               

<!-- test if it's empty -->
            <?php
        if ( !empty($successMessage)) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <stong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
             </div>

            ";
        }
        ?>
 

 
            
                    <button type="submit" class="btn btn-success btn-lg ">Submit</button>
               
                    <a class="btn btn-danger btn-lg " href="commandes.php">Cancel</a>
               
            </div>

            


        </form>
    </div>
</body>
</html>