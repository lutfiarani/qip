
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/dist/css/jquery.dataTables.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <!--datepicker-->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
 


<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            <div class="card-body">

            <!-- <form role="form" method="post">
               <div class="card-body">
              
                <div class="form-group">
                    <label for="exampleInputEmail1">PO NO</label>
                    <input type="text" class="form-control" name="PO_NO" id="PO_NO" placeholder="Enter PO NO">
                </div>
               </div>
            <!-- /.card -->
            <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="addInspect">Add Inspection</button>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="addInspect">Add Inspection</button>
            </div>
        </form> --> 
      
        <form method="post" id="import_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" required accept=".xls, .xlsx">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      
                  </div>
                  <div class="card-footer">
                    <a href="<?= base_url('upload/format/inspection_schedule.xlsx') ?>" class="btn btn-success btn-sm">Download Format Import Data</a>
                    <input type="submit" name="import" value="Import Data" class="btn btn-primary btn-sm" />
                  </div>
            </form>
                 


            <table id="inspectPOList" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PO No</th>
                  <th>Inspection Date</th>
                  <!-- <th>Status Inspect</th>
                  <th>Tgl Input status</th> -->
                  <th>Action</th>
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
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        bsCustomFileInput.init();
      });
    </script>
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
                url : "<?php echo site_url('C_Inspection/list_inspection_2') ?>",
                type : 'GET'
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData[3] == 'REJECT') {
                    $('td', nRow).css('background-color', 'red');
                    $('td', nRow).css('color', 'white');
                }
            }
          });

        $('#import_form').on('submit', function(event){
              event.preventDefault();
              $.ajax({
                  url: "<?php echo site_url('C_Inspection/import_po')?>",
                  method:"POST",
                  data:new FormData(this),
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data){
                      $('#file').val('');
                      reload_table();
                      alert(data);
                  }
              })
        });

      $(document).on('click','.delete', function(){
        var ID_INSPECTION = $(this).attr("id");
        if(confirm("Anda yakin ingin menghapus data ini?"))
        {
          $.ajax({
            url : "<?php echo site_url('C_Inspection/delete_list_inspection')?>",
            method:"POST",
            data: {ID_INSPECTION:ID_INSPECTION},
            success:function(data){
              alert(data);
              //DataTable.ajax.reload();
              // window.location.href=window.location.href;
              reload_table();
            }
          });
        }
        else
        {
          return false;
        }
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

      $('#addInspect').on('click',function(){
              var PO_NO = $('#PO_NO').val();
              $.ajax({
                type    : "POST",
                url     : "<?php echo site_url('C_Inspection/input_inspection')?>",
                dataType: "JSON",
                data    : {PO_NO:PO_NO},
                success : function(data){
                    // $('[name="PO_NO"]').val("");
                    //window.location.href = window.location.href;
                    reload_table();
                }
              });
            });
         
      
  });

      
</script>
