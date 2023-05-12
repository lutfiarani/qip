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

            


            <table id="listExport" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                <th>No</th>
                  <th>PO No</th>
                  <th>Export Date</th>
                  <th>Type</th>
                  <th>Container</th>
                  <th>Remark</th>
                  <th>Input Date</th>
                  <th>Action</th>
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
    <script>
        var tableListExport;

        function reload_table(){
          tableListExport.ajax.reload(null, false);
        }

        $(document).ready(function(){
          tableListExport = $('#listExport').DataTable({
              "ajax"  :{
                url   : "<?php echo site_url('C_Export/list_po')?>",
                type  : 'GET',
                responsive: true
              },
          });

          $(document).on('click','.delete', function(){
            var ID_EXPORT = $(this).attr("id");
            if(confirm("Are you sure want to delete this?"))
            {
              $.ajax({
                url : "<?php echo site_url('C_Export/delete')?>",
                method: "POST",
                data : {ID_EXPORT:ID_EXPORT},
                success : function(data){
                  alert(data);
                  reload_table();
                }
              });
            }else{
              return false;
            }
        

          });

        })

    </script>

    

