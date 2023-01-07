<?php
session_start();
include 'entete.php';
?>

<div class="home-content">
<?php include('massage.php'); ?>
  <div class="container" >
    <a href="addclient.php" class="btn btn-outline-info mb-3" style=" border: 1px solid 	#00bfff  ;" >New Client</a>

 <div class="table-responsive">
 <table class="table table-striped table-hover text-center " id="myTable" >
      <thead class="table-dark ">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NomClient</th>
          <th scope="col">RaisonSocial</th>
          <th scope="col">AddressClient</th>
          <th scope="col">VilleClient</th>
          <th scope="col">Pays</th>
          <th scope="col">Telephone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>


      <tbody>
        <?php
        include 'db_conn.php';

        //read all row from database table
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if(!$result) {
          die("Invalid query: " . $conn->error);
        }

        //read data of each row
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
          <td>$row[numclient]</td>
          <td>$row[nomclient]</td>
          <td>$row[raisonsocial]</td>
          <td>$row[adresseclient]</td>
          <td>$row[villeclient]</td>
          <td>$row[pays]</td>
          <td>$row[telephone]</td>
          <td>
            <a class='link-info' href='editclient.php?numclient=$row[numclient]'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
            <a class='link-dark' style='border:0;' class='fa-solid fa-trash fs-5 me-3' href='deleteclient.php?numclient=$row[numclient]'><span class='fa-solid fa-trash fs-5 me-3'></span></a>           

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