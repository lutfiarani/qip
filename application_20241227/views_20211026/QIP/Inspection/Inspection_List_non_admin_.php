<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
        zoom: 95%;
    }
    setInterval('autoRefreshPage()', 180000);
    
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
                    <label> Inspection Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="INSPECT_DATE" autocomplete="off">
                    </div>
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">SUMMARY TODAY INSPECTION SCHEDULE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    
                  </thead>
                  <tbody>

                  <?php
                    
                            echo "<tr>
                            <td> <div class='bg-success color-palette'><span><center>RELEASE</span></div>
                            <div class='bg-success disabled color-palette'><span><center>$banyak->RELEASE</span></div></td>
                          <td> <div class='bg-danger color-palette'><span><center>REJECT</span></div>
                            <div class='bg-danger disabled color-palette'><span><center>$banyak->REJECT</span></div></td>
                          <td> <div class='bg-primary color-palette'><span><center>WAITING</span></div>
                            <div class='bg-primary disabled color-palette'><span><center>$banyak->WAITING</span></div></td>
                          <td> <div class='bg-warning color-palette'><span><center>PRODUCTION</span></div>
                            <div class='bg-warning disabled color-palette'><span><center>$banyak->PRODUCTION</span></div></td>
                            <td> <div class='bg-navy color-palette'><span><center><b>TOTAL</b></span></div>
                            <div class='bg-navy disabled color-palette'><span><center><b>$banyak->TOTAL</b></span></div></td>
                                     
                                       
                                    </tr>   
                            ";
                    
                    ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
            <div class="card-body">
            
            

            <div class="table-responsive-sm">
            <table id="example1" class="table table-bordered table-striped" style="width:100%"  cellpadding="1">
                <thead>
                <tr> 
                  <th><center>No</center></th>
                  <th><center>Fac</center></th>
                  <th><center>Cell</center></th>
                  <th><center>PO No</center></th>
                  <th><center>Model Name</center></th>
                  <th><center>Dest</center></th>
                  <th><center>Cost No</center></th>
                  <th><center>Art</center></th>
                  <th><center>Qty</center></th>
                  <th><center>Qty Ctn</center></th>
                  <th><center>SDD</center></th>
                  <th><center>Type</center></th>
                  <th><center>Load No</center></th>
                  <th><center>Ex Fty</center></th>
                  <th><center>Insp Date</center></th>
                  <th><center>Bal</center></th>
                
                </tr>
                </thead>
                <tbody>
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        if ($data['STATUS_PO2']=='RELEASE')
        {
          echo "<tr style='background-color:#00cc00'>";
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
                <td style ='word-break:break-word; font-size: 95%;'><center>".($i+1)."</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[FACTORY]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[CELL]</td>
                <td style ='font-size: 95%;' name='PO_NO' value='$data[PO_NO]'><center>$data[PO_NO]</a> </td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[MODEL_NAME]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[COUNTRY]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[CUST_NO]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[ART_NO]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[TOTAL_QTY]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[TOTAL_CARTON]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[SDD]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[LOAD_TYPE]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[CONTAINER]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[EXPORT_DATE]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[INSPECT_DATE_AQL]</td>
                <td style ='word-break:break-word; font-size: 95%;'><center>$data[BALANCE_CRTON]</td>";
               
               
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
    });
  });
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
</script>