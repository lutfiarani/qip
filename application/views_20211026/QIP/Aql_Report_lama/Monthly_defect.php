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
                        <input placeholder="date from yyyy-mm-dd" type="text" class="form-control datepicker" name="START_DATE">
                        <input placeholder="date to yyyy-mm-dd" type="text" class="form-control datepicker" name="END_DATE">
                    </div>
                    
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
        
      
       
            
            <div class="card-body">

            


            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>CODE_1</th>
                  <th>CODE_2</th>
                  <th>DEFECT</th>
                  <th>% FROM DEFECT</th>
                  
                </thead>
                <tbody>
                <?php
                $total_qty=0;
                $total_persen=0;
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
            $data = $query[$i];
            $defect = number_format($data['DEFECT'],2,'.','');
            
            $total_qty += $data['QTY'];
            $total_persen += $data['DEFECT'];
            echo "<tr>
                <td style ='word-break:break-word;'>".($i+1)."</td>
                <td style ='word-break:break-word;'>$data[CODE_NAME]</td>
                <td style ='word-break:break-word;'>$data[REJECT_CODE_NAME]</td>
                <td style ='word-break:break-word;'>$data[QTY]</td>
                <td style ='word-break:break-word;'>$defect%</a> </td>
            
            </tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[id]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[po]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[date]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[remark]</td>
   
   </tr>";*/
        }
        echo "<tr>
        <td colspan='3'><center><b>TOTAL QTY DEFECT</b></center></td>
        <td><b>$total_qty</b></td>
        <td><b>$total_persen</b></td>
        </tr>
        ";
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