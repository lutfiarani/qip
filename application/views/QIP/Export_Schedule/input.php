
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Input Data Export</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              
          <!-- /.col (left) -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Export</h3>
              </div>
              <form role="form" action=<?php echo $action;?> method="post">
               <div class="card-body">
                <!-- Date range -->
                <div class="form-group">
                    <label for="exampleInputEmail1">PO NO</label>
                    <input type="text" class="form-control" name="PO_NO" placeholder="Enter PO NO">
                </div>
                

                <div class="form-group">
                        <label name="TYPE">TYPE</label>
                        <select class="custom-select" name="TYPE">
                          <option value="CY">CY</option>
                          <option value="CFS">CFS</option>
                          <option value="AIR">AIR</option>
                          <option value="TRUCK">TRUCK</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">CONTAINER NO</label>
                    <input type="text" class="form-control" name="CONTAINER" placeholder="Enter Container Number">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Remark</label>
                    <input type="text" class="form-control" name="REMARK" placeholder="Enter Remark">
                </div>
                <!-- Date and time range -->
                

                <!-- Date and time range -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- /.form group -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
            <!-- Bootstrap Switch -->
          
            <!-- /.card -->
          </div>
          <!-- /.col (right) -->
        </div>

     
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
    
