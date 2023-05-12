<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<style>
td textarea 
{
    width: 100%;
    height: 100%

}
</style>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="col-md-12">
            
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">PO General Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal">
                <div class="card-body">
                <!-- <div class="col-sm-6"> -->
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">PO NO</label>
                        <div class="input-group input-group col-sm-10">
                          <input type="text" class="form-control" name="STAGE" id="STAGE" value="2"hidden>
                          <input type="text" class="form-control" name="PO_NO1" id="PO_NO1">
                          <span class="input-group-append">
                              <button type="button" class="btn btn-info btn-flat" id="btnGo">Go!</button>
                          </span>
                        </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">STYLE</label>
                    <div class="col-sm-10 input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Enter ..." name="PO_NO" id="PO_NO" hidden>
                      <input type="text" class="form-control" placeholder="Enter ..." name="style" id="style" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ARTICLE</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="article" id="article" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SDD</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="SDD" id="SDD" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SHIP DATE</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="ship_date" id="ship_date" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SHIP OUT</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="ship_out" id="ship_out" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">GENDER</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="gender" id="gender" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">CUSTOMER NO</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="customer_no" id="customer_no" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">DESTINATION</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="destination" id="destination" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">QTY</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="qty" id="qty" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">CARTON BAL</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" placeholder="Enter ..." name="carton_bal" id="carton_bal" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">CELL</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" id="cell" name="cell" placeholder="Enter..." readOnly>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">TQC Inspected</label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <input type="text" class="form-control" id="tqc_inspected" name="tqc_inspected" placeholder="Enter..." readOnly>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> 
                        <!-- <button type='button' class='btn btn-block btn-warning btn-sm' id='pendingSubmit'>Pending Submit</button><br> -->
                        <button type='button' class='btn btn-block btn-danger btn-sm clear_textarea' id='clear_textarea'>Delete&nbsp&nbsp&nbsp</button>
                    </label>
                    <div class="col-sm-10 input-group input-group-sm">
                      <textarea class="form-control" rows="3" placeholder="" id="textarea_clear">
