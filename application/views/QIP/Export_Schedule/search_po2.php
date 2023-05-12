<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      <!-- <div class="card-body"> -->
      <div class="row">
            <div class="col-md-6">
           
                <div class="form-group">
                     <input type="text" class="form-control" id="PO_NO" name="PO_NO" placeholder="ketikkan PO lengkap disini" autocomplete="off">
                  
                </div>
            </div>
            <?php 
                        for($i=0;$i<count($po);$i++){
                            if($po[$i]['vbeln']== $row['vbeln']){
                                echo $po[$i]['vbeln'];
                            }else{
                                echo $po[$i]['vbeln'];
                            }
                        }
                    ?>
            <div class="col-md-2">
                <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
            </div>
      </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card" id="detail_po">
            </div>
            <div class="card" id="inspection">
            </div>
            <div class="card" id="export_schedule">
            </div>
            <div class="card" id="detail_size">
            </div>
            <div class="card" id="production">
            </div>
           
            

            <!-- <div class="card" id="partial_detail">
            </div> -->
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
           
            <div class="card" id="last_carton">
             </div>
            <!-- /.card -->
            <div class="card" id="compliance">
            </div>
            <div  id="costco">
            </div>
            <div class="card" id="bonding">
            </div>
            <div class="card" id="quality">
            </div>
            <div class="card" id="dev_stage">
            </div>
           
            
            

           



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    
    <!-- jQuery -->
    <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/select2.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    
    
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    

  })
