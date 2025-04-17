
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
  $container = count($ana);
  $no = 1;
//   echo $container;
for($a = 1; $a <= $container; $a++){
   // $query2 = $query[$a];
    // if($a != $query[$a]['CONTAINER'] ){
        // echo $query[$a]['CONTAINER'];
        // echo '<br>';
        
        //echo $query[$a]['CONTAINER'];
        echo " 
        
        <br>
        <table  class='table table-bordered table-striped' style='width:100%'>
        <thead>
        <tr>
        <th width='30'><center>No</center></th>
        <th width='30'><center>Fac</center></th>
        <th width='65'><center>Cell</center></th>
        <th width='85'><center>PO No</center></th>
        <th width='100'<center>Model Name</center></th>
        <th width='75'><center>Destination</center></th>
        <th width='55'><center>Art</center></th>
        <th width='35'><center>qty</center></th>
        <th width='40'><center>SDD</center></th>
        <th width='35'><center>Type</center></th>
        <th width='75'><center>Remark</center></th>
         
        </tr>
        </thead>
        <tbody>";
        echo "<b>Container No : ".$a."</b>";
      
        
        foreach ($query as $haha) {
            # code...
           
            if($a != $haha['CONTAINER']){
                // echo $a;
                echo ' ';
                  
            } elseif ($a == $haha['CONTAINER']){
             
                //echo //left($haha['CONTAINER'],1);
                if ($haha['STATUS_PO_AQL']=='RELEASE')
                    {
                      echo "<tr style='background-color:#00CC00'>";
                    } else if ($haha['STATUS_PO_AQL']=='REJECT')
                    {
                      echo "<tr style='background-color:#FF0000'>";
                    } else if ($haha['STATUS_PO_AQL']=='REPACKING')
                    {
                      echo "<tr style='background-color:#A0A0A0'>";
                    } else if ($haha['STATUS_PO_AQL']=='WAITING')
                    {
                      echo "<tr style='background-color:#3399FF'>";
                    } else if ($haha['STATUS_PO_AQL']=='PRODUCTION')
                    {
                      echo "<tr style='background-color:#f6f611'>";
                    } else if ($haha['STATUS_PO_AQL']=='CANCEL')
                    {
                      echo "<tr style='background-color:#FF8000'>";
                    }
                echo "
                <td><center>".($no++)."</center></td>
                <td><center>$haha[FACTORY]</center></td>
                <td><center>$haha[CELL]</center></td>
                <td><center> <a href='".site_url('C_Export/detail_export/'.$haha['PO_NO'])."'>$haha[PO_NO]</a> </center></td>
                <td><center>$haha[MODEL_NAME]</center></td>
                <td><center>$haha[COUNTRY]</center></td>
                <td><center>$haha[ART_NO]</center></td>
                <td><center>$haha[TOTAL_QTY]</center></td>
                <td><center>$haha[SDD]</center></td>
                <td><center>$haha[TYPE]</center></td>
                <td><center>$haha[REMARK]</center></td>
                
                            </tr>";
            }
          }
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