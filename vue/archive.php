<?php
session_start();
include 'entete.php';

// if (isset($_SESSION["user_id"])) { 
//     header("Location: index.php");
//   }

//echo $_SESSION["user_id"];

?>



<div class="home-content">

  <div class="container" >
    <!-- <h2>List of Clients</h2> -->
 <div class="table-responsive">
 <table class="table table-striped table-hover text-center " >
      <thead class="table-dark ">
        <tr>
          <th scope="col">Num Commande</th>
          <th scope="col">Num Client</th>
          <th scope="col">Date Commande</th>
        
        </tr>
      </thead>


      <tbody>
        <?php
        include 'db_conn.php';

        //read all row from database table
        $sql = "SELECT * FROM archive";
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