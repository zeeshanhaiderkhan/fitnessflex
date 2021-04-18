<!DOCTYPE html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
        <?php include "includes/navigation.php"; ?>
        
        <div class="container jumbotron"> <h1>Update Soon</h1></div>
        
<?php include "db.php"; ?>
            <?php 
            $db = new DatabaseSetup();
            $db->connect("FitnessFlex");
            ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card-group">



<div class="card text-white bg-dark " style="margin:10px 10px 10px 10px; max-width: 18rem;">
  <div class="card-header">Total Clients</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo $db->getN("clients"); ?></h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-dark" style="margin:10px 10px 10px 10px; max-width: 18rem;">
  <div class="card-header">Total Received</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo "Rs. ".$db->getNet("fees","received"); ?></h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


</div>

<div class="card-group">



<div class="card text-white bg-dark " style="margin:10px 10px 10px 10px; max-width: 18rem;">
  <div class="card-header">Today Clients</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo $db->getNToday("clients"); ?></h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card text-white bg-dark" style="margin:10px 10px 10px 10px; max-width: 18rem;">
  <div class="card-header">Today Received</div>
  <div class="card-body">
    <h1 class="card-title"><?php echo "Rs. ".$db->getNetToday("fees","received");?></h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


</div>


<div class="card-group">



    <div class="card text-white bg-dark " style="margin:10px 10px 10px 10px; max-width: 18rem;">
      <div class="card-header">Gender Chart</div>
      <div class="card-body">
        <script src="js/chart.min.js"></script>
<canvas id="myChart" width="100" height="100"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Gender',
            data: [<?php
                $mf = $db->getMaleFemale();
                echo $mf[0].",".$mf[1];
             ?>],
            backgroundColor: [
      'rgb(85, 85, 85)',
      'rgb(238, 238, 221)',
      'rgb(255, 205, 86)'
    ],
            borderColor: [
                'rgb(85,85,85)',
                'rgb(238,238,221)'
            ],
            borderWidth: 1
        }]
    },
    options: {
       
    }
});
</script>
      </div>
    </div>
    
    <div class="card text-white bg-dark" style="margin:10px 10px 10px 10px; max-width: 18rem;">
      <div class="card-header">Today Received</div>
      <div class="card-body">
        <h1 class="card-title">TEST</h1>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    
    
    </div>
    

        </div>
        <div class="col-md-6">
             


        </div>
    </div>
</div>




</body>
</html>