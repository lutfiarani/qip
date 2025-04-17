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
           
        
      
       
            
            <div class="card-body">

            


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>Fac</th>
                  <th>Cell</th>
                  <th>PO No</th>
                  <th>Model Name</th>
                  <th>Dest</th>
                  <th>Cost No</th>
                  <th>Art</th>
                  <th>Qty</th>
                  <th>Qty Ctn</th>
                  <th>SDD</th>
                  <th>Type</th>
                  <th>Load No</th>
                  <th>Ex Fty</th>
                  <th>Insp Date</th>
                  <th>Bal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        if ($data['STATUS_PO_AQL']=='RELEASE')
        {
          echo "<tr style='background-color:#91E3A5'>";
        } else if ($data['STATUS_PO_AQL']=='REJECT')
        {
          echo "<tr style='background-color:#FF0000'>";
        } else if ($data['STATUS_PO_AQL']=='REPACKING')
        {
          echo "<tr style='background-color:#A0A0A0'>";
        } else if ($data['STATUS_PO_AQL']=='WAITING')
        {
          echo "<tr style='background-color:#3399FF'>";
        } else if ($data['STATUS_PO_AQL']=='PRODUCTION')
        {
          echo "<tr style='background-color:#FFFF99'>";
        } else if ($data['STATUS_PO_AQL']=='CANCEL')
        {
          echo "<tr style='background-color:#FF8000'>";
        }
        echo "
                <td style ='word-break:break-word; font-size: 90%;'>$data[ZCDONG]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[ZCELLNO]</td>
                <td style ='font-size: 90%;' name='PO_NO' value='$data[VBELN]'>$data[VBELN]</a> </td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[COST_NO]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[ART_NO]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[QTY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TOTAL_CARTON]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[ZHSDD]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TYPE]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CONTAINER]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[EXPORT_DATE]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE_AQL]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[BALANCE_CRTON]</td>
                <td style ='word-break:break-word; font-size: 90%;'>";
                if($data['INSPECT_DATE_AQL']===NULL){
                  echo "<a href='".site_url('C_Inspection/input_inspection/'.$data['VBELN'])."' class='btn btn-primary btn-s' >Add</a>";
                } else {
                  echo "";
                }
                echo "</td>
							</tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word;'>".($i+1)."</td>
    <td style ='word-break:break-word;'>$data[id]</td>
    <td style ='word-break:break-word;'>$data[po]</td>
    <td style ='word-break:break-word;'>$data[date]</td>
    <td style ='word-break:break-word;'>$data[remark]</td>
   
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