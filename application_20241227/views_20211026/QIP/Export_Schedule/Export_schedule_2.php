<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            
              <form role="form" action=<?php echo $action;?> method="post">
               <div class="card-body">
                <!-- Date range -->
                
                <div class="form-group">
                    
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="EXPORT_DATE" id="EXPORT_DATE" value=<?php echo date('Y-m-d');?> autocomplete='off' hidden>
                    </div>
                </div>
               <div class="row">
               <div class="col-sm-6">
                    <div class="form-group">
                      <label>Factory</label>
                      <select class="custom-select" name="factory" id="factory">
                        <option value="">All Factory</option>
                        <option value="A">Factory A</option>
                        <option value="B">Factory B</option>
                        <option value="C">Factory C</option>
                        <option value="D">Factory D</option>
                        <option value="E">Factory E</option>
                  
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="custom-select" name="country" id="country">
                        <option value="">All Country</option>
                        
                      </select>
                    </div>
                  </div>
                  
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="button" class="btn btn-primary">Search</button>
        </div>
        </form>
        
      
       
            
            <div class="card-body">

            


            <table id="tableExport" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
              
                  <th>Cont</th>
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Dest</th>
                  <th>Art</th>
                  <th>qty</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>Remark</th>
                  <th>Status</th>
                  <th>Release_Reject</th>
                  <th>Repack_Cancel</th>
                 
                </tr>
                </thead>
                <tbody>
               
                </tbody>
                </table>
  
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
                    <input type="hidden" name="ID_EXPORT" id="ID_EXPORT" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
     </form>
     <!--END MODAL DELETE-->
     <!-- MODAL EDIT -->
     <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit PO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                            <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="id export" hidden>
                            <label>Container</label>
                              <input type="text" name="container_edit" id="container_edit" class="form-control" placeholder="Container">
                            </div>
                           <div class="col-md-4">
                            <label>Factory</label>
                              <input type="text" name="factory_edit" id="factory_edit" class="form-control" placeholder="Factory">
                            </div>
                            <div class="col-md-4">
                            <label>Cell</label>
                              <input type="text" name="cell_edit" id="cell_edit" class="form-control" placeholder="Cell">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label>Po No</label>
                              <input type="text" name="po_no_edit" id="po_no_edit" class="form-control" placeholder="PO No">
                            </div>
                           <div class="col-md-8">
                            <label>Model Name</label>
                              <input type="text" name="model_edit" id="model_edit" class="form-control" placeholder="Model Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label>Country</label>
                              <input type="text" name="country_edit" id="country_edit" class="form-control" placeholder="Country">
                            </div>
                           <div class="col-md-4">
                            <label>Cust No</label>
                              <input type="text" name="cust_no_edit" id="cust_no_edit" class="form-control" placeholder="Cust No">
                            </div>
                            <div class="col-md-4">
                            <label>Article</label>
                              <input type="text" name="article_edit" id="article_edit" class="form-control" placeholder="Article">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label>Qty</label>
                              <input type="text" name="qty_edit" id="qty_edit" class="form-control" placeholder="Qty">
                            </div>
                           <div class="col-md-4">
                            <label>SDD</label>
                              <input type="text" name="sdd_edit" id="sdd_edit" class="form-control" placeholder="SDD">
                            </div>
                            <div class="col-md-4">
                            <label>Load Type</label>
                              <input type="text" name="load_edit" id="load_edit" class="form-control" placeholder="Load Type">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                            <label>Remark</label>
                              <input type="text" name="remark_edit" id="remark_edit" class="form-control" placeholder="Remark">
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
 


    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- <AdminLTE App > -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- <AdminLTE for demo purposes > -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
   
    <script>
    
      // var tablePartial;
      // function reload_table(){
      //   tablePartial.ajax.reload(null, false);
      // }

      $(document).ready(function(){
        var country =$('#country').val();
        var factory =$('#factory').val();

        function reload_table(){
          tableExport.ajax.reload(null, false);
        }
        
        getcountry();

        function getcountry(){
          var id =$('#EXPORT_DATE').val();
          $.ajax({
              type:"POST",
              url: "<?php echo site_url('C_Export/get_data_country_2/') ?>"+id,
              cache: false,
              // data : {id:id},
              success: function(respond){
                // console.log(value);
                $("#country").html(respond);
              }
          });
        }

        tableExport = $('#tableExport').DataTable({
          "sScrollX": "100%",
            "bScrollCollapse": true,
              "ajax"  :{
                
                url   : "<?php echo site_url('C_Export/list_po_import_validation');?>",
                datatype  : 'json',
                // data : {country:country, factory:factory},
                responsive: true
              },
          });
        
          $(document).on('click','.po_status',function(){
            var PO_NO = $(this).attr('po');
            var STATUS = $(this).attr('status');// $('#id').val();
            var ID = $(this).attr('id_export')
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_Export/status_validation')?>",
                dataType : "JSON",
                data : {PO_NO:PO_NO, STATUS:STATUS, ID:ID},
                success: function(data){
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