
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
              <div class="row">
                <div class="col-md-3">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>PO</td>
                        <td>12456789</td>
                      </tr>
                      <tr>
                        <td>Partial</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <td>Reject By</td>
                        <td>AQL</td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td>Indonesia</td>
                      </tr>
                      <tr>
                        <td>Total QTy</td>
                        <td>3000</td>
                      </tr>
                    </tbody>
                  </table>

                  <!-- <div class="date" data-provide="datepicker" id="datepicker">
                              <label>Input Tanggal</label>
                              <input type="text" class="form-control" id="inspectDate" name="inspectDate" autocomplete="off">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                   </div> -->
                   <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-9">
                  Repacking Done
                   <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Size</td>
                        <?php
                            $jumlah = count($repacking);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $repacking[$a];
                                echo '<td>'.$data['SIZE'].'</td>';
                            }
                        ?>
                      </tr>
                      <tr>
                        <td>Qty</td>
                        <?php
                            $jumlah = count($repacking);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $repacking[$a];
                                echo '<td>'.$data['QTY'].'</td>';
                            }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                 B Grade
                 <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Size</td>
                        <?php
                            $jumlah = count($bgrade);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $bgrade[$a];
                                echo '<td>'.$data['SIZE'].'</td>';
                            }
                        ?>
                      </tr>
                      <tr>
                        <td>Qty</td>
                        <?php
                            $jumlah = count($bgrade);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $bgrade[$a];
                                echo '<td>'.$data['QTY'].'</td>';
                            }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                  CGRADE
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Size</td>
                        <?php
                            $jumlah = count($cgrade);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $cgrade[$a];
                                echo '<td>'.$data['SIZE'].'</td>';
                            }
                        ?>
                      </tr>
                      <tr>
                        <td>Qty</td>
                        <?php
                            $jumlah = count($cgrade);
                            for($a = 0; $a < $jumlah; $a++){
                                $data = $cgrade[$a];
                                echo '<td>'.$data['QTY'].'</td>';
                            }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            
            <!-- </div> -->
            <!--bagian defect-->
            <div class="card-body">
            
              <?php 

                 $kali= count($apa);
               
                 for ($i  = 0; $i<$kali; $i++) {
                  //  echo $apa[$i]['JUMLAH'];
                    echo ' <div class="row">
                    <div class="col-3">';
                        echo $apa[$i]['JUMLAH'];
                    echo '</div>
                    <div class="col-6">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                             <td style="width:15%">Size</td>';
                             $jumlahjumlah =  $defect[$i]['JUMLAH'];
                              if($apa[$i]['JUMLAH']==$defect[$i]['CODE_ID']){
                                echo $apa[$i]['JUMLAH'].': APA JUMLAH<br>';

                                echo $defect[$i]['CODE_ID'].': DEFECT CODE ID<br>';
                                echo $defect[$i]['JUMLAH'].': DEFECT JUMLAH<br>';
                                
                                for($x = 0 ; $x<$jumlahjumlah; $x++){
                                  echo $defect[$x]['SIZE'].': DEFECT SIZE<br>';
                                  echo '<td>o</td>';
                                }
                            }
                            
                            //   foreach($defect as $hihi){
                            //     // if($apa[$i]['JUMLAH']==$defect[$i]['CODE_DESC']){
                            //       echo '<td>'.$defect[$i]['SIZE'].'</td>';
                            //   // }
                            // }
                            echo '
                           
                          </tr>
                          <tr>
                            <td>Qty</td>
                            
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
             
                <div class="col-3">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Repair</td>
                        <td>A</td>
                        
                      </tr>
                      <tr>
                        <td>Size</td>
                        <td>A</td>
                        
                      </tr>
                      <tr>
                        <td>Qty</td>
                        <td>A</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                
            </div>';
          }
       ?>
           
            </div>
            <!--//bagian defect-->
            <!-- /.card -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section> 

    <!-- Scripts -->
<script src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="<?php // echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>

<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<!-- jQuery -->
  
<script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
    
<!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script-->
<script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>

<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

    <script>
    $.fn.datepicker.defaults.format = "yyyymmdd";
      $('#datepicker').datepicker({
          startDate: '-14d',
          todayHighlight: true,autoclose: true,
      });

    </script>
 
 
 