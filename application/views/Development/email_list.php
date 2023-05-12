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
            <table id="tableEmail" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat Email</th>
                  <th>Departemen</th>
                  <th>Job Level</th>
                  <th>Dibuat tanggal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="tabel_email">
                
                </tbody>
                <tfooter>
                    <tr>
                        <td></td>
                        <td id="nama" contenteditable></td>
                        <td id="email" contenteditable></td>
                        <td id="departemen" contenteditable></td>
                        <td id="job_level" contenteditable></td>
                        <td id="created_at"></td>
                        <td><button class="btn btn-success btn-xs insertSales" id="insertEmail">+ Tambah</button></td>
                    </tr>
                </tfooter>
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
                    <input type="hidden" name="ID_EXPORT" id="ID_EXPORT" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
     </form>
     <!--END MODAL DELETE-->
     

    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    
    <script src="<?php echo base_url();?>template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
    bsCustomFileInput.init();
    });
    </script>
    <script>
        
        $(document).ready(function(){
           tabelEmail();
           function tabelEmail(){
                $.ajax({
                        type      : "ajax",
                        url       : "<?php echo site_url('C_dev_stage/email_list_')?>",
                        method    : "POST",
                        dataType  : 'json',
                        success   : function(data){
                            
                            var html = '';
                            var i;
                            var a = 1;
                           
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                        '<td>'+a+'</td>'+
                                        '<td id="nama1">'+data[i].NAMA+'</td>'+
                                        '<td id="email1">'+data[i].ALAMAT_EMAIL+'</td>'+
                                        '<td id="departemen1">'+data[i].DEPARTEMEN+'</td>'+
                                        '<td id="job_level1">'+data[i].JOB_LEVEL+'</td>'+
                                        '<td>'+data[i].CREATED_AT+'</td>'+
                                        '<td><button type="button" class="btn btn-danger btn-xs deleteEmail" id="deleteEmail" id_email="'+data[i].ID_EMAIL+'">X Delete</button></td>'+
                                        '</tr>';
                                        a++;
                            }
                            
                            $('#tabel_email').html(html);
                        }
                    });
            }

          
            $('#insertEmail').on('click', function(){
				var nama        = $('#nama').text();
                var email       = $('#email').text();
                var departemen  = $('#departemen').text();
                var job_level   = $('#job_level').text();
                if((nama=='')||(email=='')||(departemen=='')||(job_level=='')){
					alert('pastikan semua field diisi');
					return false;
				}
				
				$.ajax({
					url : "<?php echo site_url('C_dev_stage/insertEmail')?>",
					method : "POST" ,
					data : {nama:nama, email:email, departemen:departemen, job_level:job_level},
					// dataType : "json",
					success:function(data){
                        // console.log(data);
                        $('[name="nama"]').text("");
                        $('[name="email"]').text("");
                        $('[name="departemen"]').text("");
                        $('[name="job_level"]').text("");
                        // reload_table();
						tabelEmail();
					}
			    });
             });


            $(document).on('click','.deleteEmail',function(){
                var id     = $(this).attr('id_email');
                
                $.ajax({
                    url : "<?php echo site_url('C_dev_stage/deleteEmail')?>",
                    method : "POST" ,
                    data : {id:id},
                    success:function(data){
                        tabelEmail();
                    }
                });
            });
        

        })

    </script>

    

