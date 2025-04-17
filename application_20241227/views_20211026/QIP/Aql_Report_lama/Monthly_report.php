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
                        <input placeholder="yyyy-mm" type="text" class="form-control datepicker1" name="INSPECT_MONTH">
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
                  <th rowspan='2'>Cust No</th>
                  <th rowspan='2'>Fac</th>
                  <th style ='word-break:break-word;' rowspan='2'>Line</th>
                  <th style ='word-break:break-word;' rowspan='2'>Model_Name</th>
                  <th rowspan='2'>Art #</th>
                  <th rowspan='2'>PO #</th>
                  <th rowspan='2'>Part</th>
                  <th rowspan='2'>Dest</th>
                  <th style ='word-break:break-word;' rowspan='2'>Qty Order</th>
                  <th rowspan='2'>Level AQL</th>
                  <th style ='word-break:break-word;' rowspan='2'>Pairs Inspected</th>
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
            <td style ='word-break:break-word; font-size: 90%;'>$data[MaxList]</td>
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