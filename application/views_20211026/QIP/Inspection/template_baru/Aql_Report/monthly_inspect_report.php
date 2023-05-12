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
                <h3 class="card-title">Inspection Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Start Date</label>
                        <input type="text" class="form-control start_date" value="<?php echo date('Ymd')?>" id="start_date" name="start_date" autocomplete="off" require>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="date" data-provide="datepicker1" id="datepicker1">
                      <label>End Date</label>
                      <input type="text" class="form-control end_date" value="<?php echo date('Ymd')?>" id="end_date" name="end_date" autocomplete="off" require>
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                  </div>
                </div>
                
                
                
              </div>
              <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
              </div>
                        <!-- </div> -->
                      <!-- </div> -->

              
            <!-- </div> -->
            <div class="row">    
            


            <table id="inspectPOList" class="dt-responsive table-togglable table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">IC#</th>
                  <th rowspan="2">CELL</th>
                  <th rowspan="2">MODEL</th>
                  <th rowspan="2">ART#</th>
                  <th rowspan="2">PO#</th>
                  <th rowspan="2">CUSTOMER ORDER NO</th>
                  <th rowspan="2">DESTINATION</th>

                  <th rowspan="2">CUSTOMER NO</th>
                  <th rowspan="2">QTY ORDER</th>
                  <th rowspan="2">BATCH INSPECTION QTY</th>
                  <th rowspan="2">LEVEL AQL</th>
                  <th rowspan="2">Qty AQL Inspection</th>

                  <th colspan="2"> Minor Defect</th>
                  <th colspan="2"> Major Defect</th>
                  <th colspan="2"> Critical Defect</th>

                 
                  <th rowspan="2">Inspector Name</th>
                  <th rowspan="2">etc</th>
                  <th rowspan="2">Inspection Date</th>
                  <th rowspan="2">Status</th>
                  <th> Remarks</th>
                  
                 
                  
                </tr>
                <tr>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  <th>max accept</th>
                  <th>actual found</th>
                  
                  <th>Defect of Fail</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
 $.fn.datepicker.defaults.format = "yyyymmdd";
$('#datepicker').datepicker({
    // startDate: '-3d',
    todayHighlight: true,autoclose: true,
});

$('#datepicker1').datepicker({
    // startDate: '-3d',
    todayHighlight: true,autoclose: true,
});
$('#sandbox-container input').datepicker({ 
 });

</script>

<script src="<?=base_url()?>template/dist/app/monthly_inspect_report.js"></script>

