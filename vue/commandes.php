<?php
session_start();
include 'entete.php';


?>
   


<title>Gestion Commandes</title>
</head>
<body>

<!--<a href="logout.php" class="logout" type="button">logout<i class="fa fa-sign-out"></i></a>
-->

<div class="home-content">
<?php include('massage.php'); ?>
  <div class="container" >
    <!-- <h2>List of Clients</h2> -->
    <a href="addcommande.php" class="btn btn-outline-info mb-3" style=" border: 1px solid 	#00bfff  ;" >New Commande</a>

 <div class="table-responsive">
 <table class="table table-striped table-hover text-center " >
      <thead class="table-dark ">
        <tr>
          <th scope="col">NumCommande</th>
          <th scope="col">NumClient</th>
          <th scope="col">DateCommande</th>
          <th scope="col">Action</th>
        </tr>
      </thead>


      <tbody>
        <?php
        include 'db_conn.php';

        //read all row from database table
        $sql = "SELECT * FROM commande";
        $result = $conn->query($sql);

        if(!$result) {
          die("Invalid query: " . $conn->error);
        }

        //read data of each row
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
          <td>$row[numcommande]</td>
          <td>$row[numclient]</td>
          <td>$row[datecommande]</td>
       
          <td>
            <a class='link-info' href='editcommande.php?numcommande=$row[numcommande]'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
            <a class='link-dark' style='border:0;' name='numcommande' class='fa-solid fa-trash fs-5 me-3' href='deletecommande.php?numcommande=$row[numcommande]'><span class='fa-solid fa-trash fs-5 me-3'></span></a>           

          </td>
        </tr>
          ";

        }
        ?>

       
      </tbody>
    </table>
  
 </div>
    
  </div>





</div>
    </section>
<?php
include 'pied.php';
?>