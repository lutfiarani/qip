

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
                  <th>Level</th>
                  <th>Seq Inspect</th>
                  <th>Carton No#</th>
                  <th>Size</th>
                  <th>Carton Qty</th>
                  <th>Qty Inspect</th>
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
                url : "<?php echo site_url('C_aql_inspect/edit_carton_') ?>",
                type : 'GET',
                
                // "sScrollX": '100%',
                // bScrollCollapse: true,
                fixedHeader: true,
               
            }
           
          });

    


          $('#inspectPOList').on('draw.dt', function(){
                // $('#inspectPOList').Tabledit({
                // // url:'action.php',
                // dataType:'json',
                // columns:{
                //     identifier : [0, 'id'],
                //     editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male","2":"Female"}']]
                // },
                // restoreButton:false,
                // onSuccess:function(data, textStatus, jqXHR)
                // {
                //     if(data.action == 'delete')
                //     {
                //     $('#' + data.id).remove();
                //     $('#inspectPOList').DataTable().ajax.reload();
                //     }
                // }
                // });
                  // $('#inspectPOList').SetEditable({
                  //   columnsEd: "5,6,8", 
                  //   onEdit:function() {}
                  //                     // $addButton: $('#but_add')
                  // });
                
                });

        // $('#inspectPOList').SetEditable();
       // function display_carton(){
    //   $.ajax({
    //       type    : 'ajax',
    //       url     : "<?php echo site_url('C_aql_inspect/edit_carton_/');?>",
    //       async   : true,
    //       dataType: 'json',
    //       success : function(data){
    //           console.log(data)
    //         var html='';
    //         var i;
    //         for(i=0; i<data.length; i++){
    //                 i = i
    //               html += '<tr>'+
    //                         '<td>'+(i+1)+'</td>'+
    //                         '<td>'+data[i].PO_NO+'</td>'+
    //                         '<td name="partial_">'+data[i].PARTIAL+'</td>'+
    //                         '<td name="qty_partial_">'+data[i].LEVEL+'</td>'+
    //                         '<td name="inspector_">'+data[i].REMARK+'</td>'+
    //                         '<td id="carton_no" name="carton_no" contenteditable="true">'+data[i].CARTON_NO+'</td>'+
    //                         '<td id="carton_qty" name="carton_qty" contenteditable="true">'+data[i].CARTON_QTY+'</td>'+
    //                         '<td id="size" name="size">'+data[i].SIZE+'</td>'+
    //                         '<td name="qty_inspect" contenteditable="true">'+data[i].QTY_INSPECT+'</td>'+
    //                         '<td><a href="javascript:void(0);" class="btn btn-warning btn-xs item_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-REMARK="'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'">Edit</a></td>'+
    //                       '</tr>';
    //           }
    //           $('#displayCarton').html(html);
    //       }
    //     });
    // }
        $(document).on('click','.edit',function(){
        // console.log('hahaha')
            
            var PO_NO     = $(this).attr("data-PO");
            var PARTIAL   = $(this).attr("data-PARTIAL");
            var REMARK    = $(this).attr("data-REMARK");
            var ctn_no    = $(this).attr("ctn_no");
            var ctn_qty   = $(this).attr("ctn_qty");
            var size      = $(this).attr("size");
            var qty       = $(this).attr("qty_inspect");
              
            $('#Modal_Edit').modal('show');
            $('[name="PO_NO_edit"]').val(PO_NO);
            $('[name="partial_edit"]').val(PARTIAL);
            $('[name="carton_no_edit"]').val(ctn_no);
            $('[name="carton_qty_edit"]').val(ctn_qty);
            $('[name="size_edit"]').val(size);
            $('[name="qty_inspect_edit"]').val(qty);
            $('[name="remark_edit"]').val(REMARK);
        });

        $('#btn_update').on('click',function(){
        var PO_NO   =  $('#PO_NO_edit').val();
        var PARTIAL =  $('#partial_edit').val();
        var REMARK  =  $('#remark_edit').val();
        var ctn_no  =  $('#carton_no_edit').val();
        var ctn_qty =  $('#carton_qty_edit').val();
        var size    =  $('#size_edit').val();
        var qty     =  $('#qty_inspect_edit').val();
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/edit_carton__')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, REMARK:REMARK, ctn_no:ctn_no, ctn_qty:ctn_qty, size:size, qty:qty},
            success   : function(data)
            {
                $('[name="PO_NO_edit"]').val("");
                $('[name="partial_edit"]').val("");
                $('[name="remark_edit"]').val("");
                $('[name="carton_no_edit"]').val("");
                $('[name="carton_qty_edit"]').val("");
                $('[name="size_edit"]').val("");
                $('[name="qty_inspect_edit"]').val("");
                $('#Modal_Edit').modal('hide');
                reload_table();
            }
        });
        return false;
    });
      
  });

      
</script>