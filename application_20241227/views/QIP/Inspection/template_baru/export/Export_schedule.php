<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
              
            </div>
            <!-- /.card-header -->
            
            <div class="card card-primary">
            
              <form role="form" method="post">
               <div class="card-body">
                <!-- Date range -->
                
                <div class="form-group">
                    <label> Export Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" id="EXPORT_DATE" class="form-control datepicker" name="EXPORT_DATE">
                    </div>
                </div>
               </div>
            <!-- /.card -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="search_export">Search</button>
                  <div class="float-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New Export PO</a></div>
                </div>
              </form>
        
      
       
            
            <div class="card-body">

            


            <table id="mydata" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
               
                  <th>Cont</th>
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Export Date</th>
                  <th>Dest</th>
                  <th>Art</th>
                  <th>qty</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>PO Status</th>
                
                  <th>Remark</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody id="exportData">
              
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

<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PO NO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">PO NO</label>
            <input type="text" class="form-control" id="PO_NO" name="PO_NO" required>
            <input type="text" class="form-control" id="DATE" name="DATE" value="<?php echo date('Y-m-d');?>"hidden>
            <input type="text" class="form-control" id="LMNT_DTTM" name="LMNT_DTTM" value="<?php echo date('Y-m-d H:i:s');?>" hidden>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">TYPE</label>
            <select class="custom-select" id="TYPE" name="TYPE" required>
              <option selected disabled value="">Choose...</option>
              <option value="CY">CY</option>
              <option value="CFS">CFS</option>
              <option value="AIR">AIR</option>
              <option value="TRUCK">TRUCK</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">CONTAINER</label>
            <input type="text" class="form-control" id="CONTAINER" name="CONTAINER" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">REMARK</label>
            <input type="text" class="form-control" id="REMARK" name="REMARK" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" type="submit" class="btn btn-primary" id="addExport">Add PO</button>
      </div>
    </div>
  </div>
