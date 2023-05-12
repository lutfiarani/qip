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

            


            <table id="example1" class="table table-bordered table-striped" style="width:100%">
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
                <?php
		$jumlah = count($query);
	    for ($i=0; $i<$jumlah; $i++){
				$data = $query[$i];
        
        echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[PO_NO]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[EXPORT_DATE]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[TYPE]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[CONTAINER]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[REMARK]</td>
        <td style ='word-break:break-word; font-size: 90%;'>$data[LMNT_DTTM]</td>
        <td> <a href=\"".site_url('C_Export/delete/'.$data['ID_EXPORT'])."\"onclick=\"return konfirmasi()\" class='btn btn-danger btn-xs' >Delete</a></td>
							</tr>";
        
        /*echo "<tr>
        <td style ='word-break:break-word; font-size: 90%;'>".($i+1)."</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[id]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[po]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[date]</td>
    <td style ='word-break:break-word; font-size: 90%;'>$data[remark]</td>
   
   </tr>";*/
				  
				
		}
  ?>
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

    

<!-- jQuery -->
<script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example2").DataTable();
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!--js datepicker-->
<script src="<?php echo base_url();?>template/plugins/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>