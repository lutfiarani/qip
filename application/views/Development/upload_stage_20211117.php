<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- dropzonejs -->
<!-- <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/dropzone/min/dropzone.min.css"> -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script type="text/javascript">
    
    function konfirmasi(){
		var pilihan = confirm("apakah anda yakin akan menghapus data ini?");
		
		if(pilihan){
			return true;		
		}else{
			return false;
		}
	
	}

</script>

<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
            <div class="card card-primary">
            
             
            
            <div class="card-body">

            <form method="post" id="import_file" enctype="multipart/form-data">
                <div class="row">
                  <!-- <div class="col-sm-4"> -->
                      
                    <!-- <div class="form-group">
                      <label>Model Name</label>
                      <div class="select2-blue">
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" id="model" name="model">
                        <?php
                                        $no = 1;
                                        for($i = 0; $i < count($model); $i++){
                                            // if($model[$i]['MODEL']== $row['MODEL']){
                                                if(isset($model[$i]['MODEL'])){
                                                echo "<option data-tokens='".$model[$i]['MODEL']."' value='".$model[$i]['MODEL']."' selected>".$model[$i]['MODEL']."</option>";
                                            }else{
                                                echo "<option data-tokens='".$model[$i]['MODEL']."' value='".$model[$i]['MODEL']."' >".$model[$i]['MODEL']."</option>";
                                            }
                                        }
                                    ?>
                        </select>
                      </div>
                    </div> -->
                    
                    <!-- </div> -->
                    <div class="col-sm-4" >
                      <div class="form-group">
                      <label>Model Name</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" id="model" name="model" style="text-transform: uppercase">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-success search_model" id="search_model" >Search Model</button>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-sm-8">
                     <div class="form-group">
                        <label>Related Model in SAP</label>
                        <div class="select2-blue">
                          <select class="select2" multiple="multiple" data-placeholder="" data-dropdown-css-class="select2-purple" style="width: 100%;" id="model_tampil" name="model_tampil[]">
                                <!-- <option value="">All SDD</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 date" >
                      <div class="form-group">
                        <label>Article</label>
                        <input type="text" id="article" name="article" class="form-control" placeholder="Enter Article ..." autocomplete="off" style="text-transform: uppercase">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stage</label>
                        <select class="form-control select2bs4"  data-show-subtext="true" data-live-search="true" id="stage" name="stage">
                              <!-- <option value=""></option> -->
                              <?php
                                    $no = 1;
                                    for($i = 0; $i < count($stage); $i++){
                                        // if($model[$i]['MODEL']== $row['MODEL']){
                                            if(isset($stage[$i]['MODEL'])){
                                            echo "<option data-tokens='".$stage[$i]['STAGE_ID']."' value='".$stage[$i]['STAGE_ID']."' >".$stage[$i]['STAGE_NAME']."</option>";
                                        }else{
                                            echo "<option data-tokens='".$stage[$i]['STAGE_ID']."' value='".$stage[$i]['STAGE_ID']."' >".$stage[$i]['STAGE_NAME']."</option>";
                                        }
                                    }
                                ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4 date" >
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" id="tanggal" name="tanggal" data-provide="datepicker"  class="form-control" placeholder="Enter Date ..." autocomplete="off">
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status</label>
                            <select class="form-control"  data-show-subtext="true" data-live-search="true" id="status" name="status">
                                <option value="PASS"> Pass</option>
                                <option value="FAIL"> Fail</option>
                            </select>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label>Remark</label>
                        <textarea rows="3" class="form-control" placeholder="Enter ..." id="remark" name="remark"></textarea>
                      </div>
                    </div>
                    
                 </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="myPdf" name="file" required accept=".pdf">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                  <div class="text-center">
                      
                  </div>
                  <div class="card-footer float-end">
                    <p align="right">
                      <input type="submit" name="import" value="Simpan dan Upload File" class="btn btn-primary btn-sm" />
                    </p>
                  </div>

            </form>
            <canvas id="pdfViewer"  name="pdfViewer"></canvas>
            <table class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                      <th><center>NO</center></th>
                      <th><center>MODEL NAME</center></th>
                      <th><center>RELATED MODEL</center></th>
                      <th><center>ARTICLE</center></th>
                      <th><center>STAGE</center></th>
                      <th><center>DATE</center></th>
                      <th><center>STATUS</center></th>
                      <th><center>REMARK</center></th>
                      <th><center>UPLOADED AT</center></th>
                      <th><center>FILE NAME</center></th>
                      <th><center>ACTION</center></th>
                    
                    </tr>
                </thead>
                <tbody id="fileUploadDevelopment">
                
                </tbody>
                </table>
  <?php //}?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!--MODAL DELETE------------>
    <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete PO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="nama_file" id="nama_file" class="form-control">
                    <input type="hidden" name="model_name" id="model_name" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
     </form>
     <!--END MODAL DELETE-->

     <!--MODAL PREVIEW-->
        <div id="modalPreview" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">Preview Uploaded PDF</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="preview_file_stage">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
     <!--//MODAL PREVIEW-->
     

   
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>
       
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script> -->
 
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>

    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <!-- <AdminLTE App > -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>

    <!-- <AdminLTE for demo purposes > -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
   
    <script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

    
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    $.fn.datepicker.defaults.format = "yyyymmdd";
    $('#tanggal').datepicker({
        startDate: '-30d',
        todayHighlight: true,autoclose: true,
    });

    </script>
    <script>
        
    $(document).ready(function(){
        // var model = "ZIG DYNAMICA HLD W";
        // view_dev_stage(model);
        view_dev_stage();

        $('#import_file').submit(function(e){
            var model = $('#model').val();
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo site_url('C_dev_stage/upload_stage')?>',
                    method:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                
                    success: function(data){
                        $("#pdfViewer").hide()
                   
                        view_dev_stage();
                    }
                });
                $("#import_file").unbind('submit');
                    return false;
        });



        // $("#model").change(function(){
        // var model=$(this).val();
        // $.ajax({
        //     data:{model:model},
        //     success: function(respond){
        //         // getStage();
        //         // $("#stage").html(respond);
        //         view_dev_stage();
                
        //         }
        //     })
        // });

        // function getStage(){
        //   var model =$('#model').val();
          
        //   $.ajax({
        //       type:"POST",
        //       url: "<?php echo site_url('C_dev_stage/stage/') ?>",
        //       data : {model:model},
        //       cache: false,
        //       success: function(respond){
        //           $("#stage").html(respond);
        //       }
        //   });
        // }

        function view_dev_stage(){
            $.ajax({
                type:"POST",
                url: "<?php echo site_url('C_dev_stage/view_upload_stage/') ?>",
                // data : {model:model},
                cache: false,
                dataType : "JSON",
                success: function(data){
                    var alamat = "<?php echo base_url();?>upload/pdf";
                    var html = '';
                    var i;
                    var no = 1;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+data[i].MODEL_INPUT+'</td>'+
                                '<td>'+data[i].LISTMODEL+'</td>'+
                                '<td>'+data[i].ARTICLE+'</td>'+
                                '<td>'+data[i].STAGE_NAME+'</td>'+
                                '<td>'+data[i].TANGGAL+'</td>'+
                                '<td>'+data[i].STATUS+'</td>'+
                                '<td>'+data[i].REMARK+'</td>'+
                                '<td>'+data[i].CREATED_AT+'</td>'+
                                '<td>'+data[i].DOKUMEN+'<br><button type="button" class="btn btn-success btn-xs preview" data-toggle="modal"  data-file="'+data[i].DOKUMEN+'">Preview</button>   '+
                                '<a class="btn btn-info btn-xs download" href="'+alamat+'/'+data[i].DOKUMEN+'"  download>Download</a>   '+
                                // '<button type="button" class="btn btn-warning btn-xs edit"  data-file="'+data[i].DOKUMEN+'">Email</button>   '+
                                '<button type="button" class="btn btn-danger btn-xs delete"  data-file="'+data[i].DOKUMEN+'" model_name="'+data[i].MODEL_NAME+'">Delete</button></td>   ';
                                
                                if(data[i].STATUS=='FAIL'){
                                    html +='<td><button type="button" class="btn btn-block btn-info btn-xs pass"  data-file="'+data[i].DOKUMEN+'">PASS</button></td>';
                                }else if((data[i].STATUS=='PASS')){
                                    html += '<td></td>';
                                }else if((data[i].STATUS=='RE-TRIAL PASSED')){
                                    html += '<td>Update to Re Trial Passed at '+data[i].UPDATED_AT+'</td>';
                                }
                               no++;
                       html +=     '</tr>';
                      
                }
                $('#fileUploadDevelopment').html(html);
                    
                }
            })
        }

         
          
        $(document).on('click','.delete',function(){
            var nama_file = $(this).attr("data-file");//$(this).attr('id');//
            var model       = $(this).attr("model_name");
            
            $('#Modal_Delete').modal('show');
            $('[name="nama_file"]').val(nama_file);
            $('[name="model_name"]').val(model);
        });

        $(document).on('click','.pass',function(){
            var nama_file = $(this).attr("data-file");
            $.ajax({
              type : "POST",
              url  : "<?php echo site_url('C_dev_stage/resend_email')?>",
              dataType : "JSON",
              data : {nama_file:nama_file},
              success: function(data){
                  
                  // alert('Hasil Fail berhasil diubah');
                  view_dev_stage();
                  
              }
          });
        });

        $(document).on('click','.delete',function(){
            var nama_file = $(this).attr("data-file");//$(this).attr('id');//
            var model       = $(this).attr("model_name");
            
            $('#Modal_Delete').modal('show');
            $('[name="nama_file"]').val(nama_file);
            $('[name="model_name"]').val(model);
        });

        $(document).on('click','.search_model',function(){
            var nama_model = $('#model').val();//$(this).attr('id');//
            $.ajax({
              
              type : "POST",
              url  : "<?php echo site_url('C_dev_stage/tampil_model')?>",
              // dataType : "JSON",
              cache: false,
              data : {nama_model:nama_model},
              success: function(data){
                if (typeof data !== 'undefined') {
                  // alert("tidak ada data");
                  $('#model_tampil').html(data);
                }else{
                  alert("tidak ada data");
                }
              }
          });
          return false;
        });



        $(document).on('click','.preview',function(){
          var nama_file   = $(this).attr("data-file");
          var alamat      = "<?php echo base_url();?>upload/pdf";
          var html        = "";
          
          html +="<iframe src='"+alamat+"/"+nama_file+"' frameborder='0' height='500' width='100%' ></iframe>";
            
          $('#preview_file_stage').html(html);
          $('#modalPreview').modal('show');
        });
 




        $('#btn_delete').on('click',function(){
          var nama_file =$('#nama_file').val();// $('#id').val();
          var model =$('#model_name').val();
          $.ajax({
              type : "POST",
              url  : "<?php echo site_url('C_dev_stage/delete_file')?>",
              dataType : "JSON",
              data : {nama_file:nama_file},
              success: function(data){
                  
                  $('#Modal_Delete').modal('hide');
                  view_dev_stage();
                  
              }
          });
          return false;
        });

  })

