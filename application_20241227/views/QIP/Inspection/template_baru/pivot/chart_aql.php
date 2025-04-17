
<figure class="highcharts-figure">
    <div id="container_aql"></div>
</figure>


<script>
    // Data retrieved from https://netmarketshare.com/
// Build the chart
Highcharts.chart('container_aql', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'AQL Inspection',
        align: 'center'
    },
    credits: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} prs</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer', 
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Qty',
        colorByPoint: true,
      
        <?php 
            echo "data: [";
            for ($i=0; $i<count($data); $i++){
                
            if ($i < count($data) - 1 ){
                $name = "{name:'".$data[$i]['DEFECT_NAME']."',y:".$data[$i]['DEFECT']."},";
            }
            else{
                $name = "{name:'".$data[$i]['DEFECT_NAME']."',y:".$data[$i]['DEFECT']."}";
            }
            echo $name;
            // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
        }
        echo "]";
        ?>
    }]
});

</script>

