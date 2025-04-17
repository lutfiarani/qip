
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/new_css/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url();?>template/plugins/new_css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>template/plugins/new_js/datatable/jquery.dataTables.min.css">
<link href="<?php echo base_url();?>template/plugins/new_js/datatable/buttons.dataTables.min.css">
<style>
.loader_div{
  position: absolute;
  top: 0;
  bottom: 0%;
  left: 0;
  right: 0%;
  z-index: 99;
  opacity:0.7;
  display:none;
  background: lightgrey url(<?php echo base_url();?>'template/img/img/Infinity-1s-200px.gif') center center no-repeat;
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
                  <button type="button" type="submit" id="view_data" class="btn btn-primary">View Data</button>
                  <span id="button_generate"></span>
                  <span id="button_submit"></span>
        </div>
        </form>
       
            
        <div class="card-body">
          <div class="table-responsive">
            <table id="data_view" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Check All <input type="checkbox" class='checkall' id='checkall'><input type="button" id='submit_check' value='Submit Checked' ></th>
                    <th>Check Trial <input type="checkbox" class='checkall' id='checkall'><input type="button" id='submit_trial_check' value='Submit Trial Checked' ></th>
                    <th>PO</th>
                    <th>Model Name</th>
                    <th>Article</th>
                    <th>Assembly In</th>
                    <th>Total Defect</th>
                    <th>Defect Rate</th>
                    <th>Result</th>
                    <th>Step In Tools</th>
                    <th>Stop Line</th>
                    <th>Stop Line Reason</th>
                    <th>Comment</th>
                    <th>Status Upload</th>
                    <th>Action</th>
                    <th>JSON</th>
                    <th>JSON 2 </th>
                  </tr>
                </thead>
                <tbody>
        
                </tbody>
            </table>
            <div class="loading">
              <img class="loading-image" src="<?php echo base_url();?>template/images/spinner.gif" alt="Loading..." />
            </div>
        </div>
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
                      <table class="table table-bordered ">
                          <thead>
                            <th>PO NO</th>
                            <th>QCODE</th>
                            <th>PARENT_REASON_CODE</th>
                            <th>REASON_DESC</th>
                            <th>PARENT DATE</th>
                            <th>QTY</th>
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
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
   
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <!-- <script src="<?php echo base_url();?>template/new_js/datatable/jquery.dataTables.min.js"></script> -->
    <script src="<?php echo base_url();?>template/new_js/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>template/new_js/datatable/jszip.min.js"></script>
    <script src="<?php echo base_url();?>template/new_js/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>template/new_js/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>template/new_js/datatable/buttons.html5.min.js"></script>
    
   
    
    <script>
      
        $.fn.datepicker.defaults.format = "yyyymmdd";
        $('#production_date').datepicker({
            todayHighlight:'TRUE',
            autoclose: true,
            format: "yyyymmdd",
        });

        
    </script>
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
     
    
    $(document).ready(function(){
        // view_data();
        $('.loading').hide();
        function view_data(tanggal){
            $('#data_view').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": false,
                "paging" : false,
                "dom": 'Bfrtip',
                "buttons": [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                "ajax"  :{
                    type      : "post",
                    data      : {tanggal:tanggal},
                    url       : "<?php echo site_url('C_Pivot/view_data');?>",
                    responsive: true
                }
                
            });
            // $('#img').hide();
            html2 = ' <button type="button" type="submit" id="generate_data" class="btn btn-success">Generate Data</button>'
            $('#button_generate').html(html2);
                    
            
        }

        // function view_generate(tanggal){
        //     $('#data_view').DataTable({
        //       responsive: true,
        //       processing: true,
        //       serverSide: true,
        //       paging: true,
        //       pageLength: 50,
        //       ajax: {
        //           type: "post",
        //           data: { tanggal: tanggal },
        //           url : "<?php echo site_url('C_Pivot/view_generate');?>",
        //           responsive: true,
        //           beforeSend: function() {
        //             // Tampilkan loading indicator
        //             $('#data_view').addClass('loading');
        //           },
        //           complete: function() {
        //             // Sembunyikan loading indicator
        //             $('#data_view').removeClass('loading');
        //           }
        //       },
        //       deferRender: true,
        //       scrollCollapse: true,
        //       scroller: true,
              
        //       // Tambahan konfigurasi untuk kinerja
        //       autoWidth: false,
        //       pageLength: 50,
        //       lengthMenu: [[50, 100, 200, -1], [50, 100, 200, "Semua"]],
        //       processing: true,
        //       language: {
        //         processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
        //       }
        //     });  
              
        //     html2 = ' <button type="button" type="submit" id="submit_data" class="btn btn-danger buttontry"><span class="buttontry__text">Submit Data</span></button>'
        //     $('#button_submit').html(html2);
        //     const theButton = document.querySelector(".buttontry");

        //     theButton.addEventListener("click", () => {
        //         theButton.classList.add("buttontry--loading");
            // });
      //  }

      function view_generate(tanggal){
        $.ajax({
              type      : "POST",
              url       : "<?php echo site_url('C_Pivot/view_generate');?>",
              dataType  : "JSON",
              data      : {tanggal:tanggal},
              success   : function(data)
              {

              }
            })
      }

        function DestroyDatatable(){
            $('#data_view').DataTable().destroy();
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
                      if(data[i].QCODE == null){
                          html +='';
                      }else{
                        html +='<tr>'+
                                    '<td>'+data[i].PO_NO+'</td>'+
                                    '<td>'+data[i].QCODE+'</td>'+
                                    '<td>'+data[i].PARENT_REASON_CODE+'</td>'+
                                    '<td>'+data[i].REASON_DESC+'</td>'+
                                    '<td>'+data[i].PARENT+'</td>'+
                                    '<td contenteditable id="edit_qty" name="edit_qty" class="edit_qty" data-PO_ID="'+data[i].PO_ID+'" data-QCODE="'+data[i].QCODE+'">'+data[i].QTY+'</td>';
                        html += '<td>'+//<button type="button" class="btn btn-warning btn-xs edit_qty" data-PO_ID="'+data[i].PO_ID+'" data-QCODE="'+data[i].QCODE+'">Save Qty</button>'+
                                '<button type="button" class="btn btn-danger btn-xs delete_detail" data-PO_ID="'+data[i].PO_ID+'" data-QCODE="'+data[i].QCODE+'">Delete</button></td> '+
                                '</tr>';
                        total_value += parseInt(data[i].QTY, 10);
                      }
                  }
                
                  html +='<tr>'+
                        '<td>'+data[0].PO_NO+'</td>'+
                        '<td colspan="2"><input type="text" id="cari_qcode" name="cari_qcode" placeholder="masukkan kode, ex:100.01" ></td>'+
                        '<td colspan="2"><input type="text" id="QTY" placeholder="masukkan qty" ></td>'+
                        '<td colspan="2"><button class="btn btn-success btn-xs tambahDetail" id="tambahDetail" data-PO="'+data[0].PO_NO+'" data-PO_ID="'+data[0].PO_ID+'" >+ Tambah</button></td>'+
                    '</tr>';
                  var baru = parseInt($('#QTY').val());
                  $('#view_defect_detail').html(html); 
                  $('#total_qty').html(total_value);
              }
          });
        }

        // $('#cari_qcode').keyup(function(){
        $(document).on('keyup','#cari_qcode', function(){
          var query = $('#cari_qcode').val();
          load_data(query);
          
        });

       //ajax display I
       $('#view_data').on('click', function(){
            var tanggal = $('#production_date').val();  
            if(tanggal == ''){
                alert("Silahkan pilih tanggal terlebih dahulu");
            }else{
                DestroyDatatable()
                //view_data(tanggal); 
                view_generate(tanggal);
                
            }
       });
     
      //  $(document).on('click','#generate_data', function(){
      //     var tanggal = $('#production_date').val();  
      //     var confirmdelete = confirm("Mulai generate data?");
      //     if (confirmdelete == true) {
      //         $('.loading').show();
      //         $.ajax({
      //             url : "<?php echo site_url('C_Pivot/generate_data')?>/"+tanggal,
      //             // method:"G",
      //             data : {tanggal:tanggal},
      //             dataType: "JSON",
      //             success:function(alert){
      //               //   view_generate();
      //                 $('.loading').hide();
      //                 DestroyDatatable()
      //                 view_generate(tanggal);
   

      //             }
      //         });
      //     }
      //       // alert(tanggal)
      //   }); 

        $(document).on('click','#submit_data', function(){
          var tanggal = $('#production_date').val();  
          var confirmdelete = confirm("Anda yakin ingin mengirim data?");
          if (confirmdelete == true) {
              $.ajax({
                  url : "<?php echo site_url('C_Pivot/submit_data')?>",
                  method:"POST",
                  data: {tanggal:tanggal},
                  dataType: "JSON",
                  success:function(data){
                    DestroyDatatable()
                    alert(data)
                    // view_generate(tanggal);
                    // window.onload = view_data(tanggal)
                    location.reload();
                  }
              });
            }
          // alert('hai')
        });

        $(document).on('click','#submit_data_trial', function(){
          var tanggal       = $('#production_date').val();  
          var confirmdelete = confirm("Anda yakin ingin mengirim data ke server trial adidas?");
          if (confirmdelete == true) {
              $.ajax({
                  url : "<?php echo site_url('C_Pivot/submit_data_trial')?>",
                  method:"POST",
                  data: {tanggal:tanggal},
                  dataType: "JSON",
                  success:function(data){
                    DestroyDatatable()
                    alert(data)
                    // view_generate(tanggal);
                    // window.onload = view_data(tanggal)
                    location.reload();
                  }
              });
            }
          // alert('hai')
        });

     
       $(document).on('click','.editData', function(){
            var PO_NO_ID       = $(this).attr("id_PO");
            $('#ModalDefectDetail').modal('show');
            view_detail_data(PO_NO_ID);
        });

      $(document).on('click','.saveComment', function(){
          var PO_NO_ID       = $(this).attr("id_PO");
          var comment        = $('#comment').val();
          $.ajax({
                  url : "<?php echo site_url('C_Pivot/save_comment')?>",
                  method:"POST",
                  data: {PO_NO_ID:PO_NO_ID , comment:comment},
                  dataType: "JSON",
                  success:function(alert){
                    DestroyDatatable()
                    view_generate(tanggal);

                  }
              });
          // alert(comment);
      });

      // $(document).on('click','.edit_qty', function(){
      $(document).on('blur', '.edit_qty', function(){
          var PO_ID   = $(this).attr("data-PO_ID");
          var QCODE   = $(this).attr("data-QCODE");
          var qty     = $(this).text();
          $.ajax({
                  url : "<?php echo site_url('C_Pivot/edit_qty')?>",
                  method:"POST",
                  data: {PO_ID:PO_ID, QCODE:QCODE , qty:qty},
                  dataType: "JSON",
                  success:function(alert){
                    view_detail_data(PO_ID);

                  }
              });
        //   alert('wkwk');
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

       // Checkbox checked
       $('#checkall').click(function(){
          if($(this).is(':checked')){
            $('.delete_check').prop('checked', true);
          }else{
            $('.delete_check').prop('checked', false);
          }
      });

      $('#submit_check').click(function(){
          var tanggal = $('#production_date').val();  
          var deleteids_arr = [];
          // Read all checked checkboxes
          $("input:checkbox[class=delete_check]:checked").each(function () {
            deleteids_arr.push($(this).val());
          });

          // Check checkbox checked or not
          if(deleteids_arr.length > 0){

            // Confirm alert
            var confirmdelete = confirm("Anda ingin mengirim data sesuai dengan yang dipilih?");
            if (confirmdelete == true) {
                $.ajax({
                  url : "<?php echo site_url('C_Pivot/submit_pilih')?>",
                  type: 'post',
                  data: {deleteids_arr: deleteids_arr},
                  success: function(response){
                      // dataTable.ajax.reload();
                      DestroyDatatable()
                      alert(response)
                      view_generate(tanggal);
                  }
                });
            } 
          }
       });

       $('#submit_trial_check').click(function(){
          var tanggal = $('#production_date').val();  
          var deleteids_arr = [];
          // Read all checked checkboxes
          $("input:checkbox[class=delete_check]:checked").each(function () {
            deleteids_arr.push($(this).val());
          });

          // Check checkbox checked or not
          if(deleteids_arr.length > 0){

            // Confirm alert
            var confirmdelete = confirm("Anda ingin mengirim data sesuai dengan yang dipilih?");
            if (confirmdelete == true) {
                $.ajax({
                  url : "<?php echo site_url('C_Pivot/submit_pilih_trial')?>",
                  type: 'post',
                  data: {deleteids_arr: deleteids_arr},
                  success: function(response){
                      // dataTable.ajax.reload();
                      DestroyDatatable()
                      alert(response)
                      view_generate(tanggal);
                  }
                });
            } 
          }
       });


      

      // Checkbox checked
      function checkcheckbox(){

        // Total checkboxes
        var length = $('.delete_check').length;

        // Total checked checkboxes
        var totalchecked = 0;
        $('.delete_check').each(function(){
          if($(this).is(':checked')){
              totalchecked+=1;
          }
        });

        // Checked unchecked checkbox
        if(totalchecked == length){
          $("#checkall").prop('checked', true);
        }else{
          $('#checkall').prop('checked', false);
        }
      }
         
      

     
         
      
  });

      
</script>