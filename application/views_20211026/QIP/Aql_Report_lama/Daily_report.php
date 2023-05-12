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
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="INSPECT_DATE">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
           </div>
        </form>
        
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
            <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_ACC]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[QIP_LEVEL_REJECT]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE]</td>
            <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECTOR_NAMA]</td>     
            <td style ='word-break:break-word; font-size: 90%;'>$data[REJECT_QTY]</td>     
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