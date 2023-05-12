<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
        zoom: 90%;
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
                    <label for="exampleInputEmail1">PO NO</label>
                    <input type="text" class="form-control" name="PO_NO" placeholder="Enter PO NO">
                </div>
               </div>
            <!-- /.card -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
      
        <!--table id="example2" >
              <tr>
                <?php 
                  echo "
                <td> <div class='bg-success color-palette'><span><center>RELEASE</span></div>
                  <div class='bg-success disabled color-palette'><span><center>$banyak->RELEASE</span></div></td>
                <td> <div class='bg-danger color-palette'><span><center>REJECT</span></div>
                  <div class='bg-danger disabled color-palette'><span><center>$banyak->REJECT</span></div></td>
                <td> <div class='bg-primary color-palette'><span><center>WAITING</span></div>
                  <div class='bg-primary disabled color-palette'><span><center>$banyak->WAITING</span></div></td>
                <td> <div class='bg-warning color-palette'><span><center>PRODUCTION</span></div>
                  <div class='bg-warning disabled color-palette'><span><center>$banyak->PRODUCTION</span></div></td>
                  <td> <div class='bg-navy color-palette'><span><center><b>TOTAL</b></span></div>
                  <div class='bg-navy disabled color-palette'><span><center><b>$banyak->TOTAL</b></span></div></td>";
                ?>
        </tr>
        </table-->
      
            
            <div class="card-body">
            
            

            <div class="table-responsive-sm">
            <table id="example1" class="table table-bordered table-striped" style="width:100%">
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
                  <th>Insp Date AQL</th>
                  <th>Bal</th>
                 <?php if ($this->session->userdata('LEVEL') == 1){?>
                  <th>Action</th>
                 <?php }?>
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
        } else if ($data['STATUS_PO2']=='PRODUCTION')
        {
          echo "<tr style='background-color:#FFFF99'>";
        } else if ($data['STATUS_PO2']=='CANCEL')
        {
          echo "<tr style='background-color:#FF8000'>";
        }
        echo "
                <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CELL]</td>
                <td style ='font-size: 90%;' name='PO_NO' value='$data[PO_NO]'>$data[PO_NO]</a> </td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[MODEL_NAME]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[COUNTRY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CUST_NO]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[ART_NO]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TOTAL_QTY]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TOTAL_CARTON]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[SDD]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[TYPE]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[CONTAINER]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[EXPORT_DATE]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[INSPECT_DATE_AQL]</td>
                <td style ='word-break:break-word; font-size: 90%;'>$data[BALANCE_CRTON]</td>";
                if ($this->session->userdata('LEVEL') == 1){
                  echo "<td style ='word-break:break-word; font-size: 90%;'>";
                  if($data['INSPECT_DATE_AQL']===NULL OR $data['INSPECT_DATE_INPUT'] <> date('Y-m-d') ){
                    echo "<a href='".site_url('C_Inspection/input_inspection/'.$data['PO_NO'])."' class='btn btn-primary btn-s' >Add</a>";
                  } else {
                    echo "";
                  }
                  echo "</td>";
                }
               echo "</tr>";
        
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
  </div>
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