<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!--div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div-->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  
                    <i class="fas fa-globe"></i>IC NUMBER : <?php echo $ic['IC_NUMBER'];?>
                    <small class="float-right"></small>
                  
                </div>
                <!-- /.col -->
              </div>
                <br>
                <br>
                <br>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>Adidas Sourcing Limited</strong><br>
                    Indonesia Representative Office<br>
                    Artha Graha building 10th Floor 5C5D lot.25<br>
                    Jl. Jendral Sudirman Kav.52-53<br>
                    Jakarta | Indonesia
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong></strong><br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b><img src="<?php echo base_url();?>/template/img/adidas.png"  width="150" height="75" class="img-fluid mb-2" alt="red sample"></b><br>
                  <br>
            
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <hr size="10px" width="100%" align="left" color="black"> 
              </div>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                <h2><center><b>INSPECTION CERTIFICATE</b></center></h2>
                <br>
                  <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th>Customer Number       : </th>
                      <td><?php echo $ic['CUSTOMER'];?></td>
                      <th>T1 Supplier           : </th>
                      <td>HWI</td>
                    </tr>
                    <tr>
                      <th>PO Number             : </th>
                      <td><?php echo $ic['PO_NO'];?></td>
                      <th>Model Name            : </th>
                      <td><?php echo $ic['MODEL_NAME'];?> </td>
                    </tr>
                    <tr>
                      <th>Quantity              : </th>
                      <td><?php echo $ic['KWMENG'];?> PAIRS</td>
                      <th>Article               : </th>
                      <td><?php echo $ic['ARTICLE'];?></td>
                    </tr>

                    </tbody>
                    
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-4">
               
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Destination           : </th>
                      <td><?php echo $ic['LANDT'];?></td>
                      
                    </tr>
                    <tr>
                      <th>Part of Full Shipment : </th>
                      <td bgcolor='orange'></td>
                     
                    </tr>
                   

                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-12">
                  
                  

                  <p>
                    This merchandise has been checked by us and appears on this right Inspection to be in accordance with
                    adidas-Group standards
                  </p>
                  <br>
                  <p>
                    Inspection has been done
                  </p>
                  <br>
                  <p>
                    According to adidas-Group FINAL Line concept (100% inspection)
                  </p>
                  <br>
                  <p>
                    According to adidas-Group AQL Inspection Policy
                  </p>
                  <br>
                  <p>
                    Note : In case that both FINAL 100% Inspection and AQL Inspection are performed e.g. during the transition periodeto FINAL line concept, both boxes will be ticked.
                  </p>
                </div>
                
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                    <div class="col-4">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <center><b><?php echo $ic['ID_REPRESENTATIVE'];?></b></center>
                        <hr size="10px" width="100%" align="left" color="black"> 
                        <center>Name Factory Representative</center>
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <p style="text-align:right;"><?php echo $ic['DATE_REPRESENTATIVE'];?></p>
                        <br>
                        
                        
                        <center><b><img src="<?php echo base_url();?>\<?php echo $ic['SIGN_REPRESENTATIVE']; ?>" width='75' height='60'></b></center>
                        <hr size="10px" width="100%" align="left" color="black"> 
                        <center>Signature / Date</center>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <center><b><?php echo $ic['ID_PRODUCTION_MANAGER'];?></b></center>
                        <hr size="10px" width="100%" align="left" color="black"> 
                        <center>Name adidas-Group Production Manager</center>
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <p style="text-align:right;"><?php echo $ic['DATE_PRODUCTION_MANAGER'];?></p>
                        <br>
                        
                        <center><b><img src="<?php echo base_url();?>\<?php echo $ic['SIGN_PRODUCTION']; ?>" width='75' height='60'></b></center>
                        <hr size="10px" width="100%" align="left" color="black"> 
                        <center>Signature / Date</center>
                    </div>
                </div>
                <div class="row">
                <!-- accepted payments column -->
                <div class="col-12">
                  <br>
                  <br>
                  <br>
                  

                  <p>
                    Factory Representative and adidas-group Production Manager confirm with their signature that this PO meets adidas-Group bonding and FGT standards
                    and that valid A-01 and CPSIA certificate area available.
                  </p>
                  <br>
                  <br>
                  <br>
                  <p>Date issued : 19-09-2016</p>
                  <p>Revision#: 0 </p>
                  <p>Control # : QIP/APP/8-3</p>
                 
                </div>
                <button type="button" class="btn btn-block bg-gradient-info btn-lg" data-PO_NO="<?php echo $ic['PO_NO'];?>"  data-Partial="<?php echo $ic['PARTIAL'];?>" data-LEVEL="<?php echo $ic['LEVEL'];?>" data-REMARK="<?php echo $ic['REMARK'];?>" data-LEVEL_USER="<?php echo $ic['LEVEL_USER'];?>" name="exportExcel" id="exportExcel">Export to Excel</button>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
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
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
   
    <script>
    
      
      $(document).ready(function(){ 
          var PO_NO     = $('#PO_NO').text();
          var PARTIAL   = $('#PARTIAL').text();
          var INSPECTOR = $('#INSPECTOR').text();
          var LEVEL     = $('#LEVEL').text();
          var REMARK    = $('#REMARK').text();

        //   createReport()
      
          function createReport(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/report_",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK},
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

          function confirm_inspector(){
            var INSPECTOR = $('#INSPECTOR_').text();
            var FLAG =$('#confirmInspector').val();;
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/confirm_inspector",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, INSPECTOR:INSPECTOR, FLAG:FLAG},
                dataType: "JSON",
                success: function(data)
                {
                    // var html = ''
                    // html += '<img src="<?php echo base_url() ?>'+data.INSPECTOR_SIGN+'" width="50" height="40">'

                    // $('#inspectorku').html(html)
                    // // createReport
                    // // console.log(data)
                    // // createReport();
                    // // window.location.href = window.location.href;
                    // console.log(data);
                    
                },
            });
          }

          
         
          $(document).on('click', '#exportExcel', function(){
            var PO_NO       = $(this).attr("data-PO_NO");
            var PARTIAL     = $(this).attr("data-Partial");
            var REMARK      = $(this).attr("data-REMARK");
            var LEVEL       = $(this).attr("data-LEVEL");
            var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/export_excel_ic",
                type : "POST",
                data : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success : function(data){
                    // console.log(data);
                    location.href = data;
                }
            })
            

         })

    })
</script>