<!-- <script>
    $(document).ready(function(){
       //ajax display I
        

       function show_table(){
        var start_date  = $('#start_date').val();
        var end_date    = $('#end_date').val();
        
        tableInspect =  $('#inspectPOList').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                    {extend: 'copy'},
                    {
                      extend: 'excelHtml5',
                      filename: 'InspectionList', 
                      sheetName: 'InspectionList',
                      "createEmptyCells" : true,


                      customize: function( xlsx ) {
 
                          var sSh = xlsx.xl['styles.xml'];
                          var lastXfIndex = $('cellXfs xf', sSh).length - 1;
                          var i; var y;
                          // see built in styles here: https://datatables.net/reference/button/excelHtml5

                          // take a look at "buttons.html5.js", search for "xl/styles.xml"
                          //styleSheet.childNodes[0].childNodes[0] ==> number formats  <numFmts count="6"> </numFmts>
                          //styleSheet.childNodes[0].childNodes[1] ==> fonts           <fonts count="5" x14ac:knownFonts="1"> </fonts>
                          //styleSheet.childNodes[0].childNodes[2] ==> fills           <fills count="6"> </fills>
                          //styleSheet.childNodes[0].childNodes[3] ==> borders         <borders count="2"> </borders>
                          //styleSheet.childNodes[0].childNodes[4] ==> cell style xfs  <cellStyleXfs count="1"> </cellStyleXfs>
                          //styleSheet.childNodes[0].childNodes[5] ==> cell xfs        <cellXfs count="67"> </cellXfs>
                          //on the last line we have the 67 currently built in styles (0 - 66), see link above
 

                  //n1, n2 ... are number formats; s1, s2, ... are styles
                          var n1 = '<numFmt formatCode="##0.0000%" numFmtId="300"/>';
                          var s1 = '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1">'+
                                      '<alignment horizontal="center" vertical="center"/></xf>';
                          var s2 = '<xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1">'+
                                      '<alignment horizontal="center"/></xf>';
                          var s3 = '<xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1">'+
                                      '<alignment horizontal="center" wrapText="1"/></xf>'
                          var s4 = '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1">'+
                                      '<alignment horizontal="center" vertical="center" wrapText="1"/></xf>'
                          sSh.childNodes[0].childNodes[0].innerHTML += n1;
                          sSh.childNodes[0].childNodes[5].innerHTML += s1 + s2 + s3 + s4;
                  
                          var centerBorder    = lastXfIndex + 1;
                          var greyBoldCentered = lastXfIndex + 2;
                          var greyBoldWrapText = lastXfIndex + 3;
                          var centerBorderWrapText = lastXfIndex + 4;
                          var centerBorderRedBold    = lastXfIndex + 5;
                  
                          var sheet = xlsx.xl.worksheets['sheet1.xml'];
                      //create array of all columns (0 - N)
                          var cols = $('col', sheet);
                      //set lenght of some columns: col number: length (excl. first column)
                          var colsLength = ['01:12', '02:20', '03:30', '04:10', '05:25', '06:16',
                                            '07:16', '08:16', '09:16', '10:16', '11:10', '12:10',
                                            '13:8', '14:8', '15:8', '16:8', '16:8', '18:8', '19:30',
                                            '20:10', '21:12', '22:12', '23:100'
                                          ];
                          for ( i=0; i < colsLength.length; i++ ) {
                              $( cols [ parseInt( colsLength[i].substr(0,2) ) ] )
                                      .attr('width', parseInt( colsLength[i].substr(3) ) );               
                          }

                          for (var i = 65; i <= 87; i++) {
                              $('row c[r^='+String.fromCharCode(i)+']', sheet).attr( 's', centerBorder );
                          }
                          $('row c[r^='+String.fromCharCode(88)+']', sheet).attr( 's', centerBorderWrapText );
                          // $('row:eq(3) c', sheet).attr( 's', centerBorder ); 
                          $('row:eq(0) c', sheet).attr( 's', greyBoldCentered );  //grey background bold and centered, as added above
                          $('row:eq(1) c', sheet).attr( 's', greyBoldWrapText );  //grey background bold, text wrapped

                          
                  
                          
                      }



                      // customize: function( xlsx ) {
                        
                        
                      //   var sheet = xlsx.xl.worksheets['sheet1.xml'];
                      //   for (var i = 65; i <= 90; i++) {
                      //     $('row c[r^='+String.fromCharCode(i)+']', sheet).attr( 's', '25' );
                      //   }
                        


                      // }
                    },
                    {
                      extend: 'pdfHtml5',
                      orientation: 'landscape',
                      pageSize: 'TABLOID',
                      customize: function(doc) {
                        doc.styles.tableHeader.fontSize = 8;
                        doc.defaultStyle.fontSize = 8;
                      }
                    },
                    // {extend: 'print'}
                      // 'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  responsive : true,
                  "sScrollX": "100%",
                  "bScrollCollapse": true,
                  "bJQueryUI": true,
                  "sPaginationType": "full_numbers",
                  "aoColumnDefs": [{ "aTargets": [0], "bSortable": true },
                                    { "aTargets": ['_all'], "bSortable": false}], 
                                    "aaSorting": [[0, 'asc']],
                  "ajax":{
                      url : "<?php  //echo site_url('C_aql_inspect/monthly_report_inspection_') ?>",
                      data : {start_date:start_date, end_date:end_date},
                      datatype : 'json',
                      type : 'POST',
                      
                      "sScrollX": '100%',
                      bScrollCollapse: true,
                      fixedHeader: true,
                    
                  }
              });
          }



      function DestroyDatatable(){
        $('#inspectPOList').DataTable().destroy();
      }

       
      $('#lihatData').on('click',function(){
          $('#inspectPOList').DataTable().clear();
          DestroyDatatable()
        // if(! $.fn.DataTable.isDataTable( '#InspectBalance' )){
          show_table();
        // }

      })

    });
</script> -->
















