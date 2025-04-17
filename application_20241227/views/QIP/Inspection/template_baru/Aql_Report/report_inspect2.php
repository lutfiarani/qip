
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="col-md-12">
            <!-- general form elements disabled -->
           
            <!-- /.card -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Report Inspection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                <center><img src="<?php echo base_url();?>/template/img/adidas.png"  width="200" height="100" class="img-fluid mb-2" alt="red sample">
                        <h2><b>AQL INSPECTION REPORT</b></h2>
                </center>
                <?php 
                        $report1 = $report->row_array();
                        echo "<input type='text' name='PO_NO' id='PO_NO' value='".$report1['PO_NO']."' hidden></input>";
                        echo "<input type='text' name='PARTIAL' id='PARTIAL' value='".$report1['PARTIAL']."' hidden></input>";
                        echo "<input type='text' name='LEVEL' id='LEVEL' value='".$report1['LEVEL']."' hidden></input>";
                        echo "<input type='text' name='REMARK' id='REMARK' value='".$report1['REMARK']."' hidden></input>";
                        echo "<input type='text' name='INSPECTOR' id='INSPECTOR' value='".$report1['INSPECTOR']."' hidden></input>";
                        echo "<input type='text' name='LEVEL_USER' id='LEVEL_USER' value='".$report1['LEVEL_USER']."' hidden></input>";
                        echo "<input type='text' name='PO_ID' id='PO_ID' value='".$report1['PO_ID']."' hidden></input>";
                    ?>
                 <div class="row" id="report1">
                 </div>
                  
                 <div class="row" id="report2_detailsize">
                 </div>
                 
                 <div class="row" id="report3_sample">
                 </div>

                 <div class="row" id="report4_listdefect">
                 </div>

                 <div class="row" id="report5_result">
                 </div>
                 <!-- <div class="col-md-6"> -->
                <div class="form-group">
                  <label>Input TQC ID</label> 
                  <select class="select2" multiple="multiple" data-placeholder="Pilih ID Inspector" style="width: 100%;" name="id_qc[]" id="id_qc">
                   <?php 
                        for($i=0;$i<count($id_qc);$i++){
                            if($id_qc[$i]['password']== $row['password']){
                                echo "<option value='".$id_qc[$i]['password']."-".$id_qc[$i]['nik']."-".$id_qc[$i]['nama']."' selected>".$id_qc[$i]['password']." - ".$id_qc[$i]['nama']."</option>";
                            }else{
                                echo "<option value='".$id_qc[$i]['password']."-".$id_qc[$i]['nik']."-".$id_qc[$i]['nama']."'>".$id_qc[$i]['password']." - ".$id_qc[$i]['nama']."</option>";
                            }
                        }
                    ?>
                  </select>
                </div>    

                 <div class="row" id="report5_comments">
                 </div>

                 <div class="row" id="report5_sign">
                  
                 </div>

                </div>
                  
                
                

               
             
             
              <!--div class="row">
              <div class="card-body" id="show_data">
                
                </div>
              </div-->
            </div>
           
        
           
           
                
              
             
          <!-- right column -->
          
            <!-- general form elements disabled -->
          
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Reject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body" id="code_detail">
                 
                  </div>
                 <div class='modal-footer'>
               
                 </div>
                </div>
              </div>
            </div>
        </form>
        <!--END MODAL EDIT-->
        
        
 



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
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>


    <script>
     
      
      $(document).ready(function(){


          var PO_NO     = $('#PO_NO').val();
          var PARTIAL   = $('#PARTIAL').val();
          var INSPECTOR = $('#INSPECTOR').val();
          var LEVEL     = $('#LEVEL').val();
          var REMARK    = $('#REMARK').val();
          var LEVEL_USER= $('#LEVEL_USER').val();
          var PO_ID     = $('#PO_ID').val();

        
          report1();
          report2_detailsize();
          report3_sample();
          report4_listdefect();
          report5_result();

         
        
          function createReport(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report_",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    // cekdata()
                    // alert(data);
                    location.href = data.url;
                    // console.log(data)
                },
            });
          }


          function report1(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report1",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)
                    var html = ''
                    html += "<div class='col-md-3'>"+
                             "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>Plant/Cell</td>"+
                                "<td>HWI</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Article#</td>"+
                                "<td>"+data.ARTICLE+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Art Name</td>"+
                                "<td>"+data.MODEL_NAME+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Color</td>"+
                                "<td>"+data.ZZCLW+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Gender</td>"+
                                "<td>"+data.GENDER+"</td>"+
                            "</tr>"+
                        "</table>"+
                    "</div>"+
                    "<div class='col-md-3'>"+
                        "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>Brand</td>"+
                                "<td></td>"+
                                "<td></td>"+
                            "</tr>";
                    if(data.BRAND == 'ADIDAS'){
                        html += "<tr>"+
                                "<td>Adidas</td>"+
                                "<td>V</td>"+
                                "<td></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Reebok</td>"+
                                "<td></td>"+
                                "<td></td>"+
                            "</tr>";
                    }else if (data.BRAND == 'REEBOK'){
                        html += "<tr>"+
                                "<td>Adidas</td>"+
                                "<td></td>"+
                                "<td></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Reebok</td>"+
                                "<td>V</td>"+
                                "<td></td>"+
                            "</tr>";
                    }
                        
                       html += "</table>"+
                    "</div>"+
                    "<div class='col-md-3'>"+
                        "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>PO #</td>"+
                                "<td id='PO_NO' name='PO_NO'>"+data.PO_NO+"</td>"+
                                "<td id='PARTIAL' name='PARTIAL' hidden>"+data.PARTIAL+"</td>"+
                                "<td id='REMARK' name='REMARK' hidden>"+data.REMARK+"</td>"+
                                "<td id='LEVEL' name='LEVEL' hidden>"+data.LEVEL+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>CI item#</td>"+
                                "<td>"+data.IC_NUMBER+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>TOtal Order Qty</td>"+
                                "<td>"+data.KWMENG+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Actual Qty</td>"+
                                "<td>"+data.PARTIAL_QTY+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>1st Confd Date</td>"+
                                "<td>"+data.ZHSDD+"</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Customer</td>"+
                                "<td>"+data.LANDT+"</td>"+
                            "</tr>"+
                        "</table>"+
                    "</div> "+
                    "<div class='col-md-3'>"+
                        "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>Inspection Date/Time</td>"+
                                "<td>"+data.INSPECT_DATE+"</td>"+
                            "</tr>";
                        if(data.REMARK=1){
                           html +="<tr>"+
                                 "<td>Final Inspection</td>"+
                                    "<td>V</td>"+
                                
                                "</tr>"+
                                "<tr>"+
                                "<td>Re-Inspection</td>"+
                                "<td></td>"+
                            "</tr>";
                            }else{
                                "<tr>"+
                                    "<td>Final Inspection</td>"+
                                    "<td></td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td>Re-Inspection</td>"+
                                    "<td>V</td>"+
                                "</tr>";
                            }
                    html +="<tr>";
                    html+=             "<td>Adidas-group Prod Manager</td>"+
                                "<td></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Inspector</td>"+
                                "<td name='INSPECTOR_' id='INSPECTOR_'>"+data.INSPECTOR+"</td>"+
                            "</tr>"+
                        "</table>"
                        "</div>";

                        $('#report1').html(html)
                },
            });
          }

          function report2_detailsize(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report2",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var a, b, c, d;
                    

                    console.log(data)

                    html += "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:25%;float:left'>"+
                            "<thead>"+
                                "<th>Booking Comment</th>"+
                                "<th>Carton#</th>"+
                                "<th>Size</th>"+
                                "<th>Qty Insp</th>"+
                            "</thead>"+
                            "<tbody>";
                    
                    for(a=0; a<5; a++){
                       if ( typeof(data[a]) != "undefined" && data[a] !== null){
                           html +=  "<tr>"+
                                    "<td>"+data[a].BOOKING_COMMENT+"</td>"+
                                    "<td>"+data[a].CARTON_NO+"</td>"+
                                    "<td>"+data[a].SIZE+"</td>"+
                                    "<td>"+data[a].QTY_INSPECT+"</td>"+
                                    "</tr>";
                        }else{
                            html += "<tr>"+
                                    "<td style='color:white'>-</td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "</tr>";
                        }
                    }
                                     
                    html += "</tbody>"+
                            "</table>";


                            html += "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:25%;float:left'>"+
                            "<thead>"+
                                "<th>Booking Comment</th>"+
                                "<th>Carton#</th>"+
                                "<th>Size</th>"+
                                "<th>Qty Insp</th>"+
                            "</thead>"+
                            "<tbody>";
                    
                    for(b=5; b<10; b++){
                        if ( typeof(data[b]) != "undefined" && data[b] !== null){
                           html +=  "<tr>"+
                                    "<td>"+data[a].BOOKING_COMMENT+"</td>"+         
                                    "<td>"+data[b].CARTON_NO+"</td>"+
                                    "<td>"+data[b].SIZE+"</td>"+
                                    "<td>"+data[b].QTY_INSPECT+"</td>"+
                                    "</tr>";
                        }else{
                            html += "<tr>"+
                                    "<td style='color:white'>-</td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "</tr>";
                        }
                    }
                                     
                    html += "</tbody>"+
                            "</table>";


                            html += "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:25%;float:left'>"+
                            "<thead>"+
                                "<th>Booking Comment</th>"+
                                "<th>Carton#</th>"+
                                "<th>Size</th>"+
                                "<th>Qty Insp</th>"+
                            "</thead>"+
                            "<tbody>";
                    
                    for(c=10; c<15; c++){
                        if ( typeof(data[c]) != "undefined" && data[c] !== null){
                           html +=  "<tr>"+
                                    "<td>"+data[a].BOOKING_COMMENT+"</td>"+
                                    "<td>"+data[c].CARTON_NO+"</td>"+
                                    "<td>"+data[c].SIZE+"</td>"+
                                    "<td>"+data[c].QTY_INSPECT+"</td>"+
                                    "</tr>";
                        }else{
                            html += "<tr>"+
                                    "<td style='color:white'>-</td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "</tr>";
                        }
                    }
                                     
                    html += "</tbody>"+
                            "</table>";



                    html += "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:25%;float:left'>"+
                    "<thead>"+
                        "<th>Booking Comment</th>"+    
                        "<th>Carton#</th>"+
                        "<th>Size</th>"+
                        "<th>Qty Insp</th>"+
                    "</thead>"+
                    "<tbody>";
                    
                    for(d=15; d<20; d++){
                        if ( typeof(data[d]) != "undefined" && data[d] !== null){
                           html +=  "<tr>"+
                                    "<td>"+data[a].BOOKING_COMMENT+"</td>"+         
                                    "<td>"+data[d].CARTON_NO+"</td>"+
                                    "<td>"+data[d].SIZE+"</td>"+
                                    "<td>"+data[d].QTY_INSPECT+"</td>"+
                                    "</tr>";
                        }else{
                            html += "<tr>"+
                                    "<td style='color:white'>-</td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "<td> </td>"+
                                    "</tr>";
                        }
                    }
                                     
                    html += "</tbody>"+
                            "</table>";

                    $('#report2_detailsize').html(html)


                }
            });
          }

          function report3_sample(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report3",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)

                    var html = ''   
                    
                    html += "<div class='col-md-3'>"+
                            "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>Sample Lot</td>"+
                                "<td>"+data.SAMPLE_LOT+" %</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Sample Size</td>"+
                                "<td>    Level : "+data.LEVEL+" </td>"+
                            "</tr>"+
                            "</table>"+
                            "</div>"+
                            "<div class='col-md-3'>"+
                                "<table class='table table-bordered'>"+
                                    "<tr>"+
                                        "<td>Carton</td>"+
                                        "<td>"+data.CARTONS+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td>Pairs</td>"+
                                        "<td>"+data.PAIRS+"</td>"+
                                    "</tr>"+
                                "</table>"+
                            "</div>"+
                            "<div class='col-md-6'>"+
                            "<table class='table table-bordered'>"+
                                "<tr>"+
                                    "<td></td>"+
                                    "<td>MINOR</td>"+
                                    "<td>MAJOR</td>"+
                                    "<td>CRITICAL</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td>Max defects to accept</td>"+
                                    "<td>"+data.QIP_LEVEL_MINOR_ACC+"</td>"+
                                    "<td>"+data.QIP_LEVEL_MAJOR_ACC+"</td>"+
                                    "<td>"+data.QIP_LEVEL_CRITIC_ACC+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td>No of defects to reject</td>"+
                                    "<td>"+data.QIP_LEVEL_MINOR_REJ+"</td>"+
                                    "<td>"+data.QIP_LEVEL_MAJOR_REJ+"</td>"+
                                    "<td>"+data.QIP_LEVEL_CRITIC_REJ+"</td>"+
                                "</tr>"+
                            "</table>"+
                        "</div>";

                        $('#report3_sample').html(html)
                }
            })
          }

          function report4_listdefect(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report4",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data.report)
                    // data.code

                    var html =''
                    var code1, haha, code
                    var i, b
                   
                    html += "<font size='0.3'>"+
                            "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:50%;float:left'>"+
                            "<thead>"+
                                "<tr bgcolor='yellow'>"+
                                    "<th rowspan='2'>CODE DEFECT</th>"+
                                    "<th rowspan='2'>DEFECT DESCRIPTION</th>"+
                                    "<th rowspan='2'></th>"+
                                    "<th>MIN</th>"+
                                    "<th>MAJ</th>"+
                                    "<th>CRI</th>"+
                                "</tr>"+
                                "<tr bgcolor='yellow'>"+
                                    "<th>2.5</th>"+
                                    "<th>1.5</th>"+
                                    "<th>0.0</th>"+
                                "</tr>"+
                            "</thead>"+
                            "<tbody>";
                    for(i=0; i<data.code.length; i++){
                        code1 = data.code[i]
                        if(code1.CODE > 400){
                            html += "";
                        }else{
                            html += "<tr bgcolor='#0066CC'>"+
                                        "<td><b>"+code1.CODE+"</b></td>"+
                                        "<td><b>"+code1.CODE_NAME+"</b></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                    "</tr>";
                        }
                      
                        for(b = 0; b < 71; b++) { //72 is a half of total data.code.length
                            haha = data.report[b]
                            if((code1.CODE == haha.CODE)&&(haha.REJECT_CODE_NAME != 0)){
                                html += "<tr>"+
                                        "<td>"+haha.CODE_DEFECT+"</td>"+
                                        "<td>"+haha.REJECT_CODE_NAME+"</td>"+
                                        "<td>"+haha.DESCRIPTION+"</td>";
                                if(haha.STATUS_CODE == 'MI'){
                                    html += "<td>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else if(haha.STATUS_CODE =='MA'){
                                    html += "<td  bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else{
                                    html += "<td bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td>"+haha.CR+"</td>"+
                                            "</tr>";
                                }
                                        
                            } else if(haha.REJECT_CODE_NAME == '0'){
                                html += '';
                            }else{
                                html += '';
                            }
                        }
                    }
                                
                               
                    html += "</tbody>"+
                            "</table>"+
                            "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:50%;float:left'>"+
                            "<thead>"+
                            "<tr bgcolor='yellow'>"+
                                "<th rowspan='2'>CODE DEFECT</th>"+
                                "<th rowspan='2'>DEFECT DESCRIPTION</th>"+
                                "<th rowspan='2'></th>"+
                                "<th>MIN</th>"+
                                "<th>MAJ</th>"+
                                "<th>CRI</th>"+
                            "</tr>"+
                            "<tr bgcolor='yellow'>"+
                                "<th>2.5</th>"+
                                "<th>1.5</th>"+
                                "<th>0.0</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                    for(i=0; i<data.code.length; i++){
                        code1 = data.code[i]
                        if(data.code[i].CODE < 400){
                            html += "";
                        }else{
                            html += "<tr bgcolor='#0066CC'>"+
                                        "<td><b>"+code1.CODE+"</b></td>"+
                                        "<td><b>"+code1.CODE_NAME+"</b></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                    "</tr>";
                        }
                        for(b = 71; b < data.report.length; b++) {
                        // for(b = 0; b < data.report.length; b++) {
                            haha = data.report[b]
                            if((code1.CODE === haha.CODE)){
                                html += "<tr>"+
                                        "<td>"+haha.CODE_DEFECT+"</td>"+
                                        "<td>"+haha.REJECT_CODE_NAME+"</td>"+
                                        "<td>"+haha.DESCRIPTION+"</td>";
                                if(haha.STATUS_CODE === 'MI'){
                                    html += "<td>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else if(haha.STATUS_CODE ==='MA'){
                                    html += "<td  bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else{
                                    html += "<td bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td>"+haha.CR+"</td>"+
                                            "</tr>";
                                }
                                        
                            }else if(haha.REJECT_CODE_NAME === '0'){
                                html += '';
                            }else{
                                html += '';
                            }
                        }
                    }
                        
                    html += "<tr>"+
                                "<td colspan = '3'><b>Total Defects : </b></td>"+
                                "<td><b>"+data.report2.MINOR_REJ_DATA+"</td>"+
                                "<td><b>"+data.report2.MAJOR_REJ_DATA+"</td>"+
                                "<td><b>"+data.report2.CRITIC_REJ_DATA+"</td>"+
                                "</tr>"+
                        "</tbody>"+
                    "</table>"+
                    "</font>";

                    $('#report4_listdefect').html(html);
                }
            });
          }

          function report5_result(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report3",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)

                    var html = ''
                    var html2= ''
                    var html3= ''

                    html += "<div class='col-md-12'>"+
                            "<table class='table table' border='0' cellpadding='0' cellspacing='0'>"+
                            "<thead>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>";
                    if(data.INSPECT_RESULT ==='Y'){
                        html += "<th style='color:blue;text-align:right'>Accepted</th>"+
                                "<th>V</th>"+
                                "<th style='color:red'>Rejected</th>"+
                                "<th></th>";
                    }else{
                        html += "<th style='color:blue'>Accepted</th>"+
                                "<th></th>"+
                                "<th style='color:red'>Rejected</th>"+
                                "<th>V</th>";
                    }
                    html += "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "</thead>"+
                            "<tbody>"+
                            "</tbody>"+
                            "</table>"+
                            "</div>";


                    html2 += "<div class='col-md-12'>"+
                             "<font style='color:blue;'>COMMENTS/CORRECTIVE ACTIONS REQUIRED</font>"+
                             "<table class='table table' border='1' cellpadding='0' cellspacing='0'>";
                    // html2 +="<tr>"+
                    //         '<td><div class="col-12 col-sm-6">'+
                    //             '<div class="form-group">'+
                    //             '<label>Multiple (.select2-purple)</label>'+
                                
                    //                 '<select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">'+
                    //                 '<option>Alabama</option>'+
                    //                 '<option>Alaska</option>'+
                    //                 '<option>California</option>'+
                    //                 '<option>Delaware</option>'+
                    //                 '<option>Tennessee</option>'+
                    //                 '<option>Texas</option>'+
                    //                 '<option>Washington</option>'+
                    //                 '</select>'+
                               
                    //             '</div>'+
                    //         '</div></td>'+
                    //         '</tr>';
                    if( !data.COMMENT){
                        html2 += "<tr>"+
                             "<td style='color:white;'><input class='form-control' id='comment' name='comment' type='text' placeholder='type your comment here'></td>"+
                             "</tr>";
                    }else{
                        html2 +="<tr>"+
                             "<td>"+data.COMMENT+"</td>"+
                             "</tr>";
                    }
                             
                        html2 +="</table>"+
                             "</div>";



                //     html3 += "<div class='col-md-12'>"+
                //              "<table class='table table' border='0' cellpadding='0' cellspacing='0'>"+
                //              "<thead>"+
                //              "<tr>"+
                //              "<th><b>adidas-Group Prod. Manager*</b></th>";
                //     if ( !data.REPRESENTATIVE_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.REPRESENTATIVE_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.REPRESENTATIVE_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.REPRESENTATIVE_SIGN+"' width='50' height='40'></th>";
                //     }
                    

                //     html3 += "</tr>"+
                //              "<tr>"+
                //              "<th><b>Inspector**)</b></th>";
                //     if ( !data.INSPECTOR_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.INSPECTOR_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.INSPECTOR_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.INSPECTOR_SIGN+"' width='50' height='40'></th>";
                //     } 
                                
                //     html3 += "</tr>"+
                //              "<tr>"+
                //                 "<th><b>Factory Rep / Fty Prod Head</b></th>";
                //     if ( !data.PRODUCTION_MANAGER_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.PRODUCTION_MANAGER_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.PRODUCTION_MANAGER_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.PRODUCTION_MANAGER_SIGN+"' width='50' height='40'></th>";
                //     } 

                //     html3 += "</tr>"+
                //             "<tr>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                "</tr>"+
                //         "</thead>"+
                //         "<tbody>"+
                //         "</tbody>"+
                //     "</table>"+
                //    "</div>";

                   if(data.LEVEL_USERA == data.LEVEL_USER2){
                        html3 += '<button type="button" class="btn btn-block bg-gradient-success btn-lg buttontry" name="confirmInspector" id="confirmInspector" value="1"><span class="buttontry__text">Confirm Inspector & Send to Pivot</span></button>';
                   }else{
                       html3 +='';
                   }

                   html3 += '<button type="button" class="btn btn-block bg-gradient-info btn-lg" name="exportExcel" id="exportExcel" data-PO="'+data.PO_NO+'"  data-Partial="'+data.PARTIAL+'" data-LEVEL="'+data.LEVEL+'" data-REMARK="'+data.REMARK+'" data-LEVEL_USER="'+data.LEVEL_USERA+'">Export to Excel</button>';
                   

                    $('#report5_result').html(html)
                    $('#report5_comments').html(html2)
                    $('#report5_sign').html(html3)

                    const theButton = document.querySelector(".buttontry");

                    theButton.addEventListener("click", () => {
                        theButton.classList.add("buttontry--loading");
                    });
                }
            })
         }

         function confirm_inspector(){
            var INSPECTOR   = $('#INSPECTOR').val();
            var FLAG        = $('#confirmInspector').val();
            var COMMENT     = $('#comment').val();
            var ID_QC       = $('#id_qc').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/confirm_inspector",
                type: "POST",
                data: {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, INSPECTOR:INSPECTOR, FLAG:FLAG, COMMENT:COMMENT, LEVEL_USER:LEVEL_USER, ID_QC:ID_QC, PO_ID:PO_ID},
                dataType: "JSON",
                success: function(data)
                {
                    put_image(PO_ID)
                },
            });
         }

         function put_image(PO_ID){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_pivot/aql_put_image_mcs/"+PO_ID,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    location.href = data;
                },
            });
         }

          
         
         $(document).on('click','#confirmInspector',function(){
              confirm_inspector();
         });

         $(document).on('click', '#exportExcel', function(){
            // var PO          = $(this).attr("data-PO_NO");
            // var PARTIAL     = $(this).attr("data-Partial");
            // var REMARK      = $(this).attr("data-REMARK");
            // var LEVEL       = $(this).attr("data-LEVEL");
            // var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/export_excel",
                type : "POST",
                data : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success : function(data){
                    // console.log(data);
                    // location.href = data;
                    window.open(data);
                }
            })
            

         })
        

    })
</script>
