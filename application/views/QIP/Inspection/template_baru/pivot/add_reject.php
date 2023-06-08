<style>
   button {
      width:300px;
      height:55px;
      text-align:center;
      line-height:1.1em;
      color: #fff;
      /* font-family: 'TitilliumText22LRegular', Arial, sans-serif;
      font-weight:bold; */
      /* font-size: 0.1em; */
      border-radius: 0px;
      min-width:120px;
      background: #00abc6;
      border: none;
}

button:hover {
	background: #3E3E3E;
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
           
            <!-- /.card -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                 <div class="card-body">
                 <font size="3">
                    <table class="table table-bordered" id="aql_basic">
                      <thead>                  
                        <tr>
                          <th>STATUS</th>
                          <th>PO</th>
                          <th style="width: 20px">Partial</th>
                          <th>Inspector Name</th>
                          <th>Level</th>
                          <th>Inspect Date</th>
                          <th>MINOR ACC-REJ</th>
                          <th>MAJOR ACC-REJ</th>
                          <th>CRITIC ACC-REJ</th>
                          <th>TOTAL QTY</th>
                          </tr>
                      </thead>
                      <tbody id="showData">
                      <tr>
                        <?php 
                          If($basic->REMARK === 1){
                            echo "<td>INSPECT</td>";
                            echo "<td id='REMARK' name='REMARK' value='$basic->REMARK' hidden>$basic->REMARK</td>";
                          }else{
                            echo "<td>REINSPECT</td>";
                            echo "<td id='REMARK' name='REMARK' value='$basic->REMARK' hidden>$basic->REMARK</td>";
                          }
                          echo "
                            <td id='PO_NO' name='PO_NO'>$basic->PO_NO</td>
                            <td id='PARTIAL' name='PARTIAL'>$basic->PARTIAL</td>
                            <td id='INSPECTOR' name='INSPECTOR'>$basic->INSPECTOR</td>
                            <td id='LEVEL' name='LEVEL'>$basic->LEVEL</td>
                            <td id='INSPECT_DATE' name='INSPECT_DATE'>$basic->INSPECT_DATE</td>
                            <td id='MINOR_ACC_REJ' name='MINOR_ACC_REJ'>$basic->MINOR_ACC_REJ</td>
                            <td id='MAJOR_ACC_REJ' name='MAJOR_ACC_REJ'>$basic->MAJOR_ACC_REJ</td>
                            <td id='CRITIC_ACC_REJ' name='CRITIC_ACC_REJ'>$basic->CRITIC_ACC_REJ</td>
                            <td id='PARTIAL_QTY' name='PARTIAL_QTY'>$basic->PARTIAL_QTY</td>
                            <td id='LEVEL_USER' name='LEVEL_USER' hidden>$basic->LEVEL_USER</td>";
                        
                        ?>
                        </tr>
                      </tbody>
                    </table>
                  </font>
                  </div>
                      
             
             
              <!--div class="row">
              <div class="card-body" id="show_data">
                
                </div>
              </div-->
            </div>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Defect</h3>
              </div>
                <table class="table table text-center">
                    <tbody>
                     <tr>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code" name="code" id="code" value="100"> 100 - PACKING AND LABELLING</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="200">200 - INSIDE THE SHOE</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="310">310 - UPPER MATERIALS</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="320">320 - UPPER STITCHING</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="330">330 - UPPER TREATMENTS</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="340">340 - UPPER APPEARANCE</button>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="350">350 - LACES/VELCROS/...</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="360">360 - OTHER DEFECT</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="400">400 - BOTTOM AND STOCKFITTING</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="500">500 - ASSEMBLING</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="600">600 - CLEATES AND SPIKES</button>
                        </td> 
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="700">700 - BOOST</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="800">800 - VULCANIZED</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="900">900 - CARBN 4D</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code"  name="code" id="code" value="1000">1000 - DIRECT SOLING</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code" name="code" id="code" value="1100">1100 - SLIDES/SANDALS</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code" name="code" id="code" value="1200">1200 - KNITTING UPPER</button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-block bg-gradient-info code" name="code" id="code" value="1300">1300 - NO SEW</button>
                        </td>
                    </tr>
                    <tr>
                    
                    </tr>
                   </tbody>
                   
                   </table>
              
                <div class="card-body">
                    <table class="table table-bordered" id="table_reject_all">
                        <thead>                  
                            <tr>
                                <th>X</th>
                                <th>CODE</th>
                                <th style="width: 20px">CODE_DESC</th>
                                <th>REJECT CODE</th>
                                <th>REJECT DESC</th>
                                <th>COMMENT</th>
                                <th>MINOR</th>
                                <th>MAJOR</th>
                                <th>CRITICAL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="showReject">
                            
                        </tbody>
                        
                    </table>
                </div>
                
                <div class="col">
                  <button type="button" class="btn btn-success btn-block btn-flat" name="finishInspect" id="finishInspect">Finish - Create Report </button>
                </div>
                
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
                    <h5 class="modal-title" id="detailReject"></h5>
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
        
        
        <!-- MODAL DISPLAY IMAGE  -->
            <div class="modal fade" id="Modal_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailReject"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body" id="display_image">
                 
                  </div>
                 <div class='modal-footer'>
               
                 </div>
                </div>
              </div>
            </div>
        <!-- END MODAL DISPLAY IMAGE -->



    </section>
    <!-- /.content -->
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    <!-- <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/new_js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
   
    <script>
    
    // function save_image(){
    //   var formData = new FormData(document.querySelector("#upload_reject"));
    //   $.ajax({
    //       url : "<?php echo base_url();?>/C_aql_reject/save_image",
    //       type : "POST",
    //       data : formData,
    //       contentType : false,
    //       processData : false,
    //       dataType : "JSON",
    //       success : function(data){
    //           // alert(data)
    //           document.getElementById("upload_reject").reset();
    //           location.reload();
    //         // $('#upload_gambar').value = "";
            

    //       }
    //   })
      
    // }


   
      $(document).ready(function(){
          var PO_NO     = $('#PO_NO').text();
          var PARTIAL   = $('#PARTIAL').text();
          var INSPECTOR = $('#INSPECTOR').text();
          var LEVEL     = $('#LEVEL').text();
          var REMARK    = $('#REMARK').text();
          var LEVEL_USER= $('#LEVEL_USER').text();

          // view_defect_load();
          view_defect();
         

          function view_defect(){
            $.ajax({
              url : "<?php echo base_url();?>index.php/C_aql_reject/view_defect",
              type: "POST",
              data: {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, LEVEL_USER:LEVEL_USER},
              dataType: "JSON",
              success: function(data)
              {
                      var html = '';
                      var i 
                      var mi=0
                      var ma=0 
                      var cr=0
                     for(i=0; i<data.length; i++){
                          html += '<tr>'+
                                  '<td><label class="btn btn-danger btn-flat btn-sm delete_defect" data-CODE="'+data[i].CODE+'" data-REJECT_CODE="'+data[i].REJECT_CODE+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK = "'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'"><i class="fa fa-trash"></i></label></td>'+
                                  '<td>'+data[i].CODE+'</td>'+
                                  '<td>'+data[i].CODE_NAME+'</td>'+
                                  '<td>'+data[i].CODE+'.'+data[i].REJECT_CODE+'</td>'+
                                  '<td>'+data[i].REJECT_CODE_NAME+'</td>'+
                                  '<td contenteditable class="update_data" id="comment_defect" style="background-color:#98F4F8 ; width: 20%" data-column="COMMENT" data-CODE="'+data[i].CODE+'" data-REJECT_CODE="'+data[i].REJECT_CODE+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK = "'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'">'+data[i].COMMENT+'</td>'+
                                  '<td><input class="mi" type="text" value="'+data[i].MI+'" hidden>'+data[i].MI+'</td>'+
                                  '<td><input class="ma" type="text" value="'+data[i].MA+'" hidden>'+data[i].MA+'</td>'+
                                  '<td><input class="cr" type="text" value="'+data[i].CR+'" hidden> <span class="cr">'+data[i].CR+'</td>'+
                                  
                                  '<td>'+
                                  '<div class="row">'+
                                  
                                  '<form class="form-horizontal" id="upload_reject" method="post">'+
                                    '<input type="hidden" name="CODE" value="'+data[i].CODE+'">'+
                                    '<input type="hidden" name="REJECT_CODE" value="'+data[i].REJECT_CODE+'">'+
                                    '<input type="hidden" name="PO_NO" value="'+data[i].PO_NO+'">'+
                                    '<input type="hidden" name="PARTIAL" value="'+data[i].PARTIAL+'">'+
                                    '<input type="hidden" name="LEVEL_USER" value="'+data[i].LEVEL_USER+'">'+
                                    '<input type="hidden" name="REMARK" value="'+data[i].REMARK+'">'+
                                    '<input type="hidden" name="LEVEL" value="'+data[i].LEVEL+'">'+
                                    '&nbsp&nbsp&nbsp&nbsp&nbsp<label class="btn btn-primary btn-flat btn-xs upload_image" >'+
                                            '<input type="file" id="upload_gambar" name="files" id_seq="'+i+'"  data-CODE="'+data[i].CODE+'" data-REJECT_CODE="'+data[i].REJECT_CODE+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK = "'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'" accept="image/png, image/gif, image/jpeg" />'+
                                            '<input type="hidden" name="picture_code" id="picture_code" value="10'+i+'">'+
                                            // '<i class="fa fa-camera"> Take Picture</i>'+
                                        '</label>'+
                                        '<label class="btn btn-primary btn-flat btn-xs" ><input type="submit" class="btn btn-success btn-flat btn-xs" value="Upload" id="upload_img"></label>'+
                                        
                             
                                        '</form>';
                            if((data[i].REJECT_IMG != null) && (data[i].REJECT_IMG != "")){
                                html += '&nbsp<label class="btn btn-warning btn-xs btn-flat show_image" data-CODE="'+data[i].CODE+'" data-REJECT_CODE="'+data[i].REJECT_CODE+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK = "'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'"><i class="fa fa-image"> Preview </i></label>'
                                html += '&nbsp<label class="btn btn-danger btn-xs btn-flat delete_image" data-CODE="'+data[i].CODE+'" data-REJECT_CODE="'+data[i].REJECT_CODE+'" data-PO_NO="'+data[i].PO_NO+'" data-PARTIAL="'+data[i].PARTIAL+'" data-LEVEL_USER="'+data[i].LEVEL_USER+'" data-REMARK = "'+data[i].REMARK+'" data-LEVEL="'+data[i].LEVEL+'"  data-column="REJECT_IMG"><i class="fa fa-trash"> Delete Image</i></label>'
                            }
                                  html +='</div></td>'+
                                  
                                  '</tr>'
                                  
                                  mi += data[i].MI
                                  ma += data[i].MA
                                  cr += data[i].CR

                                  
                      }
                      html += '<tr style="background-color: #93A8A9 ; font-size: 18px">'+
                                  '<td colspan="5" style="text-align:right"><b>TOTAL</td>'+
                                  '<td><b>'+mi+'</td>'+
                                  '<td><b>'+ma+'</td>'+
                                  '<td> <b><span class="cr">'+cr+'</b></td>'+
                                  '<td></td>'+
                                '</tr>';
                     
                      
                      $('#showReject').html(html);
                      // $(document).on('change', '#upload_gambar', function(){
                      //               var formData = new FormData(document.querySelector("#upload_reject"));
        
                      //                 $.ajax({
                      //                     url : "<?php echo base_url();?>/C_aql_reject/save_image",
                      //                     type : "POST",
                      //                     data : formData,
                      //                     contentType : false,
                      //                     processData : false,
                      //                     dataType : "JSON",
                      //                     success : function(data){
                      //                         // alert(data)
                      //                       location.reload();
                      //                     }
                      //                 })
                                     
                      //             })
                     
                },
            });
           
          }

          function view_defect_load(){
                window.onload = view_defect();
          }

          function detail_code(code_id){
            $.ajax({
                type      : "ajax",
                url       : "<?php echo site_url('C_aql_reject/detail_reject_code')?>",
                method    : "POST",
                dataType  : 'json',
                data      : {code_id:code_id},
                success   : function(data){
                    console.log(data)
                    
                    var html = '';
                    var i;
                    var a;
                    var coba
                    var judul = data[0].CODE_NAME ;
                    for(i=0; i<data.length; i++){
                        a = data[i].REJECT_CODE_NAME
                        // coba = a.substring(0,20)
                        if(data[i].STATUS_CODE == 'MI'){
                          html  +='<a class="btn bg-primary btn-app reject" data-dismiss="modal" code = "'+data[i].CODE+'" status_code="'+data[i].STATUS_CODE+'"  reject_code="'+data[i].REJECT_CODE+'" id="reject_code" name="reject_code" value="'+data[i].REJECT_CODE+'">'
                          html  +=' '+data[i].REJECT_CODE+' - '+a+''
                          html  +='<br>'+data[i].DESCRIPTION
                          html  +='</a>'
                          html  +='<br>';
                        }else if (data[i].STATUS_CODE == 'MA'){
                          html  +='<a class="btn bg-warning btn-app reject" data-dismiss="modal" code = "'+data[i].CODE+'" status_code="'+data[i].STATUS_CODE+'"  reject_code="'+data[i].REJECT_CODE+'" id="reject_code" name="reject_code" value="'+data[i].REJECT_CODE+'">'
                          html  +=' '+data[i].REJECT_CODE+' - '+a+''
                          html  +='<br>'+data[i].DESCRIPTION
                          html  +='</a>'
                          html  +='<br>';
                        }else if (data[i].STATUS_CODE == 'CR'){
                          html  +='<a class="btn bg-danger btn-app reject" data-dismiss="modal" code = "'+data[i].CODE+'" status_code="'+data[i].STATUS_CODE+'"  reject_code="'+data[i].REJECT_CODE+'" id="reject_code" name="reject_code" value="'+data[i].REJECT_CODE+'">'
                          html  +=' '+data[i].REJECT_CODE+' - '+a+''
                          html  +='<br>'+data[i].DESCRIPTION
                          html  +='</a>'
                          html  +='<br>';
                        }
                                
                    }
                    $('#Modal_Edit').modal('show');
                    $('#detailReject').html(judul);
                    $('#code_detail').html(html);
                }
            });
          }

          $(document).on('click','.code',function(){
        
              var code    =   $(this).attr('value');

              detail_code(code);

          });

    

          $(document).on('click','.reject',function(){
              var CODE        =$(this).attr('code');
              var REJECT_CODE = $(this).attr('reject_code');
              var STATUS_CODE = $(this).attr('status_code');

              $.ajax({
                  type      : "ajax",
                  url       : "<?php echo site_url('C_aql_reject/input_reject')?>",
                  method    : "POST",
                  dataType  : 'json',
                  data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, CODE:CODE, REJECT_CODE:REJECT_CODE, STATUS_CODE:STATUS_CODE},
                  success   :function(data){
                      console.log(data)

                      $('#Modal_Edit').modal('hide');
                      // window.onload = view_defect();
                      view_defect_load();
                     
                    
                  } 
              })
          })
 
         

    $(document).on('click','#finishInspect',function(){
        createReport();
    })

    function createReport(){
      $.ajax({
          url : "<?php echo base_url();?>index.php/C_aql_reject/report_",
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

    $(document).on('click','.delete_defect',function(){
        var PO_NO       = $(this).attr("data-PO_NO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var CODE        = $(this).attr("data-CODE");
        var REJECT_CODE = $(this).attr("data-REJECT_CODE");
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_reject/delete_defect')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, CODE:CODE, REJECT_CODE:REJECT_CODE, LEVEL_USER:LEVEL_USER},
            success   : function(data)
            {
              window.onload = view_defect();
            }
        });
    })

    $(document).on('click','.show_image',function(){
        var PO_NO       = $(this).attr("data-PO_NO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var CODE        = $(this).attr("data-CODE");
        var REJECT_CODE = $(this).attr("data-REJECT_CODE");
        
        $.ajax({
            type      : "POST",
            url       : "<?php echo site_url('C_aql_reject/view_image')?>",
            dataType  : "JSON",
            data      : {PO_NO:PO_NO , PARTIAL:PARTIAL, LEVEL:LEVEL, REMARK:REMARK, CODE:CODE, REJECT_CODE:REJECT_CODE, LEVEL_USER:LEVEL_USER},
            success   : function(data)
            {
                var html    =''
                var alamat  = "<?php echo base_url();?>template/images/aql_image/reject";
                html        += '<img src="'+alamat+'/'+data.REJECT_IMG+'" width="100%" height="100%" id="img1"></img>'

                $('#Modal_image').modal('show');
                $('#display_image').html(html);

            }
        });
    })

    $(document).on('click','.delete_image',function(){
        var PO_NO       = $(this).attr("data-PO_NO");
        var PARTIAL     = $(this).attr("data-PARTIAL");
        var REMARK      = $(this).attr("data-REMARK");
        var LEVEL       = $(this).attr("data-LEVEL");
        var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
        var CODE        = $(this).attr("data-CODE");
        var REJECT_CODE = $(this).attr("data-REJECT_CODE");
        var column      = $(this).attr("data-column");
        var value       = '';

        update_comment(column, value, CODE, REJECT_CODE, PO_NO, PARTIAL, LEVEL_USER, REMARK, LEVEL);

    })

    $(document).on('blur', '.update_data', function(){
            var column      = $(this).attr("data-column");
            var CODE        = $(this).attr("data-CODE");
            var REJECT_CODE = $(this).attr("data-REJECT_CODE");
            var PO_NO       = $(this).attr("data-PO_NO");
            var PARTIAL     = $(this).attr("data-PARTIAL");
            var LEVEL_USER  = $(this).attr("data-LEVEL_USER");
            var REMARK      = $(this).attr("data-REMARK");
            var LEVEL       = $(this).attr("data-LEVEL");
            var value       = $(this).text();
            
            update_comment(column, value, CODE, REJECT_CODE, PO_NO, PARTIAL, LEVEL_USER, REMARK, LEVEL);
    });


    function update_comment(column, value, CODE, REJECT_CODE, PO_NO, PARTIAL, LEVEL_USER, REMARK, LEVEL){
        $.ajax({
            url:"<?php echo site_url('C_aql_reject/update_comment')?>",
            data : {column:column, value:value, CODE:CODE, REJECT_CODE:REJECT_CODE, PO_NO:PO_NO, PARTIAL:PARTIAL, LEVEL_USER:LEVEL_USER, REMARK:REMARK, LEVEL:LEVEL},
            method:"POST",
            dataType : 'json',
            success:function(data)
            {
                window.onload = view_defect();
            }
        })
    }


    $(document).on('submit','#upload_reject',function(){
    // $('#upload_img_welcome').on('submit', function(event){
          // var img_id   = $('#img_id').val();
          event.preventDefault();
          $.ajax({
              url: "<?php echo site_url('C_aql_reject/save_image')?>",
              method:"POST",
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              success:function(data){
                  window.onload = view_defect();
                  
              }
          
        })

      //     var formData = new FormData(document.querySelector("#upload_reject"));
      // $.ajax({
      //     url : "<?php echo base_url();?>/C_aql_reject/save_image",
      //     type : "POST",
      //     data : formData,
      //     contentType : false,
      //     processData : false,
      //     dataType : "JSON",
      //     success : function(data){
      //         // alert(data)
      //         document.getElementById("upload_reject").reset();
      //         location.reload();
      //       // $('#upload_gambar').value = "";
            

      //     }
      // })

  

});

    






    })
</script>