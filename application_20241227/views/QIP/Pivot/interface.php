
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/new_css/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url();?>template/plugins/new_css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<style>
  .test {
    width: 500px;
    height: 70px;
    background: #f5f5f5;
    border: 1px solid #ddd;
    padding: 5px;
}

.test[placeholder]:empty:before {
    content: attr(placeholder);
    color: #555; 
}

.test[placeholder]:empty:focus:before {
    content: "";
}
  </style>
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
                    <label> Production Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input type="text" id="production_date" name="production_date" data-provide="datepicker"  class="form-control" placeholder="Enter Date ..." autocomplete="off">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary" id="view_data">View Data</button> -->
                  <button type="button" type="submit" id="view_data" class="btn btn-primary">View Data</button>
                  <!-- <button type="submit" class="btn btn-primary">Generate Data</button> -->
                  <span id="button_generate"></span>
                  <span id="button_submit"></span>
        </div>
        </form>
        
       
            
        <div class="card-body">
            <table id="dailyReport" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PO</th>
                  <th>Model Name</th>
                  <th>Article</th>
                  <th>Assembly In</th>
                  <th>Total Defect</th>
                  <th>Defect Rate</th>
                  <th>Result</th>
                  <th>Step In Tools</th>
                  <th>Stop Line</th>
                  <th>Comment</th>
                  <th>Action</th>
                  <th>Status Upload</th>
                </tr>
                </thead>
                <tbody id="data_view">
        
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

      <div class="modal fade" id="ModalDefectDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Partial Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <table class="table table-bordered">
                          <thead>
                            <th>PO NO</th>
                            <th>QCODE</th>
                            <th>PARENT_REASON_CODE</th>
                            <th>QTY</th>
                            <th>REASON_DESC</th>
                            <th>PARENT DATE</th>
                            <th>ACTION</th>
                          </thead>
                          <tbody id="view_defect_detail">
                          </tbody>
                       </table>
                       <h5>Total Qty Defect : <span id="total_qty"></span></h5>
                       <!-- <h5>Total Qty Defect : <span id="total_tambah"></span></h5> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
        

    </section>
    <!-- Scripts -->
    <script src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>  -->
    <!-- <script type="text/javascript" src="<?php // echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script> -->

    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>

    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
      
    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
        
    <!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script-->
    <script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>

    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

    <script>
     jQuery(function($){
          $(".test").focusout(function(){
              var element = $(this);        
              if (!element.text().replace(" ", "").length) {
                  element.empty();
              }
          });
      });
    </script>

    <script>
     
    // $.fn.datepicker.defaults.format = "yyyymmdd";
    // $('#tanggal').datepicker({
    //     startDate: '-30d',
    //     todayHighlight: true,autoclose: true,
    // });

    $(document).ready(function(){
        // view_data();

        function view_data(){
          $.ajax({
                type:"POST",
                url: "<?php echo site_url('C_pivot/view_data/') ?>",
                // data : {model:model},
                cache: false,
                dataType : "JSON",
                success: function(data){
                    
                    var html = '';
                    var i;
                    var no = 1;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].MODEL_NAME+'</td>'+
                                '<td>'+data[i].ART_NO+'</td>'+
                                '<td>'+data[i].QTY_ASSY_IN+'</td>'+
                                '<td>'+data[i].QTY_DEFECT+'</td>'+
                                '<td>'+data[i].DEFECT_RATE+'</td>'+
                                '<td>'+data[i].RESULT+'</td>'+
                                '<td>'+data[i].STEP_IN_TOOLS+'</td>'+
                                '<td>'+data[i].STOP_LINE+'</td>'+
                                '<td>'+data[i].COMMENT+'</td>'+
                                '<td></td>'+
                                // '<td><button type="button" class="btn btn-warning btn-xs tambahComment" id="tambahComment" id_PO="'+data[i].PO_ID+'">Tambahkan Comment</button></td>'+
                                '<td>'+data[i].STATUS_GENERATE+'</td>';
                                
                                
                               no++;
                       html +=     '</tr>';
                      
                      }
                $('#data_view').html(html);
                html2 = ' <button type="button" type="submit" id="generate_data" class="btn btn-success">Generate Data</button>'
                $('#button_generate').html(html2);
                    
                }
            })
        }

        function view_generate(){
          $.ajax({
                type:"POST",
                url: "<?php echo site_url('C_pivot/view_generate/') ?>",
                // data : {model:model},
                cache: false,
                dataType : "JSON",
                success: function(data){
                    
                    var html = '';
                    var i;
                    var no = 1;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].MODEL_NAME+'</td>'+
                                '<td>'+data[i].ART_NO+'</td>'+
                                '<td>'+data[i].QTY_ASSY_IN+'</td>'+
                                '<td>'+data[i].QTY_DEFECT+'</td>'+
                                '<td>'+data[i].DEFECT_RATE+'</td>'+
                                '<td>'+data[i].RESULT+'</td>'+
                                '<td>'+data[i].STEP_IN_TOOLS+'</td>'+
                                '<td>'+data[i].STOP_LINE+'</td>';
                                if(data[i].RESULT == 'FAIL'){
                                html +='<td id="comment" name="comment" contenteditable>'+data[i].COMMENT+'</td>';
                                }else{
                                  html +='<td></td>';
                                }
                                html +='<td><button type="button" class="btn btn-primary btn-xs saveComment" id="saveComment" id_PO="'+data[i].PO_ID+'">Save Comment</button>'+
                                '<button type="button" class="btn btn-warning btn-xs editData" id="editData" id_PO="'+data[i].PO_ID+'">Edit Defect</button>'+
                                '</td>'+
                                '<td>'+data[i].STATUS_UPLOAD+'</td>';
                                
                                
                               no++;
                       html +=     '</tr>';
                      
                      }
                $('#data_view').html(html);
                html2 = ' <button type="button" type="submit" id="submit_data" class="btn btn-danger">Submit Data</button>'
                $('#button_submit').html(html2);
                    
                }
            })
        }

        function view_detail_data(PO_NO_ID){
          $.ajax({
              type      : "POST",
              url       : "<?php echo site_url('C_Pivot/view_defect_detail')?>",
              dataType  : "JSON",
              data      : {PO_NO_ID:PO_NO_ID},
              success   : function(data)
              {
                  // $('#ModalDefectDetail').modal('show');
                  var html = '';
                  var i, total_value=0;
                  var total_baru;
                  
                  for(i=0; i<data.length; i++){
                      html +='<tr>'+
                                  // '<td>'+data[i].PO_ID+'</td>'+
                                  '<td>'+data[i].PO_NO+'</td>'+
                                  '<td>'+data[i].QCODE+'</td>'+
                                  '<td>'+data[i].PARENT_REASON_CODE+'</td>'+
                                  '<td>'+data[i].QTY+'</td>'+
                                  '<td>'+data[i].REASON_DESC+'</td>'+
                                  '<td>'+data[i].PARENT+'</td>';
                      html += '<td><button type="button" class="btn btn-danger btn-xs delete_detail" data-PO_ID="'+data[i].PO_ID+'" data-QCODE="'+data[i].QCODE+'">Delete</button></td> ';
                      html += '</tr>';
                      total_value += parseInt(data[i].QTY, 10);
                  }
                
                  html +='<tr>'+
                        '<td>'+data[1].PO_NO+'</td>'+
                        '<td colspan="2"><input type="text" id="cari_qcode" name="cari_qcode" placeholder="masukkan kode, ex:100.01" ></td>'+
                        '<td colspan="2"><input type="text" id="QTY" placeholder="masukkan qty" ></td>'+
                        '<td colspan="2"><button class="btn btn-success btn-xs tambahDetail" id="tambahDetail" data-PO="'+data[1].PO_NO+'" data-PO_ID="'+data[1].PO_ID+'" >+ Tambah</button></td>'+
                    '</tr>';
                  var baru = parseInt($('#QTY').val());
                  $('#view_defect_detail').html(html); 
                  $('#total_qty').html(total_value);
              }
          });
        }

        // function load_data(query = '')
        // {
        //   var total_value = $('#total_qty').val();
        //   var qty = $('#QTY').val();
        //   var total;
        //   $.ajax({
        //         url:"<?php echo site_url('C_pivot/cari_qcode')?>",
        //         method:"POST",
        //         data:{query:query},
        //         dataType : 'json',
        //         success:function(data)
        //         {
        //           console.log(data);
        //           var html = '';
        //           var i;
        //           var stock;
        //           $('#result_parent_result_code').html(data[0].PARENT_REASON_CODE); 
        //           $('#result_reason').html(data[0].REASON_DESC); 
        //           $('#result_parent').html(data[0].PARENT);
        //           // alert("benar");
        //             // console.log(data);
        //           total = total_value + qty;
        //           $('#total_qty').html(total);
        //         }
        //   });
        //   // alert(query)
        // }

        
        // $('#cari_qcode').keyup(function(){
        $(document).on('keyup','#cari_qcode', function(){
          var query = $('#cari_qcode').val();
          load_data(query);
          
        });

       //ajax display I
       $('#view_data').on('click', function(){
            view_data();
       });
     
       $(document).on('click','#generate_data', function(){
              $.ajax({
                  url : "<?php echo site_url('C_pivot/generate_data')?>",
                  method:"POST",
                  // data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                  dataType: "JSON",
                  success:function(alert){
                      view_generate();

                  }
              });
        }); 

        $(document).on('click','#submit_data', function(){
              $.ajax({
                  url : "<?php echo site_url('C_pivot/submit_data')?>",
                  method:"POST",
                  // data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                  dataType: "JSON",
                  success:function(alert){
                      view_generate();

                  }
              });
        });
     
       $(document).on('click','.editData', function(){
          var PO_NO_ID       = $(this).attr("id_PO");
          $('#ModalDefectDetail').modal('show');
          view_detail_data(PO_NO_ID);
      });

      $(document).on('click','.saveComment', function(){
          var PO_NO_ID       = $(this).attr("id_PO");
          var comment        = $('#comment').text();
          $.ajax({
                  url : "<?php echo site_url('C_Pivot/save_comment')?>",
                  method:"POST",
                  data: {PO_NO_ID:PO_NO_ID , comment:comment},
                  dataType: "JSON",
                  success:function(alert){
                      view_generate();

                  }
              });
          // alert(comment);
      });


      $(document).on('click','.delete_detail', function(){
        var PO_ID       = $(this).attr("data-PO_ID");  
        var Qcode       = $(this).attr("data-QCODE");  
        // alert(PO_ID+','+Qcode);
        $.ajax({
              type      : "POST",
              url       : "<?php echo site_url('C_Pivot/delete_detail')?>",
              dataType  : "JSON",
              data      : {PO_ID:PO_ID, Qcode:Qcode},
              success   : function(data)
              {
                  // $('#ModalDefectDetail').modal('show');
                  view_detail_data(PO_ID);
                  // alert("datadihapus")
              }
        })
      });

      $(document).on('click','.tambahDetail', function(){
        var PO_ID       = $(this).attr("data-PO_ID");  
        var PO          = $(this).attr("data-PO");  
        var Qcode       = $('#cari_qcode').val();
        // var parent      = $('#result_parent_result_code').val(); 
        var qty         = $('#QTY').val(); 
        // alert(PO_ID+','+Qcode);
        $.ajax({
              type      : "POST",
              url       : "<?php echo site_url('C_Pivot/tambah_detail')?>",
              dataType  : "JSON",
              data      : {PO_ID:PO_ID, Qcode:Qcode, PO:PO, qty:qty},
              success   : function(data)
              {
                  
                  view_detail_data(PO_ID);
                  // alert(data);
                  
              }
        })
      });
         
      
  });

      
</script>