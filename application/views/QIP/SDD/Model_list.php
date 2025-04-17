<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/image_drag.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" /> 
<link rel="stylesheet" href="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.min.css">


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
                <table class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>Total PO</th>
                            <th>Total Qty</th>
                            <th>Total Output</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_model_qty2">
                     
                    </tbody>
                </table>
                <table class="table table-bordered  table-striped" id="tabel_model">
                        <thead class="bg-dark">
                            <tr>
                                
                                <!-- <td>SDD</td> -->
                                <td>Model Name</td>
                                <td>Total PO</td>
                                <td>All PO Qty</td>
                                <td>Output</td>
                                <td>Bal</td>
                            </tr>
                        </thead>
                        <tbody id="tabel_model2">

                        </tbody>
                    </table>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</section>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_po">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">PO List Model <span id="models_name"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tabel_po_qty">
                    <thead class="bg-dark">
                        <tr>
                            <th>Total PO</th>
                            <th>Total Qty</th>
                            <th>Total Output</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_po_qty2">
                    </tbody>
                </table>
                
                <table class="table table-bordered table-striped" id="tabel_po">
                    <thead class="bg-dark">
                        <tr>
                            <th>SDD</th>
                            <th>QTY PO</th>
                            <th>OUTPUT QTY</th>
                            <th>Bal</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_po2">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<!-- /.content -->
<script type="text/javascript" src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
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
<script type="text/javascript" src="<?php echo base_url();?>template/new_js/sweetalert2/sweetalert2.all.min.js"></script>


<script>
//   function list_sdd(){
//       $.ajax({
//           type      : "POST",
//           url       : "<?php echo site_url('C_SDD_Report/list_SDD')?>", 
//           dataType  : "JSON",
//           success: function(data)
//           {
//               var html = ''
//               var i, c
//               console.log(data.list)
            
//               for(c=0; c<data.length; c++){
//                   html +='<button type="button" class="btn btn-block btn-primary button_sdd" id="button_sdd" data-sdd="'+data[c].ZHSDD+'">'+data[c].ZHSDD+'</button>'
//               }
//               $('#list_SDD').html(html);
//           }
//       })
//     }

    function list_model(){
      $.ajax({
          type      : "POST",
          url       : "<?php echo site_url('C_SDD_Report/model_list')?>", 
          dataType  : "JSON",
          success: function(data)
          {
              var html          = ''
              var html1         = ''
              var total_po      = 0
              var total_qty     = 0
              var output        = 0
                  
              var i, c
              console.log(data)
            
                
              for(c=0; c<data.length; c++){
                  var qty_po  = parseInt(data[c].QTY_PO)
                  var qty_out = parseInt(data[c].OUTPUT_QTY)
                  html += '<tr>'+
                            '<td class="bg-blue model_detail" data-model="'+data[c].MODEL_NAME+'" data-qty_po="'+data[c].NO_PO+'"">'+data[c].MODEL_NAME+'</td>'+
                            '<td>'+data[c].NO_PO+'</td>'+
                            '<td>'+qty_po.toLocaleString("en-US")+'</td>'+
                            '<td>'+qty_out.toLocaleString("en-US")+'</td>'+
                            '<td>'+(data[c].QTY_PO - data[c].OUTPUT_QTY).toLocaleString("en-US")+'</td>'+
                          '</tr>'
                  total_qty = total_qty + parseInt(data[c].QTY_PO)
                  output    = output + parseInt(data[c].OUTPUT_QTY)
                  total_po  = total_po + parseInt(data[c].NO_PO) 
              }
              html1 += '<tr>'+
                            '<td>'+total_po.toLocaleString("en-US")+'</td>'+
                            '<td>'+total_qty.toLocaleString("en-US")+'</td>'+
                            '<td>'+output.toLocaleString("en-US")+'</td>'+
                            '<td>'+(total_qty-output).toLocaleString("en-US")+'</td>'+
                        '</tr>'

              
              $('#sdd').html(data[0].ZHSDD)
              $('#tabel_model2').html(html);
              $('#tabel_model_qty2').html(html1);
           
              $(function () {
                  $("#tabel_model").DataTable({
                      "responsive": true, 
                      "lengthChange": false, 
                      "autoWidth": false,
                      "paging": false,
                      "bDestroy": true,
                      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                  })
              });
          }
      })
    }


    function list_po(model, qty){
      $.ajax({
          type      : "POST",
          url       : "<?php echo site_url('C_SDD_Report/model_list_po')?>", 
          dataType  : "JSON",
          data      : {model:model},
          success: function(data)
          {
              var html      = ''
              var html1     = ''
              var total_po  = 0
              var total_qty = 0
              var output    = 0
                  
              var i, c
              console.log(data)
            

              for(c=0; c<data.length; c++){
                  var qty_po  = parseInt(data[c].QTY_PO)
                  var qty_out = parseInt(data[c].OUTPUT_QTY)
                  html += '<tr>'+
                            '<td>'+data[c].ZHSDD+'</td>'+
                            '<td>'+qty_po.toLocaleString("en-US")+'</td>'+
                            '<td>'+qty_out.toLocaleString("en-US")+'</td>'+
                            '<td>'+(data[c].QTY_PO - data[c].OUTPUT_QTY).toLocaleString("en-US")+'</td>'+
                          '</tr>'
                  total_qty = total_qty + parseInt(data[c].QTY_PO)
                  output    = output + parseInt(data[c].OUTPUT_QTY)
              }
              total_po = data.length
              html1 += '<tr>'+
                            '<td>'+qty+'</td>'+
                            '<td>'+total_qty.toLocaleString("en-US")+'</td>'+
                            '<td>'+output.toLocaleString("en-US")+'</td>'+
                            '<td>'+(total_qty-output).toLocaleString("en-US")+'</td>'+
                        '</tr>'
              $('#models_name').html(model)
              $('#tabel_po2').html(html);
              $('#tabel_po_qty2').html(html1);
              $(function () {
                  $("#tabel_po").DataTable({
                      "responsive": true, 
                      "lengthChange": false, 
                      "autoWidth": false,
                      "paging": false,
                      "bDestroy": true,
                      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                  });
              });
          }
      })
    }

   
    // $(document).on('click','.model_detail',function(){
    $('#tabel_model').on('click', '.model_detail', function(){
        var model   = $(this).data("model");
        var qty     = $(this).data("qty_po");
        $('#modal_po').modal('show');
        list_po(model, qty);
    })


    $('#modal_model').on('hidden.bs.modal', function () {
        $('#tabel_model').dataTable().fnDestroy();
        // $(".modal-header").html("");
        // document.getElementById("sdd").reset()
    });

    $('#modal_po').on('hidden.bs.modal', function () {
        $('#tabel_po').dataTable().fnDestroy();
        // $(".modal-header").html("");
        
    });

    $(document).ready(function(){
        list_model()
    })

</script>