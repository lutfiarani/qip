

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/new_css/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url();?>template/plugins/new_css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


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
            


            <table id="inspectPOList" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>PO NO</th>
                  <th>ACTION</th>
                  <th>PART</th>
                  <th>STATUS</th>
                  <th>QTY</th>
                  <th>ART</th>
                  <th>MODEL NAME</th> 
                  
                  <th>REPRESENTATIF</th>
                  <th>PROD MANAGER</th>
                 
                  <th>LEVEL</th>
                  <th>GENDER</th>
                  <th>INSPECT DATE</th>
                  
                  <th>DESTINATION</th>
                  <th>SDD</th>
                  <th>DATE CONFIRM REPRE</th>
                  <th>DATE CONFIRM PROD MANAGER</th>
                  <th>INSPECT STATUS</th>
                  
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
    <form>
    <div class="modal fade" id="Modal_Edit_Reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Status PO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-10">
                    <div class="alert alert-danger" role="alert">
              <h5>Apakah Anda yakin untuk REJECT PO ini ?</h5>
          </div>
                      <input type="hidden" name="PO_NO" id="PO_NO" class="form-control" placeholder="PO NO">
                      <input type="hidden" name="STATUS_PO" id="STATUS_PO" class="form-control" placeholder="STATUS PO">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" type="submit" id="btnReject" class="btn btn-danger">Reject</button>
          </div>
        </div>
      </div>
    </div>
  </form>
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-1.11.3.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/responsive.bootstrap.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

    <script>
      var tableInspect;

      function reload_table()
      {
        tableInspect.ajax.reload(null,false); //reload datatable ajax 
      }
      
      
      $(document).ready(function(){
       //ajax display I
       tableInspect =  $('#inspectPOList').DataTable({
            "ajax":{
                url : "<?php echo site_url('C_aql_inspect/inspect_list_') ?>",
                type : 'GET',
                responsive : true,
                "scrollX": true
            }
            // },
            // "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //     if (aData[16] == 'REJECT') {
            //         $('td', nRow).css('background-color', 'red');
            //         $('td', nRow).css('color', 'green');
            //     }
            // }
          });


     
      $(document).on('click','.confirm', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER     = $(this).attr("data-LEVEL_USER");
        var FLAG        = $(this).attr("data-FLAG");
        var INSPECTOR   = $(this).attr("data-INSPECTOR");

        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/confirm_inspector')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, INSPECTOR:INSPECTOR, FLAG:FLAG, LEVEL_USER:LEVEL_USER},
            success:function(data){
                console.log(data)
                reload_table();
             }
        });
        
      });

      $(document).on('click','.view', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/report_')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
            dataType: "JSON",
            success:function(data){
                console.log(data.url)
                // href = data.url
                // location.href = data.url;
                window.open(data.url);
             }
        });
        
      }); 

      $(document).on('click','.ic', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/ic')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
            dataType: "JSON",
            success:function(data){
                console.log(data)
                // href = data.url
                // location.href = data;
                window.open(data);
             }
        });
        
      });




      $(document).on('click','.update', function(){
          var PO_NO = $(this).attr("id");
          var PO_NO1 = PO_NO;
          $('#Modal_Edit_Reject').modal('show');
          $('[name="PO_NO"]').val(PO_NO);
          $('[name="PO_NO1"]').val("test");
          $('[name="STATUS_PO"]').val('REJECT');

      });
     
      $('#btnReject').on('click', function(){
          var PO_NO     = $('#PO_NO').val();
          var STATUS_PO = $('#STATUS_PO').val();
          $.ajax({
              url : "<?php echo site_url('C_Inspection/update_status')?>",
              method : "POST" ,
              data : {PO_NO:PO_NO, STATUS_PO:STATUS_PO},
              dataType : "json",
             
              success:function(data){
                  $('[name="PO_NO"]').val("");
                  $('[name="STATUS_PO"]').val("");
                  $('#Modal_Edit_Reject').modal('hide');
                 // window.location.href=window.location.href;
                reload_table();
              }
          });
      });
         
      
  });

      
</script>