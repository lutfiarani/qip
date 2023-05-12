<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

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

            <form method="post" id="import_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" required accept=".xls, .xlsx">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      
                  </div>
                  <div class="card-footer">
                    <a href="//10.10.100.23/qip/upload/format/export_schedule_template.xlsx" class="btn btn-success btn-sm">Download Format Import Data</a>
                    <input type="submit" name="import" value="Import" class="btn btn-primary btn-sm" />
                  </div>
            </form>
            <!-- <input type="file" id="myPdf" /><br> -->
            <canvas id="pdfViewer"  width="50%" height="50%"></canvas>

            <table id="listExport" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PO_NO</th>
                  <th>INSPECT_DATE</th>
                  <th>UPLOAD_DATE</th>
                  <th>STATUS_MES</th>
                  
                </tr>
                </thead>
                <tbody>
                
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


    <script src="//10.10.100.23/qip/template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="//10.10.100.23/qip/template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="//10.10.100.23/qip/template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    <!--script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="//10.10.100.23/qip/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="//10.10.100.23/qip/template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
 


    
    <script src="//10.10.100.23/qip/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="//10.10.100.23/qip/template/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
    <!-- <AdminLTE App > -->
    <script src="//10.10.100.23/qip/template/dist/js/adminlte.min.js"></script>
    <!-- <AdminLTE for demo purposes > -->
    <script src="//10.10.100.23/qip/template/dist/js/demo.js"></script>
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