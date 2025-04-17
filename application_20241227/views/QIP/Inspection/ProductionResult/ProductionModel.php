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
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="col-sm-5">
                        <select name="factory" id="factory" class="form-control">
                            <option value="A1">Building A1</option>
                            <option value="B1">Building B1</option>
                            <option value="C1">Building C1</option>
                            <option value="D1">Building D1</option>
                            <option value="D2">Building D2</option>
                            <option value="E1">Building E1</option>
                            <option value="E2">Building E2</option>
                            <option value="H3">Building H1</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-block btn-primary" id="loadData">Load Data</button>
                    </div>
                </div>
                <hr>
                <div class="row">
               
                </div>
               <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered" id="" style="width:100%">
                            <thead>
                                <tr class="table-primary">
                                    <th>Building <span id="gedung"></span></th>
                                    <th>Target Out</th>
                                    <th>Actual Out</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_building">

                            </tbody>
                        </table>
                        <table class="table table-bordered table-striped" id="tabel_model" style="width:100%">
                            <thead class="thead-dark text-white" style="background: #304142">
                                <tr>
                                    
                                    <!-- <td>SDD</td> -->
                                    <td>Cell Code</td>
                                    <td>Model Name</td>
                                    <td>Target/hour</td>
                                    <td>Avg/hour</td>
                                    <td>Target Out</td>
                                    <td>Actual Out</td>
                                    <td>%</td>
                                </tr>
                            </thead>
                            <tbody id="tabel_model_body">

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
</section>

<!-- /.content -->
<!-- <script type="text/javascript" src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/export-data.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/highcharts/accessibility.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/new_js/datatable/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.all.min.js"></script> -->

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
    function list_prodModel(tanggal, factory){
      $.ajax({
          type      : "POST",
          url       : "<?php echo site_url('C_ProductionByModel/ProdResult')?>", 
          dataType  : "JSON",
          data      : {tanggal:tanggal, factory:factory},
          success: function(data)
          {
              var html      = ''
              var html1     = ''
              var total_po  = 0
              var total_qty = 0
              var output    = 0
              var target    = 0
                  
              var i, c
              console.log(data)
            

              for(c=0; c<data.length; c++){
                
                  html += '<tr>'+
                            '<td>'+data[c].CELL_CODE+'</td>'+
                            '<td>'+data[c].MODEL_NAME+'</td>'+
                            '<td>'+data[c].TRGT_PER_HOUR+'</td>'+
                            '<td>'+data[c].AVG_PER_HOUR+'</td>'+
                            '<td>'+data[c].TARGET_OUTPUT+'</td>'+
                            '<td>'+data[c].ACTUAL_OUTPUT+'</td>'+
                            '<td>'+data[c].PERSENTASE+'%</td>'+
                  '</tr>'
                
              }

              output = ((data[0].ACTUAL_FAC/data[0].TARGET_FAC)*100).toFixed(2)
              html1 += '<tr>'+
                        '<td>'+factory+'</td>'+
                        '<td>'+data[0].TARGET_FAC.toLocaleString("en-US")+'</td>'+
                        '<td>'+data[0].ACTUAL_FAC.toLocaleString("en-US")+'</td>';
              if(output < 95){
                    html1 += '<td class="bg-danger">'+output+' %</td>';
              }else if(output>=95){
                    html1 += '<td class="bg-warning">'+output+' %</td>';
              }else if(output=100){
                    html1 += '<td class="bg-success">'+output+' %</td>';
              }
            
              html1 += '</tr>'

            $('#tabel_model_body').html(html)
            $('#tabel_building').html(html1)
            
            $(function () {
                $("#tabel_model").DataTable({
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
                    // "scrollY": 400,
                    // "scrollX": true,
                    // "scrollCollapse": true
                }).columns.adjust().draw();
            });
          }
        })
    }

   
    $(document).on('click','#loadData',function(){
        var tgl = $('#tanggal').val()
        var fac = $('#factory').val()
        $('#tabel_model').DataTable().clear();
        $('#tabel_model').DataTable().destroy();
        list_prodModel(tgl, fac)
        // alert('haha')

    })

    $(document).ready(function(){
        var tanggal = $('#tanggal').val()
        var factory = $('#factory').val()

        list_prodModel(tanggal, factory)

      
    })

</script>