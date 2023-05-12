<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="<?php echo base_url();?>/mdb/img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>/mdb/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/mdb/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?php echo base_url();?>/mdb/css/style.css">
</head>
<body>

  <div class="container">

    <!--Grid row-->
    <div class="row d-flex justify-content-center">
      <h1>Trendy Top 1</h1>
      <hr>
      <h1>Defect by Hour</h1>
      <!--Grid column-->
      <div class="col-md-12">
         
        <canvas id="lineChart"></canvas>
      </div>
      <!--Grid column-->
  
    </div>
    <!--Grid row-->
  
  </div>
  <!-- Grid container -->
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo base_url();?>/mdb/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url();?>/mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url();?>/mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url();?>/mdb/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

  <!-- Grid container -->



</body>
</html>

<script>
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July"],
datasets: [{
label: "My First dataset",
data: [65, 59, 80, 81, 56, 55, 40],
backgroundColor: [
'rgba(255, 255, 255, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 4
}
]
},
options: {
responsive: true
}
});
</script>