Inspector : 
Booking Comment : 
Inspect Qty : 
                      </textarea>
                    </div>
                    
                   
                  <!-- </div> -->
                  </div>
                </div>
                <!-- /.card-body -->
               
                <!-- /.card-footer -->
              </form>
               
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">PO Lab Test Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="result">
                  <!-- <iframe name="lab_result" id="lab_result" type="application/pdf" style="width: 100%; height: 500px; padding: 0;"></iframe> -->
              </div>
              
            </div>

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Top 5 Defect per Area</h3>
              </div>
              <!-- /.card-header -->
             
              <div class="row">
                  <div class="col-sm-3">
                    <div class="card-body" id="chart_inline"></div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card-body" id="chart_rework"></div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card-body" id="chart_endline"></div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card-body" id="chart_aql"></div>
                  </div>
              </div>
            </div>

         

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pivot88 Tracking</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Inspector</th>
                      <th>Scheduled Inspection Date</th>
                      <th>Inspection Result</th>
                      <th>Approval Status</th>
                      <th>Report Type</th>
                      <th>PO #</th>
                      <th>Submitted Inspection Date</th>
                      <th>Qty Inspected</th>
                      <th>PO Line Qty</th>
                      <th>Group</th>
                      <th>SKU Name</th>
                      <th>Defect Rate</th>
                      <th>Article</th>
                      <th>Link</th>
                    </tr>
                  </thead>
                  <tbody id="pivot88tracking">
                      
                  </tbody>
                </table>
                
              </div>
            </div>
            <!-- /.card -->
            <!-- <div class="col-md-12"> -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Partial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                    <div class="card-body">
                <!-- <form role="form"> -->
                      <div class="row">
                          <div class='col-md-3'>
                              <div class="form-group">
                                <label>Partial No</label>
                                <input type='text' class='form-control' id="partNo" name="partNo">
                              </div>
                          </div>
                          <div class='col-md-3'>
                              <div class="form-group">
                                <label>Partial Qty</label>
                                <input type='text' class='form-control' placeholder='' id="partQty" name="partQty">
                              </div>
                          </div>
                          <div class='col-md-1'>
                              <div class="form-group">
                                <label>Level</label>
                                <input type='text' class='form-control' placeholder='' id="level" name="level" value='II' readOnly>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group date" data-provide="datepicker" id="datepicker">
                                  <label>Inspect Date</label>
                                  <input type="text" class="form-control" id="inspectDate" name="inspectDate" autocomplete="off">
                                  <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-th"></span>
                                  </div>
                              </div>
                          </div>
                          <div class='col-md-2'>
                              <div class="form-group">
                                  <label>	&nbsp	&nbsp	&nbsp	&nbsp </label>
                                <button type='button' class='btn btn-info btn-block submitPartial' id='submitPartial'>Submit Partial</button>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" style="width:100%">
                        <thead>                  
                          <tr>
                            <th style="text-align:center">PO Number</th>
                            <th style="width: 30px" >Partial No</th>
                            <th style="text-align:center">Qty</th>
                            <th style="text-align:center">Inspect Date</th>
                            <th style="text-align:center">Inspector</th>
                            <th style="text-align:center">Seq Inspect</th>
                            <th style="text-align:center">Last Status</th>
                            <th style="text-align:center">Action</th>
                          </tr>
                        </thead>
                        <tbody id="showData">
                          
                        </tbody>
                      </table>
                   </div>
                   <div class="card-body">
                    <form id="formRandom" action="" method="POST" >
                      <div class="row" id="randomTable" >
                      
                            
                        
                      
                      </div>
                    </form>
                  </div>
              <!-- </form> -->
              <!--div class="row">
              <div class="card-body" id="show_data">
                
                </div>
              </div-->
             <right> <div id="tombolSave"></div></right>
            </div>
           
            </div>
            <!-- /.card -->

           
           
                
              
             
          <!-- right column -->
          
            <!-- general form elements disabled -->
          
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                        <label class="col-md-2 col-form-label">PONO</label>
                            <div class="col-md-10">
                              <input type="text" name="PO_NO_edit" id="PO_NO_edit" class="form-control" placeholder="Product Code" readOnly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Partial</label>
                            <div class="col-md-6">
                              <input type="text" name="partial_edit" id="partial_edit" class="form-control" placeholder="Partial No" readOnly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Qty</label>
                            <div class="col-md-6">
                              <input type="text" name="qty_edit" id="qty_edit" class="form-control" placeholder="Qty Partial">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Level</label>
                            <div class="col-md-6">
                              <input type="text" name="level_edit" id="level_edit" class="form-control" placeholder="Qty Partial" value='II' readOnly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Inspector</label>
                            <div class="col-md-6">
                              <input type="text" name="Inspector_edit" id="Inspector_edit" class="form-control" placeholder="Inspector" readOnly>
                            </div>
                        </div>
                        <!--div class="form-group row">
                          <label class="col-md-2 col-form-label">Inspector</label>
                              <div class="col-md-6">
                                  <select name="Inspector_edit" id="Inspector_edit" class="form-control" tabindex="1">
                              <?php 
                                for($i=0;$i<count($inspector);$i++){
                                  if($inspector[$i]['USERNAME']== $row['USERNAME']){
                                    echo "<option value='".$inspector[$i]['USERNAME']."' selected>".$inspector[$i]['USERNAME']."</option>";
                                  }else{
                                    echo "<option value='".$inspector[$i]['USERNAME']."' >".$inspector[$i]['USERNAME']."</option>";
                                  }
                                }
                              ?>
                                  </select>
                              </div>
                      </div-->
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Inspect Date</label>
                            <div class="col-md-6">
                              <input type="text" name="date_edit" id="date_edit" class="form-control" placeholder="Inspect Date">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
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
                      <table class="table table-bordered" >
                          <thead>
                            <th>PO NO</th>
                            <th>PARTIAL</th>
                            <th>SEQ INSPECT</th>
                            <th>LEVEL</th>
                            <th>INSPECTOR</th>
                            <th>INSPECT DATE</th>
                            <th>STATUS INSPECT</th>
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
        
 



    </section>
    <!-- /.content -->
    
