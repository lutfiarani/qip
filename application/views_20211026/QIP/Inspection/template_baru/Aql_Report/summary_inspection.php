<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

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
                <h3 class="card-title">Summary Inspection</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                    <div class="date" data-provide="datepicker" id="datepicker">
                        <label>Start Date</label>
                        <input type="text" class="form-control start_date" value="<?php echo date('Ymd')?>" id="tanggal" name="tanggal" autocomplete="off" require>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                  <div class="date" data-provide="datepicker1" id="datepicker1">
                      <label>End Date</label>
                      <input type="text" class="form-control end_date" value="<?php echo date('Ymd')?>" id="end_date" name="end_date" autocomplete="off" require>
                      <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                      </div>
                  </div>
                </div> -->
                
                
                
              </div>
              <div class="card-footer">
                  <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
              </div>
              <!-- </div> -->
              <div class="row" id="showData">    
                <!-- /.card-body -->
               
                <!-- /.card-footer -->
              </form>
               
              </div>
              <!-- /.card-body -->
            </div>
           

    </section>
    <!-- /.content -->
    
<!-- Scripts -->
<script src="<?php  echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="<?php // echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>

<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<!-- jQuery -->
  
<script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>template/plugins/new_js/jquery.mask.min.js"></script>
    
<!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script-->
<script src="<?php echo base_url();?>template/plugins/bootstable/bootstable.js" ></script>

<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>

<script>
  function removeWhereCondition()
  {
      $(this).closest("tr").remove();
  }

$.fn.datepicker.defaults.format = "yyyymmdd";
$('#datepicker').datepicker({
    startDate: '-14d',
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
    var sum1 = 0;
var sum2 = 0;
$("#category tr").not(':first').not(':last').each(function() {
  sum1 +=  getnum($(this).find("td:eq(2)").text());
  sum2 +=  getnum($(this).find("td:eq(3)").text());
  function getnum(t){
  	if(isNumeric(t)){
    	return parseInt(t,10);
    }
    return 0;
	 	function isNumeric(n) {
  		return !isNaN(parseFloat(n)) && isFinite(n);
		}
  }
});
$("#sum1").text(sum1);
$("#sum2").text(sum2);
  
  function DeleteRandom(i) { 
    var row = '#row'+i                        
    $(row).remove();
    total_amount();
  }
   
  var totals=[0,0,0];
  $(document).ready(function(){
    var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){        
                    totals[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalCol").each(function(i){  
                $(this).html("total:"+totals[i]);
            });




    function summary(tanggal){
            $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/summary_inspection_')?>",
            dataType  : "JSON",
            data      : {tanggal:tanggal},
            success   : function(data)
            {
              var html = '';
                var i;
                // var haha = tanggal;
                html += ' <table class="table table-bordered" style="text-align:center" padding="0" id="sum_table">'+
                        '<thead>                  '+
                        '<tr>'+
                          '<th rowspan="3"><center>MONTH</center></th>'+
                          '<th rowspan="3">TOTAL PO</th>'+
                          '<th colspan="3" bgcolor="blue" style="color:white">Inspection Today</th>'+
                          '<th rowspan="2" colspan="2">Inspect Progress Monthly</th>'+
                          '<th rowspan="2" colspan="2">% Monthly</th>'+
                          '<th rowspan="2" colspan="2">Balance Inspection</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th colspan="3" bgcolor="blue" style="color:white">'+data.view_summary[2].TANGGAL_INI+'</th>'+
                        '</tr>'+
                        '<tr class="titlerow">'+
                            '<th>Inspection</th>'+
                            '<th>PASS</th>'+
                            '<th bgcolor="RED" style="color:white">REJECT</th>'+
                            '<th bgcolor="green" style="color:white">PO RELEASED</th>'+
                            '<th bgcolor="red" style="color:white">PO REJECTED</th>'+
                            '<th bgcolor="green" style="color:white">Released</th>'+
                            '<th bgcolor="red" style="color:white">Rejected</th>'+
                            '<th bgcolor="green" style="color:white">PO</th>'+
                            '<th bgcolor="red" style="color:white">2nd Inspection</th>'+
                        '</td>'+
                      '</thead>'+
                      '<tbody>';
                      for(i=0; i<data.view_summary.length; i++){
                            html +='<tr>'+
                            '<td>'+data.view_summary[i].BULAN+'</td>'+
                            '<td>'+data.view_summary[i].TOTAL+'</td>'+
                            '<td class="rowDataSd">'+data.view_summary[i].INSPECTION_TODAY+'</td>'+
                            '<td class="rowDataSd">'+data.view_summary[i].RELEASE_TODAY+'</td>'+
                            '<td class="rowDataSd">'+data.view_summary[i].REJECT_TODAY+'</td>'+
                            '<td>'+data.view_summary[i].RELEASE+'</td>'+
                            '<td>'+data.view_summary[i].REJECT+'</td>'+
                            '<td>'+data.view_summary[i].RELEASED_PERCENT+' %</td>'+
                            '<td>'+data.view_summary[i].REJECTED_PERCENT+' %</td>'+
                            '<td>'+data.view_summary[i].SISA+'</td>'+
                            '<td>'+data.view_summary[i].BELUM_INSPECT_LAGI+'</td>';
                            html +=     '</tr>';
                            
                        }
                        html +='<tr><td><b>Scheduled PO : '+data.view_summary[1].TOTAL_SCHEDULE+'</b></td>'+
                                '<td><b>Total Today<b></td>'+
                                '<td><b>'+data.view_jumlah.SUM_INSPECTION_TODAY+'</b></td>'+
                                '<td><b>'+data.view_jumlah.SUM_RELEASE_TODAY+'</b></td>'+
                                '<td><b>'+data.view_jumlah.SUM_REJECT_TODAY+'</b></td>'+
                                '</tr>';
                                
                      html +='</tbody>'+
                                '</table>';
                
                
                $('#showData').html(html); 

                  var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow')");
    
                $dataRows.each(function() {
                    $(this).find('.rowDataSd').each(function(i){        
                        totals[i]+=parseInt( $(this).html());
                    });
                });
                $("#sum_table td.totalCol").each(function(i){  
                    $(this).html("total:"+totals[i]);
                });
               
                }
            });
        }

        $('#lihatData').on('click',function(){
            var tanggal       = $('#tanggal').val();
            summary(tanggal);
        
        });

   

    })

       
</script>