
<!-- Main content -->
<section class="content" style="font-size: 15px">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card ">
              <div class="card-body">
             
                <div class="row">
                    <div class="col-md-12" id="table_po">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-warning text-xl">
                                    ALERT
                                </div>
                            </div>
                            <div class="alert alert-danger alert-dismissible">
                                <h5><i class="icon fas fa-ban"></i> ERROR</h5>
                                    Cannot Send Data to Pivot <br> <h3><b>Please contact your IT at ext 051</h3></b><br>
                                    <small>or you can inspect another PO, please click below button</small><br>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th>PO ID</th>
                                        <th>PO No</th>
                                        <th>Partial</th>
                                        <th>Article</th>
                                        <th>Model Name</th>
                                        <th>Qty</th>
                                        <th>Inspector</th>
                                        <th>Inspect Date</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $po_line['PO_ID']?></td>
                                        <td><?php echo $po_line['PO_NO']?></td>
                                        <td><?php echo $po_line['PARTIAL']?></td>
                                        <td><?php echo $po_line['ARTICLE']?></td>
                                        <td><?php echo $po_line['MODEL_NAME']?></td>
                                        <td><?php echo $po_line['TOTAL_QTY']?></td>
                                        <td><?php echo $po_line['INSPECTOR']?></td>
                                        <td><?php echo $po_line['INSPECT_DATE']?></td>
                                        <td><span class="badge bg-danger">Not Sent to Pivot</span></td>
                                    </tr>
                                </table>
                            </div>
                          
                            <a href="<?php echo base_url().'index.php/C_aql_pivot/input_aql/'?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Inspect another PO</a>
                    </div>
                </div>


              </div>
            </div>
         </div>
        </div>
      </div>

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
     
      
</script>