</script>


    <script>
    
      
      $(document).ready(function(){
        
        // var PO = '0128934617';
           

        function detail_po(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/detail_po",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)
                    var html='';
                    var a
                    
                    html +='<div class="card-header">'+
                            '<h3 class="card-title">Detail PO <b>'+PO+'</b></h3>'+
                            '</div>'+
                            '<table class="table table-bordered">'+
                            '<tbody>';
                                
                        
                    for(a=0; a<data.length; a++){
                    
                        html += '<tr>'+
                                    '<td>1.</td>'+
                                    '<td>CELL</td>'+
                                    '<td>'+data[a].ZCCELL+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>2.</td>'+
                                    '<td>PO</td>'+
                                    '<td>'+data[a].PO_NO+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>3.</td>'+
                                    '<td>MODEL NAME</td>'+
                                    '<td>'+data[a].MODEL_NAME+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>4.</td>'+
                                    '<td>COST NO</td>'+
                                    '<td>'+data[a].CUST_NO+'</td>'+
                                '</tr>  '+
                                '<tr>'+
                                    '<td>5.</td>'+
                                    '<td>DESTINATION</td>'+
                                    '<td>'+data[a].DESTINATION+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>6.</td>'+
                                    '<td>ARTICLE</td>'+
                                    '<td>'+data[a].ART_NO+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>7.</td>'+
                                    '<td>TOTAL QTY</td>'+
                                    '<td>'+data[a].QTY_TOTAL+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>8.</td>'+
                                    '<td>QTY CARTON</td>'+
                                    '<td>'+data[a].TOTAL_CARTON+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>9.</td>'+
                                    '<td>PODD</td>'+
                                    '<td>'+data[a].PD+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>10.</td>'+
                                    '<td>SDD</td>'+
                                    '<td>'+data[a].SDD+'</td>'+
                                '</tr>';
                    }
                            html +='</tbody>'+
                                   '</table>';

                        $('#detail_po').html(html);
                }
            })
          }

          function export_schedule(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/export_schedule",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    console.log(data)
                    var html='';
                    var i
                    var ekspor

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Export Scheduled</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table table-condensed">'+
                            '<thead>'+
                            '<tr>'+
                                '<th style="width: 120px">DATE</th>'+
                                '<th style="width: 120px">TYPE</th>'+
                                '<th style="width: 200px">CONTAINER NO</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>';
                  for (i=0; i<data.length; i++){
                        ekspor = data[i];
                        html += '<tr>'+
                            '<tr>'+
                            '<td><center>'+ekspor.EXPORT_DATE+'</center></td>'+
                            '<td><center>'+ekspor.LOAD_TYPE+'</center></td>'+
                            '<td><center>'+ekspor.CONTAINER+'</center></td>'+
                            '</tr>';
                        }
                        html += '</tbody></table></div>';
                        $('#export_schedule').html(html);
                }
            })
          }

          function compliance(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/compliance",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(compliance)
                {   
                    console.log(compliance)
                    var html='';
                    var i
                    var ekspor

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Compliance</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table table-condensed">'+
                            '<thead>'+
                            '<tr>'+
                                '<th style="width: 120px">A01</th>'+
                                '<th style="width: 120px">FGT</th>'+
                                '<th style="width: 200px">CMA</th>'+
                                '<th style="width: 200px">CPSIA</th>'+
                                '</tr>'+
                                
                            '</thead>'+
                            '<tbody>'+
                            '<tr>';
                            if(compliance.a01=='YES'){
                                html +="<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/images/a01/"+compliance.po+".pdf'>"+compliance.a01+"</a></td>";
                            }else{
                                html +="<td style='width: 120px'>"+compliance.a01+"</td>";
                            }
                            
                            if(compliance.FGT=='Pass'){
                                html +="<td  bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/lab/fgt/index.php?r=fgt/view&id="+compliance.id_fgt+"'>YES</a></td>";
                            }else{
                                html +="<td style='width: 120px'>NA</td>";
                            }
                            
                            if(compliance.CMA=='YES'){
                                html +="<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/index.php?r=cma/view&id="+compliance.cmaid+"'>"+compliance.CMA+"</a></td>";
                            }else{
                                html +="<td style='width: 120px'>NA</td>";
                            }
                            if(compliance.CPSIA=='YES'){
                                html +="<td bgcolor='green' style='width: 120px'><a class='btn btn-success btn-xs' target='_blank' href='http://10.10.10.98/qip/apps/images/cpsia/"+compliance.po+".pdf'>"+compliance.CPSIA+"</a></td>";
                            }else{
                                html +="<td style='width: 120px'>NA</td>";
                            }
                            html += "</tr></tbody></table></div>";
                        $('#compliance').html(html);
                }
            })
          }

          function costco(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/costco",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(costco)
                {   
                    console.log(costco)
                    var html='';
                    var i, costco1
                    var ekspor

                    if((typeof(costco) != "undefined" && costco != null))
                    {
                        html +='<div class="card">'+
                                '<div class="card-body p-0">'+
                                '<table class="table table-condensed" border="1">'+
                                '<thead>';
                                for(i=0; i<costco.length; i++){
                                    costco1 = costco[i];
                                html +='<tr>';
                        if(typeof(costco1.nama) != "undefined" && costco1.nama != null){
                              html+= "<td style='width: 120px'>"+costco1.nama+"</td>";
                        }else{
                              html +="<td style='width: 120px'>NA</td>";
                        }
                        if(typeof(costco1.kategori) != "undefined" && costco1.kategori != null){
                              html+= "<td style='width: 120px'><a class='btn btn-primary btn-xs' target='_blank' href='http://10.10.10.98:8000/files/"+costco1.dokumen+"'>"+costco1.kategori+"</a></td>";
                        }else{
                              html +="<td style='width: 120px'>NA</td>";
                        }
                        if(typeof(costco1.tanggal) != "undefined" && costco1.tanggal != null){
                              html += "<td bgcolor='green' style='width: 120px'>"+costco1.tanggal+"</td>";
                        }else{
                            html +="<td style='width: 120px'>NA</td>";
                        }
                        
                        if(typeof(costco1.dokumen) != "undefined" && costco1.dokumen != null){
                              html +="<td bgcolor='green' style='width: 120px'>PASS</td>";
                        }else{
                              html += "<td style='width: 120px'>NA</td>";
                        }
                        html +='</tr>';
                    }
                        html +='</thead></table></div></div>';
              
                }else{
                    html+= "";
                }
              
                  $('#costco').html(html);
                }
            })
          }

          function bonding(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/bonding",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(bonding)
                {   
                    console.log(bonding)
                    var html='';
                    var i
                    var ekspor

                    html +='<div class="card-header">'+
                            '<h3 class="card-title">Bonding Performance</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table table-condensed">'+
                            '<tbody>'+
                            '<tr>'+
                            '<td style="width: 120px">Bonding Test</td>'+
                            '<td style="width: 120px">'+bonding.CELL+'</td>'+
                            '<td style="width: 200px">'+bonding.TESTDATE+'</td>';
                      
                          if(bonding.RESULT=='Released'){
                              html +="<td bgcolor='green' style='width: 200px'>PASS</td>";
                          }else{
                              html +="<td bgcolor='red' style='width: 200px'>FAILED</td>";
                          }
                        html +="</tr></tbody></table></div>";
              
                  $('#bonding').html(html);
                }
            })
          }

          function dev_stage(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/dev_stage",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    console.log(data)
                    var html=''
                    var dev,i
                    

                    html+=  '<div class="card-header">'+
                                '<h3 class="card-title">Development Stage</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                                '<table class="table table-condensed">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="width: 120px"><center>Stage</center></th>'+
                                        '<th style="width: 120px"><center>Date</center></th>'+
                                        '<th style="width: 200px"><center>Status</center></th>'+
                                        '<th style="width: 200px"><center>Remark</center></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                                for (i=0; i<data.length; i++){
                                    dev = data[i];
                                    html += '<tr>'+
                                                '<td><center>'+dev.STAGE_NAME+'</center></td>'+
                                                '<td><center>'+dev.TANGGAL+'</center></td>'+
                                                '<td><center>'+dev.STATUS+'</center></td>'+
                                                '<td><center>'+dev.REMARK+'</center></td>'+
                                            '</tr>';
                                }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#dev_stage').html(html);
                }
            })
          }

          function inspection(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/inspection",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    console.log(data)
                    var html=''
                    var dev,i
                    

                    html+=  '<div class="card-header">'+
                                '<h3 class="card-title">Inspection Report</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                                '<table class="table table-condensed">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="width: 120px"><center>Date</center></th>'+
                                        '<th style="width: 120px"><center>Inspector</center></th>'+
                                        '<th style="width: 200px"><center>Result</center></th>'+
                                        '<th style="width: 200px"><center>Remark</center></th>'+
                                       
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                                for (i=0; i<data.length; i++){
                                    dev = data[i];
                                    html += '<tr>'+
                                                '<td><center>'+dev.INSPECT_DATE+'</center></td>'+
                                                '<td><center>'+dev.INSPECTOR+'</center></td>'+
                                                '<td><center>'+dev.RESULT+'</center></td>'+
                                                '<td><center>'+dev.REMARK+'</center></td>'+
                                               
                                            '</tr>';
                                }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#inspection').html(html);
                }
            })
          }


          function production(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/production",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(production)
                {   
                    console.log(production)
                    var html=''
                    var dev,i
                    var CUTTING_BAL = production.QTY_TOTAL - production.CUTTING_OUT;
                    var SEWING_BAL = production.QTY_TOTAL - production.SEWING_OUT;
                    var ASSEMBLY_BAL = production.QTY_TOTAL - production.ASSEMBLY_OUT;
                    var FG_BAL = production.QTY_TOTAL - production.QTY_FG;

                    html+=  '<div class="card-header">'+
                '<h3 class="card-title">Production Tracking</h3>'+
                '<div class="card-tools">'+
                  '</div>'+
              '</div>'+
              '<div class="card-body p-0">'+
                '<table class="table">'+
                  '<thead>'+
                    '<tr>'+
                      '<th><center>Area</center></th>'+
                      '<th><center>First In</center></th>'+
                      '<th><center>Last Out</center></th>'+
                      '<th><center>Balance</center></th>'+
                      '</tr>'+
                  '</thead>'+
                  '<tbody>'+
                    '<tr>'+
                      '<td><center>WH Preparation</center></td>'+
                      '<td><center>'+production.WH_START+'</center></td>'+
                      '<td><center>'+production.WH_END+'</center></td>'+
                      '<td bgcolor="blue"><center></center></td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td><center>Cutting</center></td>'+
                      '<td><center>'+production.CUT_START+'</center></td>'+
                      '<td><center>'+production.CUT_END+'</center></td>'+
                      '<td><center>'+CUTTING_BAL+'</center></td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td><center>Sewing</center></td>'+
                      '<td><center>'+production.SEW_START+'</center></td>'+
                      '<td><center>'+production.SEW_END+'</center></td>'+
                      '<td><center>'+SEWING_BAL+'</center></td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td><center>Assembly</center></td>'+
                      '<td><center>'+production.ASY_START+'</center></td>'+
                      '<td><center>'+production.ASY_END+'</center></td>'+
                      '<td><center>'+ASSEMBLY_BAL+'</center></td>'+
                    '</tr>'+
                    '<tr>'+
                      '<td><center>Finish Good</center></td>'+
                      '<td><center>'+production.FG_START+'</center></td>'+
                      '<td><center>'+production.FG_END+'</center></td>'+
                      '<td><center>'+production.QTY_FG+' (carton)</center></td>'+
                    '</tr>'+
                    '</tbody>'+
                '</table>'+
              '</div>';
                            
                            $('#production').html(html);
                }
            })
          }


          function detail_size(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/detail_size",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    console.log(data)
                    var html=''
                    var detail,i
                    

                    html+=  '<div class="card-header">'+
                                '<h3 class="card-title">Detail Size dan Balance</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                                '<table class="table table-condensed">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="width: 120px"><center>SIZE</center></th>'+
                                        '<th style="width: 120px"><center>TOTAL QTY</center></th>'+
                                        '<th style="width: 200px"><center>BALANCE ASSEMBLY</center></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                                for (i=0; i<data.length; i++){
                                    detail = data[i];
                                    html += '<tr>'+
                                                '<td><center>'+detail.SIZE+'</center></td>'+
                                                '<td><center>'+detail.TOTAL_QTY+'</center></td>'+
                                                '<td><center>'+detail.ASSY_BALANCE+'</center></td>'+
                                            '</tr>';
                                }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#detail_size').html(html);
                }
            })
          }

          function last_carton(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/last_carton",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var detail1, i

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Last Carton No</h3>'+
                            '<div class="card-tools">'+
                            '</div>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table">'+
                            '<thead>'+
                            '<tr>'+
                            '<th style="width: 120px"><center>No Carton</center></th>'+
                            '<th style="width: 200px"><center>Date</center></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                        
                            for (i=0; i<data.length; i++){
                                detail1 = data[i]
                                html += '<tr>'+
                                        '<td><center>'+data[i].CARTON_NO+'</center></td>'+
                                        '<td><center>'+data[i].LMNT_DTTM+'</center></td>'+
                                        '</tr>';
                            }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#last_carton').html(html);
                }
            })
          }

          function quality(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/quality",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var quality, i

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Quality Issue</h3>'+
                            '<div class="card-tools">'+
                            '</div>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table">'+
                            '<thead>'+
                            '<tr>'+
                            '<th style="width: 120px"><center>Date</center></th>'+
                            '<th style="width: 200px"><center>Cell</center></th>'+
                            '<th style="width: 200px"><center>Issue</center></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                        
                            for (i=0; i<data.length; i++){
                                quality = data[i]
                                html += '<tr>'+
                                        '<td><center>'+quality.created_at+'</center></td>'+
                                        '<td><center>'+quality.cell+'</center></td>'+
                                        "<td><center><a class='btn btn-primary btn-xs' target='_blank' href='http://10.10.10.98:8000/files/issue/"+quality.po+"-"+quality.cell+"-"+quality.issue+".jpg'>"+quality.cell+"</a></center></td>"+
                                        '</tr>';
                            }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#quality').html(html);
                }
            })
          }


          
         
         $(document).on('click','#lihatData',function(){
            var PO          = $('#PO_NO').val();

            detail_po(PO);
            detail_size(PO);
            last_carton(PO);
            
            export_schedule(PO);
            compliance(PO)
            costco(PO)
            bonding(PO)
            dev_stage(PO)
            inspection(PO)
            production(PO)
            quality(PO)
            
             
         });

         

        
    })
</script>
