
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/new_css/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url();?>template/plugins/new_css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
                  <!-- <button type="submit" class="btn btn-primary">Generate Data</button> -->
                  <span id="button_generate"></span>
                  <span id="button_submit"></span>
        </div>
        </form>
        
       
            
        <div class="card-body">
            <table  id="data_view" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Cell</th>
                  <th>PO</th>
                  <th>WORKDATE</th>
                  <th>Article</th>
                  <th>Model Name</th>
                  <th>Assembly In</th>
                  <th>Total Defect</th>
                  <th>Defect Rate</th>
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
     
    // $.fn.datepicker.defaults.format = "yyyymmdd";
    // $('#tanggal').datepicker({
    //     startDate: '-30d',
    //     todayHighlight: true,autoclose: true,
    // });

    $(document).ready(function(){
        // view_data();

        function showtable(tanggal){
            $('#data_view').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "paging" : false,
                    "ajax"  :{
                      type      : "post",
                      data      : {tanggal:tanggal},
                      url       : "<?php echo site_url('C_Pivot/cell_');?>",
                      responsive: true
                    }
            
            });
        }

        function DestroyDatatable(){
            $('#data_view').DataTable().destroy();
        }

       
        $('#lihatData').on('click',function(){
            var tanggal = $('#production_date').val();
            DestroyDatatable()
        
            showtable(tanggal);
        })
       
  });

      
</script>