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
               <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered table-striped" id="tabel_report" style="width:100%">
                            <thead id="head_tabel_report" class="thead-dark text-white" style="background: #304142">
                               
                            </thead>
                            <tbody id="tabel_report_body">

                            </tbody>
                        </table>
                    </div>
                    <div class="loading">
                        <img class="loading-image" src="<?php echo base_url();?>template/images/spinner.gif" alt="Loading..." />
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
          url       : "<?php echo site_url('C_AqlReport/SummaryReport')?>", 
          dataType  : "JSON",
          beforeSend: function () {
            $('.loading').show();
          },
          data      : {from:from, to:to},
          success: function(data)
          {
            $('.loading').hide();
              var html      = ''
              var head      = ''
              var html1     = ''
              var total_po  = 0
              var total_qty = 0
              var output    = 0
              var target    = 0
              var defect    = 0
                  
              var i, c, h, j, defect
              console.log(data)

              head += ' <tr>'+
                                    '<th>No</th>'+
                                    '<th>Month</th>'+
                                    '<th>Inspect Date</th>'+
                                    '<th>Submit Date</th>'+
                                    '<th>Building</th>'+
                                    '<th>Cell</th>'+
                                    '<th>PO#</th>'+
                                    '<th>Sending Status</th>'+
                                    '<th>Qty</th>'+
                                    '<th>Partial</th>'+
                                    '<th>Dest</th>'+
                                    '<th>Model</th>'+
                                    '<th>Gender</th>'+
                                    '<th>Article</th>'+
                                    '<th>Random Qty</th>'+
                                    '<th>Result</th>'+
                                    '<th>Inspection Sequence</th>'+
                                    '<th>AQL Inspector</th>'+
                                    '<th class="bg-success">Minor</th>'+
                                    '<th class="bg-warning">Major</th>'+
                                    '<th class="bg-danger">Critical</th>'+
                                    '<th class="bg-primary">Total Defect</th>'

                for(h=0; h<data.defect.length; h++){
                    head +=  '<th>'+data.defect[h].DEFECT+'</th>'
                
                }
                head += '</tr>'
            

              for(c=0; c<data.data.length; c++){
                  defect = data.data[c].MINOR + data.data[c].MAJOR + data.data[c].CRITICAL
                  html += '<tr>'+
                            '<td>'+(c+1)+'</td>'+
                            '<td>'+data.data[c].MONTH+'</td>'+
                            '<td>'+data.data[c].INSPECT_DATE+'</td>'+
                            '<td>'+data.data[c].SUBMIT_DATE+'</td>'+
                            '<td>'+data.data[c].BUILDING+'</td>'+
                            '<td>'+data.data[c].CELL+'</td>'+
                            '<td>'+data.data[c].PO_NO+'</td>'+
                            '<td>'+data.data[c].SENDING_STATUS+'</td>'+
                            '<td>'+data.data[c].PARTIAL_QTY+'</td>'+
                            '<td>'+data.data[c].PARTIAL+'</td>'+
                            '<td>'+data.data[c].DEST+'</td>'+
                            '<td>'+data.data[c].MODEL+'</td>'+
                            '<td>'+data.data[c].GENDER+'</td>'+
                            '<td>'+data.data[c].ARTICLE+'</td>'+
                            '<td>'+data.data[c].RANDOM_QTY+'</td>'+
                            '<td>'+data.data[c].RESULT+'</td>'+
                            '<td>'+data.data[c].INSPECTION_SEQUENCE+'</td>'+
                            '<td>'+data.data[c].INSPECTOR+'</td>'+
                            '<td>'+data.data[c].MINOR+'</td>'+
                            '<td>'+data.data[c].MAJOR+'</td>'+
                            '<td>'+data.data[c].CRITICAL+'</td>'+
                            '<td>'+defect+'</td>';
                            for(h=0; h<data.defect.length; h++){
                                defect = data.defect[h].DEFECT
                                html += '<td>'+data.data[c][defect]+'</td>'
                            }
                            // '<td>'+data.data[c].Contamination+'</td>'+
                            // '<td>'+data.data[c].Bonding+'</td>'+
                            // '<td>'+data.data[c].Over_Cement+'</td>'+
                            // '<td>'+data.data[c].Poor_Shape+'</td>'+
                            // '<td>'+data.data[c].Off_Center+'</td>'+
                            // '<td>'+data.data[c].Thread_End+'</td>'+
                            // '<td>'+data.data[c].Delamination+'</td>'+
                            // '<td>'+data.data[c].Miss_Matching+'</td>'+
                            // '<td>'+data.data[c].Odd_Pairs+'</td>'+
                            // '<td>'+data.data[c].OTHER+'</td>'+
                            // '<td>'+data.data[c].DEFECT_INTERNAL+'</td>'+
                            // '<td>'+data.data[c].NAMA+'</td>'+
                  html += '</tr>'
                
              }

            
            $('#head_tabel_report').html(head)
            $('#tabel_report_body').html(html)
            
            $(function () {
                $("#tabel_report").DataTable({
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
                    "responsive": true,
                    "destroy":true,
                    "retrieve": true,
                    "processing":true,
                    "oLanguage": {
                        sProcessing: "<img src='<?php echo base_url();?>template/images/adidas_data/loading.gif'>"
                    },
                    // "scrollY": 400,
                    // "scrollX": true,
                    // "scrollCollapse": true
                }).columns.adjust().draw();
            });
          }
        })
    }

   
    $(document).on('click','#cari_data',function(){
        var frm    = $('#from').val()
        var t      = $('#to').val()
        $('#tabel_report').DataTable().clear();
        $('#tabel_report').DataTable().destroy();
        report(frm, t)
    })

    $(document).ready(function(){
        var from    = $('#from').val()
        var to      = $('#to').val()

        report(from, to)
    })

</script>