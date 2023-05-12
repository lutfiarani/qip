

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
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                      <label>PO NO</label>
                        <div class="input-group input-group">
                        <input type="text" class="form-control" name="PO_NO1" id="PO_NO1">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" id="btnGo">Go!</button>
                        </span>
                </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>PO NO</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="PO_NO" id="PO_NO" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>STYLE</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="style" id="style" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ARTICLE</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="article" id="article" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>SDD</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="SDD" id="SDD" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>SHIP DATE</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="ship_date" id="ship_date" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>SHIP OUT</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="ship_out" id="ship_out" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>GENDER</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="gender" id="gender" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>CUSTOMER NO</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="customer_no" id="customer_no" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DESTINATION</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="destination" id="destination" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>QTY</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="qty" id="qty" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>CARTON BAL</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="carton_bal" id="carton_bal" disabled>
                      </div>
                    </div>
                  </div>
                


                 

                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Partial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    
                    
                      <!-- text input -->
                      <div class="form-group">
                      <label>Partial No</label>
                        <!--div class="input-group input-group">
                        <input type="text" class="form-control" name="partial" id="partial">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat partialgo">Go!</button>
                        </span>
                        </div-->
                        <div class="row">
                          
                          <div class='col-1'><label>Partial No</label><input type='text' class='form-control' id="partNo" name="partNo"></div>
                          <div class='col-2'><label>Partial Qty</label><input type='text' class='form-control' placeholder='' id="partQty" name="partQty"></div>
                          <div class="col-3">
                            <label>Inspector</label>
                              
                                  <select  id="Inspector" name="Inspector" class="form-control" tabindex="1">
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
                          
                          <div class='col-2'><label>Level</label><input type='text' class='form-control' placeholder='' id="level" name="level"></div>
                          <div class='col-3'><label>Inspect Date</label> <input type='text' class='form-control' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' data-mask id="inspectDate" name="inspectDate"></div>
                         
                        </div>
                      </div>
                      <div class='card-footer'>
                          <button type='submit' class='btn btn-info' id='submitPartial'>Submit</button>
                      </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                          <th>PO Number</th>
                          <th style="width: 20px">Partial No</th>
                          <th>Qty</th>
                          <th>Inspector Name</th>
                          <th>Level</th>
                          <th>Inspect Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="showData">
                        
                      </tbody>
                    </table>
                  
                  </div>
                  <div class="row">
                    <table class="table table-bordered" id="randomTable" >
                      <thead>                  
                        <tr>
                        <th scope="col" style="width: 100px">no</th>
                          <th scope="col" style="width: 100px">Carton Number</th>
                          <th scope="col" style="width: 100px">Carton Qty</th>
                          <th scope="col" style="width: 100px">Size</th>
                          <th scope="col" style="width: 100px">Qty</th>
                          
                        </tr>
                      </thead>
                      <tbody id="random">
                        
                      </tbody>
                    </table>
                    <span>

                        <button id="but_add">Add New Row</button>

                      </span>

                  </div>
             
              </form>
              <!--div class="row">
              <div class="card-body" id="show_data">
                
                </div>
              </div-->
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
                              <input type="text" name="PO_NO_edit" id="PO_NO_edit" class="form-control" placeholder="Product Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Partial</label>
                            <div class="col-md-6">
                              <input type="text" name="partial_edit" id="partial_edit" class="form-control" placeholder="Partial No">
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
                              <input type="text" name="level_edit" id="level_edit" class="form-control" placeholder="Qty Partial">
                            </div>
                        </div>

                        <div class="form-group row">
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
                      </div>
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
        
        
 



    </section>
    <!-- /.content -->
    
    <!--script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script-->
    <script src="//code.jquery.com/jquery.min.js"></script> 
    <script src="<?php echo base_url();?>template/plugins/jquery-tabledit-master/jquery.tabledit.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
   

    <script>
    
      // var tablePartial;
      // function reload_table(){
      //   tablePartial.ajax.reload(null, false);
      // }

      $(document).ready(function(){
        var PO_NO = $('#PO_NO1').val();

        // var randomTable = $('#randomTable').dataTable();
        // $('#makeEditable').SetEditable({
        //     $addButton: $('#but_add'),
        //     columnsEd:"0,1"
        // });

        function reload_random(){
          randomTable.ajax.reload(null, false);
         }

            $(document).on('click','.item_random',function(){
              var PO_NO     = $(this).attr("data-PO_NO");
              var PARTIAL   = $(this).attr("data-PARTIAL");
              var QTY       = $(this).attr("data-QTY");
              var LEVEL     = $(this).attr("data-LEVEL");
              $('#randomTable').DataTable({
                  "ajax":{
                    url   : "<?php echo site_url('C_Aql/aql_carton_cek/');?>",
                    type  : 'post',
                    responsive: true,
                    async : true,
                    dataType : 'json',
                    data : {PO_NO:PO_NO, PARTIAL:PARTIAL, QTY:QTY, LEVEL:LEVEL},
                  }//,
                });
              });

              // $('#randomTable').on('draw.dt', function(){
              //     $('#randomTable').Tabledit({
              //     url:"<?php echo site_url('C_Aql/add_reject/');?>",
              //     dataType:'json',
              //     columns:{
              //       identifier : [3, 'size'],
              //       editable:[[1, 'CTN_NO'], [2, 'CTN_QTY']]
              //     },
              //     restoreButton:false,
              //     onSuccess:function(data, textStatus, jqXHR)
              //     {
              //       if(data.action == 'delete')
              //       {
              //       $('#' + data.id).remove();
              //       $('#randomTable').DataTable().ajax.reload();
              //       }
              //     }
              //     });
              //   });

                $('#randomTable').Tabledit({
                  url: '<?php echo site_url('C_Aql/add_reject/');?>',
                  columns: {
                    identifier: [3, 'size'],                    
                    editable: [[1, 'CTN_NO'], [2, 'CTN_QTY']]
                  }
                });
              // $('#sample_data').on('draw.dt', function(){
              //     $('#sample_data').Tabledit({
              //     url:'action.php',
              //     dataType:'json',
              //     columns:{
              //       identifier : [0, 'id'],
              //       editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male","2":"Female"}']]
              //     },
              //     restoreButton:false,
              //     onSuccess:function(data, textStatus, jqXHR)
              //     {
              //       if(data.action == 'delete')
              //       {
              //       $('#' + data.id).remove();
              //       $('#sample_data').DataTable().ajax.reload();
              //       }
              //     }
              //     });
              //   });
                  
        // var editableTable =new BSTable("makeEditable");
        //   editableTable.init();

          // var editableTable =new BSTable("makeEditable",{
          //   editableColumns:"1,2,3"
          // });

        
         function show_product(){
          // $('#btnGo').on('click',function(){
            var PO_NO_ = $('#PO_NO1').val();
            $.ajax({
                type  : 'ajax',
                url   : "<?php echo site_url('C_Aql/list_partial/');?>"+PO_NO_,
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].PO_NO+'</td>'+
                                '<td>'+data[i].PARTIAL+'</td>'+
                                '<td>'+data[i].QTY+'</td>'+
                                '<td>'+data[i].INSPECTOR+'</td>'+
                                '<td>'+data[i].LEVEL+'</td>'+
                                '<td>'+data[i].INSPECT_DATE+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm part_edit" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_random" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'">Random</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#showData').html(html);
                }
 
            });
         }

        function display_detailPO(){
          $.ajax({
                    type: 'ajax',
                    url : "<?php echo site_url('C_Aql/get_data_po/'); ?>"+$('#PO_NO1').val(),
                    dataType : "json",
                    success : function(o) {
                    console.log(o)
                        // do something
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
                            show_product();
                        }
                        else{
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
                        }
                    },
                    error : function(data) {
                        // do something
                        console.log(data)
                    }
                });

        }

        //$( "#PO_NO1" ).change(function(){
        $('#btnGo').on('click',function(){
            $.ajax({
                    url : "<?php echo site_url('C_Aql/get_data_po/'); ?>"+$('#PO_NO1').val(),
                    success : function(o) {
                    console.log(o)
                        // do something
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
                            show_product();
                        }
                        else{
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
                        }
                    },
                    error : function(data) {
                        // do something
                        console.log(data)
                    }
                   // display_detailPO();
                });
            });


        // var tablePartial =  $('#tablePartial').DataTable({
        //    "ajax":{
        //       url   : "<?php echo site_url('C_Aql/list_partial/');?>"+$('#PO_NO1').val(),
        //       type  : 'POST',
        //       responsive: true
        //     //,
        //     //   "data" : function ( data ) {
        //     //       data.PO_NO = $('#PO_NO1').val();
        //     //  }
        //    }
        // });

       
          
          // $('#partial').change(function(){
          //     $.ajax({
          //         url : "<?php// echo site_url('C_Aql/get_partial/');?>"+$('#partial').val(),
          //         success : function(o) {
          //         console.log(o)
          //             // do something
          //             if(o.status=='ok'){
          //                var data = o.dataPO;
          //             }
          //         },
          //          error : function(data) {
          //             // do something
          //             console.log(data)
          //         }
          //     })
          // })

         //====================add partial by number input=============================== 
         /* $(document).on('click','.partialgo', function(){
              $.ajax({
                  url : "<?php //echo site_url('C_Aql/get_partial/');?>"+$('#partial').val(),
                  dataType : 'json',
                  success : function(data) {
                    console.log(data);
                    var part = $('#partial').val();
                    var html='';
                    var i;
                    var no=0;
                    for(i=1; i<=part; i++){
                      html+="<div class='row'>";
                      html+="<div class='col-1'><label>Partial No</label><input type='text' class='form-control' value='"+i+"'></div>";
                      html+="<div class='col-2'><label>Partial Qty</label><input type='text' class='form-control' placeholder=''></div>";
                      html+="<div class='col-3'><label>Inspector</label><input type='text' class='form-control' placeholder=''></div>";
                      html+="<div class='col-2'><label>Level</label><input type='text' class='form-control' placeholder=''></div>";
                      html+="<div class='col-3'><label>Inspect Date</label> <input type='text' class='form-control' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' data-mask></div>";
                      //html+=" <div class='input-group'><div class='input-group-prepend'><span class='input-group-text'><i class='far fa-calendar-alt'></i></span></div><input type='text' class='form-control' data-inputmask-alias='datetime' data-inputmask-inputformat='dd/mm/yyyy' data-mask></div>"
                      html+="</div>";
                    }
                    html += "<div class='card-footer'>";
                    html+="<button type='submit' class='btn btn-info' id='submitPartial'>Submit</button>";
                    html+="</div>";
                    $('#show_data').html(html);
                     
                  }
                   
                  
              });
          });*/

          // $('#tablePartial').DataTable({
           
          //     "ajax":{
          //       url   : "<?php echo site_url('C_Aql/list_partial/');?>"+$('#PO_NO1').val(),
          //       type  : 'GET',
          //       responsive: true,
          //       data: {PO_NO:PO_NO}
          //      }
          // });


          $('#submitPartial').on('click', function(){
            var PO_NO = $('#PO_NO').val();
            var PARTIAL = $('#partNo').val();
            var QTY = $('#partQty').val();
            var INSPECTOR = $('#Inspector').val();
            var LEVEL = $('#level').val();
            var INSPECT_DATE = $('#inspectDate').val();
            $.ajax({
                url : "<?php echo site_url('C_Aql/insert_partial')?>",
                method : "POST",
                data : {PO_NO:PO_NO, PARTIAL:PARTIAL, QTY:QTY, INSPECTOR:INSPECTOR, LEVEL:LEVEL, INSPECT_DATE:INSPECT_DATE},
                dataType : "json",
                success:function(data){
                show_product();
                }
            });
          });


        $(document).on('click','.part_edit',function(){
         //   var PO_NO     = $(this).data('PO_NO');
            var PO_NO = $(this).attr("data-PO_NO");
            var PARTIAL   = $(this).attr("data-PARTIAL");
            var QTY       = $(this).attr("data-QTY");
            var level     = $(this).attr("data-LEVEL");
            var Inspector = $(this).attr("data-INSPECTOR");
            var Inspect_date = $(this).attr("data-INSPECT_DATE");
             
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
            var PO_NO =  $('#PO_NO_edit').val();
            var PARTIAL =  $('#partial_edit').val();
            var QTY =  $('#qty_edit').val();
            var level =  $('#level_edit').val();
            var Inspector =  $('#Inspector_edit').val();
            var Inspect_date = $('#date_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('C_Aql/update_partial')?>",
                dataType : "JSON",
                data : {PO_NO:PO_NO , PARTIAL:PARTIAL, QTY:QTY, level:level, Inspector:Inspector, Inspect_date:Inspect_date},
                success: function(data){
                    $('[name="PO_NO_edit"]').val("");
                    $('[name="partial_edit"]').val("");
                    $('[name="qty_edit"]').val("");
                    $('[name="level_edit"]').val("");
                    $('[name="Inspector_edit"]').val("");
                    $('[name="date_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
        //  var tableRandom =  $('#tableRandom').DataTable({
        //    "ajax"{
        //         type  : 'POST',
        //         url   : "<?php echo site_url('C_Aql/aql_carton_cek/');?>",
        //         async : true,
        //         dataType : 'json',
        //         data : {PO_NO:PO_NO, PARTIAL:PARTIAL, QTY:QTY, LEVEL:LEVEL},
        //         success : function(data){
        //             var html = '';
        //             var i;
        //             for(i=0; i<data.length; i++){
        //                 html += '<tr>'+
        //                         '<td>'+data[i].CTN_NO+'</td>'+
        //                         '<td>'+data[i].CTN_QTY+'</td>'+
        //                         '<td>'+data[i].size+'</td>'+
        //                         '<td>'+data[i].QTY_RANDOM+'</td>'+
        //                         '<td style="text-align:right;">'+
        //                             '<a href="javascript:void(0);" class="btn btn-danger btn-sm part_delete" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Delete</a>'+' '+
        //                         '</td>'+
        //                         '</tr>';
        //             }
        //             $('#random').html(html);
        //         }
 
        //     };
        // });

        // $(document).on('click','.item_random',function(){
        //     // var PO_NO     = $(this).attr("data-PO_NO");
        //     // var PARTIAL   = $(this).attr("data-PARTIAL");
        //     // var QTY       = $(this).attr("data-QTY");
        //     // var LEVEL     = $(this).attr("data-LEVEL");
        //     // $.ajax({
        //     //     type  : 'POST',
        //     //     url   : "<?php echo site_url('C_Aql/aql_carton_cek/');?>",
        //     //     async : true,
        //     //     dataType : 'json',
        //     //     data : {PO_NO:PO_NO, PARTIAL:PARTIAL, QTY:QTY, LEVEL:LEVEL},
        //     //     success : function(data){
        //     //         var html = '';
        //     //         var i;
        //     //         for(i=0; i<data.length; i++){
        //     //             html += '<tr>'+
        //     //                     '<td scope="row">'+i+'</td>'+
        //     //                     '<td>'+data[i].CTN_NO+'</td>'+
        //     //                     '<td>'+data[i].CTN_QTY+'</td>'+
        //     //                     '<td>'+data[i].size+'</td>'+
        //     //                     '<td>'+data[i].QTY_RANDOM+'</td>'+
        //     //                     '<td style="text-align:right;">'+
        //     //                         '<a href="javascript:void(0);" class="btn btn-danger btn-sm part_delete" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-QTY="'+data[i].QTY+'" data-LEVEL="'+data[i].LEVEL+'" data-INSPECTOR="'+data[i].INSPECTOR+'" data-INSPECT_DATE="'+data[i].INSPECT_DATE+'">Delete</a>'+' '+
        //     //                     '</td>'+
        //     //                     '</tr>';
        //     //         }
        //     //         $('#random').html(html);
        //     //     }
 
        //     // });
        //       reload_random();
        // });


    })
</script>