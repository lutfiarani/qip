
<!-- Main content -->
<section class="content" style="font-size: 15px">
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
                <h2 class="card-title">Report Inspection</h2>
              </div>
              <div class="card-body">
                <?php 
                        $report1 = $report->row_array();
                        echo "<input type='text' name='PO_NO' id='PO_NO' value='".$report1['PO_NO']."' hidden></input>";
                        echo "<input type='text' name='PARTIAL' id='PARTIAL' value='".$report1['PARTIAL']."' hidden></input>";
                        echo "<input type='text' name='LEVEL' id='LEVEL' value='".$report1['LEVEL']."' hidden></input>";
                        echo "<input type='text' name='REMARK' id='REMARK' value='".$report1['REMARK']."' hidden></input>";
                        echo "<input type='text' name='INSPECTOR' id='INSPECTOR' value='".$report1['INSPECTOR']."' hidden></input>";
                        echo "<input type='text' name='LEVEL_USER' id='LEVEL_USER' value='".$report1['LEVEL_USER']."' hidden></input>";
                        echo "<input type='text' name='PO_ID' id='PO_ID' value='".$report1['PO_ID']."' hidden></input>";
                        echo "<input type='text' name='ARTICLE' id='ARTICLE' value='".$report1['ARTICLE']."' hidden></input>";
                ?>
                
                <div class="row">
                    <div class="col-md-4" id="table_po">
                       
                    </div>
                    <div class="col-md-4" id="table_random">
                        
                    </div>
                    <div class="col-md-4" id="foto_artikel">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="booking_comment">
                       
                    </div>
                    <div class="col-md-6" id="carton_no">
                       
                    </div>
                </div>

                <div class="row" id="po_result">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header"><h4 class="card-title">Photos</h4></div>
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="text-primary"><centre>Product</centre></h3>
                                </div>
                                <div class="row" id="photo_product">
                                    
                                </div>
                                <div class="row">
                                    <h3 class="text-primary"><centre>Measurement</centre></h3>
                                </div>
                                <hr>
                                <div class="row" id="photo_measurement">
                                    <br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>            
                <div class="row">
                    <div class="col-md-12" id="photo_defect">
                        
                    </div>
                </div>                   

                </div>
                <div class="row">
                    <div class="col-md-12" id="report5_result">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Input Defect Reject Internal</label> 
                                    <select class="select2" style="width: 100%;" name="reject" id="reject">
                                            
                                    </select>
                                </div>
                                    <!--  -->
                                </div>    
                            </div>
                        </div>
                        
                   
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Input TQC ID</label> 
                                    <select class="select2" multiple="multiple" data-placeholder="Pilih ID Inspector" style="width: 100%;" name="id_qc[]" id="id_qc">
                                    <?php 
                                        for($i=0;$i<count($id_qc);$i++){
                                            if($id_qc[$i]['id']== $row['id']){
                                                echo "<option value='".$id_qc[$i]['id']."-".$id_qc[$i]['nik']."-".$id_qc[$i]['nama']."' selected>".$id_qc[$i]['id']." - ".$id_qc[$i]['gedung']." - ".$id_qc[$i]['nama']."</option>";
                                            }else{
                                                echo "<option value='".$id_qc[$i]['id']."-".$id_qc[$i]['nik']."-".$id_qc[$i]['nama']."'>".$id_qc[$i]['id']." - ".$id_qc[$i]['gedung']." - ".$id_qc[$i]['nama']."</option>";
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" id="report5_comments"></div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" id="report5_sign"></div>
                        </div>
                    </div> 
                  
                </div>

                </div>
            </div>
           </div>
         </div>
        </div>
      </div><!-- /.container-fluid -->

        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Reject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body" id="code_detail">
                 
                  </div>
                 <div class='modal-footer'>
               
                 </div>
                </div>
              </div>
            </div>
        </form>
        <!--END MODAL EDIT-->
        
        
 



    </section>
    <!-- /.content -->
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/select2.min.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    
    
    <script>
       

        $(function () {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>


    <script>
   

      function list_reject(){
            $.ajax({
                url : "<?php echo site_url('C_aql_pivot/list_reject/');?>",
                method: "POST",
                dataType : "json",
                success : function(data){
                    console.log(data)
                    $("#reject").html(data);
                },
                error : function(data){
                    console.log(data)
                }
            })
        }

      
      $(document).ready(function(){


          var PO_NO     = $('#PO_NO').val();
          var PARTIAL   = $('#PARTIAL').val();
          var INSPECTOR = $('#INSPECTOR').val();
          var LEVEL     = $('#LEVEL').val();
          var REMARK    = $('#REMARK').val();
          var LEVEL_USER= $('#LEVEL_USER').val();
          var PO_ID     = $('#PO_ID').val();
          var ARTICLE   = $('#ARTICLE').val();

        
          report1();
          po_result();
          display_measurement();
          display_product();
          photo_defect();
          report3_sample();
          report4_listdefect();
          report5_result();
          list_reject();
          function createReport(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report_",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    // cekdata()
                    // alert(data);
                    location.href = data.url;
                    // console.log(data)
                },
            });
          }


          function report1(){
            $.ajax({
                url         : "<?php echo base_url();?>index.php/C_aql_pivot/report1",
                type        : "POST",
                data        : {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType    : "JSON",
                success     : function(data)
                {
                    console.log(data)
                    var po      = ''
                    var random  = ''
                    var foto    = ''
                    var booking = ''
                    var ctn_no  = ''
                    var i
                    
                    po      += '<table class="table table-striped">'+
                                        '<tr><th> PO </th><td>'+data.po.PO_NO+'</td></tr>'+
                                        '<tr><th> Model Name </th><td>'+data.po.MODEL_NAME+'</td></tr>'+
                                        '<tr><th> Art </th><td>'+data.po.ARTICLE+'</td></tr>'+
                                        '<tr><th> Country </th><td>'+data.po.LANDT+'</td></tr>'+
                                        '<tr><th> PO Qty </th><td>'+data.po.KWMENG+'</td></tr>'+
                                        '<tr><th> Qty to Inspected </th><td>'+data.po.PARTIAL_QTY+'</td></tr>'+
                                        '<tr><th> Sampled Inspected </th><td>'+data.po.TOTAL_INSPECT+'</td></tr>'+
                                '</table>'

                    random += '<table class="table table-striped">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th> Size </th>'+
                                        '<th> PO Qty </th>'+
                                        '<th> Qty to Inspect </th>'+
                                        '<th> Qty </th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'
                    for(i=0; i<data.random.length; i++){
                        datar = data.random[i]
                        random += '<tr>'+
                                    '<td>'+datar.SIZE+'</td>'+
                                    '<td>'+datar.PO_QTY+'</td>'+
                                    '<td>'+datar.QTY_TO_INSPECT+'</td>'+
                                    '<td>'+datar.QTY+'</td>'+
                                '</tr>'
                    }
                            
                    random  += '</tbody>'+
                                '</table>'

                    foto    += '<img class="img-fluid" src="http://10.10.10.98:8000/files/mcs/'+data.po.ARTICLE+'.png" style="height: 330px; width: 400px;" alt="Photo">'
                    booking += ' <div class="info-box bg-orange disabled ">'+
                                    '<div class="info-box-content text-white">'+
                                        '<span class="info-box-text text-center text-white">Booking Comment</span>'+
                                        '<span class="info-box-number text-center text-white mb-0">'+data.po.BOOKING_COMMENT+'</span>'+
                                    '</div>'+
                                '</div>'
                    ctn_no  +=  '<div class="info-box bg-teal ">'+
                                    '<div class="info-box-content text-white">'+
                                        '<span class="info-box-text text-center text-white">Carton No</span>'+
                                        '<span class="info-box-number text-center text-white mb-0">'+data.po.CARTON_NO+'</span>'+
                                    '</div>'+
                                '</div>'

                    $('#table_po').html(po)
                    $('#table_random').html(random)
                    $('#foto_artikel').html(foto)
                    $('#booking_comment').html(booking)
                    $('#carton_no').html(ctn_no)
                },
            });
          }

          function po_result(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/po_result",
                type: "POST",
                data: {PO_ID:PO_ID},
                dataType: "JSON",
                success: function(data) 
                {   
                    var html =''
                    var a, b, c, d;
                    html += '<table class="table table-bordered">'+
                        '<thead>'+
                            '<tr>'+
                                '<th>Inspection Result</th>'+
                                '<th>Result</th>'+
                                '<th></th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                    '<tr>'+
                    '<td>Validation</td>'
                        if(data.VAL_RESULT == 'PASS'){
                            html += '<td class="bg-olive color-palette">'+data.VAL_RESULT+'</td>'
                        }else{
                            html += '<td class="bg-maroon color-palette">'+data.VAL_RESULT+'</td>'
                        }
                                
                    html += '<td></td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Packing, Packaging & Labelling</td>'
                        if(data.PACKING_RESULT == 'PASS'){
                            html += '<td class="bg-olive color-palette">'+data.PACKING_RESULT+'</td>'
                        }else{
                            html += '<td class="bg-maroon color-palette">'+data.PACKING_RESULT+'</td>'
                        }
                        html += '<td>'+
                                    '<table class="table table-bordered">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>Packaging</th>'+
                                                '<th>Critical</th>'+
                                                '<th>Major</th>'+
                                                '<th>Minor</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+
                                                '<td>Total Defect</td>'+
                                                '<td>'+data.CR_PACKING+'</td>'+
                                                '<td>'+data.MA_PACKING+'</td>'+
                                                '<td>'+data.MI_PACKING+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Acc/Rej</td>'+
                                                '<td>'+data.CRITIC_ACC+' / '+data.CRITIC_REJ+'</td>'+
                                                '<td>'+data.MAJOR_ACC+' / '+data.MAJOR_REJ+'</td>'+
                                                '<td>'+data.MINOR_ACC+' / '+data.MINOR_REJ+'</td>'+
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Product</td>'
                                if(data.PRODUCT_RESULT == 'PASS'){
                                    html += '<td class="bg-olive color-palette">'+data.PRODUCT_RESULT+'</td>'
                                }else{
                                    html += '<td class="bg-maroon color-palette">'+data.PRODUCT_RESULT+'</td>'
                                }
                               html += '<td>'+
                                    '<table class="table table-bordered">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>Product</th>'+
                                                '<th>Critical</th>'+
                                                '<th>Major</th>'+
                                                '<th>Minor</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            '<tr>'+
                                                '<td>Total Defect</td>'+
                                                '<td>'+data.CR_PRODUCT+'</td>'+
                                                '<td>'+data.MA_PRODUCT+'</td>'+
                                                '<td>'+data.MI_PRODUCT+'</td>'+
                                                
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Acc/Rej</td>'+
                                                '<td>'+data.CRITIC_ACC+' / '+data.CRITIC_REJ+'</td>'+
                                                '<td>'+data.MAJOR_ACC+' / '+data.MAJOR_REJ+'</td>'+
                                                '<td>'+data.MINOR_ACC+' / '+data.MINOR_REJ+'</td>'+
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'


                    $('#po_result').html(html)
                }
            });
          }

          function display_measurement(){
                $.ajax({
                    type        :"POST",
                    url         : "<?php echo site_url('C_pivot_validation/disp_measurements/') ?>",
                    data        : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, LEVEL_USER:LEVEL_USER, ARTICLE:ARTICLE},
                    cache       : false,
                    dataType    : "JSON",
                    success     : function(data){
                        var html = ''
                        var i
                        var alamat  = "<?php echo base_url();?>template/images/aql_image";
                        console.log(data)

                        for(i=0; i<data.length; i++){
                            html += '<div class="col-md-4">'+
                                        '<div class="card">'+
                                            '<div class="card-header">Picture '+(i+1)+' </div>'+
                                            '<div class="card-body">'+
                                                '<img class="img-fluid" src="'+alamat+'/'+data[i].PHOTO_NAME+'" style="width:400px; height: 300px" alt="Photo">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                        }
                        $('#photo_measurement').html(html)
                        
                    }
                })
          }

          function display_product(){
            $.ajax({
                    type        :"POST",
                    url         : "<?php echo site_url('C_pivot_validation/disp_product/') ?>",
                    data        : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, LEVEL_USER:LEVEL_USER, ARTICLE:ARTICLE},
                    cache       : false,
                    dataType    : "JSON",
                    success     : function(data){
                        var html = ''
                        var i
                        var alamat  = "<?php echo base_url();?>template/images/aql_image";
                        console.log(data)

                        for(i=0; i<data.length; i++){
                            html += '<div class="col-md-4">'+
                                        '<div class="card">'+
                                            '<div class="card-header">Picture '+(i+1)+' </div>'+
                                            '<div class="card-body">'+
                                                '<img class="img-fluid" src="'+alamat+'/'+data[i].PHOTO_NAME+'" style="width:400px; height: 300px" alt="Photo">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                        }
                        $('#photo_product').html(html)
                        
                    }
                })
          }

          function photo_defect(){
            $.ajax({
                    type        :"POST",
                    url         : "<?php echo site_url('C_aql_pivot/photo_defect/') ?>",
                    data        : {PO_NO:PO_NO, PARTIAL:PARTIAL},
                    cache       : false,
                    dataType    : "JSON",
                    success     : function(data){
                        console.log(data)
                        var html = ''
                        var i
                        var alamat  = "<?php echo base_url();?>template/images/aql_image/reject";
                       
                        html += '<div class="card card-danger">'+
                            '<div class="card-header"><h4 class="card-title">Defect Photo</h4></div>'+
                            '<div class="card-body">'
                                

                        for(i=0; i<data.length; i++){
                            html += '<table class="table table-striped">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<td colspan="3" style="text-align:center"> '+data[i].REJECT_CODE_NAME+'</td>'+
                                        '</tr>'+
                                    '</thead> <tbody>'+
                                    '<tr>'+
                                            '<th>Defect Severity</th>'+
                                            '<th>Quatity</th>'+
                                            '<th>Comment</th>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+data[i].STATUS_CODE+'</td>'+
                                            '<td>'+data[i].QTY+'</td>'+
                                            '<td>'+data[i].COMMENT+'</td>'+
                                        '</tr>'+
                                        '<tr><td colspan="3"><img class="img-fluid" src="'+alamat+'/'+data[i].REJECT_IMG+'" style="width:400px; height: 300px" alt="Photo"></td></tr></tbody>'+
                                '<tr><td colspan="3"></td></tr></table>'
                        }
                        html += '</div> </div>'

                        $('#photo_defect').html(html)
                        
                    }
                })
          }

          function report3_sample(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report3",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)

                    var html = ''   
                    
                    html += "<div class='col-md-3'>"+
                            "<table class='table table-bordered'>"+
                            "<tr>"+
                                "<td>Sample Lot</td>"+
                                "<td>"+data.SAMPLE_LOT+" %</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td>Sample Size</td>"+
                                "<td>    Level : "+data.LEVEL+" </td>"+
                            "</tr>"+
                            "</table>"+
                            "</div>"+
                            "<div class='col-md-3'>"+
                                "<table class='table table-bordered'>"+
                                    "<tr>"+
                                        "<td>Carton</td>"+
                                        "<td>"+data.CARTONS+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td>Pairs</td>"+
                                        "<td>"+data.PAIRS+"</td>"+
                                    "</tr>"+
                                "</table>"+
                            "</div>"+
                            "<div class='col-md-6'>"+
                            "<table class='table table-bordered'>"+
                                "<tr>"+
                                    "<td></td>"+
                                    "<td>MINOR</td>"+
                                    "<td>MAJOR</td>"+
                                    "<td>CRITICAL</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td>Max defects to accept</td>"+
                                    "<td>"+data.QIP_LEVEL_MINOR_ACC+"</td>"+
                                    "<td>"+data.QIP_LEVEL_MAJOR_ACC+"</td>"+
                                    "<td>"+data.QIP_LEVEL_CRITIC_ACC+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td>No of defects to reject</td>"+
                                    "<td>"+data.QIP_LEVEL_MINOR_REJ+"</td>"+
                                    "<td>"+data.QIP_LEVEL_MAJOR_REJ+"</td>"+
                                    "<td>"+data.QIP_LEVEL_CRITIC_REJ+"</td>"+
                                "</tr>"+
                            "</table>"+
                        "</div>";

                        $('#report3_sample').html(html)
                }
            })
          }

          function report4_listdefect(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report4",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data.report)
                    // data.code

                    var html =''
                    var code1, haha, code
                    var i, b
                   
                    html += "<font size='0.3'>"+
                            "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:50%;float:left'>"+
                            "<thead>"+
                                "<tr bgcolor='yellow'>"+
                                    "<th rowspan='2'>CODE DEFECT</th>"+
                                    "<th rowspan='2'>DEFECT DESCRIPTION</th>"+
                                    "<th rowspan='2'></th>"+
                                    "<th>MIN</th>"+
                                    "<th>MAJ</th>"+
                                    "<th>CRI</th>"+
                                "</tr>"+
                                "<tr bgcolor='yellow'>"+
                                    "<th>2.5</th>"+
                                    "<th>1.5</th>"+
                                    "<th>0.0</th>"+
                                "</tr>"+
                            "</thead>"+
                            "<tbody>";
                    for(i=0; i<data.code.length; i++){
                        code1 = data.code[i]
                        if(code1.CODE > 400){
                            html += "";
                        }else{
                            html += "<tr bgcolor='#0066CC'>"+
                                        "<td><b>"+code1.CODE+"</b></td>"+
                                        "<td><b>"+code1.CODE_NAME+"</b></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                    "</tr>";
                        }
                      
                        for(b = 0; b < 71; b++) { //72 is a half of total data.code.length
                            haha = data.report[b]
                            if((code1.CODE == haha.CODE)&&(haha.REJECT_CODE_NAME != 0)){
                                html += "<tr>"+
                                        "<td>"+haha.CODE_DEFECT+"</td>"+
                                        "<td>"+haha.REJECT_CODE_NAME+"</td>"+
                                        "<td>"+haha.DESCRIPTION+"</td>";
                                if(haha.STATUS_CODE == 'MI'){
                                    html += "<td>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else if(haha.STATUS_CODE =='MA'){
                                    html += "<td  bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else{
                                    html += "<td bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td>"+haha.CR+"</td>"+
                                            "</tr>";
                                }
                                        
                            } else if(haha.REJECT_CODE_NAME == '0'){
                                html += '';
                            }else{
                                html += '';
                            }
                        }
                    }
                                
                               
                    html += "</tbody>"+
                            "</table>"+
                            "<table class='table table-bordered' border='1' cellpadding='0' cellspacing='0' style='width:50%;float:left'>"+
                            "<thead>"+
                            "<tr bgcolor='yellow'>"+
                                "<th rowspan='2'>CODE DEFECT</th>"+
                                "<th rowspan='2'>DEFECT DESCRIPTION</th>"+
                                "<th rowspan='2'></th>"+
                                "<th>MIN</th>"+
                                "<th>MAJ</th>"+
                                "<th>CRI</th>"+
                            "</tr>"+
                            "<tr bgcolor='yellow'>"+
                                "<th>2.5</th>"+
                                "<th>1.5</th>"+
                                "<th>0.0</th>"+
                            "</tr>"+
                        "</thead>"+
                        "<tbody>";
                    for(i=0; i<data.code.length; i++){
                        code1 = data.code[i]
                        if(data.code[i].CODE < 400){
                            html += "";
                        }else{
                            html += "<tr bgcolor='#0066CC'>"+
                                        "<td><b>"+code1.CODE+"</b></td>"+
                                        "<td><b>"+code1.CODE_NAME+"</b></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                    "</tr>";
                        }
                        for(b = 71; b < data.report.length; b++) {
                        // for(b = 0; b < data.report.length; b++) {
                            haha = data.report[b]
                            if((code1.CODE === haha.CODE)){
                                html += "<tr>"+
                                        "<td>"+haha.CODE_DEFECT+"</td>"+
                                        "<td>"+haha.REJECT_CODE_NAME+"</td>"+
                                        "<td>"+haha.DESCRIPTION+"</td>";
                                if(haha.STATUS_CODE === 'MI'){
                                    html += "<td>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else if(haha.STATUS_CODE ==='MA'){
                                    html += "<td  bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td>"+haha.MA+"</td>"+
                                            "<td bgcolor='grey'>"+haha.CR+"</td>"+
                                        "</tr>";
                                }else{
                                    html += "<td bgcolor='grey'>"+haha.MI+"</td>"+
                                            "<td bgcolor='grey'>"+haha.MA+"</td>"+
                                            "<td>"+haha.CR+"</td>"+
                                            "</tr>";
                                }
                                        
                            }else if(haha.REJECT_CODE_NAME === '0'){
                                html += '';
                            }else{
                                html += '';
                            }
                        }
                    }
                        
                    html += "<tr>"+
                                "<td colspan = '3'><b>Total Defects : </b></td>"+
                                "<td><b>"+data.report2.MINOR_REJ_DATA+"</td>"+
                                "<td><b>"+data.report2.MAJOR_REJ_DATA+"</td>"+
                                "<td><b>"+data.report2.CRITIC_REJ_DATA+"</td>"+
                                "</tr>"+
                        "</tbody>"+
                    "</table>"+
                    "</font>";

                    $('#report4_listdefect').html(html);
                }
            });
          }

          function report5_result(){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/report3",
                type: "POST",
                data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data)

                    var html = ''
                    var html2= ''
                    var html3= ''

                    html += "<div class='col-md-12'>"+
                            "<table class='table table' border='0' cellpadding='0' cellspacing='0'>"+
                            "<thead>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>"+
                                "<th></th>";
                    if(data.INSPECT_RESULT ==='Y'){
                        html += "<th style='color:blue;text-align:right'>Accepted</th>"+
                                "<th>V</th>"+
                                "<th style='color:red'>Rejected</th>"+
                                "<th></th>";
                    }else{
                        html += "<th style='color:blue'>Accepted</th>"+
                                "<th></th>"+
                                "<th style='color:red'>Rejected</th>"+
                                "<th>V</th>";
                    }
                    html += "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "<th></th>"+
                            "</thead>"+
                            "<tbody>"+
                            "</tbody>"+
                            "</table>"+
                            "</div>";


                    html2 += "<div class='col-md-12'>"+
                             "<font style='color:blue;'>COMMENTS/CORRECTIVE ACTIONS REQUIRED</font>"+
                             "<table class='table table' border='1' cellpadding='0' cellspacing='0'>";
                    // html2 +="<tr>"+
                    //         '<td><div class="col-12 col-sm-6">'+
                    //             '<div class="form-group">'+
                    //             '<label>Multiple (.select2-purple)</label>'+
                                
                    //                 '<select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">'+
                    //                 '<option>Alabama</option>'+
                    //                 '<option>Alaska</option>'+
                    //                 '<option>California</option>'+
                    //                 '<option>Delaware</option>'+
                    //                 '<option>Tennessee</option>'+
                    //                 '<option>Texas</option>'+
                    //                 '<option>Washington</option>'+
                    //                 '</select>'+
                               
                    //             '</div>'+
                    //         '</div></td>'+
                    //         '</tr>';
                    if( !data.COMMENT){
                        html2 += "<tr>"+
                             "<td style='color:white;'><input class='form-control' id='comment' name='comment' type='text' placeholder='type your comment here'></td>"+
                             "</tr>";
                    }else{
                        html2 +="<tr>"+
                             "<td>"+data.COMMENT+"</td>"+
                             "</tr>";
                    }
                             
                        html2 +="</table>"+
                             "</div>";



                //     html3 += "<div class='col-md-12'>"+
                //              "<table class='table table' border='0' cellpadding='0' cellspacing='0'>"+
                //              "<thead>"+
                //              "<tr>"+
                //              "<th><b>adidas-Group Prod. Manager*</b></th>";
                //     if ( !data.REPRESENTATIVE_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.REPRESENTATIVE_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.REPRESENTATIVE_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.REPRESENTATIVE_SIGN+"' width='50' height='40'></th>";
                //     }
                    

                //     html3 += "</tr>"+
                //              "<tr>"+
                //              "<th><b>Inspector**)</b></th>";
                //     if ( !data.INSPECTOR_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.INSPECTOR_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.INSPECTOR_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.INSPECTOR_SIGN+"' width='50' height='40'></th>";
                //     } 
                                
                //     html3 += "</tr>"+
                //              "<tr>"+
                //                 "<th><b>Factory Rep / Fty Prod Head</b></th>";
                //     if ( !data.PRODUCTION_MANAGER_NAME ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 +=  "<th>"+data.PRODUCTION_MANAGER_NAME+"</th>";
                //     } 
                //     html3 +="<th><b>Signature/date</b></th>";
                //     if ( !data.PRODUCTION_MANAGER_SIGN ){
                //         html3 += "<th></th>";
                //     }else{
                //         html3 += "<th><img src='<?php echo base_url(); ?>"+data.PRODUCTION_MANAGER_SIGN+"' width='50' height='40'></th>";
                //     } 

                //     html3 += "</tr>"+
                //             "<tr>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                 "<th></th>"+
                //                "</tr>"+
                //         "</thead>"+
                //         "<tbody>"+
                //         "</tbody>"+
                //     "</table>"+
                //    "</div>";

                   if(data.LEVEL_USERA == data.LEVEL_USER2){
                        html3 += '<button type="button" class="btn btn-block bg-gradient-success btn-lg buttontry" name="confirmInspector" id="confirmInspector" value="1"><span class="buttontry__text">Confirm Inspector & Send to Pivot</span></button>';
                   }else{
                       html3 +='';
                   }

                   html3 += '<button type="button" class="btn btn-block bg-gradient-info btn-lg" name="exportExcel" id="exportExcel" data-PO="'+data.PO_NO+'"  data-Partial="'+data.PARTIAL+'" data-LEVEL="'+data.LEVEL+'" data-REMARK="'+data.REMARK+'" data-LEVEL_USER="'+data.LEVEL_USERA+'">Export to Excel</button>';
                   

                    $('#report5_result').html(html)
                    $('#report5_comments').html(html2)
                    $('#report5_sign').html(html3)

                    const theButton = document.querySelector(".buttontry");

                    theButton.addEventListener("click", () => {
                        theButton.classList.add("buttontry--loading");
                    });
                } 
            })
         } 

         function confirm_inspector(){
            var INSPECTOR   = $('#INSPECTOR').val();
            var FLAG        = $('#confirmInspector').val();
            var COMMENT     = $('#comment').val();
            var ID_QC       = $('#id_qc').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/confirm_inspector",
                type: "POST",
                data: {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, INSPECTOR:INSPECTOR, FLAG:FLAG, COMMENT:COMMENT, LEVEL_USER:LEVEL_USER, ID_QC:ID_QC, PO_ID:PO_ID},
                dataType: "JSON",
                success: function(data)
                {
                    put_image(PO_ID)
                    insert_reject(PO_ID)
                },
            });
         }

         function insert_reject(PO_ID){
            var reject_code = $('#reject').val()
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/insert_reject/",
                type: "POST",
                data : {PO_ID:PO_ID, reject_code:reject_code},
                dataType: "JSON",
                success: function(data)
                {
                    
                },
            })
         }

         function put_image(PO_ID){
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_pivot/aql_put/"+PO_ID,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    location.href = data;
                    
                },
            });
         }

          
         
         $(document).on('click','#confirmInspector',function(){
              confirm_inspector();
         });

         $(document).on('click', '#exportExcel', function(){
            // var PO          = $(this).attr("data-PO_NO");
            // var PARTIAL     = $(this).attr("data-Partial");
            // var REMARK      = $(this).attr("data-REMARK");
            // var LEVEL       = $(this).attr("data-LEVEL");
            // var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
            $.ajax({
                url : "<?php echo base_url();?>index.php/C_aql_pivot/export_excel",
                type : "POST",
                data : {PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
                dataType: "JSON",
                success : function(data){
                    // console.log(data);
                    // location.href = data;
                    window.open(data);
                }
            })
            

         })
        

    })
</script>
