</div>

<!-- MODAL EDIT REJECT INSPECTION-->
<form>
  <div class="modal fade" id="Modal_Edit_Reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Status PO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group row">
                  <label class="col-md-2 col-form-label">PO NO</label>
                  <div class="col-md-10">
                    <input type="text" name="PO_NO_edit" id="PO_NO_edit" class="form-control" placeholder="PO NO" readonly>
                    <input type="hidden" name="STATUS_PO" id="STATUS_PO" class="form-control" placeholder="STATUS PO" value="">
                  </div>
              </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" type="submit" id="btnReject" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!--END MODAL EDIT-->


<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.2-pre
  </div>
  <strong>IT Department. 2020
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- <script type="text/javascript" src="<?php //echo base_url();?>template/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php //echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>

<script src="<?php //echo base_url();?>template/plugins/jquery/jquery.min.js"></script>

<script src="<?php //echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php //echo base_url();?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php //echo base_url();?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="<?php// echo base_url();?>template/dist/js/adminlte.min.js"></script>

<script src="<?php //echo base_url();?>template/dist/js/demo.js"></script>

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
    "fixedHeader": true
  });
}); -->

<!-- $(document).ready(function() {
  var table = $('#example').DataTable( {
      fixedHeader: true
  } );
} );
</script> -->

<!--js datepicker-->
<!-- <script src="<?php //echo base_url();?>template/plugins/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
$(function(){
$(".datepicker").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
});
});

$(function(){
$(".datepicker1").datepicker({
    format: 'yyyy-mm',
    autoclose: true,
    todayHighlight: true,
});
});
</script> -->