</div>



    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script>
       $(document).ready(function(){
         var tableExport;
      
         show_export();
       
         $('#mydata').dataTable();
      
         function reload_table(){
           tableExport.ajax.reload(null, false);
         }
         
         function show_export(){
          // $('#btnGo').on('click',function(){
            // var export_date = $('#EXPORT_DATE').val();
            // var tanggal = new Date();
            // var dd = String(tanggal.getDate()).padStart(2, '0');
            // var mm = String(tanggal.getMonth() + 1).padStart(2, '0'); //January is 0!
            // var yyyy = tanggal.getFullYear();
            // tanggal = yyyy + '-' + mm + '-' + dd;
            // if (export_date===""){
            //   export_date = tanggal;
            // }else{
            //   export_date = $('#EXPORT_DATE').val();
            // }
            // // document.write(today);
            // $.ajax({
            //     type  : 'ajax',
            //     url   : "<?php echo site_url('C_Export/list_export/');?>"+export_date,
            //     async : true,
            //     dataType : 'json',
            //     success : function(data){
            //         var html = '';
            //         var i;
            //         for(i=0; i<data.length; i++){
            //             html += '<tr>'+
            //                     '<td>'+data[i].CONTAINER+'</td>'+
            //                     '<td>'+data[i].FACTORY+'</td>'+
            //                     '<td>'+data[i].CELL+'</td>'+
            //                     '<td>'+data[i].PO_NO+'</td>'+
            //                     '<td>'+data[i].MODEL_NAME+'</td>'+
            //                     '<td>'+data[i].EXPORT_DATE+'</td>'+
            //                     '<td>'+data[i].COUNTRY+'</td>'+
            //                     '<td>'+data[i].ART_NO+'</td>'+
            //                     '<td>'+data[i].TOTAL_CARTON+'</td>'+
            //                     '<td>'+data[i].SDD+'</td>'+
            //                     '<td>'+data[i].TYPE+'</td>'+
            //                     '<td>'+data[i].STATUS_PO2+'</td>'+
            //                     '<td>'+data[i].REMARK+'</td>'+
            //                     '<td style="text-align:right;">'+
            //                         '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
            //                         '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_delete" data-product_code="'+data[i].product_code+'">Random</a>'+
            //                     '</td>'+
            //                     '</tr>';
            //         }
            //         $('#exportData').html(html);
            //     }
            var EXPORT_DATE = $('#EXPORT_DATE').val();
            $.ajax({
                type  : 'POST',
                url   : "<?php echo site_url('C_Export/list_export/');?>",//+export_date,
                async : true,
                data : {EXPORT_DATE:EXPORT_DATE},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].CONTAINER+'</td>'+
                                '<td>'+data[i].FACTORY+'</td>'+
                                '<td>'+data[i].CELL+'</td>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].MODEL_NAME+'</td>'+
                                '<td>'+data[i].EXPORT_DATE+'</td>'+
                                '<td>'+data[i].COUNTRY+'</td>'+
                                '<td>'+data[i].ART_NO+'</td>'+
                                '<td>'+data[i].TOTAL_CARTON+'</td>'+
                                '<td>'+data[i].SDD+'</td>'+
                                '<td>'+data[i].TYPE+'</td>'+
                                '<td>'+data[i].STATUS_PO2+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_delete" data-product_code="'+data[i].product_code+'">Random</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#exportData').html(html);
                }
 
            });
         }

        
			


        //  tableExport = $(document).ready(function(){
        //   var EXPORT_DATE = $('#EXPORT_DATE').val();
        //   $('#exportToday').DataTable({
        //       "ajax":{
        //         url   : "<?php echo site_url('C_Export/list_export/');?>",
        //         type  : 'GET',
        //         responsive: true,
        //         data: {EXPORT_DATE:EXPORT_DATE}
        //        }//,
        //       // "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        //       //   if (aData[10] == 'RELEASE') {
        //       //       $('td', nRow).css('background-color', '#00CC00');
        //       //   }else if (aData[13] == 'REJECT'){
        //       //       $('td', nRow).css('background-color', '#FF0000');
        //       //   }else if (aData[13] == 'CANCEL'){
        //       //       $('td', nRow).css('background-color', '#FFFF99');
        //       //   }else if (aData[13] == 'WAITING'){
        //       //       $('td', nRow).css('background-color', '#3399FF');
        //       //       $('td', nRow).css('color', 'white');
        //       //   }
        //       // }
        //     });

              $('#search_export').on('click',function(){
              var EXPORT_DATE = $('#EXPORT_DATE').val();
              var EXPORT_DATE = $('#EXPORT_DATE').val();
            $.ajax({
                type  : 'POST',
                url   : "<?php echo site_url('C_Export/list_export/');?>",//+export_date,
                async : true,
                data : {EXPORT_DATE:EXPORT_DATE},
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].CONTAINER+'</td>'+
                                '<td>'+data[i].FACTORY+'</td>'+
                                '<td>'+data[i].CELL+'</td>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].MODEL_NAME+'</td>'+
                                '<td>'+data[i].EXPORT_DATE+'</td>'+
                                '<td>'+data[i].COUNTRY+'</td>'+
                                '<td>'+data[i].ART_NO+'</td>'+
                                '<td>'+data[i].TOTAL_CARTON+'</td>'+
                                '<td>'+data[i].SDD+'</td>'+
                                '<td>'+data[i].TYPE+'</td>'+
                                '<td>'+data[i].STATUS_PO2+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_delete" data-product_code="'+data[i].product_code+'">Random</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#exportData').html(html);
                }
 
            });
            });

         
           //save insert
            $('#addExport').on('click', function(){
              var PO_NO       = $('#PO_NO').val();
              var TYPE        = $('#TYPE').val();
              var CONTAINER   = $('#CONTAINER').val();
              var REMARK      = $('#REMARK').val();
              var DATE = $('#DATE').val();
              var LMNT_DTTM   = $('#LMNT_DTTM').val();
              $.ajax({
                  url : "<?php echo site_url('C_Export/insert_export')?>",
                  method : "POST" ,
                  data : {PO_NO:PO_NO, TYPE:TYPE, CONTAINER:CONTAINER, REMARK:REMARK, DATE:DATE, LMNT_DTTM:LMNT_DTTM},
                  dataType : "json",
                  success:function(data){
                      $('[name="PO_NO"]').val("");
                      $('[name="TYPE"]').val("");
                      $('[name="CONTAINER"]').val("");
                      $('[name="REMARK"]').val("");
                      $('[name="DATE"]').val("");
                      $('[name="LMNT_DTTM"]').val("");
                      $('#Modal_Add').modal('hide');
                      window.location.href=window.location.href;
                   //reload_table();
                  }
              });
          });

          })
    </script>
