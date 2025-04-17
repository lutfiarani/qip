<script src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "140%" 
        }
</script>

<script>
   setTimeout("location.href='<?php echo base_url();?>index.php/C_Defect/defect2'",10000);
</script>

<link rel="stylesheet" href="<?php echo base_url();?>template/highcharts/chart.css">
<body onload="zoom()">
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        
        </p>
    </figure>
</body>


<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: '<b>Trendy TOP 1</b><br>-------------------------------<br><b>Defect by Hour</b>'
       
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        
      <?php 
        echo "categories: [";
        for ($i=0; $i<count($defect1); $i++){
        if ($i < count($defect1) - 1 ){
          $jam = "'".$defect1[$i]['Hour']."',";
          }
          else{
          $jam = "'".$defect1[$i]['Hour']."'";
          }
          echo $jam;
      }
      echo "]";
      ?>
      //categories: ['7','8','9','10','11','12','13','14']
    },
    yAxis: {
        title: {
            text: '<b>Defect Qty</b>'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        <?php echo "name:'$nama1->CODE_DESC'";?>,
       
        <?php 
        echo "data: [";
        for ($i=0; $i<count($defect1); $i++){
        if ($i < count($defect1) - 1 ){
          $qty = $defect1[$i]['Count'].",";
          }
          else{
          $qty = $defect1[$i]['Count'];
          }
          echo $qty;
      }
      echo "]";
      ?>

    }]
});
</script>