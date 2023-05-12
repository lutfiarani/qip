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
                    <label> Inspect Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyymm" type="text" class="form-control datepicker1" name="INSPECT_MONTH" autocomplete="off">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
           </div>
        </form>
        
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th style ='word-break:break-word;' rowspan='2'>FACTORY</th>
                  <th style ='word-break:break-word;' rowspan='2'>TOTAL PO</th>
                  <th style ='word-break:break-word;' rowspan='2'>TOTAL PAIRS</th>
                  <th style ='word-break:break-word;' rowspan='2'>TOTAL PAIRS INSPECTED</th>
                  <th style ='word-break:break-word;' rowspan='2'>REMARK</th>
                  
                </thead>
                <tbody>
                <?php
		/*$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];*/
        
        echo "<tr>
            <td style ='font-size: 15px;'>HWI</td>
            <td style ='font-size: 15px;'>".NUMBER_FORMAT($summary->TOTAL_PO)."</td>
            <td style ='font-size: 15px;'>".NUMBER_FORMAT($summary->TOTAL_QTY)."</td>
            <td style ='font-size: 15px;'>".NUMBER_FORMAT($summary->TOTAL_INSPECTED)."</td>";
            echo "
            <td style ='font-size: 15px;'>";
        $jumlah_defect = count($defect);
        for ($k=0; $k<$jumlah_defect; $k++){
            $defects = $defect[$k];
            $persentase = NUMBER_FORMAT($defects['QTY_DEFECT']/$summary->TOTAL_PO,2);
            echo " ".($k+1).". $defects[CODE_NAME] = $defects[QTY_DEFECT] ($persentase%)<br>";
        }

       echo "</td>
              
        </tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[id]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[po]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[date]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[remark]</td>
   
   </tr>";*/
				  
				
		//}
  ?>
                </tbody>
                </table>
  <?php //}?>
            </div>
        

        <form role="form" action=<?php echo $export;?> method="post">
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Export to Excel</button>
            </div>
        </form>
       
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="width:100%">
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
                  <th style ='word-break:break-word;' rowspan='2'>Minor Min Defect (Released)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Minor Max Defect (Rejected)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Major Min Defect (Released)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Major Max Defect (Rejected)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Critic Min Defect (Released)</th>
                  <th style ='word-break:break-word;' rowspan='2'>Critic Max Defect (Rejected)</th>
                  <th style ='word-break:break-word;' colspan='5'>AQL Inspection</th>
                 
                </tr>
                <tr>
                  <th style ='word-break:break-word;'>Inspection Date</th>
                  <th style ='word-break:break-word;'>Inspector</th>
                  <th style ='word-break:break-word;'>Minor Rejected Pairs</th>
                  <th style ='word-break:break-word;'>Major Rejected Pairs</th>
                  <th style ='word-break:break-word;'>Critic Rejected Pairs</th>
                  <th style ='word-break:break-word;'>Status</th>
                  <th style ='word-break:break-word;'>Rejected Reason</th>
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        
        echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[IC_NUMBER]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CustomerOrderNumber]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CELL]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[ARTICLE]</a> </td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[PO_NO]</a> </td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[PARTIAL]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[PARTIAL_QTY]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[LEVEL]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QTY_INSPECT1]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_MINOR_ACC]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_MINOR_REJ]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_MAJOR_ACC]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_MAJOR_REJ]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_CRITIC_ACC]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_CRITIC_REJ]</td>

        <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECTOR]</td>     
        <td style ='word-break:break-word; font-size: 90%;'>$data[MINOR_REJ_DATA]</td>     
        <td style ='word-break:break-word; font-size: 90%;'>$data[MAJOR_REJ_DATA]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CRITIC_REJ_DATA]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[STATUS_REPORT]</td>     
        <td style ='word-break:break-word; font-size: 90%;'></td>     
    </tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[id]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[po]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[date]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[remark]</td>
   
   </tr>";*/
				  
				
		}
  ?>
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

      
<!-- jQuery -->
<script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example2").DataTable();
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "fixedHeader": true
    });
  });

  $(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>

<!--js datepicker-->
<script src="<?php echo base_url();?>template/plugins/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $(function(){
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
  });

  $(function(){
    $(".datepicker1").datepicker({
          
      todayHighlight: true,autoclose: true,
            format: "yyyymm",
            viewMode: "months", 
            minViewMode: "months"
    });
  });
</script>