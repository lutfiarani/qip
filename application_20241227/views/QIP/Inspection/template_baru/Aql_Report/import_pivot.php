<script type="text/javascript">
    
    function konfirmasi(){
		var pilihan = confirm("apakah anda yakin akan menghapus data ini?");
		
		if(pilihan){
			return true;		
		}else{
			return false;
		}
	
	}

</script>

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
                    <a href="<?= base_url('upload/format/import_pivot.xlsx') ?>" class="btn btn-success btn-sm">Download Format Import Data</a>
                    <input type="submit" name="import" value="Import" class="btn btn-primary btn-sm" />
                  </div>
            </form>
                 

            <table id="listUploadPivot" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>PO_NO</th>
                    <th>INSPECTOR LEVEL</th>
                    <th>INSPECT_DATE</th>
                    <th>INSPECTOR</th>
                    <th>RESULT</th>
                    <th>REMARK</th>
                    <th>GREY CARTON</th>
                    <th>UPLOAD DATE</th>
                    <th>ACTION</th>
                    
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
  <!--MODAL DELETE------------>
    <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete PO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="ID_TRANSAKSI" id="ID" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
     </form>
     <!--END MODAL DELETE-->
    

   
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    <!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
 
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>

    
    <!-- <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
    <!-- <AdminLTE App > -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- <AdminLTE for demo purposes > -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
   
    <script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
    </script>
    <script>
        var tableListExport;

        function reload_table(){ 
          tableListExport.ajax.reload(null, false);
        }

        $(document).ready(function(){
          tableListExport = $('#listUploadPivot').DataTable({
            "sScrollX": "100%",
              "ajax"  :{
                url   : "<?php echo site_url('C_aql_inspect/list_import_pivot');?>",
                datatype  : 'json',
                responsive: true
              },
          });

          $('#import_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('C_aql_inspect/import_pivot_')?>",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        $('#file').val('');
                        reload_table();
                        // alert(data);
                    }
                })
          });

          
          // $('#listExport').on('click','.po_delete',function(){
          $(document).on('click','.delete',function(){
            var ID = $(this).attr("data-ID");//$(this).attr('id');//
             
            $('#Modal_Delete').modal('show');
            $('[name="ID_TRANSAKSI"]').val(ID);
          });

          
          $('#btn_delete').on('click',function(){
            var ID =$('#ID').val();// $('#id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_aql_inspect/delete_import_pivot')?>",
                dataType : "JSON",
                data : {ID:ID},
                success: function(data){
                    // $('[name="ID_EXPORT"]').val("");
                    $('#Modal_Delete').modal('hide');
                    reload_table();
                    // alert(data);
                }
            });
            return false;
            // $('#Modal_Delete').modal('hide');
          });


          $(document).on('click','.po_edit',function(){
            var id_export = $(this).attr('id');
            var container = $(this).attr('container');
            var factory   = $(this).attr('factory');
            var cell      = $(this).attr('cell');
            var po_no     = $(this).attr('po_no');
            var model_name= $(this).attr('model_name');
            var country   = $(this).attr('country');
            var cust_no   = $(this).attr('cust_no');
            var article   = $(this).attr('article');
            var qty       = $(this).attr('qty');
            var sdd       = $(this).attr('sdd');
            var load_type = $(this).attr('load_type');
            var remark    = $(this).attr('remark');
   
            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id_export);
            $('[name="container_edit"]').val(container);
            $('[name="factory_edit"]').val(factory);
            $('[name="cell_edit"]').val(cell);
            $('[name="po_no_edit"]').val(po_no);
            $('[name="model_edit"]').val(model_name);
            $('[name="country_edit"]').val(country);
            $('[name="cust_no_edit"]').val(cust_no);
            $('[name="article_edit"]').val(article);
            $('[name="qty_edit"]').val(qty);
            $('[name="sdd_edit"]').val(sdd);
            $('[name="load_edit"]').val(load_type);
            $('[name="remark_edit"]').val(remark);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var id_export = $('#id_edit').val();
            var container = $('#container_edit').val();
            var factory   = $('#factory_edit').val();
            var cell      = $('#cell_edit').val();
            var po_no     = $('#po_no_edit').val();
            var model_name= $('#model_edit').val();
            var country   = $('#country_edit').val();
            var cust_no   = $('#cust_no_edit').val();
            var article   = $('#article_edit').val();
            var qty       = $('#qty_edit').val();
            var sdd       = $('#sdd_edit').val();
            var load_type = $('#load_edit').val();
            var remark    = $('#remark_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_Export/update_po')?>",
                dataType : "JSON",
                data : {id_export:id_export , container:container, factory:factory, cell:cell, po_no:po_no, model_name:model_name, 
                        country:country, cust_no:cust_no, article:article, qty:qty, sdd:sdd, load_type:load_type, remark:remark },
                success: function(data){
                  $('[name="id_edit"]').val("");
                  $('[name="container_edit"]').val("");
                  $('[name="factory_edit"]').val("");
                  $('[name="cell_edit"]').val("");
                  $('[name="po_no_edit"]').val("");
                  $('[name="model_edit"]').val("");
                  $('[name="country_edit"]').val("");
                  $('[name="cust_no_edit"]').val("");
                  $('[name="article_edit"]').val("");
                  $('[name="qty_edit"]').val("");
                  $('[name="sdd_edit"]').val("");
                  $('[name="load_edit"]').val("");
                  $('[name="remark_edit"]').val("");
                  $('#Modal_Edit').modal('hide');
                  reload_table();
                }
            });
            return false;
        });


        

        })

    </script>

    

