<!-- Main content -->
<section class="content">
      <div class="container-fluid">
      <!-- <div class="card-body"> -->
      <div class="row">
            <div class="col-md-6">
           
                <div class="form-group">
                     <input type="text" class="form-control" id="PO_NO" name="PO_NO" placeholder="ketikkan PO lengkap disini" autocomplete="off">
                  
                </div>
            </div>
            <?php 
                        for($i=0;$i<count($po);$i++){
                            if($po[$i]['vbeln']== $row['vbeln']){
                                echo $po[$i]['vbeln'];
                            }else{
                                echo $po[$i]['vbeln'];
                            }
                        }
                    ?>
            <div class="col-md-2">
                <button type="button" id="lihatData" class="btn btn-primary lihatData" class="btn btn-primary">Search</button>
            </div>
      </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card" id="detail_po">
            </div>
            <div class="card" id="detail_size">
             
              <!-- /.card-body -->
            </div>

            <div class="card" id="partial_detail">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card" id="last_carton">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                
            <div class="card" id="carton_status">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card" id="grey_carton">
              
              <!-- /.card-body -->
            </div>

           



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    
    <!-- jQuery -->
    <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/select2.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    
    
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    

  })
</script>


    <script>
    
      
      $(document).ready(function(){
        
        function detail_po(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/detail_po",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)
                    var html='';
                    var a
                    
                    html +='<div class="card-header">'+
                            '<h3 class="card-title">Detail PO <b>'+PO+'</b></h3>'+
                            '</div>'+
                            '<table class="table table-bordered">'+
                            '<tbody>';
                                
                        
                    for(a=0; a<data.length; a++){
                    
                        html += '<tr>'+
                                    '<td>1.</td>'+
                                    '<td>CELL</td>'+
                                    '<td>'+data[a].ZCCELL+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>2.</td>'+
                                    '<td>PO</td>'+
                                    '<td>'+data[a].PO_NO+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>3.</td>'+
                                    '<td>MODEL NAME</td>'+
                                    '<td>'+data[a].MODEL_NAME+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>4.</td>'+
                                    '<td>COST NO</td>'+
                                    '<td>'+data[a].CUST_NO+'</td>'+
                                '</tr>  '+
                                '<tr>'+
                                    '<td>5.</td>'+
                                    '<td>DESTINATION</td>'+
                                    '<td>'+data[a].DESTINATION+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>6.</td>'+
                                    '<td>ARTICLE</td>'+
                                    '<td>'+data[a].ART_NO+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>7.</td>'+
                                    '<td>TOTAL QTY</td>'+
                                    '<td>'+data[a].QTY_TOTAL+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>8.</td>'+
                                    '<td>QTY CARTON</td>'+
                                    '<td>'+data[a].TOTAL_CARTON+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>9.</td>'+
                                    '<td>PODD</td>'+
                                    '<td>'+data[a].PD+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>10.</td>'+
                                    '<td>SDD</td>'+
                                    '<td>'+data[a].SDD+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>11.</td>'+
                                    '<td>TYPE</td>'+
                                    '<td>'+data[a].TYPE+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>12.</td>'+
                                    '<td>CONTAINER</td>'+
                                    '<td>'+data[a].CONTAINER+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>13.</td>'+
                                    '<td>EX FTY</td>'+
                                    '<td>'+data[a].EXPORT_DATE+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>14.</td>'+
                                    '<td>INSPECT DATE</td>'+
                                    '<td>'+data[a].INSPECT_DATE+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>15.</td>'+
                                    '<td>BALANCE</td>'+
                                    '<td>'+data[a].BALANCE+'</td>'+
                                '</tr>';
                    }
                            html +='</tbody>'+
                                   '</table>';

                        $('#detail_po').html(html);
                }
            })
          }

          function detail_size(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/detail_size",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    console.log(data)
                    var html=''
                    var detail,i
                    

                    html+=  '<div class="card-header">'+
                                '<h3 class="card-title">Detail Size dan Balance</h3>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                                '<table class="table table-condensed">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="width: 120px">SIZE</th>'+
                                        '<th style="width: 120px">TOTAL QTY</th>'+
                                        '<th style="width: 200px">BALANCE ASSEMBLY</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>';
                                for (i=0; i<data.length; i++){
                                    detail = data[i];
                                    html += '<tr>'+
                                                '<td><center>'+detail.SIZE+'</center></td>'+
                                                '<td><center>'+detail.TOTAL_QTY+'</center></td>'+
                                                '<td><center>'+detail.ASSY_BALANCE+'</center></td>'+
                                            '</tr>';
                                }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#detail_size').html(html);
                }
            })
          }

          function last_carton(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/last_carton",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var detail1, i

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Last Carton No</h3>'+
                            '<div class="card-tools">'+
                            '</div>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table">'+
                            '<thead>'+
                            '<tr>'+
                            '<th style="width: 120px"><center>No Carton</center></th>'+
                            '<th style="width: 200px"><center>Date</center></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                        
                            for (i=0; i<data.length; i++){
                                detail1 = data[i]
                                html += '<tr>'+
                                        '<td><center>'+data[i].CARTON_NO+'</center></td>'+
                                        '<td><center>'+data[i].LMNT_DTTM+'</center></td>'+
                                        '</tr>';
                            }
                            html += '</tbody>'+
                                    '</table>'+
                                    '</div>';
                            
                            $('#last_carton').html(html);
                }
            })
          }

          function carton_status(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/carton_status",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var detail1, i

                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Carton Status</h3>'+
                            '<div class="card-tools">'+
                            '</div>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table">'+
                            '<thead>'+
                            '<tr>'+
                            '<th style="width: 200px"><center>Carton Status</center></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            '<tr><td> ';
                            for (i=0; i<data.length; i++){
                                detail1 = data[i];
                                if(detail1.STATUS=='WR'){
                                    html += "<span class='badge'>"+detail1.CARTON_NO+" &nbsp;</span>";
                                } else if(detail1.STATUS =='WI'){
                                    html += "<span class='badge bg-warning'>"+detail1.CARTON_NO+" &nbsp;</span>";
                                } else if(detail1.STATUS =='WO'){
                                    html += "<span class='badge bg-success'>"+detail1.CARTON_NO+" &nbsp;</span>";
                                }
                            }
                    html += " </td></tr>"+
                            "<tr>"+
                            "<td><p> <b>Remark</b></p>"+
                            "<p> White = Production </p>"+
                            "<p> Yellow = Finish Good Warehouse </p>"+
                            "<p> Green = Shipping </p>"+
                            "</td>"+
                            "</tr>"+
                            "</tbody>"+
                            "</table>"+
                            "</div>";
                    $('#carton_status').html(html); 
                }
            })   
          }


          function grey_carton(PO){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_Export/grey_carton",
                type: "POST",
                data:{PO:PO},
                dataType: "JSON",
                success: function(data)
                {   
                    var html =''
                    var detail1, i
                    
                    html += '<div class="card-header">'+
                            '<h3 class="card-title">Grey Carton No</h3>'+
                            '<div class="card-tools">'+
                            '</div>'+
                            '</div>'+
                            '<div class="card-body p-0">'+
                            '<table class="table">'
                            '<thead>'+
                            '<tr>'+
                            '<th style="width: 120px"><center>Size</center></th>'+
                            '<th style="width: 200px"><center>Carton No</center></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';

                    for (i=0; i<data.length; i++){
                        detail1 = data[i]
                        html += '<tr>'+
                                '<td><center>'+detail1.SIZE+'</center></td>'+
                                '<td><center>'+detail1.CARTON_NO+'</center></td>'+
                                '</tr>';
                            
                    }
                    html += '</tbody>'+
                            '</table>'+
                            '</div>';
                   
                    $('#grey_carton').html(html); 
                }
            })
          }

          function partial_detail(PO_NO){
            $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_inspect/view_detail_po')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO},
            success   : function(data)
            {
                var html =''
                var detail1, i
                
                html += '<div class="card-header">'+
                        '<h3 class="card-title">Partial Detail</h3>'+
                        '<div class="card-tools">'+
                        '</div>'+
                        '</div>'+
                        '<div class="card-body p-0">'+
                        '<table class="table table-bordered">'+
                        '<thead>'+
                            // '<th>PO NO</th>'+
                            '<th>PARTIAL</th>'+
                            '<th>PARTIAL QTY</th>'+
                            '<th>SEQ INSPECT</th>'+
                            '<th>LEVEL</th>'+
                            '<th>USER</th>'+
                            '<th>INSPECTOR</th>'+
                            '<th>INSPECT DATE</th>'+
                            '<th>STATUS INSPECT</th>'+
                            '<th>DESCRIPTION</th>'+
                            '<th>ACTION</th>'+
                          '</thead>'+
                        '<tbody>';
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                // '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].PARTIAL+'</td>'+
                                '<td>'+data[i].PARTIAL_QTY+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td>'+data[i].LEVEL+'</td>'+
                                '<td>'+data[i].LEVEL_USER2+'</td>'+
                                '<td>'+data[i].INSPECTOR+'</td>'+
                                '<td>'+data[i].INSPECT_DATE+'</td>'+
                                '<td>'+data[i].INSPECT_RESULT+'</td>'+
                                '<td>'+data[i].REJECT_DESC+'</td>';
                               
                                
                    html += '<td><button type="button" class="btn btn-warning btn-xs view"  data-PO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-REMARK="'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'">Report</button> ';
                    html += '<button type="button" class="btn btn-info btn-xs view_ic"  data-PO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-REMARK="'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'">IC</button></td>';
                    
                      //  data-PO_NO='"+data[i].PO_NO+""' 
                       //data-Partial='"+data[i].PARTIAL+'" data-SIZE="'+data[i].SIZE+'" qty_asli = "'+QTY+'" level="'+LEVEL+'">
                                              
                       html +=     '</tr>';
                      
                }
                html += '</tbody>'+
                            '</table>'+
                            '</div>';
                   
                    $('#partial_detail').html(html); 
               
            }
            })
           
          
          }

          
          
         
         $(document).on('click','#lihatData',function(){
            var PO          = $('#PO_NO').val();

            detail_po(PO);
            detail_size(PO);
            last_carton(PO);
            carton_status(PO);
            grey_carton(PO);
            partial_detail(PO);

            
             
         });

         $(document).on('click','.view', function(){
          var PO_NO       = $(this).attr("data-PO");
          var PARTIAL     = $(this).attr("data-PARTIAL");
          var REMARK      = $(this).attr("data-REMARK");
          var LEVEL       = $(this).attr("data-LEVEL");
          var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
          var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
          
          $.ajax({
              url : "<?php echo site_url('C_Aql_Inspect/report_guest')?>",
              method:"POST",
              data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
              dataType: "JSON",
              success:function(data){
                  // console.log(data.url)
                  window.open(data.url);
                }
          });
          
        });
        // $('.view_ic').unbind('click').click(function() {
      $(document).on('click','.view_ic', function(){
        var PO_NO       = $(this).attr("data-PO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var href //= "http://10.10.40.42:81/qip2/index.php/C_aql_inspect/report_inspect/0126558243/1/5/II"
       
        $.ajax({
            url : "<?php echo site_url('C_Aql_Inspect/ic_guest')?>",
            method:"POST",
            data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
            dataType: "JSON",
            success:function(data){
                // console.log(data)
                window.open(data);
            }
        });
        
      });

        
    })
</script>
