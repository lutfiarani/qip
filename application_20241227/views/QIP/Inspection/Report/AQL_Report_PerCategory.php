<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/image_drag.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" /> 
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.min.css"> -->

<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $formtitle;?></h3>
        </div>
        <div class="card card-primary">
            <div class="card-body">
              <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="from">From:</label>
                        <input type="date" class="form-control" name="from" id="from" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="from">To:</label>
                        <input type="date" class="form-control" name="to" id="to" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="cari_data">&nbsp</label>
                        <button type="button" class="btn btn-primary btn-block" name="cari_data" id="cari_data">Cari Data</button>
                    </div>
                   
                </div>
                <hr>
                <div class="row">
                     
                </div>
                <div class="card card-success">
                    <div class="card-header"> <h5 class="card-title">AQL Summary Internal Report</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered table-striped" id="tabel_inspection" style="width:100%">
                                        <thead class="thead-dark text-white" style="background: #304142">
                                            <tr>
                                                <th>No</th>
                                                <th>Building</th>
                                                <th>Total PO Inspected</th>
                                                <th>Total PO Passed</th>
                                                <th>Total PO Rejected</th>
                                                <th>Pass Rate</th>
                                                <th>Total Qty Inspected</th>
                                                <th>Total Qty Passed</th>
                                                <th>Total Qty Rejected</th>
                                                <th>Pass Rate</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="tabel_inspection_body">

                                        </tbody>
                                    </table>
                                    
                                </div>
                                <div class="loading">
                                    <img class="loading-image" src="<?php echo base_url();?>template/images/spinner.gif" alt="Loading..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="card card-danger">
                    <div class="card-header"> <h5 class="card-title">Defect Tracking</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered table-striped" id="tabel_defect" style="width:100%">
                                        <thead class="thead-dark text-white" style="background: #304142">
                                            <tr>
                                                <th>Code</th>
                                                <th>Area</th>
                                                <th>Defect</th>
                                                <th>Defect Qty</th>
                                                <th>Defect %</th>
                                                <th>Top Cell</th>
                                                <th>Model</th>
                                                <th>Qty from Top Cell</th>
                                                <th>% Top Cell from total defect</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabel_defect_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="card card-warning">
                    <div class="card-header"> <h5 class="card-title">Inspector Performance</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered table-striped" id="tabel_inspector" style="width:100%">
                                        <thead class="thead-dark text-white" style="background: #304142">
                                            <tr>
                                                <th>No</th>
                                                <th>AQL Name</th>
                                                <th>Total PO Inspected</th>
                                                <th>Total PO Passed</th>
                                                <th>Total PO Rejected</th>
                                                <th>Pass Rate</th>
                                                <th>Reject Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabel_inspector_body">

                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</section>


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
    function report(from, to){
      $.ajax({
          type      : "POST",
          url       : "<?php echo site_url('C_AqlReport/category_')?>", 
          dataType  : "JSON",
          beforeSend: function () {
            $('.loading').show();
          },
          data      : {from:from, to:to},
          success: function(data)
          {
                $('.loading').hide();
              var insp      = '' 
              var defect    = ''
              var inspector = ''

              var total_po_inspected    = 0
              var total_po_passed       = 0
              var total_po_rejected     = 0
              var total_qty_inspected   = 0
              var total_qty_passed      = 0
              var total_qty_rejected    = 0

              var total_defect          = 0

              var total_qty = 0
              var output    = 0
              var target    = 0
              var defect    = 0
                  
              var i, c, d
              console.log(data)
            

              for(c=0; c<data.inspection.length; c++){
                  insp += '<tr>'+
                            '<td>'+(c+1)+'</td>'+
                            '<td>'+data.inspection[c].FAC+'</td>'+
                            '<td>'+data.inspection[c].TTL_PO+'</td>'+
                            '<td>'+data.inspection[c].PASS+'</td>'+
                            '<td>'+data.inspection[c].FAIL+'</td>'+
                            '<td>'+data.inspection[c].PASS_RATE1+'%</td>'+
                            '<td>'+data.inspection[c].TOTAL_QTY+'</td>'+
                            '<td>'+data.inspection[c].PASS_QTY+'</td>'+
                            '<td>'+data.inspection[c].FAIL_QTY+'</td>'+
                            '<td>'+data.inspection[c].PASS_RATE2+'%</td>'+
                           
                  '</tr>'

                  total_po_inspected    += data.inspection[c].TTL_PO
                  total_po_passed       += data.inspection[c].PASS
                  total_po_rejected     += data.inspection[c].FAIL

                  total_qty_inspected   += data.inspection[c].TOTAL_QTY
                  total_qty_passed      += data.inspection[c].PASS_QTY
                  total_qty_rejected    += data.inspection[c].FAIL_QTY

              }

              insp += '<tr class="bgcolor-primary">'+
                        '<td></td>'+
                        '<td>TOTAL</td>'+
                        '<td>'+total_po_inspected+'</td>'+
                        '<td>'+total_po_passed+'</td>'+
                        '<td>'+total_po_rejected+'</td>'+
                        '<td>'+(total_po_passed/total_po_inspected*100).toFixed(2)+'%</td>'+
                        '<td>'+total_qty_inspected+'</td>'+
                        '<td>'+total_qty_passed+'</td>'+
                        '<td>'+total_qty_rejected+'</td>'+
                        '<td>'+(total_qty_passed/total_qty_inspected*100).toFixed(2)+'%</td>'+
                     '</tr>'

            
              for(d=0; d<data.defect.length; d++){
                    defect += '<tr>'+
                            '<td>'+data.defect[d].DEFECT_CODE+'</td>'+
                            '<td>'+data.defect[d].CODE_NAME+'</td>'+
                            '<td>'+data.defect[d].REJECT_CODE_NAME+'</td>'+
                            '<td>'+data.defect[d].DEFECT_QTY+'</td>'+
                            '<td>'+(data.defect[d].DEFECT_PERCENTAGE).toFixed(2)+'%</td>'+
                            '<td>'+data.defect[d].TOP_CELL+'</td>'+
                            '<td>'+data.defect[d].MODEL_NAME+'</td>'+
                            '<td>'+data.defect[d].QTY_FROM_TOP_CELL+'</td>'+
                            '<td>'+(data.defect[d].TOP_PERCENTAGE_BY_CELL).toFixed(2)+'%</td>'+
                        '</tr>'
                    
                    // total_defect += data.defect[d].TOTAL_DEFECT
              }
              defect += '<tr>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>OTHER</td>'+
                            '<td>'+data.defect[0].OTHER_DEFECT+'</td>'+
                            '<td>'+(data.defect[0].OTHER_DEFECT/data.defect[0].QTY_INSPECT*100).toFixed(2)+'%</td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>TOTAL DEFECT</td>'+
                            '<td>'+data.defect[0].TOTAL_DEFECT+'</td>'+
                            '<td>'+(data.defect[0].TOTAL_DEFECT/data.defect[0].QTY_INSPECT*100).toFixed(2)+'%</td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>QTY INSPECT</td>'+
                            '<td>'+data.defect[0].QTY_INSPECT+'</td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                        '</tr>'


              for(i=0; i<data.inspector.length; i++){
                    inspector += '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data.inspector[i].INSPECTOR+'</td>'+
                            '<td>'+data.inspector[i].TOTAL_PO+'</td>'+
                            '<td>'+data.inspector[i].PASS+'</td>'+
                            '<td>'+data.inspector[i].FAIL+'</td>'+
                            '<td>'+(data.inspector[i].PASS/data.inspector[i].TOTAL_PO*100).toFixed(2)+'%</td>'+
                            '<td>'+(data.inspector[i].FAIL/data.inspector[i].TOTAL_PO*100).toFixed(2)+'%</td>'+
                           
                        '</tr>'
              }
            $('#tabel_inspection_body').html(insp)
            $('#tabel_defect_body').html(defect)
            $('#tabel_inspector_body').html(inspector)
            
            $(function () {
                $("#tabel_inspection").DataTable({
                    dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "destroy":true,
                    "retrieve": true,
                    "processing":true,
                    "oLanguage": {
                        sProcessing: "<img src='<?php echo base_url();?>template/images/adidas_data/loading.gif'>"
                    },
                }).columns.adjust().draw();
                $("#tabel_defect").DataTable({
                    dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "destroy":true,
                    "retrieve": true,
                    "processing":true,
                    "oLanguage": {
                        sProcessing: "<img src='<?php echo base_url();?>template/images/adidas_data/loading.gif'>"
                    },
                }).columns.adjust().draw();
                $("#tabel_inspector").DataTable({
                    dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "destroy":true,
                    "retrieve": true,
                    "processing":true,
                    "oLanguage": {
                        sProcessing: "<img src='<?php echo base_url();?>template/images/adidas_data/loading.gif'>"
                    },
                }).columns.adjust().draw();
            });
          }
        })
    }

   
    $(document).on('click','#cari_data',function(){
        var frm    = $('#from').val()
        var t      = $('#to').val()
        $('#tabel_defect').DataTable().clear();
        $('#tabel_defect').DataTable().destroy();

        $('#tabel_inspection').DataTable().clear();
        $('#tabel_inspection').DataTable().destroy();

        $('#tabel_inspector').DataTable().clear();
        $('#tabel_inspector').DataTable().destroy();
        report(frm, t)
    })

    $(document).ready(function(){
        var from    = $('#from').val()
        var to      = $('#to').val()

        report(from, to)
    })

</script>