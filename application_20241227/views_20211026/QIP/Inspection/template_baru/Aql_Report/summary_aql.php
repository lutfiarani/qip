

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
                <h3 class="card-title">Summary of AQL Inspection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body" id="summaryAQL">
            



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

    <!--script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!--script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script-->
    
    <!--script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js" type="text/javascript"></script>-->

    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

    <script>
    
      $(document).ready(function(){
       //ajax display I
        summary();
        function summary(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_inspect/summary_aql_",
                type: "POST",
                // data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)
                    var html = ''
                    html += '<table class="table dt-responsive table-togglable table-hover"border="1" cellspacing="0" width="100%">'+
                            '<thead>'+
                            '<tr>'+
                                '<th>Factory</th>'+
                                '<th>PO Size</th>'+
                                '<th>Pairs Inspected</th>'+
                                '<th>Rejected Pairs</th>'+
                                '<th>%</th>'+
                                '<th>Passed Pairs</th>'+
                                '<th>%</th>'+
                                '<th>POs inspected</th>'+
                                '<th>Passed PO</th>'+
                                '<th>%</th>'+
                                '<th>Rejected PO</th>'+
                                '<th>%</th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>HWI</td>'+
                                    '<td>'+data.PO_SIZE+'</td>'+
                                    '<td style="color:red">'+data.PAIRS_INSPECTED+'</td>'+
                                    '<td style="color:red">'+data.REJECTED_PAIRS+'</td>'+
                                    '<td style="color:red">'+data.REJECT+'</td>'+
                                    '<td>'+data.PASSED_PAIRS+'</td>'+
                                    '<td>'+data.PASSED+'</td>'+
                                    '<td style="color:blue">'+data.PO_INSPECTED+'</td>'+
                                    '<td style="color:blue">'+data.PASSED_PO+'</td>'+
                                    '<td style="color:blue">'+data.PASSED_PERCENT+'</td>'+
                                    '<td style="color:red">'+data.REJECTTED_PO+'</td>'+
                                    '<td>'+data.REJECTED_PERCENT+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><b>LO TOTAL</td>'+
                                    '<td><b>'+data.PO_SIZE+'</td>'+
                                    '<td style="color:red"><b>'+data.PAIRS_INSPECTED+'</td>'+
                                    '<td style="color:red"><b>'+data.REJECTED_PAIRS+'</td>'+
                                    '<td style="color:red"><b>'+data.REJECT+'</td>'+
                                    '<td><b>'+data.PASSED_PAIRS+'</td>'+
                                    '<td><b>'+data.PASSED+'</td>'+
                                    '<td style="color:blue"><b>'+data.PO_INSPECTED+'</td>'+
                                    '<td style="color:blue"><b>'+data.PASSED_PO+'</td>'+
                                    '<td style="color:blue"><b>'+data.PASSED_PERCENT+'</td>'+
                                    '<td style="color:red"><b>'+data.REJECTTED_PO+'</td>'+
                                    '<td><b>'+data.REJECTED_PERCENT+'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
             

                        $('#summaryAQL').html(html)
                },
            });
        }


       tableInspect =  $('#inspectPOList').DataTable({
            responsive : true,
            "sScrollX": "100%",
            "bScrollCollapse": true,
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "aoColumnDefs": [{ "aTargets": [0], "bSortable": true },
                              { "aTargets": ['_all'], "bSortable": false}], 
                              "aaSorting": [[0, 'asc']],
            "ajax":{
                url : "<?php echo site_url('C_aql_inspect/daily_report_inspection_') ?>",
                type : 'GET',
                
                // "sScrollX": '100%',
                // bScrollCollapse: true,
                fixedHeader: true,
               
            }
           
          });

      


      $(document).on('click','.confirm', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var FLAG        = $(this).attr("data-FLAG");
        var INSPECTOR   = $(this).attr("data-INSPECTOR");

        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/confirm_inspector')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, INSPECTOR:INSPECTOR, FLAG:FLAG},
            success:function(data){
                console.log(data)
                reload_table();
             }
        });
        
      });

      $(document).on('click','.view', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/report_')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK},
            dataType: "JSON",
            success:function(data){
                console.log(data.url)
                // href = data.url
                location.href = data.url;
             }
        });
        
      });

      $(document).on('click','.ic', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/ic')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK},
            dataType: "JSON",
            success:function(data){
                console.log(data)
                // href = data.url
                location.href = data;
             }
        });
        
      });




      $(document).on('click','.update', function(){
          var PO_NO = $(this).attr("id");
          var PO_NO1 = PO_NO;
          $('#Modal_Edit_Reject').modal('show');
          $('[name="PO_NO"]').val(PO_NO);
          $('[name="PO_NO1"]').val("test");
          $('[name="STATUS_PO"]').val('REJECT');

      });
     
      $('#btnReject').on('click', function(){
          var PO_NO     = $('#PO_NO').val();
          var STATUS_PO = $('#STATUS_PO').val();
          $.ajax({
              url : "<?php echo site_url('C_Inspection/update_status')?>",
              method : "POST" ,
              data : {PO_NO:PO_NO, STATUS_PO:STATUS_PO},
              dataType : "json",
             
              success:function(data){
                  $('[name="PO_NO"]').val("");
                  $('[name="STATUS_PO"]').val("");
                  $('#Modal_Edit_Reject').modal('hide');
                 // window.location.href=window.location.href;
                reload_table();
              }
          });
      });
         
      
  });

      
</script>