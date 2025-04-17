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
                <h3 class="card-title">Third Party Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Inspect Month</label>
                        <input type="text" class="form-control start_date" value="<?php echo date('Ym')?>" id="start_date" name="start_date" autocomplete="off" require>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                
                
              </div>
              <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
              </div>
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
                    <tbody id="summary_third">
                    </tbody>
                </table>

            </div>
            <!-- </div> -->
            <div class="row">    
            


            <table id="inspectPOList" class="dt-responsive table-togglable table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th rowspan="2">3rd Party</th>
                  <th rowspan="2">Factory</th>
                  <th rowspan="2">Destination</th>
                  <th rowspan="2">PO</th>
                  <th rowspan="2">ART#</th>
                  <th rowspan="2">Article Name</th>
                  <th rowspan="2">Total PO Qty</th>
                  <th rowspan="2">Inspection Date</th>

                  <th rowspan="2">Inspector</th>
                  <th rowspan="2">BATCH INSPECTION QTY</th>
                  <th rowspan="2">QTY Insp</th>
                  
                  <th colspan="2"> Minor Defect</th>
                  <th colspan="2"> Major Defect</th>
                  <th colspan="2"> Critical Defect</th>

                 
                  <th rowspan="2">3rd Party Result</th>
                  <th rowspan="2">Finding AQL</th>
                  <th rowspan="2">Line</th>
                 
                  
                </tr>
                <tr>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  
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

    
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
  
<!--     
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> -->
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


<script src="<?=base_url()?>template/dist/app/monthly_third_inspection.js"></script>


<!-- 
<script>
    $(document).ready(function(){
       //ajax display I
        

       function show_table(){
        var start_date  = $('#start_date').val();
        // var end_date    = $('#end_date').val();
        
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
                      url : "<?php //echo site_url('C_aql_inspect/monthly_report_third_') ?>",
                      data : {start_date:start_date},
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