<?php
use LDAP\result;

include 'db_conn.php';
session_start();
$numclient = "";
$nomclient = "";
$raisonsocial = "";
$adresseclient = "";
$villeclient = "";
$pays = "";
$telephone = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET method: Show the data of the client
    if (!isset($_GET["numclient"]) ){
        header("Location: client.php");
        exit;
    }
    $numclient = $_GET["numclient"];

//read the row of the selected client from database table
    $sql = "SELECT * FROM clients WHERE numclient=$numclient";
    $result = mysqli_query($conn, $sql);

    //$result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: client.php");
        exit;
    }

    $nomclient = $row["nomclient"];
    $raisonsocial = $row["raisonsocial"];
    $adresseclient = $row["adresseclient"];
    $villeclient = $row["villeclient"];
    $pays = $row["pays"];
    $telephone = $row["telephone"];


}else {
//POST method: update the data of the client
    $numclient = $_POST["numclient"];
    $nomclient = $_POST["nomclient"];
    $raisonsocial = $_POST["raisonsocial"];
    $adresseclient = $_POST["adresseclient"];
    $villeclient = $_POST["villeclient"];
    $pays = $_POST["pays"];
    $telephone = $_POST["telephone"];

    do {
        if (empty($numclient) ||empty($nomclient) || empty($raisonsocial) || empty($adresseclient) || empty($villeclient) || empty($pays) || empty($telephone)) {
            $errorMessage = "All the fields are required";
            break;
        }
// update data
        $sql = "UPDATE clients " .
            "SET nomclient = '$nomclient', raisonsocial = '$raisonsocial', adresseclient = '$adresseclient', villeclient = '$villeclient', pays ='$pays', telephone = '$telephone' " .
            "WHERE numclient = $numclient";

        $result = mysqli_query($conn, $sql);
        // $result = $conn->query($sql);
        /*if(!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: client.php");*/
        if( $result){
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
    <title>ADD Client</title>
</head>

<body>
<?php include('massage.php'); ?>
<nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Clients</nav>
    <div class="container" >
    
    <div class="text-center mb-4">
   
   <h4>Edit Client Informations</h4>
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
                <label class="form-label">Nom Client:</label>
                    <input type="text" class="form-control" name="nomclient" 
                    placeholder="Entrer le nom de client"
                    value="<?php echo $nomclient; ?> " required>
            </div>

            <div class=" mb-3">
                <label class="form-label">Raison Sociale:</label>
                    <input type="text" class="form-control" name="raisonsocial" 
                    placeholder="Entrer la raison social"
                    value="<?php echo $raisonsocial; ?>" required>
            </div>


            <div class=" mb-3">
                <label class="form-label">Adresse Client:</label>
                    <input type="text" class="form-control"
                    placeholder="Entrer l'adresse du client"
                    name="adresseclient" value="<?php echo $adresseclient; ?>" required>
            </div>

            <div class=" mb-3">
                <label class="form-label">Ville Client:</label>
                    <input type="text" class="form-control"
                    placeholder="Entrer la ville du client"
                    name="villeclient" value="<?php echo $villeclient; ?>" required>
            </div>

            <div class=" mb-3">
                <label class="form-label">Pays:</label>
                    <input type="text" class="form-control"
                    placeholder="Entrer le pays du client"
                    name="pays" value="<?php echo $pays; ?>" required>
            </div>

            <div class=" mb-3">
                <label class="form-label">Telephone:</label>
                    <input type="text" class="form-control"
                    placeholder="Entrer le numero de telephone"
                    name="telephone" value="<?php echo $telephone; ?>" required>
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
               
            </div>

            


        </form>
    </div>
</body>
</html>