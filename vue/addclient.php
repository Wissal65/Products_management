<?php

use LDAP\Result;
session_start();
include 'db_conn.php';

$nomclient = "";
$raisonsocial = "";
$adresseclient = "";
$villeclient = "";
$pays = "";
$telephone = "";

$errorMessage = "";
$successMessage = "";
      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomclient = $_POST["nomclient"];
    $raisonsocial = $_POST["raisonsocial"];
    $adresseclient = $_POST["adresseclient"];
    $villeclient = $_POST["villeclient"];
    $pays = $_POST["pays"];
    $telephone = $_POST["telephone"];

    do {
        if(empty($nomclient) || empty($raisonsocial) || empty($adresseclient) || empty($villeclient ) || empty($pays ) || empty($telephone )) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new client to database
        $sql = "INSERT INTO clients (nomclient, raisonsocial, adresseclient, villeclient, pays, telephone)".
           "VALUES('$nomclient', '$raisonsocial', '$adresseclient', '$villeclient', '$pays', '$telephone')";
           $Result = mysqli_query($conn, $sql);

        // $Result = $conn->query($sql);

        /*if (!$Result ) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $nomclient = "";
        $raisonsocial = "";
        $adresseclient = "";
        $villeclient = "";
        $pays = "";
        $telephone = "";

        $successMessage = "Client added correctly";

        header("Location: client.php");
        exit;*/
        if( $Result){
            $_SESSION["message"]="New record created successfully";
           header("Location: client.php");
           exit(0); 
          }
          else{
            $_SESSION["message"]="New record Not created";
           header("Location: client.php");
           exit(0);
          }
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
    <!-- Boxicons -->
  <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- botstrap-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>ADD Client</title>
</head>

<body>
    
<div class="home-content">
<?php include('massage.php'); ?>
      <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Client</nav>
<div class="container">
  <div class="text-center mb-4">
   
    <h4>Add New Client</h4>
    <p class="text-muted">Complete the form below to add a new client</p>
  </div>
  <div class="container d-flex justify-content-center"><form  method="post" style="width:50vw; min-width:300px;">
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

        <form method="post" style="width:50vw; min-width:300px;">

            <div class="mb-3">
                <label class="form-label">Nom Client:</label>
                    <input class="form-control" type="text" name="nomclient"  required  placeholder="Entrer le nom du client">
            </div>

            <div class="mb-3">
                <label class="form-label">Raison Sociale:</label>
                    <input type="text" class="form-control" name="raisonsocial" value="<?php echo $raisonsocial; ?>" required
                    placeholder="Entrer la raison social" >
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse Client:</label>
                    <input type="text" class="form-control" name="adresseclient" value="<?php echo $adresseclient; ?>"
                    required
                    placeholder="Entrer l'adresse du client" >
            </div>

            <div class="mb-3">
                <label class="form-label">Ville Client:</label>
                    <input type="text" class="form-control" name="villeclient" value="<?php echo $villeclient; ?>"
                    required
                    placeholder="Entrer la ville du client" >
                    </div>
                <div class="mb-3">
                <label class="form-label">Pays:</label>
                    <input type="text" class="form-control" 
                    name="pays" value="<?php echo $pays; ?>"
                    placeholder="Entrer le pays du client"
                    required >
                    </div>
                <div class=" mb-3">
                <label class="form-label">Telephone:</label>
                    <input type="text" class="form-control" name="telephone" value="<?php echo $telephone; ?>"
                    required
                    placeholder="Entrer le numero de telephone" >

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
                    <a class="btn btn-danger btn-lg " href="client.php">Cancel</a>
               

            


        </form></div>
</div>
</body>
</html>