</script>

    


<script>
//  Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

$("#myPdf").on("change", function(e){
	var file = e.target.files[0]
	if(file.type == "application/pdf"){
		var fileReader = new FileReader();  
		fileReader.onload = function() {
			var pdfData = new Uint8Array(this.result);
			// Using DocumentInitParameters object to load binary data.
			var loadingTask = pdfjsLib.getDocument({data: pdfData});
			loadingTask.promise.then(function(pdf) {
			  console.log('PDF loaded');
			  
			  // Fetch the first page
			  var pageNumber = 1;
			  pdf.getPage(pageNumber).then(function(page) {
				console.log('Page loaded');
				
				var scale = 1.5;
				var viewport = page.getViewport({scale: scale});

				// Prepare canvas using PDF page dimensions
				var canvas = $("#pdfViewer")[0];
				var context = canvas.getContext('2d');
				canvas.height = viewport.height;
				canvas.width = viewport.width;

				// Render PDF page into canvas context
				var renderContext = {
				  canvasContext: context,
				  viewport: viewport
				};
				var renderTask = page.render(renderContext);
				renderTask.promise.then(function () {
				  console.log('Page rendered');
				});
			  });
			}, function (reason) {
			  // PDF loading error
			  console.error(reason);
			});
		};
		fileReader.readAsArrayBuffer(file);
	}
});
</script>