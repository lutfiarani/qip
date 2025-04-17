

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
            


            <table id="inspectPOList"  class="table dt-responsive table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PO No</th>
                  <th>Partial</th>
                  <th>Seq Inspect</th>
                  <th>Level</th>
                  <th>Level User</th>
                  <th>Inspector</th>
                  <th>Inspection Result</th>
                  <th>Action</th>
                 
                </tr>
               
                </thead>
                <tbody id="displayCarton">
                
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
          <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <div class="form-group row">
                      <label class="col-md-2 col-form-label">PO No</label>
                          <div class="col-md-10">
                            <input type="text" name="PO_NO_edit" id="PO_NO_edit" class="form-control" placeholder="PO No" readOnly>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Partial</label>
                          <div class="col-md-6">
                            <input type="text" name="partial_edit" id="partial_edit" class="form-control" placeholder="Partial No" readOnly>
                            <input type="text" name="remark_edit" id="remark_edit" class="form-control" placeholder="Partial No" hidden>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Size</label>
                          <div class="col-md-6">
                            <input type="text" name="size_edit" id="size_edit" class="form-control" placeholder="Size" readOnly>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Carton No</label>
                          <div class="col-md-6">
                            <input type="text" name="carton_no_edit" id="carton_no_edit" class="form-control" placeholder="Carton No">
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-2 col-form-label">Carton Qty</label>
                          <div class="col-md-6">
                            <input type="text" name="carton_qty_edit" id="carton_qty_edit" class="form-control" placeholder="Carton Qty">
                          </div>
                    </div>
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Qty Inspect</label>
                          <div class="col-md-6">
                            <input type="text" name="qty_inspect_edit" id="qty_inspect_edit" class="form-control" placeholder="Qty Inspect">
                          </div>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                </div>
              </div>
            </div>
          </div>
       </form>
        <!--END MODAL EDIT-->
    
<!-- Styles -->
<!-- Scripts -->
<script src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="<?php // echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>

<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<!-- jQuery -->
  
    
<!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script-->
<script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

<script>
     
      
      $(document).ready(function(){
        // display_carton();
       //ajax display I
       var tableInspect;

       function reload_table(){
          tableInspect.ajax.reload(null,false);
       }

       tableInspect =  $('#inspectPOList').DataTable({
            responsive : true,
            "sScrollX": "100%",
            "bScrollCollapse": true,
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "aoColumnDefs": [{ "aTargets": [0], "bSortable": true },
                              { "aTargets": ['_all'], "bSortable": false}], 
                              "aaSorting": [[0, 'asc']],
            "ajax":{
                url : "<?php echo site_url('C_aql_inspect/delete_inspection_') ?>",
                type : 'GET',
                
                // "sScrollX": '100%',
                // bScrollCollapse: true,
                fixedHeader: true,
               
            }
           
          });

    


        
    $(document).on('click','.delete', function(){
        var PO_NO = $(this).attr("data-PO");
        var PARTIAL = $(this).attr("data-PARTIAL");
        var LEVEL = $(this).attr("data-LEVEL");
        var LEVEL_USER = $(this).attr("data-LEVEL_USER");
        var REMARK = $(this).attr("data-REMARK");
        if(confirm("Anda yakin ingin menghapus data ini?"))
        {
          $.ajax({
            url : "<?php echo site_url('C_aql_inspect/delete_inspection__')?>",
            method:"POST",
            data: {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, LEVEL_USER : LEVEL_USER, REMARK:REMARK},
            success:function(data){
              // alert(data);
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
      
  });

      
</script>