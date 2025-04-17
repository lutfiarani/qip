<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">

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
                <h3 class="card-title">Third Party Summary</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Inspect Month</label>
                        <input type="text" class="form-control start_date" value="<?php echo date('Ym')?>" id="start_date" name="start_date" autocomplete="off" require>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                
                
              </div>
              <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
              </div>

              <div id="exportExcel" style="margin-top:10px; margin-bottom:10px">
              </div>
                        <!-- </div> -->
                      <!-- </div> -->

              
            <!-- </div> -->
            <div class="row">    
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Summary of Total PO and Pass Rate</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="inspectPOList" class="dt-responsive table-togglable table-hover" border='1' cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th bgcolor="grey">3rd Party Insp Date</th>
                            <th bgcolor="grey">Total PO</th>
                            <th bgcolor="green">PO Release</th>
                            <th bgcolor="red">PO Reject</th>
                            <th bgcolor="green">Release %</th>
                            <th bgcolor="red">Reject %</th>
                        </tr>
                    </thead>
                    <tbody id="summary_1">
                    </tbody>
                   
                </table>

              </div> 
            </div>
           
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Summary of Total PO and Pass Rate by building</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
               <div class="card-body">
                <table id="inspectPOList" class="dt-responsive table-togglable table-hover" border='1' cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th bgcolor="grey">Buidling</th>
                            <th bgcolor="grey">Total PO</th>
                            <th bgcolor="green">PO Release</th>
                            <th bgcolor="red">PO Reject</th>
                            <th bgcolor="green">Release %</th>
                            <th bgcolor="red">Reject %</th>
                        </tr>
                    </thead>
                    <tbody id="summary_2">
                    </tbody>
                   
                </table>

              </div> 
            </div> 
        </div>


           
            </div>
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
    
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
  
<!--     
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> -->
<script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
 
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>

<script>
  $.fn.datepicker.defaults.format = "yyyymm";
        $('#datepicker').datepicker({
            todayHighlight: true,autoclose: true,
            format: "yyyymm",
            viewMode: "months", 
            minViewMode: "months"
        });

        $('#sandbox-container input').datepicker({ 
        });

</script>

<script>


</script>

<script>
    $(document).ready(function(){
      
   
       function summary_1(tanggal){
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/summary_third_date')?>",
            data      : {tanggal:tanggal},
            dataType  : "JSON",
            success   : function(data)
            {
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td><b>'+data[i].INSPECT_DATE+'</b></td>'+
                                '<td id="loop">'+data[i].TOTAL_PO+'</td>'+
                                '<td id="loop">'+data[i].PO_RELEASE+'</td>'+
                                '<td id="loop">'+data[i].PO_REJECT+'</td>'+
                                '<td id="loop"><b>'+data[i].RELEASE+'% </b></td>'+
                                '<td id="loop"><b>'+data[i].REJECT+'% </b></td>';
                                
                    html +=     '</tr>';
                 
                }
               
                $('#summary_1').html(html);  
                // total_amount();
              
            }
        });
    }

    function summary_2(tanggal){
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/summary_third_fac')?>",
            data      : {tanggal:tanggal},
            dataType  : "JSON",
            success   : function(data)
            {
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td><b>'+data[i].FACTORY+'</b></td>'+
                                '<td>'+data[i].TOTAL_PO+'</td>'+
                                '<td>'+data[i].PO_RELEASE+'</td>'+
                                '<td>'+data[i].PO_REJECT+'</td>'+
                                '<td><b>'+data[i].RELEASE+'% </b></td>'+
                                '<td><b>'+data[i].REJECT+'% </b></td>';
                                
                    html +=     '</tr>';
                    
                }
               
                $('#summary_2').html(html);  
            
            }
        });
    }
      
       
      $('#lihatData').on('click',function(){
        var start_date  = $('#start_date').val();
          summary_1(start_date);
          summary_2(start_date);
        var button = '<button type="button" name="exportExcel" id="exportExcel" class="btn btn-success">Excel</button>';
        $("#exportExcel").html(button)
        // }

      })

      // function summary_excel(){
      //   $.ajax({
      //       type      : "POST",
      //       url       : "<?php echo site_url('C_aql_inspect/summary_excel')?>",
      //       data      : {tanggal:tanggal},
      //       dataType  : "JSON",
      //       success   : function(data)
      //       {
            
      //       }
      //   });
      // }

      $(document).on('click', '#exportExcel', function(){
           var start_date  = $('#start_date').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/export_third",
                type : "POST",
                data : {start_date:start_date},
                dataType: "JSON",
                success : function(data){
                    console.log(data)
                    location.href = data;
                }
            })
      })
    });
</script>