<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
              <div class="card card-primary">
                <form role="form" method="post">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4">
                        <!-- <div class="form-group"> -->
                      <div class="date" data-provide="datepicker" id="datepicker">
                              <label>Loadplan Date</label>
                              <input type="text" class="form-control" value="<?php echo date('Ym')?>" id="po_date" name="po_date" autocomplete="off" require>
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                        <!-- </div> -->
                      </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>SDD</label>
                          <select class="custom-select" name="sdd" id="sdd">
                            <option value="">All SDD</option>
                           
                          </select>
                        </div>
                      </div>

                  
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Factory</label>
                          <select class="custom-select" name="factory" id="factory">
                            <!-- <option value="">All Factory</option> -->
                            <option value="">All Factory</option>
                         
                      
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                        <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
                  </div>
                </form>
                <div class="card-body">
                  <table id="InspectBalance" class="table-bordered table-striped" cellspacing="0" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Fac</th>
                        <th>PO No</th>
                        <th>Model Name</th>
                        <th>Country</th>
                        <th>Art</th>
                        <th>Qty</th>
                        <th>Qty Ctn</th>
                        <th>SDD Date</th>
                        <th>Type</th>
                        <th>Load No</th>
                        <th>Ex Fty</th>
                        <th>Bal</th>
                        <th>Status</th>
                        <th>Status</th>
                        <th>Status Insp</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
           
            <!-- <div class="table-responsive-sm"> -->

            <div class="modal fade" id="Modal_View_Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Partial Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <table class="table table-bordered">
                          <thead>
                            <th>PO NO</th>
                            <th>PARTIAL</th>
                            <th>PARTIAL QTY</th>
                            <th>SEQ INSPECT</th>
                            <th>LEVEL</th>
                            <th>USER</th>
                            <th>INSPECTOR</th>
                            <th>INSPECT DATE</th>
                            <th>STATUS INSPECT</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                          </thead>
                          <tbody id="view_detail_partial">
                          </tbody>
                       </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>


          <!-- /.card -->
        <!-- </div> -->
        <!-- /.col -->
      <!-- </div> -->
      <!-- /.row -->
    </section>

    
   
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
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
    
    
        var tableInspectBalance;

        function reload_table()
        {
          tableInspectBalance.ajax.reload(null, false); //reload datatable ajax 
        }
      
        // showtable();
        // function showtable(){
        $(document).ready(function(){

          $("#po_date").change(function(){
            var po_date=$(this).val();
            $.ajax({
              data:{po_date:po_date},
              success: function(respond){
                // console.log(factory);
                $('#InspectBalance').DataTable().clear();
                DestroyDatatable()
                getSDD();
                $("#sdd").html(respond);
               
                }
            })
        });

          $("#sdd").change(function(){
            var sdd=$(this).val();
            $.ajax({
              data:{sdd:sdd},
              success: function(respond){
                // console.log(factory);
                $('#InspectBalance').DataTable().clear();
                DestroyDatatable()
                getFactory();
                $("#factory").html(respond);
               
                }
            })
        });

        function getSDD(){
          // var factory =$('#factory').val();
          var po_date =$('#po_date').val();

          $.ajax({
              type:"POST",
              url: "<?php echo site_url('C_Export/get_data_sdd_/') ?>",
              data : {po_date:po_date},
              cache: false,
              // data : {id:id},
              success: function(respond){
                // console.log(value);
                $("#sdd").html(respond);
              }
          });
        }

        function getFactory(){
          var sdd =$('#sdd').val();

          $.ajax({
              type:"POST",
              url: "<?php echo site_url('C_Export/get_data_factory/') ?>",
              data : {sdd:sdd},
              cache: false,
              // data : {id:id},
              success: function(respond){
                // console.log(value);
                $("#factory").html(respond);
              }
          });
        }


         
         function show_table(){
            var sdd1 =$('#sdd').val();
            var factory1 =$('#factory').val();
            var po_date1 =$('#po_date').val();
            tableInspectBalance = $('#InspectBalance').DataTable({
              dom: 'Bfrtip',
              buttons: [
                 {extend: 'copy'},
                 {
                   extend: 'excelHtml5',
                   filename: 'Input_Inspect_Schedule', 
                   sheetName: 'Input_Inspect_Schedule',
                   "createEmptyCells" : true,


                  
                 },
                 {
                   extend: 'pdfHtml5',
                   orientation: 'portrait',
                   pageSize: 'TABLOID',
                   customize: function(doc) {
                     doc.styles.tableHeader.fontSize = 8;
                     doc.defaultStyle.fontSize = 8;
                   }
                 },
                 'csv'
                
               ],
              
                  "processing": true,
                  "serverSide": false,
                
                  "ajax"  :{
                    type      : "post",
                    url       : "<?php echo site_url('C_Inspection/input_schedule_ppic_');?>",
                    data      : {sdd1:sdd1, factory1:factory1, po_date1:po_date1},
                    datatype  : 'json',
                    responsive: true
                  },
                  "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData[13] == 'PRODUCTION') {
                        $('td', nRow).css('background-color', '#f6f611');
                        // $('td', nRow).css('color', 'white');
                    }else if(aData[13] == 'RELEASE'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }else if(aData[13] == 'REJECT'){
                      $('td', nRow).css('background-color', '#FF0000');
                    }else if(aData[13] == 'WAITING'){
                      $('td', nRow).css('background-color', '#3399FF');
                    }else if(aData[13] == 'REPACKING'){
                      $('td', nRow).css('background-color', '#A0A0A0');
                    }else if(aData[13] == 'CANCEL'){
                      $('td', nRow).css('background-color', '#FF8000');
                    }else if(aData[13] == 'NOT YET VALIDATION'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }else if(aData[13] == 'REJECTED'){
                      $('td', nRow).css('background-color', '#FF0000');
                    }else if(aData[13] == 'PASS'){
                      $('td', nRow).css('background-color', '#00CC00');
                    }
                    
                  },
                  "columnDefs": [
                      {
                          "targets": [ 13 ],
                          "visible": false,
                          "searchable": false
                      }
                  ],
                  paging: false
              });
          // });
         }
      

      function DestroyDatatable(){
        $('#InspectBalance').DataTable().destroy();
      }

       
      $('#lihatData').on('click',function(){
          DestroyDatatable()
        // if(! $.fn.DataTable.isDataTable( '#InspectBalance' )){
          show_table();
        // }

      })


      $(document).on('click','.inspect',function(){
            var PO_NO = $(this).attr('po');
            // var STATUS = $(this).attr('status');// $('#id').val();
            // var ID = $(this).attr('id_export');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_Inspection/input_inspection')?>",
                dataType : "JSON",
                data : {PO_NO:PO_NO},
                success: function(data){
                // DestroyDatatable()
                // show_table();
                reload_table();
                    // alert(data);
                }
            });
            return false;
            // $('#Modal_Delete').modal('hide');
          });




          $(document).on('click','.view_detail',function(){
        var PO_NO       = $(this).attr("data-PO_NO");
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/view_detail_po')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO},
            success   : function(data)
            {
                $('#Modal_View_Detail').modal('show');
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].PARTIAL+'</td>'+
                                '<td>'+data[i].PARTIAL_QTY+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td>'+data[i].LEVEL+'</td>'+
                                '<td>'+data[i].LEVEL_USER+'</td>'+
                                '<td>'+data[i].INSPECTOR+'</td>'+
                                '<td>'+data[i].INSPECT_DATE+'</td>'+
                                '<td>'+data[i].INSPECT_RESULT+'</td>'+
                                '<td>'+data[i].REJECT_DESC+'</td>';
                               
                                
                    html += '<td><button type="button" class="btn btn-warning btn-xs view"  data-PO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-REMARK="'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'">View Report</button> ';
                    html += '<button type="button" class="btn btn-info btn-xs view_ic"  data-PO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-REMARK="'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'">View IC</button></td>';
                    
                      //  data-PO_NO='"+data[i].PO_NO+""' 
                       //data-Partial='"+data[i].PARTIAL+'" data-SIZE="'+data[i].SIZE+'" qty_asli = "'+QTY+'" level="'+LEVEL+'">
                                              
                       html +=     '</tr>';
                      
                }
                $('#view_detail_partial').html(html); 
               
            }
          });
        });

        $(document).on('click','.view', function(){
    var PO_NO       = $(this).attr("data-PO");
    var PARTIAL     = $(this).attr("data-PARTIAL");
    var REMARK      = $(this).attr("data-REMARK");
    var LEVEL       = $(this).attr("data-LEVEL");
    var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
    var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
    
    $.ajax({
        url : "<?php echo site_url('C_Aql_Inspect/report_')?>",
        method:"POST",
        data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
        dataType: "JSON",
        success:function(data){
            console.log(data.url)
            // href = data.url
            // location.href = data.url;
            window.open(data.url);
          }
    });
    
  });

  $(document).on('click','.view_ic', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/ic')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
            dataType: "JSON",
            success:function(data){
                console.log(data)
                // href = data.url
                // location.href = data;
                window.open(data.url);
             }
        });
        
      });




    });


    
</script>