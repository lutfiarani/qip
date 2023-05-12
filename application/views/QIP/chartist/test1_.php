<!DOCTYPE html>
<!--html>
  <head>
    <title>My first Chartist Tests</title>
    <link rel="stylesheet"
          href="<?php echo base_url();?>/chartist/dist/chartist.min.css">
  </head>
  <body>
    <!-- Site content goes here !>
    <script src="<?php echo base_url();?>/chartist/dist/chartist.min.js"></script>
  </body>
</html-->

<html>
  <head>
  <link rel="stylesheet"
          href="<?php echo base_url();?>/chartist/dist/chartist.css">
    <script src="<?php echo base_url();?>/chartist/dist/chartist.min.js"></script>
  </head>
  <body>
  <div class="ct-chart ct-perfect-fourth"></div>
  <script>
  
new Chartist.Line('.ct-chart', {
    labels: ['7', '8', '9', '10', '11'],
    series: [
    [254, 380, 147,292, 54]
  ]
}, {
  high: 400,
  low: 40,
  fullWidth: false,
  // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
  axisY: {
    onlyInteger: true,
    offset: 20
  }
});

      </script>
</body>
</html>