<!-- Scripts -->
<script type="text/javascript" src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  function removeWhereCondition()
  {
      $(this).closest("tr").remove();
  }

$.fn.datepicker.defaults.format = "yyyymmdd";
$('#datepicker').datepicker({
    startDate: '-90d',
    todayHighlight: true,autoclose: true,
});

$('#sandbox-container input').datepicker({ 
 });


  var total_amount = function(){
    var sum = 0;
    $('.amount').each(function(){
        var num = $(this).val();

        if(num != 0){
          sum = sum + parseInt(num);
        }
    });
    // $('#total_amount').val(sum);
    document.getElementById("total_amount").innerHTML = "Total Qty Inspected = " + sum;
    console.log(sum);
  }

</script>

<script>
  
  function DeleteRandom(i) { 
    var row = '#row'+i                        
    $(row).remove();
    total_amount();
  }


   
  $(document).ready(function(){
    
    var PO_NO  = $('#PO_NO1').val();
    var FLAG   = '1';
  
    function reload_random(){
        randomTable.ajax.reload(null, false);
    }

    function chart_inline(PO_NO){
            $.ajax({
                url: '<?php echo site_url('C_pivot_aql/chart_inline/');?>',
                type: "POST",
                dataType : 'html',
                data: {PO_NO:PO_NO},
                success: function (data) {
                    $("#chart_inline").append(data);
                }
            });
    }

    function chart_rework(PO_NO){
            $.ajax({
                url: '<?php echo site_url('C_pivot_aql/chart_rework/');?>',
                type: "POST",
                dataType : 'html',
                data: {PO_NO:PO_NO},
                success: function (data) {
                    $("#chart_rework").append(data);
                }
            });
    }

    function chart_endline(PO_NO){
            $.ajax({
                url: '<?php echo site_url('C_pivot_aql/chart_endline/');?>',
                type: "POST",
                dataType : 'html',
                data: {PO_NO:PO_NO},
                success: function (data) {
                    $("#chart_endline").append(data);
                }
            });
    }

    function chart_aql(PO_NO){
            $.ajax({
                url: '<?php echo site_url('C_pivot_aql/chart_aql/');?>',
                type: "POST",
                dataType : 'html',
                data: {PO_NO:PO_NO},
                success: function (data) {
                    $("#chart_aql").append(data);
                }
            });
    }

    function pivot88_tracking(PO_NO){
      $.ajax({
          url       : "<?php echo site_url('C_pivot_aql/get_po_pivot/');?>",
          type      : "POST",
          responsive: true,
          async     : true,
          dataType  : 'json',
          data      : {PO_NO:PO_NO},
          success   : function(data)
          {
                var html = '';
                var tombol = '';
                var i;
                html +='heheheh'
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+ data[i].inspector.name+'</td>'+
                            '<td>'+ data[i].date_inspection+'</td>'
                    if(data[i].assignments_items[i].inspection_result_text ==='Pass'){
                        html += '<td bgcolor="#00FF00">'+ data[i].assignments_items[i].inspection_result_text+'</td>'
                    }else{
                        html += '<td bgcolor="#FF0000">'+ data[i].assignments_items[i].inspection_result_text+'</td>'
                    }
                    
                    if(data[i].assignments_items[i].inspection_status_text === 'Accepted'){
                        html += '<td bgcolor="#00FF00">'+ data[i].assignments_items[i].inspection_status_text+'</td>'
                    }else{
                        html += '<td bgcolor="#FFA500">'+ data[i].assignments_items[i].inspection_status_text+'</td>'
                    }
                            
                    html +='<td>'+ data[i].report_type.name+'</td>'+
                           '<td>'+ data[i].assignments_items[i].po_line.po.po_number+'</td>'+
                           '<td>'+ data[i].assignments_items[i].inspection_completed_date+'</td>'+
                           '<td>'+ data[i].assignments_items[i].po_line.qty+'</td>'+
                           '<td>'+ data[i].assignments_items[i].qty_inspected+'</td>'+
                           '<td>'+ data[i].id+'</td>'+
                           '<td>'+ data[i].assignments_items[i].po_line.sku.item_name+'</td>'+
                           '<td>Defect Rate</td>'+
                           '<td>'+ data[i].assignments_items[i].po_line.sku.sku_attribute2+'</td>'+
                           '<td>View</td>'+
                           '</tr>'
                   
                    $('#pivot88tracking').html(html);
                }

                
            }

        })
    }

    function show_product(PO_NO_){
      // var PO_NO_ = $('#PO_NO1').val();
      $.ajax({
          type    : 'ajax',
          url     : "<?php echo site_url('C_aql_pivot/list_partial/');?>",
          async   : true,
          dataType: 'json',
          type    : 'POST',
          data    : {PO_NO_:PO_NO_},
          success : function(data){
              var html = '';
              var i;
              html +='<tr><td colspan="8" bgcolor="aquamarine"> Inspection Inspector</td> </tr>';
              for(i=0; i<data.length; i++){
                if ((data[i].LEVEL == 'II') && (data[i].LEVEL_USER == '2')){
                  html += '<tr>'+
                            '<td>'+data[i].PO_NO+'</td>'+
                            '<td name="partial_">'+data[i].PARTIAL+'</td>'+
                            '<td name="qty_partial_">'+data[i].QTY+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECT_DATE+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECTOR+'</td>';
                  
                  if(!data[i].BANYAK){
                    html += '<td></td>';
                  }else{
                    html += '<td><a href="javascript:void(0);" class="view_detail" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">'+data[i].BANYAK+'</a></td>';
                  }
                  if(data[i].INSPECT_RESULT=='N'){
                    html += '<td style="color:red"><b>REJECT</td>';
                  }else if(data[i].INSPECT_RESULT=='Y'){
                    html += '<td style="color:green"><b>RELEASE</td>';
                  }else if(!data[i].INSPECT_RESULT){
                    html += '<td style="color:green"><b></td>';
                  }
                      
                  if(data[i].LEVEL_USER == data[i].LEVEL_NOW){
                      
                      html +='<td style="text-align:right;">'
                      if((data[i].STAGE !== null) && (data[i].STAGE !== '4')){
                          html += '<a href="javascript:void(0);" class="btn btn-danger btn-sm goToPage"  data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK="'+data[i].REMARK+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL="'+data[i].LEVEL+'" data-STAGE="'+data[i].STAGE+'">Pending Submit</a>'+'  '
                      }
                          
                          html += '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                          '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_random" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'">Random</a>'+
                      '</td>';
                    }else{
                  html += '<td></td>'
                }
                  html +='</tr>';
                  
                }
              }
              html +='<tr><td colspan="8" bgcolor="palegreen"> Inspection Third Party</td> </tr>';
              for(i=0; i<data.length; i++){
                if ((data[i].LEVEL == 'II') && (data[i].LEVEL_USER == '3')){
                  html += '<tr>'+
                            '<td>'+data[i].PO_NO+'</td>'+
                            '<td name="partial_">'+data[i].PARTIAL+'</td>'+
                            '<td name="qty_partial_">'+data[i].QTY+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECT_DATE+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECTOR+'</td>';
                  
                  if(!data[i].BANYAK){
                    html += '<td></td>';
                  }else{
                    html += '<td><a href="javascript:void(0);" class="view_detail" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK="'+data[i].REMARK+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">'+data[i].BANYAK+'</a></td>';
                  }
                  if(data[i].INSPECT_RESULT=='N'){
                    html += '<td style="color:red"><b>REJECT</td>';
                  }else if(data[i].INSPECT_RESULT=='Y'){
                    html += '<td style="color:green"><b>RELEASE</td>';
                  }else if(!data[i].INSPECT_RESULT){
                    html += '<td style="color:green"><b></td>';
                  }
                      
                  if(data[i].LEVEL_USER == data[i].LEVEL_NOW){
                      
                      html +='<td style="text-align:right;">'+
                          '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                          '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_random" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'">Random</a>'+
                      '</td>';
                    }else{
                  html += '<td></td>'
                }
                  html +='</tr>';
                  
                }
              }
              html +='<tr><td colspan="8" bgcolor="turquoise">Inspection Validator</td> </tr>';
              for(i=0; i<data.length; i++){
               
                if (data[i].LEVEL == 'S4'){
                  html += '<tr>'+
                            '<td>'+data[i].PO_NO+'</td>'+
                            '<td name="partial_">'+data[i].PARTIAL+'</td>'+
                            '<td name="qty_partial_">'+data[i].QTY+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECT_DATE+'</td>'+
                            '<td name="inspect_date">'+data[i].INSPECTOR+'</td>';
                  
                  if(!data[i].BANYAK){
                    html += '<td></td>';
                  }else{
                    html += '<td><a href="javascript:void(0);" class="view_detail"  data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">'+data[i].BANYAK+'</a></td>';
                  }
                  if(data[i].INSPECT_RESULT=='N'){
                    html += '<td style="color:red"><b>REJECT</td>';
                  }else if(data[i].INSPECT_RESULT=='Y'){
                    html += '<td style="color:green"><b>RELEASE</td>';
                  }else if(!data[i].INSPECT_RESULT){
                    html += '<td style="color:green"><b></td>';
                  }
                      
                  if(data[i].LEVEL_USER == data[i].LEVEL_NOW){
                      
                      html +='<td style="text-align:right;">'+
                          '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                          '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_random" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'">Random</a>'+
                      '</td>';
                    }else{
                  html += '<td></td>'
                }
                  html +='</tr>';
                  
                }

                

              }
              $('#showData').html(html);
          }
        });
    }

    function lab_result(PO_NO){
     
        var html ='';
        html += '<iframe src="http://10.10.10.98/qip/apps/?r=site/page&view=aql&po='+PO_NO+'&art=&search=Search+PO" type="application/pdf" style="width: 100%; height: 350px; padding: 0;"></iframe>';
        // var url = 'http://10.10.10.98/qip/apps/?po='+PO_NO+'&art=&search=Search+PO';
        
        // $('#lab_result').attr('src', url);
        $('#result').html(html); 
        console.log(html) 
    }

    function display_detailPO(PO_NO){
      $.ajax({
          type    : 'ajax',
          url     : "<?php echo site_url('C_pivot_aql/get_data_po/'); ?>"+$('#PO_NO1').val(),
          dataType: "json",
          success : function(o) {
              console.log(o)
              if(o.status=='ok'){
              var data = o.dataPO;
                  $('#PO_NO').val(data.VBELN);
                  $('#style').val(data.STYLE);
                  $('#article').val(data.ARTICLE);
                  $('#SDD').val(data.SDD);
                  $('#ship_date').val(data.SHIP_DATE);
                  $('#ship_out').val(data.SHIP_OUT);
                  $('#gender').val(data.J_3APGNR);
                  $('#customer_no').val(data.CUSTNO);
                  $('#destination').val(data.DUST);
                  $('#qty').val(data.KWMENG);
                  $('#carton_bal').val(data.CARTON_BALANCE);
                  $('#remark').val(data.REMARK);
                  $('#cell').val(data.CELL);
                  $('#tqc_inspected').val(data.TQC_INSPECTED);
                  show_product(PO_NO);
                  lab_result(PO_NO);
              }else{
                  $('#PO_NO').val('');
                  $('#style').val('');
                  $('#article').val('');
                  $('#SDD').val('');
                  $('#ship_date').val('');
                  $('#ship_out').val('');
                  $('#gender').val('');
                  $('#customer_no').val('');
                  $('#destination').val('');
                  $('#qty').val('');
                  $('#carton_bal').val(''); 
                  $('#remark').val(''); 
                  $('#cell').val(''); 
                  $('#tqc_inspected').val('');
              }
          },
          error : function(data) {
              console.log(data)
          }
      });

    }


    function tableRandom(PO_NO,PARTIAL,LEVEL, QTY){
        $.ajax({
          url       : "<?php echo site_url('C_aql_pivot/aql_carton_cek_/');?>",
          type      : 'post',
          responsive: true,
          async     : true,
          dataType  : 'json',
          data      : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL},
          success   : function(data)
          {
                var html = '';
                var tombol = '';
                var i;
                html +='<form id="formRandom" action="" method="POST" >'
                html +='<table id="table" class="table table-bordered"  >'
                html +='<thead>'
                html +='<tr>'
               
                html +='<th scope="col" style="width: 100px">Carton Number</th>'
                html +='<th scope="col" style="width: 100px">Carton Qty</th>'
                html +='<th scope="col" style="width: 100px">Size</th>'
                html +='<th scope="col" style="width: 100px">Qty</th>'
                html +='<th scope="col" style="width: 100px">Action</th>'
                html +='</tr>'
                html +='</thead>'
                html +='<tbody>'
                html +='<div id="example">'
                html += '<tr id="row0">'+
                                '<td hidden><input type="hidden" name="STAGE" value="2"><input type="hidden" name="PO[]" id="PO[]"  value="'+data[0].PO_NO+'" readOnly>'+data[0].PO_NO+'</td>'+
                                '<td hidden><input type="hidden" name="partial[]" id="partial[]" value="'+data[0].PARTIAL+'" readOnly>'+data[0].PARTIAL+'</td>'+
                                '<td hidden><input type="hidden" name="level[]" id="level[]" value="'+data[0].LEVEL+'" readOnly>'+data[0].LEVEL+'</td>'+
                                '<td style="height:400px" rowspan="'+data.length+'"><textarea name="ctn_no" id="ctn_no" value="'+data[0].CTN_NO+'">'+data[0].CTN_NO+'</textarea></td>'+
                                '<td style="height:400px" rowspan="'+data.length+'"><textarea name="ctn_qty" id="ctn_qty" value="'+data[0].CTN_QTY+'">'+data[0].CTN_QTY+'</textarea></td>'+
                                '<td><input type="text"  name="size[]" id="size[]" value="'+data[0].SIZE+'"></td>'+
                                '<td><input type="text" class="amount" name="qty[]" id="qty[]" value="'+data[0].QTY+'" ></td>';

                html +=         "<td><button type='button' class='btn btn-default btn-sm deleteRandom' onClick='DeleteRandom("+i+")' ><i class='far fa-trash-alt'></i></a></td>";
                html +=     '</tr>';
                for(i=1; i<data.length; i++){
                    html += '<tr id="row'+i+'">'+
                                '<td hidden><input type="hidden" name="PO[]" id="PO[]"  value="'+data[i].PO_NO+'" readOnly>'+data[i].PO_NO+'</td>'+
                                '<td hidden><input type="hidden" name="partial[]" id="partial[]" value="'+data[i].PARTIAL+'" readOnly>'+data[i].PARTIAL+'</td>'+
                                '<td hidden><input type="hidden" name="level[]" id="level[]" value="'+data[i].LEVEL+'" readOnly>'+data[i].LEVEL+'</td>'+
                                '<td><input type="text"  name="size[]" id="size[]" value="'+data[i].SIZE+'"></td>'+
                                '<td><input type="text" class="amount" name="qty[]" id="qty[]" value="'+data[i].QTY+'" ></td>';

                    html +=     "<td><button type='button' class='btn btn-default btn-sm deleteRandom' onClick='DeleteRandom("+i+")' ><i class='far fa-trash-alt'></i></a></td>";
                    html +=     '</tr>';
                      
                }
                
                html +='</div>'
                html +='</tbody>'
                
                html +='</table>'
                html +='</form>';

                html += '<span id="total_amount" class="total_amount" style="font-size: 150%;font-weight:bold"><b></b></span>';
                // html += '<label>Total Qty : </label><input type="text" class="total_amount" id="total_amount" readOnly>'
                tombol += '<button type="button" class="btn btn-success btn-block" name="randomRandom" id="randomRandom">Mulai Inspection </button>';
                
                $('#randomTable').html(html);
                $('#tombolSave').html(tombol);
                

                $('.amount').keyup(function(){
                    total_amount();
                })

                
            }

        });

      }

   
      

    function simpandata_random(){
      // var formData = new FormData($('#formRandom')[0]);
      var formData = new FormData(document.querySelector("#formRandom"));
      $.ajax({
          url : "<?php echo base_url();?>index.php/C_aql_pivot/insert_random",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
              // // cekdata()
              // // alert(data);
              // location.href = data.url;
              simpandata()
              // console.log(data)
          },
      });
    }

    function simpandata(){
      // var formData = new FormData($('#formRandom')[0]);
      var formData = new FormData(document.querySelector("#formRandom"));
      $.ajax({
          url : "<?php echo base_url();?>index.php/C_aql_pivot/save_first_data/",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
              // // cekdata()
              // // alert(data);
              location.href = data.url;
              // console.log(data)
          },
      });
    }
    
    $('#btnGo').on('click',function(){
        var PO_NO_ = $('#PO_NO1').val();
        display_detailPO(PO_NO_);
        pivot88_tracking(PO_NO_)
        chart_inline(PO_NO_)
        chart_rework(PO_NO_)
        chart_endline(PO_NO_)
        chart_aql(PO_NO_)

    });

    // $('.goToPage').on('click',function(){
    $(document).on('click','.goToPage',function(){
        var PO_NO       =  $(this).attr("data-PO_NO");
        var PARTIAL     =  $(this).attr("data-PARTIAL");
        var LEVEL       =  $(this).attr("data-LEVEL");
        var STAGE       =  $(this).attr("data-STAGE");
        var REMARK      =  $(this).attr("data-REMARK");
        var LEVEL_USER =  $(this).attr("data-LEVEL_USER");
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_pivot/go_page')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, STAGE:STAGE, LEVEL_USER:LEVEL_USER, REMARK:REMARK},
            success   : function(data)
            {
                window.open(data);
            }
        });
        return false;

    })


    $('#clear_textarea').on('click', function(){
        var html=''
        html += 'Inspector : \n'+
                'Booking Comment : \n'+
                'Inspect Qty : '

        $('#textarea_clear').val(html);
    })

    $(document).on('click','#submitPartial',function(){
        var PO_NO       = $('#PO_NO').val();
        var PARTIAL     = $('#partNo').val();
        var QTY         = $('#partQty').val();
        var LEVEL       = 'II';
        var INSPECT_DATE= $('#inspectDate').val();

        $.ajax({
            url       : "<?php echo site_url('C_aql_pivot/insert_partial')?>",
            method    : "POST",
            data      : {PO_NO:PO_NO, PARTIAL:PARTIAL, QTY:QTY, LEVEL:LEVEL, INSPECT_DATE:INSPECT_DATE,},
            dataType  : "json",
            success   :function(data)
            {
              // display_detailPO(PO_NO);				
              show_product(PO_NO)
            }
        });
    });


    $(document).on('click','.part_edit',function(){
     
        var PO_NO       = $(this).attr("data-PO_NO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var QTY         = $(this).attr("data-QTY");
        var level       = $(this).attr("data-LEVEL");
        var Inspector   = $(this).attr("data-INSPECTOR");
        var Inspect_date= $(this).attr("data-INSPECT_DATE");
          
        $('#Modal_Edit').modal('show');
        $('[name="PO_NO_edit"]').val(PO_NO);
        $('[name="partial_edit"]').val(PARTIAL);
        $('[name="qty_edit"]').val(QTY);
        $('[name="level_edit"]').val(level);
        $('[name="Inspector_edit"]').val(Inspector);
        $('[name="date_edit"]').val(Inspect_date);
    });

    
    //update record to database
    $('#btn_update').on('click',function(){
        var PO_NO       =  $('#PO_NO_edit').val();
        var PARTIAL     =  $('#partial_edit').val();
        var QTY         =  $('#qty_edit').val();
        var level       =  $('#level_edit').val();
        var Inspector   =  $('#Inspector_edit').val();
        var Inspect_date= $('#date_edit').val();
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_pivot/update_partial')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, QTY:QTY, level:level, Inspector:Inspector, Inspect_date:Inspect_date},
            success   : function(data)
            {
                $('[name="PO_NO_edit"]').val("");
                $('[name="partial_edit"]').val("");
                $('[name="qty_edit"]').val("");
                $('[name="level_edit"]').val("");
                $('[name="Inspector_edit"]').val("");
                $('[name="date_edit"]').val("");
                $('#Modal_Edit').modal('hide');
                show_product(PO_NO);
            }
        });
        return false;
    });

    $(document).on('click','.view_detail',function(){
        var PO_NO       = $(this).attr("data-PO_NO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var level       = $(this).attr("data-LEVEL");
        var level_user  = $(this).attr("data-LEVEL_USER");
   
     
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_pivot/view_detail_per_partial')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, level:level, level_user:level_user},
            success   : function(data)
            {
                $('#Modal_View_Detail').modal('show');
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].PARTIAL+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td>'+data[i].LEVEL+'</td>'+
                                '<td>'+data[i].INSPECTOR+'</td>'+
                                '<td>'+data[i].INSPECT_DATE+'</td>'+
                                '<td>'+data[i].INSPECT_RESULT+'</td>';
                               
                                
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
    var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_pivot/report_inspect/0126558243/1/5/II"
    
    $.ajax({
        url : "<?php echo site_url('C_aql_pivot/report_')?>",
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
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_pivot/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_aql_pivot/ic')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
            dataType: "JSON",
            success:function(data){
                console.log(data)
                // href = data.url
                // location.href = data;
                window.open(data);
             }
        });
        
      });

    $('#random').on('click','.editRandom',function(){
        var PO        = $(this).attr('data-PO_NO');
        var partial   = $(this).attr('data-Partial');
        var size      = $(this).attr('data-SIZE');
        var remark    = $(this).attr('data-REMARK');
        var qty_asli  = $(this).attr('qty_asli');
        var level     = $(this).attr('level');
        var ctn_no    = $('#CTN_NO_edit').val();
        var ctn_qty   = $('#CTN_QTY_edit').val();
        var qty       = $('#QTY_edit').val();
        
        $.ajax({
          type      : "POST",
          url       : "<?php echo site_url('C_aql_pivot/edit_random')?>",
          dataType  : "JSON",
          data      : {PO:PO, partial:partial, size:size, remark:remark, ctn_no:ctn_no, ctn_qty:ctn_qty, qty:qty},
          success   : function(data){
            // display_detailPO(PO);
            // tableRandom(PO,partial,qty_asli,level);
          }
      });
      return false;
    })


    function deleteRandom() { 
            $("#size").remove(); 
    } 

    $('deleteRowRandom').on('click',function(){
      deleteRandom();
    })

    $(document).on('click','.item_random',function(){
        // console.log('hahaha')
        var PO_NO     = $(this).attr("data-PO_NO");
        var PARTIAL   = $(this).attr("data-PARTIAL");
        var QTY       = $(this).attr("data-QTY");
        var LEVEL     = 'II'
       
        window.onload = tableRandom(PO_NO,PARTIAL,LEVEL, QTY);
        
    });

    $(document).on('click','#randomRandom',function(){
      simpandata_random()
    })

   

    })

       
</script>