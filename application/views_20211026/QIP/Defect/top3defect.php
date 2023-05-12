<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
  .highcharts-figure, .highcharts-data-table table {
    min-width: 720px; 
    max-width: 1000px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        This chart shows how data labels can be added to the data series. This
        can increase readability and comprehension for small datasets.
        <?php 
        echo "categories: [";
        for ($i=0; $i<count($query); $i++){
        if ($i < count($query) - 1 ){
          $qty = $query[$i]['Count'].",";
          }
          else{
          $qty = $query[$i]['Count'];
          }
          echo $qty;
      }
      echo "]";
      ?>
      ['7','8','9','10','11','12','13','14']
    </p>
</figure>


<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Average Temperature'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        
      <?php 
        echo "categories: [";
        for ($i=0; $i<count($query); $i++){
        if ($i < count($query) - 1 ){
          $jam = "'".$query[$i]['Hour']."',";
          }
          else{
          $jam = "'".$query[$i]['Hour']."'";
          }
          echo $jam;
      }
      echo "]";
      ?>
      //categories: ['7','8','9','10','11','12','13','14']
    },
    yAxis: {
        title: {
            text: 'Defect Qty'
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
        name: 'Dirty',
       
        <?php 
        echo "data: [";
        for ($i=0; $i<count($query); $i++){
        if ($i < count($query) - 1 ){
          $qty = $query[$i]['Count'].",";
          }
          else{
          $qty = $query[$i]['Count'];
          }
          echo $qty;
      }
      echo "]";
      ?>

    }]
});
</script>