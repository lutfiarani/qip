<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $formtitle;?></h3>
            </div>
            <!-- /.card-header -->
          
              <div class="card card-primary">
               
                  <div class="card-footer">
                        <button type="button" name="delete_all" id="delete_all" class="btn btn-success btn-xs">Scheduled Today</button>
                  </div>
                </form>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>PO No</th>
                        <th>CELL NO</th>
                        <th>SDD</th>
                        <th>Inspected Date AQL</th>
                        <th>Total Qty</th>
                        <th>Balance</th>
                        <th>Tgl Pengajuan Terakhir</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=0;
                        foreach($po->result() as $row)
                        {
                            $i++;
                            if($row->STATUS_INSPECT=='REJECTED'){
                                echo '
                                <tr bgcolor="red">
                                <td>'.$i.'</td>
                                <td>'.$row->PO_NO.'</td>
                                <td>'.$row->CELL.'</td>
                                <td>'.$row->ZHSDD.'</td>
                                <td>'.$row->INSPECT_DATE.'</td>
                                <td>'.$row->TOTAL_QTY.'</td>
                                <td>'.$row->BALANCE_CRTON.'</td>
                                <td>'.$row->HAHA.'</td>
                                <td><input type="checkbox" class="delete_checkbox" value="'.$row->PO_NO.'" /></td>
                                </tr>';
                            }else{
                                echo '
                                <tr>
                                <td>'.$i.'</td>
                                <td>'.$row->PO_NO.'</td>
                                <td>'.$row->CELL.'</td>
                                <td>'.$row->ZHSDD.'</td>
                                <td>'.$row->INSPECT_DATE.'</td>
                                <td>'.$row->TOTAL_QTY.'</td>
                                <td>'.$row->BALANCE_CRTON.'</td>
                                <td>'.$row->HAHA.'</td>
                                <td><input type="checkbox" class="delete_checkbox" value="'.$row->PO_NO.'" /></td>
                                </tr>';
                            }
                           
                          
                        }
                        ?>  
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
           
         

    <style>
        .removeRow
        {
        background-color: #ffce00;
            color:#FFFFFF;
        }
    </style>
    
    
    <script src="<?php echo base_url();?>template/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
    
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>template/plugins/new_js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/plugins/new_js/buttons.print.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>template/dist/js/demo.js"></script>
    <script src="<?php echo base_url();?>template/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
    
    $.fn.datepicker.defaults.format = "yyyymm";
    $('#datepicker').datepicker({
        todayHighlight: true,autoclose: true,
        format: "yyyymm",
        viewMode: "months", 
        minViewMode: "months"
    });

    $('#sandbox-container input').datepicker({ 
    });
</script>
<script>
$(document).ready(function(){
 
    $('.delete_checkbox').click(function(){
        if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeRow');
        }
    });

    $('#delete_all').click(function(){
        var checkbox = $('.delete_checkbox:checked');
        if(checkbox.length > 0)
        {
            var checkbox_value = [];
            $(checkbox).each(function(){
                checkbox_value.push($(this).val());
            });
            $.ajax({
                url     : "<?php echo site_url('C_Inspection/update_all')?>",
                // url:"<?php echo base_url(); ?>C_Inspection/update_all",
                method:"POST",
                data:{checkbox_value:checkbox_value},
                success:function()
                {
                $('.removeRow').fadeOut(1500);
                }
            })
        }
        else
        {
            alert('Select atleast one records');
        }
        });



})
    


    
</script>