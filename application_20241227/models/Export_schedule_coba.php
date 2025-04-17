<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 60000);
</script>

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
                    <label> Export Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="EXPORT_DATE">
                    </div>
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
        
      
       
            
            <div class="card-body">

            <div class="table-responsive-sm">
<?php
    foreach($query as $querys){
        
    }
?>

            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Cont</th>
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Destination</th>
                  <th>Art</th>
                  <th>qty</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>PO Status</th>
                  <th>Remark</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        if ($data['STATUS_PO2']=='RELEASE')
        {
          echo "<tr style='background-color:#91E3A5'>";
        } else if ($data['STATUS_PO2']=='REJECT')
        {
          echo "<tr style='background-color:#FF0000'>";
        } else if ($data['STATUS_PO2']=='REPACKING')
        {
          echo "<tr style='background-color:#A0A0A0'>";
        } else if ($data['STATUS_PO2']=='WAITING')
        {
          echo "<tr style='background-color:#3399FF'>";
        } else if ($data['STATUS_PO2']=='PRODUCT')
        {
          echo "<tr style='background-color:#FFFF99'>";
        } else if ($data['STATUS_PO2']=='CANCEL')
        {
          echo "<tr style='background-color:#FF8000'>";
        }
        echo "
                <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CONTAINER]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CELL]</td>
                <td style ='font-size: 90%;'> <a href='".site_url('C_Export/detail_export/'.$data['PO_NO'])."'>$data[PO_NO]</a> </td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[ART_NO]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TOTAL_QTY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[SDD]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TYPE]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[STATUS_PO2]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[REMARK]</td>
                
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