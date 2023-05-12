<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#daily" data-toggle="tab">Daily Report</a></li>
                  <li class="nav-item"><a class="nav-link" href="#monthly" data-toggle="tab">Monthly Report</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div <?php 
                    if ($sub == 1){
                        $class= "active tab-pane";
                    }else{
                        $class="tab-pane";
                    }
                  ?> class="<?php echo $class;?>" id="daily">
                  <form role="form" action=<?php echo $action;?> method="post">
                  <h2><?php echo $formtitle;?></h2>
                    <div class="card-body">
                        <!-- Date range -->
                        
                            <div class="form-group">
                                <label> Export Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" name="INSPECT_DATE">
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
                        <th rowspan='2'>No</th>
                        <th rowspan='2'>IC NUMBER</th>
                        <th rowspan='2'>Fac</th>
                        <th style ='word-break:break-word;' rowspan='2'>Line</th>
                        <th style ='word-break:break-word;' rowspan='2'>Model_Name</th>
                        <th rowspan='2'>Art #</th>
                        <th rowspan='2'>PO #</th>
                        <th rowspan='2'>Partial</th>
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
                                <td style ='font-size: 90%;'>".($i+1)."</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data[FACTORY]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data[IC_NUMBER]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data[CELL_CODE]</td>
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
                        
                            }
                        ?>
                        </tbody>
                        </table>

                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div <?php 
                    if ($sub == 2){
                        $class= "active tab-pane";
                    }else{
                        $class="tab-pane";
                    }
                  ?> class="<?php echo $class;?>" id="monthly" >

                 
                    <!-- The timeline -->
                    <form role="form" action=<?php echo $action_monthly;?> method="post">
                    <h2><?php echo $formtitle_monthly;?></h2>
                    <div class="card-body">
                        <!-- Date range -->
                            
                            <div class="form-group">
                                <label> Inspect Month</label>
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
                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                        <th rowspan='2'>No</th>
                        <th rowspan='2'>Fac</th>
                        <th style ='word-break:break-word;' rowspan='2'>Line</th>
                        <th style ='word-break:break-word;' rowspan='2'>Model_Name</th>
                        <th rowspan='2'>Art #</th>
                        <th rowspan='2'>PO #</th>
                        <th rowspan='2'>Partial</th>
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
                            $jumlah = count($query_monthly);
                            for ($i=0; $i<$jumlah; $i++){
                                    $data_monthly = $query_monthly[$i];
                            
                            echo "<tr>
                                <td style ='font-size: 90%;'>".($i+1)."</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[FACTORY]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[CELL_CODE]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[MODEL_NAME]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[ARTICLE]</a> </td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[PO_NO]</a> </td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[PARTIAL]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[COUNTRY]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[PARTIAL_QTY]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[LEVEL]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[QTY_INSPECT1]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[QIP_LEVEL_ACC]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[QIP_LEVEL_REJECT]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[INSPECT_DATE]</td>
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[INSPECTOR_NAMA]</td>     
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[REJECT_QTY]</td>     
                                <td style ='word-break:break-word; font-size: 90%;'>$data_monthly[STATUS_REPORT]</td>     
                                <td style ='word-break:break-word; font-size: 90%;'></td>     
                            </tr>";
                        
                            }
                        ?>
                        </tbody>
                        </table>

                    </div>
                  </div>
                  <!-- /.tab-pane -->

                 