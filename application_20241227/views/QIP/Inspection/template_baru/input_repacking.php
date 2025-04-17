
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
    <!--Input Repacking Done-->
            <form method="post" id="repacking_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Upload Repacking</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" required accept=".xls, .xlsx">
                        <label class="custom-file-label" for="file">Choose file Repacking</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      
                  </div>
                  <div class="card-footer">
                    <a href="<?= base_url('upload/format/template_format_repacking.xlsx') ?>" class="btn btn-success btn-sm">Download Format Upload Repacking</a>
                    <input type="submit" name="repacking" value="Upload Repacking" class="btn btn-primary btn-sm" />
                  </div>
            </form>
    <!--/input repacking done-->
    <!--Input Defect-->
            <form method="post" id="defect_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Upload Defect</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" required accept=".xls, .xlsx">
                        <label class="custom-file-label" for="file">Choose file Defect</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      
                  </div>
                  <div class="card-footer">
                    <a href="<?= base_url('upload/format/template_format_defect.xlsx') ?>" class="btn btn-success btn-sm">Download Format Upload Defect</a>
                    <input type="submit" name="defect" value="Upload Defect" class="btn btn-primary btn-sm" />
                  </div>
            </form>
    <!--/input Defect-->
                 


            <table id="POReject" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PO No</th>
                  <th>Partial</th>
                  <th>Confirm Date</th>
                  <th>Reason</th>
                  <!-- <th>Status Inspect</th>
                  <th>Tgl Input status</th> -->
                  <th>Repacking Document</th>
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
        tableRepacking.ajax.reload(null,false); //reload datatable ajax 
      }
      
      
      $(document).ready(function(){
       //ajax display I
       tableRepacking =  $('#POReject').DataTable({
            "ajax":{
                url : "<?php echo site_url('C_aql_inspect/input_repacking2') ?>",
                type : 'GET'
            }
            // "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //     if (aData[3] == 'REJECT') {
            //         $('td', nRow).css('background-color', 'red');
            //         $('td', nRow).css('color', 'white');
            //     }
            // }
          });

        $('#repacking_form').on('submit', function(event){
              event.preventDefault();
              $.ajax({
                  url: "<?php echo site_url('C_aql_inspect/import_repacking')?>",
                  method:"POST",
                  data:new FormData(this),
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data){
                      $('#repacking').val('');
                      reload_table();
                      alert(data);
                    // console.log(data);
                  }
              })
        });

        $('#defect_form').on('submit', function(event){
              event.preventDefault();
              $.ajax({
                  url: "<?php echo site_url('C_aql_inspect/import_defect')?>",
                  method:"POST",
                  data:new FormData(this),
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(data){
                      $('#defect').val('');
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
     
     
      
  });

      
</script>
