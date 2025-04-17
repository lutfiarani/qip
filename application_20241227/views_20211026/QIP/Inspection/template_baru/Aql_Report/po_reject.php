<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="col-md-12">
            <!-- general form elements disabled -->
           
            <!-- /.card -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PO REJECT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                          <div class="date" data-provide="datepicker" id="datepicker">
                              <label>Loadplan Date</label>
                              <input type="text" class="form-control" value="<?php echo date('Ym')?>" id="po_date" name="po_date" autocomplete="off" require>
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                    </div>
                    <!-- <button type="button" class="btn btn-info last_month" name="last_month" id="last_month" value="<?php echo date("Ym", strtotime("last day of previous month"));?>">Last Month</button>
                    
                    <button type="button" class="btn btn-primary cari_cell" id="cari_cell">View</button> -->
                    <button type="button" class="btn btn-success download_summary" id="download_summary" name="download_summary" value="">Download Summary</button>
                    <button type="button" class="btn btn-primary total" id="total" name="total" value="">View</button>
                    
                </div>
              </div>
              <div class="card-body">
                    <center><span id="waktu_data"></span></center>
                            <figure class="highcharts-figure">
                    <div id="container"></div>
                  
                    <p class="highcharts-description">
                        
                    </p>
                    <span id="total_reject"></span>
                </figure>
              </div>
                
                

               <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>REASON</th>
                      <th>A1</th>
                      <th>B1</th>
                      <th>C1</th>
                      <th>D1</th>
                      <th>D2</th>
                      <th>E1</th>
                      <th>E2</th>
                      <th>TOTAL</th>
                      
                    </tr>
                  </thead>
                  <tbody id="summary">
                  </tbody>
                </table>
              </div>
            
            
          
            <div class="row">
                  
            <div class="col-md-6">
            <span id="total_cell"></span>
              <div class="card-header">
                <h3 class="card-title">PO Reject By Cell</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Cell</th>
                      <th>Total Reject</th>
                      
                    </tr>
                  </thead>
                  <tbody id="po_reject_by_cell">
                  </tbody>
                </table>
              </div>

              
              </div>
              <div class="col-md-6">
            
              <span id="total_qc"></span>
              <div class="card-header">
                <h3 class="card-title">Po Reject Quality by QC</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Name</th>
                      <th>Building</th>
                      <th>Total Reject</th>
                      
                    </tr>
                  </thead>
                  <tbody id="po_reject_by_name">
                  </tbody>
                </table>
              </div>

              
              </div>
            </div>

               
             
             
              <!--div class="row">
              <div class="card-body" id="show_data">
                
                </div>
              </div-->
            </div>
           
        
           
           
                
              
             
          <!-- right column -->
          
            <!-- general form elements disabled -->
          
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="modal fade" id="Modal_View_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DETAIL PO REJECT PER CELL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <input type="text" class="form-control start_date" value="<?php echo date('Ym')?>" id="start_date" name="start_date" autocomplete="off" hidden>
                  <div class="modal-body">
                      <table class="table table-bordered">
                          <thead>
                            <th>DATE</th>
                            <th>PO</th>
                            <th>MODEL</th>
                            <th>ART</th>
                            <th>QC NAME</th>
                            <th>REJECT REASON</th>
                          </thead>
                          <tbody id="view_detail_partial">
                          </tbody>
                       </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <!--END MODAL EDIT-->
        
        
 



    </section>
    <!-- /.content -->
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    
    <!-- jQuery -->
    <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/data.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/drilldown.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/exporting.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/export-data.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/highcharts/accessibility.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script>
      
        $.fn.datepicker.defaults.format = "yyyymm";
        $('#datepicker').datepicker({
            
            todayHighlight: true,autoclose: true,
            format: "yyyymm",
            viewMode: "months", 
            minViewMode: "months"
        });

        $('#sandbox-container input').datepicker({ 
        });
    </script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    

  })
</script>

<script>
    // Create the chart

function chart_ini(tanggal){
    $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_aql_inspect/po_reject_summary')?>",
                data      : {tanggal:tanggal},
                dataType  : "JSON",
                success   : function(data)
                {

            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Summary PO Reject'
                },
                subtitle: {
                    text: ''
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Qty Reject'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> of total<br/>'
                },
            
                series: [
                    {
                        name: "Building",
                        colorByPoint: true,
                        data: [
                            {
                                name: "A1",
                                y: data[1].A1,
                                drilldown: "A1"
                            },
                            {
                                name: "B1",
                                y:  data[1].B1,
                                drilldown: "B1"
                            },
                            {
                                name: "C1",
                                y:  data[1].C1,
                                drilldown: "C1"
                            },
                            {
                                name: "D1",
                                y: data[1].D1,
                                drilldown: "D1"
                            },
                            {
                                name: "D2",
                                y: data[1].D2,
                                drilldown: "D2"
                            },
                            {
                                name: "E1",
                                y:  data[1].E1,
                                drilldown: "E1"
                            },
                            {
                                name: "E2",
                                y:  data[1].E2,
                                drilldown: "E2"
                            }
                        ]
                    }
                ]
            });
        }
    })
}
</script>

