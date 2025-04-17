<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">

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
                <h3 class="card-title"><?php echo $judul;?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Month</label>
                        <input type="text" class="form-control start_date" value="<?php echo date('Ym')?>" id="start_date" name="start_date" autocomplete="off" require>
                      
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                
              </div>
              <input type="hidden" class="form-control start_date" value="<?php echo $level;?>" id="level" name="level" autocomplete="off" require>
              <input type="hidden" class="form-control start_date" value="<?php echo $level_user;?>" id="level_user" name="level_user" autocomplete="off" require>
              <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
              </div>
                        <!-- </div> -->
                      <!-- </div> -->

              
            <!-- </div> -->
            <div class="row">    
                <table class="table dt-responsive table-togglable table-hover" border="1" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                      <th>Factory</th>
                      <th>Total PO</th>
                      <th>Total Pairs</th>
                      <th>Total Pairs Inspected</th>
                      <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody id="summary_validation">
                    </tbody>
                </table>

            </div>
            <div class="row">    
            <table id="inspectPOList" class="dt-responsive table-togglable table-hover" cellspacing="0" width="100%" border='1'>
                <thead>
                <tr>
                  <th rowspan="3">Factory</th>
                  <th rowspan="3">Cell</th>
                  <th rowspan="3">PO</th>
                  <th rowspan="3">Qty</th>
                  <th rowspan="3">Partial</th>
                  <th rowspan="3">Date</th>
                  <th rowspan="3">Destination Name</th>
                  <th rowspan="3">Model</th>
                  <th rowspan="3">Article</th>

                  <th rowspan="3">Random Qty</th>
                  <th rowspan="2" colspan="4">Validation Status</th>
                  <th rowspan="2" colspan="3">Defect Classification</th>
                  
                 
                  <th colspan="19">Defect by AQL COde</th>
                 
                  <th rowspan="3">Total Defect</th>
                  <th rowspan="3">AQL Inspector</th>
                  
                </tr>
                <tr>
                  <th>100</th>
                  <th>200</th>
                  <th>300</th>
                  <th>310</th>
                  <th>320</th>
                  <th>330</th>
                  <th>340</th>
                  <th>350</th>
                  <th>360</th>
                  <th>400</th>
                  <th>500</th>
                  <th>600</th>
                  <th>700</th>
                  <th>800</th>
                  <th>900</th>
                  <th>1000</th>
                  <th>1100</th>
                  <th>1200</th>
                  <th>1300</th>
                </tr>
                <tr>
                  <th>Release</th>
                  <th>Reject</th>
                  <th>LOP/Inspector</th>
                  <th>Remark</th>

                  <th>Minor</th>
                  <th>Major</th>
                  <th>Critical</th>

                  <th>Packing and Labelling</th>
                  <th>Inside the Shoe</th>
                  <th>Upper</th>
                  <th>Upper Material</th>
                  <th>Upper Stitching</th>
                  <th>Upper Treatments</th>
                  <th>Upper Appearance</th>
                  <th>Lace/velcros/ speed lace</th>
                  <th>Other defect (that need report and consult  adidas production/quality)</th>
                  <th>Bottom/ Stockfitting</th>
                  <th>Assembling</th>
                  <th>Cleats & Spikes</th>
                  <th>Boost</th>
                  <th>Vulcanized</th>
                  <th>Carbon 4D</th>
                  <th>Direct Soling</th>
                  <th>Silde/ Sandals</th>
                  <th>Knitting Upper</th>
                  <th>Nosew</th>
                  
              
                  
                  
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    
    <!-- <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
  
<!-- <!--      -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
    
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
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

<script src="<?=base_url()?>template/dist/app/monthly_validation_report.js"></script>
<!-- <script>
     $(document).ready(function(){
      summary_validation();
      function summary_validation(){
            var tanggal  = $('#start_date').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/summary_validation",
                type: "POST",
                data: {tanggal:tanggal},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data.haha1)
                    console.log(data.haha2)
                    var html = ''
                    var i;
                    var data1 = data.haha1;
                    var data2 = data.haha2;
                    var persentase
                    html += '<tr>'+
                              '<td>HWI</td>'+
                              '<td>'+ data.haha1.TOTAL_PO+'</td>'+
                              '<td>'+data1.TOTAL_QTY+'</td>'+
                              '<td>'+data1.QTY_INSPECT+'</td>'+
                              '<td>';
                    for(i=0; i<data2.length; i++){
                          persentase =(data2[i].QTY_DEFECT/data1.QTY_INSPECT).toFixed(2);
                          html += i+1+'. '+data2[i].CODE_NAME+' : '+data2[i].REJECT_CODE_NAME+'= <b>'+data2[i].QTY_DEFECT+'('+persentase +'% )</b><br>';
                    }
                                
                    html +=     '</td>';                       
                    html +=     '</tr>';
                    $('#summary_validation').html(html); 
                }
            });
        }
     })
</script> -->

<!-- <script>
    $(document).ready(function(){
       //ajax display I
        
        // show_table();
       function show_table(){
        var tanggal  = $('#start_date').val();
        
        tableInspect =  $('#inspectPOList').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                    {extend: 'copy'},
                    {
                      extend: 'excelHtml5',
                      filename: 'InspectionList', 
                      sheetName: 'InspectionList',
                      customize: function( xlsx ) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        for (var i = 65; i <= 90; i++) {
                          // $('row c[r^='+String.fromCharCode(i)+']', sheet).attr( 's', '51' );
                          $('row c[r^='+String.fromCharCode(i)+']', sheet).attr( 's', '25' );
                        }
                        
                        // $('row c[r^="B"]', sheet).attr( 's', '51' );
                        // $('row c[r^="C"]', sheet).attr( 's', '51' );
                      }
                    },
                    {
                      extend: 'pdfHtml5',
                      orientation: 'landscape',
                      pageSize: 'TABLOID',
                      customize: function(doc) {
                        doc.styles.tableHeader.fontSize = 8;
                        doc.defaultStyle.fontSize = 8;
                      }
                    },
                    // {extend: 'print'}
                      // 'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  responsive : true,
                  "sScrollX": "100%",
                  "bScrollCollapse": true,
                  "bJQueryUI": true,
                  "sPaginationType": "full_numbers",
                  "aoColumnDefs": [{ "aTargets": [0], "bSortable": true },
                                    { "aTargets": ['_all'], "bSortable": false}], 
                                    "aaSorting": [[0, 'asc']],
                  "ajax":{
                      url : "<?php //echo site_url('C_aql_inspect/monthly_report_validator_') ?>",
                      data : {tanggal:tanggal},
                      datatype : 'json',
                      type : 'POST',
                      
                      "sScrollX": '100%',
                      // bScrollCollapse: true,
                      fixedHeader: true,
                    
                  }
              });
          }



      function DestroyDatatable(){
        $('#inspectPOList').DataTable().destroy();
      }

       
      $('#lihatData').on('click',function(){
          $('#inspectPOList').DataTable().clear();
          DestroyDatatable()
        // if(! $.fn.DataTable.isDataTable( '#InspectBalance' )){
          show_table();
        // }

      })

    });
</script> -->