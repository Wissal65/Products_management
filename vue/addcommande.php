<?php
use LDAP\Result;
session_start();
include 'db_conn.php';

$numcommande = "";
$numclient = "";
$datecommande = "";


$errorMessage = "";
$successMessage = "";
      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //  $numcommande = $_POST["numcommande"];
    $numcommande = $_POST["numcommande"];
    $numclient = $_POST["numclient"];
    $datecommande = $_POST["datecommande"];
 

    do {
        if(empty($numclient) || empty($datecommande) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new client to database
        $sql = "INSERT INTO commande(numcommande, numclient, datecommande)".
           "VALUES('$numcommande', '$numclient', '$datecommande')";
           $Result = mysqli_query($conn, $sql);

        // $Result = $conn->query($sql);

        if( $Result){
            $_SESSION["message"]="New record created successfully";
           header("Location: commandes.php");
           exit(0); 
           } else{
            $_SESSION["message"]="New record Not created";
           header("Location: commandes.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> <!-- //to close errorMessage -->
    <title>ADD Commande</title>
</head>

<body>
<div class="home-content">
<?php include('massage.php'); ?>
      <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-white" style="background:linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);" >Informations sur Commandes</nav>
<div class="container">
  <div class="text-center mb-4">
   
    <h4>Add New Commande</h4>
    <p class="text-muted">Complete the form below to add a new Commande</p>
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

        <form method="post">

            <div class="mb-3">
                <label class="form-label">Id Commande:</label>
                    <input type="text"  class="form-control" name="numcommande" 
                    placeholder="Entrer le numero du commande">
            </div>

            <div class="mb-3">
                <label class="form-label">Id Client:</label>
                    <input type="text" class="form-control" name="numclient" value="<?php echo $numclient; ?>"
                    placeholder="Entrer l'id de client" required>
                    </div>
            <div class=" mb-3">
                <label class="form-label">Date Commande:</label>
                
                    <input type="text" class="form-control" name="datecommande" value="<?php echo $datecommande; ?>"
                    placeholder="Entrer la date du commande" required>
                
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
  
           

            


        </form>


    </div>
</body>
</html>