<script>
    
      
    $(document).ready(function(){
       var tanggal = $('#start_date').val();
       summary(tanggal);
       po_reject_by_cell(tanggal);
       po_reject_by_name(tanggal);
       chart_ini(tanggal);

        function summary(tanggal){
        
            $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_aql_inspect/po_reject_summary')?>",
                data      : {tanggal:tanggal},
                dataType  : "JSON",
                success   : function(data)
                {
                    var html = '';
                    var html2 = '';
                    var html3 = '';
                    var i;
                    for(i=0; i<data.length-1; i++){
                        html +='<tr>'+
                                    '<td>'+data[i].REASON+'</td>'+
                                    '<td>'+data[i].A1+'</td>'+
                                    '<td>'+data[i].B1+'</td>'+
                                    '<td>'+data[i].C1+'</td>'+
                                    '<td>'+data[i].D1+'</td>'+
                                    '<td>'+data[i].D2+'</td>'+
                                    '<td>'+data[i].E1+'</td>'+
                                    '<td>'+data[i].E2+'</td>'+
                                    '<td></td>';
                        html +=     '</tr>';
                        
                    }
                    html2 +="data dari tanggal "+data[2].TGLA+ " sampai "+data[2].TGLB;
                    html3 +="<h3><b>TOTAL QTY REJECT : "+data[2].REASON+"</b></h3>";
                    $('#summary').html(html); 
                    $('#total_reject').html(html3); 
                    $('#waktu_data').html(html2); 
                
                }
            });
        }

        function po_reject_by_cell(tanggal){
            $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_aql_inspect/po_reject_byfactory')?>",
                dataType  : "JSON",
                data      : {tanggal:tanggal},
                success   : function(data)
                {
                    var html = '';
                    var html2 = '';
                    var i;
                    for(i=1; i<data.length; i++){
                        html +='<tr>'+
                                    '<td><a href="javascript:void(0);" class="view_detail" data-CELL="'+data[i].ZCELLNO+'">'+data[i].ZCELLNO+'</a></td>'+
                                    '<td>'+data[i].QTY_REJECT+'</td>';
                        html +=     '</tr>';
                        
                    }

                    html2 +="<h3><b>TOTAL CELL REJECT : "+data[0].QTY_REJECT+"</b></h3>";
                    $('#po_reject_by_cell').html(html); 
                    $('#total_cell').html(html2);
                
                }
            });
        }

        function po_reject_by_name(tanggal){
            $.ajax({
                type      : "POST",
                url       : "<?php echo site_url('C_aql_inspect/po_reject_byname')?>",
                data      : {tanggal:tanggal},
                dataType  : "JSON",
                success   : function(data)
                {
                    var html = '';
                    var html2 = '';
                    var i;
                    var end=data.length;
                    for(i=0; i<data.length; i++){
                        if(i < data.length-1){
                            html +='<tr>'+
                                        '<td>'+data[i].NAME+'</td>'+
                                        '<td>'+data[i].BUILDING+'</td>'+
                                        '<td>'+data[i].QTY_REJECT+'</td>';
                            html +=     '</tr>';
                        }
                        else if (i = data.length-1){
                            html2 +="<h3><b>TOTAL QC REJECT : "+data[i].BUILDING+"</b></h3>";
                        }
                        
                    }

                    
                    $('#total_qc').html(html2);
                    $('#po_reject_by_name').html(html); 
                
                }
            });
        }

        function detail(CELL){
            $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/po_reject_detail')?>",
            dataType  : "JSON",
            data      : {CELL:CELL},
            success   : function(data)
            {
                $('#Modal_View_Detail').modal('show');
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].TANGGAL+'</td>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].PRDHA_T+'</td>'+
                                '<td>'+data[i].MATNR+'</td>'+
                                '<td>'+data[i].NAME+'</td>'+
                                '<td>'+data[i].REJECT+'</td>';
                    html +=     '</tr>';
                      
                }
                $('#view_detail_partial').html(html); 
               
                }
            });
        }

        $(document).on('click','.view_detail',function(){
            var CELL       = $(this).attr("data-CELL");
            detail(CELL);
        
        });

        $(document).on('click','.cari_cell',function(){
             var CELL       =  $('#cell').val();
             detail(CELL);
        });

        $(document).on('click','.last_month',function(){
            var tanggal       =   $(this).attr("value");
            summary(tanggal);
            po_reject_by_cell(tanggal);
            po_reject_by_name(tanggal);
            chart_ini(tanggal);
        });

        $(document).on('click','.total',function(){
            // var tanggal       =   $(this).attr("value");
            var tanggal =$('#po_date').val();
            summary(tanggal);
            po_reject_by_cell(tanggal);
            po_reject_by_name(tanggal);
            chart_ini(tanggal);
        });

        $(document).on('click','.download_summary', function(){
            var tanggal = $('#po_date').val();
            $.ajax({
                url : "<?php echo site_url('C_Aql_Inspect/po_reject_detail_all')?>",
                method:"POST",
                data: {tanggal:tanggal},
                dataType: "JSON",
                success:function(data){
                    // console.log(data)
                    window.open(data);
                }
            });
        
      });
    })
</script>
