<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">




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
                <h3 class="card-title">Inspection List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
            


            <table id="inspectPOList" class="dt-responsive table-togglable table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">IC#</th>
                  <th rowspan="2">CELL</th>
                  <th rowspan="2">MODEL</th>
                  <th rowspan="2">ART#</th>
                  <th rowspan="2">PO#</th>
                  <th rowspan="2">CUSTOMER ORDER NO</th>
                  <th rowspan="2">DESTINATION</th>

                  <th rowspan="2">CUSTOMER NO</th>
                  <th rowspan="2">QTY ORDER</th>
                  <th rowspan="2">BATCH INSPECTION QTY</th>
                  <th rowspan="2">LEVEL AQL</th>
                  <th rowspan="2">Qty AQL Inspection</th>

                  <th colspan="2"> Minor Defect</th>
                  <th colspan="2"> Major Defect</th>
                  <th colspan="2"> Critical Defect</th>

                 
                  <th rowspan="2">Inspector Name</th>
                  <th rowspan="2">etc</th>
                  <th rowspan="2">Inspection Date</th>
                  <th rowspan="2">Status</th>
                  <th> Remarks</th>
                  
                 
                  
                </tr>
                <tr>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  
                  <th>Defect of Fail</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
  <?php //}?>
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

    
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
  
<!--     
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js" type="text/javascript"></script>
 










    <script>
     
      
      $(document).ready(function(){
       //ajax display I
       tableInspect =  $('#inspectPOList').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
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
                url : "<?php echo site_url('C_aql_inspect/daily_report_inspection_') ?>",
                type : 'GET',
                
                // "sScrollX": '100%',
                // bScrollCollapse: true,
                fixedHeader: true,
               
            }
           
          });

      
      
  });

      
</script>