<!-- <!-- <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/responsive.dataTables.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
<style>
/* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   speak for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
   .modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url();?>template/img/ajax-loader.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}
</style>
<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
           
            <form role="form">
               <div class="card-body">
                <!-- Date range -->
                
                <div class="form-group">
                    <label> Inspection Date</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="yyyy-mm-dd" type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                    </div>
                </div>
               </div>
            <!-- /.card -->

            <div class="card-footer">
                <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
            </div>
        </form>
      
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">SUMMARY TODAY INSPECTION SCHEDULE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="summary_release">
               
              </div>
              <!-- /.card-body -->
            </div>
            
            <div class="card-body">
            
            

            <div class="table-responsive-sm" id="inspectBalance">
          
  </div>
  <?php //}?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
        



          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="modal"></div>
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

<script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
<!-- page script -->

<script>
  $(function () {
    $('#example1').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true
     
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
  
  $body = $("body");

$(document).on({
     ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});
     

    //   function reload_table()
    //   {
    //     tableInspectBalance.ajax.reload(null, false); //reload datatable ajax 
    //   }
    
      // showtable();
      // function showtable(){
      $(document).ready(function(){
     

    function show_haha(){
      var tanggal =$('#tanggal').val();
      $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_Inspection/inspect_all_building_')?>",
            dataType  : "JSON",
            data      : {tanggal:tanggal},
           success   : function(data)
            {
              var html = '';
              var html2 ='';
                var i;

                html2 += ' <table class="table table-condensed" >'+
                        ' <thead>'+
                        '</thead>'+
                        '<tbody>'+
                        '<tr>'+
                            '<td> <div class="bg-success color-palette"><span><center>RELEASE</span></div>'+
                            '<div class="bg-success disabled color-palette"><span><center>'+data.view_summary.RELEASE+'</span></div></td>'+
                            '<td> <div class="bg-danger color-palette"><span><center>REJECT</span></div>'+
                            '<div class="bg-danger disabled color-palette"><span><center>'+data.view_summary.REJECT+'</span></div></td>'+
                            '<td> <div class="bg-primary color-palette"><span><center>WAITING</span></div>'+
                            '<div class="bg-primary disabled color-palette"><span><center>'+data.view_summary.WAITING+'</span></div></td>'+
                            '<td> <div class="bg-warning color-palette"><span><center>PRODUCTION</span></div>'+
                            '<div class="bg-warning disabled color-palette"><span><center>'+data.view_summary.PRODUCTION+'</span></div></td>'+
                            '<td> <div class="bg-black color-palette"><span><center>TOTAL</span></div>'+
                            '<div class="bg-black disabled color-palette"><span><center>'+data.view_summary.TOTAL+'</span></div></td>'+
                        '</tr>'+
                            '</tbody>'+
                '</table>';

                // var haha = tanggal;
                html += '<table id="example1" class="table table-bordered table-striped" style="width:100%"  cellpadding="1">'+
                  '<thead>'+
                    '<tr>'+ 
                    '<th><center>No</center></th>'+
                    '<th><center>Fac</center></th>'+
                    '<th><center>PO No</center></th>'+
                    '<th><center>Model Name</center></th>'+
                    '<th><center>Dest</center></th>'+
                    '<th><center>Country</center></th>'+
                    '<th><center>Cust No</center></th>'+
                    '<th><center>Art</center></th>'+
                    '<th><center>Qty</center></th>'+
                    '<th><center>Qty Ctn</center></th>'+
                    '<th><center>SDD</center></th>'+
                    '<th><center>Type</center></th>'+
                    '<th><center>Load No</center></th>'+
                    '<th><center>Ex Fty</center></th>'+
                    '<th><center>Bal</center></th>'+
                    '<th><center>Insp Date</center></th>'+
                    
                    '<th><center>Stat</center></th>'+
                    
                    '</tr>'+
                '</thead>'+
                 '<tbody>';
        
                  
                for(i=0; i<data.view_all.length; i++){
                  if((data.view_all[i].STATUS_PO2 == 'RELEASE')||(data.view_all[i].STATUS_PO2 == 'PASS')){
                      html += '<tr style="background-color:#00cc00">';
                    }else if(data.view_all[i].STATUS_PO2 == 'REJECT')
                    {
                      html += '<tr style="background-color:#FF0000">';
                    }else if(data.view_all[i].STATUS_PO2 == 'REPACKING'){
                      html += '<tr style="background-color:#A0A0A0">';
                    }else if(data.view_all[i].STATUS_PO2 == 'WAITING'){
                      html += '<tr style="background-color:#3399FF">';
                    }else if(data.view_all[i].STATUS_PO2 == 'PRODUCTION'){
                      html += '<tr style="background-color:#FFFF99">';
                    }else if(data.view_all[i].STATUS_PO2 == 'CANCEL'){
                      html += '<tr style="background-color:#FF8000">';
                    }

                    html += 
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data.view_all[i].FACTOR_CODE+'</td>'+
                                '<td>'+data.view_all[i].PO_NO+'</td>'+
                                '<td>'+data.view_all[i].MODEL_NAME+'</td>'+
                                '<td>'+data.view_all[i].DESTINATION+'</td>'+
                                '<td>'+data.view_all[i].COUNTRY+'</td>'+
                                '<td>'+data.view_all[i].CUST_NO+'</td>'+
                                '<td>'+data.view_all[i].ART_NO+'</td>'+
                                '<td>'+data.view_all[i].TOTAL_QTY+'</td>'+
                                '<td>'+data.view_all[i].TOTAL_CARTON+'</td>'+
                                '<td>'+data.view_all[i].SDD+'</td>'+
                                '<td>'+data.view_all[i].LOAD_TYPE+'</td>'+
                                '<td>'+data.view_all[i].CONTAINER+'</td>'+
                                '<td>'+data.view_all[i].EXPORT_DATE+'</td>'+
                                '<td>'+data.view_all[i].BALANCE_CRTON+'</td>';
                                if(data.view_all[i].INSPECT_DATE_INPUT == 'BELUM DIJADWALKAN'){
                                    html += '<td><div class="bg-black disabled color-palette"><span><center>'+data.view_all[i].INSPECT_DATE_INPUT+'</span></div></td>';
                                }else{
                                  html += '<td>'+data.view_all[i].INSPECT_DATE_INPUT+'</td>';
                                }
                                
                                html +='<td>'+data.view_all[i].STATUS_PO2+'</td>'+
                             '</tr>';

                      
                      //  data-PO_NO='"+data[i].PO_NO+""' 
                       //data-Partial='"+data[i].PARTIAL+'" data-SIZE="'+data[i].SIZE+'" qty_asli = "'+QTY+'" level="'+LEVEL+'">
                                              
                   
                      
                
                }
                html +='</tbody>'+
                      '</table>';
                $('#summary_release').html(html2); 
                $('#inspectBalance').html(html);
                
            }
        });

    }

    function summary(){
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_Inspection/inspect_all_building2')?>",
            dataType  : "JSON",
           success   : function(data)
            {
              var html = '';
                var i;
                // var haha = tanggal;
               

               
                
              
               
                }
            });

    }
    

    function DestroyDatatable(){
      $('#InspectBalance').DataTable().destroy();
    }

     
    $('#lihatData').on('click',function(){
      $.get("/mockjax");
        // DestroyDatatable()
      // if(! $.fn.DataTable.isDataTable( '#InspectBalance' )){
        show_haha();
        // summary();
      // }

    })


  });


  
</script>
