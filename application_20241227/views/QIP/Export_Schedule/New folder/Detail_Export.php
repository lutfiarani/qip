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
                            <tr>
                                    <td>11.</td>
                                    <td>TYPE</td>
                                    <td>$details1[TYPE]</td>
                            </tr>
                            <tr>
                                    <td>12.</td>
                                    <td>CONTAINER</td>
                                    <td>$details1[CONTAINER]</td>
                            </tr>
                            <tr>
                                    <td>13.</td>
                                    <td>EX FTY</td>
                                    <td>$details1[EXPORT_DATE]</td>
                            </tr>
                            <tr>
                                    <td>14.</td>
                                    <td>INSPECT DATE</td>
                                    <td>$details1[INSPECT_DATE]</td>
                            </tr>
                            <tr>
                                    <td>15.</td>
                                    <td>BALANCE</td>
                                    <td>$details1[BALANCE]</td>
                            </tr>


                            ";
                            }
                                
                            
                            
                        ?>
	
        
                  </tbody>
                </table>
              </div>
         

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Size dan Balance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 120px">SIZE</th>
                      <th style="width: 120px">TOTAL QTY</th>
                      <th style="width: 200px">BALANCE ASSEMBLY</th>
                      
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
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
            <!-- /.card -->
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Carton Status</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                    
                      <th style="width: 200px"><center>Carton Status</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $jumlah = count($detail3);
                    echo "<tr><td>";
                    for ($i=0; $i<$jumlah; $i++){
                        
                            $data = $detail3[$i];
                            if($data['STATUS']=='WR'){
                            echo "
                                        <span class='badge'>$data[CARTON_NO]</span>
                                    
                            ";
                            } else if($data['STATUS']=='WI'){
                            echo "
                                        <span class='badge bg-warning'>$data[CARTON_NO]</span>
                                    
                            ";
                            } else if($data['STATUS']=='WO'){
                              echo "
                                          <span class='badge bg-success'>$data[CARTON_NO]</span>
                                      
                              ";
                              }

                    }
                    echo "</td></tr>
                    <tr>
                      <td><p> <b>Remark</b></p>
                        <p> White = Production </p>
                        <p> Yellow = Finish Good Warehouse </p>
                        <p> Green = Shipping </p>
                      </td>
                    </tr>
                    
                    
                    ";
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grey Carton No</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 120px"><center>Size</center></th>
                      <th style="width: 200px"><center>Carton No</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $jumlah = count($detail5);
                    for ($i=0; $i<$jumlah; $i++){
                        
                            $data = $detail5[$i];
                        
                            echo "<tr>
                                        <td><center>$data[SIZE]</center></td>
                                        <td><center>$data[CARTON_NO]</center></td>
                                        
                                       
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



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>