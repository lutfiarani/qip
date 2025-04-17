
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
                 
        </div>
        </form>
       
            
        <div class="card-body">
          <div class="table-responsive">
            <table id="data_view" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
                <thead>
                  <tr> 
                    <th>No</th>
                    <th>WORKDATE</th>
                    <th>PO</th>
                    <th>CELL</th>
                    <th>Destination</th>
                    <th>Model Name</th>
                    <th>Article</th>
                    <th>Assembly In</th>
                    
                  </tr>
                </thead>
                <tbody>
        
                </tbody>
            </table>
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
                    url       : "<?php echo site_url('C_ProductionByModel/view_data');?>",
                    responsive: true
                }
                
            });
            // $('#img').hide();
            html2 = ' <button type="button" type="submit" id="generate_data" class="btn btn-success">Generate Data</button>'
            $('#button_generate').html(html2);
                    
            
        }

        function DestroyDatatable(){
            $('#data_view').DataTable().destroy();
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
                view_data(tanggal);
                
            }
       });
     
       
  });

      
</script>