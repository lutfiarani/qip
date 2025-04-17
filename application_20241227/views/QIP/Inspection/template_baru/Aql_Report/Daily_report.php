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
                    <label> Inspect Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" id="INSPECT_DATE" name="INSPECT_DATE">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
           </div>
        </form>
        
        <!--form role="form" action=<?php echo $export;?> method="post">
          <div class="card-footer">
              <button type="submit" class="btn btn-warning">Export to Excel</button>
          </div>
        </form-->
       
            
        <div class="card-body">
            <table id="dailyReport" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th rowspan='2'>No</th>
                  <th rowspan='2'>IC</th>
                  <th rowspan='2'>Cust NO</th>
                  <th rowspan='2'>Fac</th>
                  <th style ='word-break:break-word;' rowspan='2'>Line</th>
                  <th style ='word-break:break-word;' rowspan='2'>Model_Name</th>
                  <th rowspan='2'>Art #</th>
                  <th rowspan='2'>PO #</th>
                  <th rowspan='2'>Part</th>
                  <th rowspan='2'>Dest</th>
                  <th style ='word-break:break-all;' rowspan='2'>Qty Order</th>
                  <th rowspan='2'>Level AQL</th>
                  <th style ='word-break:break-all;' rowspan='2'>Pairs Inspected</th>
                  <th style ='word-break:break-word;' rowspan='2'>Min Defect (Released)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Max Defect (Rejected)</th>
                  <th style ='word-break:break-word;' colspan='5'>AQL Inspection</th>
                 
                </tr>
                <tr>
                  <th style ='word-break:break-word;'>Inspection Date</th>
                  <th style ='word-break:break-word;'>Inspector</th>
                  <th style ='word-break:break-word;'>Rejected Pairs</th>
                  <th style ='word-break:break-word;'>Status</th>
                  <th style ='word-break:break-word;'>Rejected Reason</th>
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
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

    <script>
      var tableAqlReport;

      function reload_table_aql(){
        tableAqlReport.ajax.reload(null, false);
      }

      tableAqlReport = $(document).ready(function(){
        var INSPECT_DATE = $('#INSPECT_DATE').val();
     
        $('#dailyReport').DataTable({
         
            "ajax":{
              url : "<?php echo site_url('C_Aql/daily_report/');?>",
              type:'GET',
              responsive: true,
              data : {INSPECT_DATE:INSPECT_DATE},
              success : function(data){
                      if (!$.trim(data)){
                        $('[name="INSPECT_DATE"]').val(date('Y-m-d'));
                        alert(INSPECT_DATE);
                      } else{
                        $('[name="INSPECT_DATE"]').val("");
                        alert(INSPECT_DATE);
                      }
                reload_table_aql();
              }
        
            }
        });


      })
    </script>