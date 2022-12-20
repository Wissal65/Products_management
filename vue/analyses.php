
<?php
include 'entete.php';
$con = mysqli_connect("localhost","root","","gestioncommerciale");
if(!$con){
    echo "Problem in database connection..." .mysqli_error();
}else{
  $sql = "SELECT p.nomproduit, (COUNT(l.refproduit)* l.quantite) as total_commande
  FROM lignecommande l
  JOIN produit p ON p.refproduit = l.refproduit
  GROUP BY p.nomproduit";
    $result = mysqli_query($con,$sql);
    $chart_data = "";
    while($row = mysqli_fetch_array($result)){
      $total=$row["total_commande"];
        $productname[] = $row['nomproduit'];
        $sales[] = $row['total_commande'];
    }
}
?>
<div class="container">
<div class="home-content">
        
         
      <div class="barcharts">
      <div class="row">
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
  </div>
  <div class="card-body">
    <div class="chart-bar">
    <canvas id="myBarChart"></canvas>
    </div>
      </div>
  </div>
  </div>
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4" style="height:25.4rem;">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
  </div>
      <div class="card-body ">
        <div class="chart-pie  pt-4">
          
        <canvas id="myPieChart"></canvas>
        
        </div>
      </div>
    </div>
  </div>
</div>
      </div>




      <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("myBarChart").getContext('2d');
      var myChart = new Chart(ctx,{
          type: 'bar',
          data: {
            labels:<?php echo json_encode($productname); ?>,
            datasets: [{
              label: "Quantite",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
                data: <?php echo json_encode($sales);?>
            }]
          },
          options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: false
        },
        
        
      }],
      yAxes: [{
        
          beginAtZero: true,
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "linear-gradient(19deg, #21D4FD 0%, #B721FF 100%)",
      bodyFontColor: "linear-gradient(19deg, #21D4FD 0%, #B721FF 100%)",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      
    },
  }
      });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("myPieChart");
      var myChart = new Chart(ctx,{
          type: 'doughnut',
          data: {
            labels:<?php echo json_encode($productname); ?>,
            datasets: [{
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#9932CC','#00CED1','	#9370D8','#DDA0DD'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#8B008B','#00BFFF','#7B68EE',	'#DA70D6'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
                data: <?php echo json_encode($sales);?>
            }]
          },
          options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    cutoutPercentage: 80,
  }
      });
    </script>


</div>  
</div>
</section>

    <?php
include 'pied.php';
?>