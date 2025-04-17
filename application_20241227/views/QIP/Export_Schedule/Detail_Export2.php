<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail PO</h3>
              </div>

                <table class="table table-bordered">
                                
                    <tbody>
                                
                        <?php
                            $i=0;
                            foreach($detail1 as $details1)
                            {

                            echo "
                            <tr>
                                    <td>1.</td>
                                    <td>CELL</td>
                                    <td>$details1[ZCCELL]</td>
                            </tr>
                            <tr>
                                    <td>2.</td>
                                    <td>PO</td>
                                    <td>$details1[PO_NO]</td>
                            </tr>
                            <tr>
                                    <td>3.</td>
                                    <td>MODEL NAME</td>
                                    <td>$details1[MODEL_NAME]</td>
                            </tr>
                            <tr>
                                    <td>4.</td>
                                    <td>COST NO</td>
                                    <td>$details1[CUST_NO]</td>
                            </tr>  
                            <tr>
                                    <td>5.</td>
                                    <td>DESTINATION</td>
                                    <td>$details1[DESTINATION]</td>
                            </tr>
                            <tr>
                                    <td>6.</td>
                                    <td>ARTICLE</td>
                                    <td>$details1[ART_NO]</td>
                            </tr>
                            <tr>
                                    <td>7.</td>
                                    <td>TOTAL QTY</td>
                                    <td>$details1[QTY_TOTAL]</td>
                            </tr>
                            <tr>
                                    <td>8.</td>
                                    <td>QTY CARTON</td>
                                    <td>$details1[TOTAL_CARTON]</td>
                            </tr>
                            <tr>
                                    <td>9.</td>
                                    <td>PODD</td>
                                    <td>$details1[PD]</td>
                            </tr>
                            <tr>
                                    <td>10.</td>
                                    <td>SDD</td>
                                    <td>$details1[SDD]</td>
                            </tr>
                            ";
                            }
                          ?>
	                </tbody>
                </table>
              </div>
         
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inspection Report</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <!-- Inspection Report -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th><center>Date</center></th>
                      <th><center>Inspector</center></th>
                      <th><center>Result</center></th>
                      <th><center>Remark</center></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $jumlah = count($inspection);
                        for ($i=0; $i<$jumlah; $i++){
                                $data = $inspection[$i];
                                if($data['report_type']['name'] == 'FTW - AQL Outbound'){
                                  echo "<tr>
                                  <td><center>".$data['assignments_items'][0]['inspection_completed_date']."</center></td>
                                  <td><center>".$data['inspector']['name']."</center></td>";
                                  if($data['assignments_items'][0]['inspection_result_text']=="Pass"){
                                    echo "<td bgcolor='green' class='text-white'><center>".$data['assignments_items'][0]['inspection_result_text']."</td>";
                                  }else if ($data['assignments_items'][0]['inspection_result_text']=="Fail"){
                                    echo "<td bgcolor='red' class='text-white'><center>".$data['assignments_items'][0]['inspection_result_text']."</td>";
                                  }else{
                                    echo "<td><center>".$data['assignments_items'][0]['inspection_result_text']."</td>";
                                  }
                                  echo "<td><center>".$data['assignments_items'][0]['booking_msg']."</center></td>
                                  </tr>";
                                }else{
                                  echo "";
                                }
                        }
                    ?>
                    

                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Export Scheduled</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 120px"><center>DATE</center></th>
                      <th style="width: 120px"><center>TYPE</center></th>
                      <th style="width: 200px"><center>CONTAINER NO</center></th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    $jumlah = count($export);
                    for ($i=0; $i<$jumlah; $i++){
                        
                            $data = $export[$i];
                        
                            echo "<tr>
                                        <td><center>$data[EXPORT_DATE]</center></td>
                                        <td><center>$data[LOAD_TYPE]</center></td>
                                        <td><center>$data[CONTAINER]</center></td>
                                       
                                    </tr>   
                            ";
                    }
                    ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- DETAIL SIZE AND BALANCE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Size dan Balance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 120px"><center>SIZE</center></th>
                      <th style="width: 120px"><center>TOTAL QTY</center></th>
                      <th style="width: 200px"><center>BALANCE ASSEMBLY</center></th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    $jumlah = count($detail2);
                    for ($i=0; $i<$jumlah; $i++){
                        
                            $data = $detail2[$i];
                        
                            echo "<tr>
                                        <td><center>$data[SIZE]</center></td>
                                        <td><center>$data[TOTAL_QTY]</center></td>
                                        <td><center>$data[ASSY_BALANCE]</center></td>
                                       
                                    </tr>   
                            ";
                    }
                    ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!--// DETAIL SIZE AND BALANCE -->
            <!-- PRODUCTION TRACKING -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Production Tracking</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <!-- Inspection Report -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th><center>Area</center></th>
                      <th><center>First In</center></th>
                      <th><center>Last Out</center></th>
                      <th><center>Balance</center></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><center>WH Preparation</center></td>
                      <td><center><?php echo $production->WH_START;?></center></td>
                      <td><center><?php echo $production->WH_END;?></center></td>
                      <td><center>NA</center></td>
                    </tr>
                    <tr>
                      <td><center>Cutting</center></td>
                      <td><center><?php echo $production->CUT_START;?></center></td>
                      <td><center><?php echo $production->CUT_END;?></center></td>
                      <td><center><?php 
                          $CUTTING_BAL = $production->QTY_TOTAL - $production->CUTTING_OUT;
                          echo $CUTTING_BAL;?></center></td>
                    </tr>
                    <tr>
                      <td><center>Sewing</center></td>
                      <td><center><?php echo $production->SEW_START;?></center></td>
                      <td><center><?php echo $production->SEW_END;?></center></td>
                      <td><center><?php 
                          $SEWING_BAL = $production->QTY_TOTAL - $production->SEWING_OUT;
                          echo $SEWING_BAL;?></center></td>
                    </tr>
                    <tr>
                      <td><center>Assembly</center></td>
                      <td><center><?php echo $production->ASY_START;?></center></td>
                      <td><center><?php echo $production->ASY_END;?></center></td>
                      <td><center><?php 
                          $ASSEMBLY_BAL = $production->QTY_TOTAL - $production->ASSEMBLY_OUT;
                          echo $ASSEMBLY_BAL;?></center></td>
                    </tr>
                    <tr>
                      <td><center>Finish Good</center></td>
                      <td><center><?php echo $production->FG_START;?></center></td>
                      <td><center><?php echo $production->FG_END;?></center></td>
                      <td><center><?php 
                          $FG_BAL = $production->QTY_TOTAL - $production->QTY_FG;
                          echo $production->QTY_FG;?> (carton)</center></td>
                    </tr>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- // PRODUCTION TRACKING  -->
           
            <!-- COSTCO -->
            <?php if((isset($costco)))
            {
            
            ?>
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed" border="1">
                    <thead>
                      <?php for($i=0; $i<=count($costco)-1; $i++){?>
                        <tr>
                          <?php 
                            if(isset($costco[$i]['nama'])){
                                echo "<td style='width: 120px'>".$costco[$i]['nama']."</td>";
                            }else{
                                echo "<td style='width: 120px'>NA</td>";
                            }
                          ?>
                          <?php 
                            if(isset($costco[$i]['kategori'])){
                                echo "<td style='width: 120px'><a class='btn btn-primary btn-xs' target='_blank' href='http://10.10.10.98:8000/files/".$costco[$i]['dokumen']."'>".$costco[$i]['kategori']."</a></td>";
                            }else{
                                echo "<td style='width: 120px'>NA</td>";
                            }
                          ?>
                          <?php 
                            if(isset($costco[$i]['tanggal'])){
                                echo "<td bgcolor='green' style='width: 120px'>".$costco[$i]['tanggal']."</td>";
                            }else{
                                echo "<td style='width: 120px'>NA</td>";
                            }
                          ?>
                        
                          <?php 
                            if(isset($costco[$i]['dokumen'])){
                                echo "<td bgcolor='green' style='width: 120px'>PASS</td>";
                            }else{
                                echo "<td style='width: 120px'>NA</td>";
                            }
                          ?>
                          
                          
                        </tr>
                      <?php }?>
                    </thead>
                  </table>
                
                </div>
                
                <!-- /.card-body -->
              </div>
              <?php }
                else{
                  echo "";
                }
              ?>
            
            <!-- //COSTCO -->
           
            
            <!-- // BONDING PERFORMANCE -->
            
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            
           
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Last Carton No</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 120px"><center>No Carton</center></th>
                      <th style="width: 200px"><center>Date</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $jumlah = count($detail4);
                    for ($i=0; $i<$jumlah; $i++){
                        
                            $data = $detail4[$i];
                        
                            echo "<tr>
                                        <td><center>$data[CARTON_NO]</center></td>
                                        <td><center>$data[LMNT_DTTM]</center></td>
                                        
                                       
                                    </tr>   
                            ";
                    }
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- COMPLIANCE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Compliance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 120px">A01</th>
                      <th style="width: 120px">FGT</th>
                      <th style="width: 200px">CMA</th>
                      <th style="width: 200px">CPSIA</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php 
                      if($compliance->a01=='YES'){
                          echo "<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/images/a01/$compliance->po.pdf'>$compliance->a01</a></td>";
                      }else{
                          echo "<td style='width: 120px'>$compliance->a01</td>";
                      }

                      if($compliance->FGT=='Pass'){
                          echo "<td  bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/lab/fgt/index.php?r=fgt/view&id=$compliance->id_fgt'>YES</a></td>";
                      }else{
                          echo "<td style='width: 120px'>NA</td>";
                      }

                      if($compliance->CMA=='YES'){
                          echo "<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/index.php?r=cma/view&id=$compliance->cmaid
                          '>$compliance->CMA</a></td>";
                      }else{
                          echo "<td style='width: 120px'>$compliance->CMA</td>";
                      }

                      if($compliance->CPSIA=='YES'){
                          echo "<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/images/cpsia/$compliance->po.pdf'>$compliance->CPSIA</a></td>";
                      }else{
                          echo "<td style='width: 120px'>$compliance->CPSIA</td>";
                      }
                      
                      
                      ?>
                    </tr>
                  </tbody>
                </table>
               
              </div>
              
              <!-- /.card-body -->
            </div>
            
            <!-- //COMPLIANCE -->
             <!-- BONDING PERFORMANCE -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bonding Performance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  
                  <tbody>
                    <tr>
                      <td style="width: 120px">Bonding Test</td>
                      <td style="width: 120px"><?php echo $bonding->CELL;?></td>
                      <td style="width: 200px"><?php echo $bonding->TESTDATE;?></td>
                      <?php 
                          if($bonding->RESULT=='Released'){
                              echo "<td bgcolor='green' class='text-white' style='width: 200px'>PASS</td>";
                          }else{
                              echo "<td bgcolor='red'  class='text-white' style='width: 200px'>FAILED</td>";
                          }
                        ?>
                      
                    </tr>
                  </tbody>
                </table>
               
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- QC PASS RATE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Quality Issue</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <!-- Inspection Report -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th><center>Date</center></th>
                      <th><center>Cell</center></th>
                      <th><center>Issue</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $jumlah = count($quality);
                        for ($i=0; $i<$jumlah; $i++){
                            
                            $data = $quality[$i];
                        
                            echo "<tr>
                                        <td><center>$data[created_at]</center></td>
                                        <td><center>$data[cell]</center></td>
                                        <td><center><a class='btn btn-primary btn-xs' target='_blank' href='http://10.10.10.98:8000/files/issue/$data[po]-$data[cell]-$data[issue].jpg'>$data[issue]</a></center></td>
                                  </tr>   
                            ";
                        }
                    ?>
                    
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- // QC PASS RATE -->
            <!-- DEVELOPMENT STAGE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Development Stage</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 120px">Stage</th>
                      <th style="width: 120px">Date</th>
                      <th style="width: 200px">Status</th>
                      <th style="width: 200px">Remark</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $jumlah = count($dev_stage);
                      for ($i=0; $i<$jumlah; $i++){
                          
                              $data = $dev_stage[$i];
                          
                              echo '<tr>
                                      <td style="width: 120px">'.$data['STAGE_NAME'].'</td>
                                      <td style="width: 120px">'.$data['TANGGAL'].'</td>
                                      <td style="width: 200px">'.$data['STATUS'].'</td>
                                      <td style="width: 200px">'.$data['REMARK'].'</td>
                                          
                                        
                                      </tr>   
                              ';
                      }
                    ?>
                  </tbody>
                </table>
               
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- //DEVELOPMENT STAGE -->
            <!-- /.card -->
            



        <!-- /.row -->
      </div><!-- /.container-fluid -->
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