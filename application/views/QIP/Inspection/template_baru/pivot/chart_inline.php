
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>


<script>
    // Data retrieved from https://netmarketshare.com/
// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'INLINE',
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
        name: 'Brands',
        colorByPoint: true,
      
        <?php 
            echo "data: [";
            for ($i=0; $i<count($data); $i++){
                
            if ($i < count($data) - 1 ){
                $name = "{name:'".$data[$i]['defect_name']."',y:".$data[$i]['defect']."},";
            }
            else{
                $name = "{name:'".$data[$i]['defect_name']."',y:".$data[$i]['defect']."}";
            }
            echo $name;
            // echo "{ y: ".$hasilData->QTY_SEKARANG.", color:'".$warna."'},";
        }
        echo "]";
        ?>
    }]
});

</script>