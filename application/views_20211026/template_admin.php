<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QIP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/dist/css/jquery.dataTables.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <!--datepicker-->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
 



  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>template/index3.html" class="brand-link">
      <img src="<?php echo base_url();?>template/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">QIP HWI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"-->
        </div>
        <div class="info">
          <a href="<?php echo base_url();?>index.php/C_Login/logout" class="d-block">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Export Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Status PO</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/input_export" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Export Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/list_export" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Export Data</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inspection Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Inspection PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/list_inspection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Insp Schedule</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Aql/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AQL Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report AQL Inspection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/monthly_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Report AQL Inspection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/date_range_defect" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Defect Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/monthly_inspector" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Inspector Report</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QIP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
                <?php echo $content;?>
            
    <!-- /.content -->
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
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
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
      "fixedHeader": true
    });
  });

  $(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
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

 $(function(){
  $(".datepicker1").datepicker({
      format: 'yyyy-mm',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

<script>
      $(document).ready(function(){
        inspection_po_list(); //call function show all product
         
        //function show all product
        function inspection_po_list(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('C_Inspection/list_inspection_2')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    html += '<tr><td>';
                    for(i=0; i<data.length; i++){
                          html += '<tr>'+
                                  '<td style ="word-break:break-word; font-size: 90%;">'+(i+1)+'</td>'+
                                  '<td style ="word-break:break-word; font-size: 90%;">'+data[i].PO_NO+'</td>'+
                                  '<td style ="word-break:break-word; font-size: 90%;">'+data[i].INSPECT_DATE+'</td>'+
                                  '<td style ="word-break:break-word; font-size: 90%;">'+data[i].STATUS_PO+'</td>'+
                                  '<td style ="word-break:break-word; font-size: 90%;">'+data[i].MaxTime+'</td>'+
                                  '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-xs item_edit" data-PO_NO="'+data[i].PO_NO+'">Reject</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-xs item_delete" data-ID_INSPECTION="'+data[i].ID_INSPECTION+'">Delete</a>'+
                                  '</td>'+
                                
                                  '</tr>';
                      }
                        //html += '<button type="button" class="btn btn-primary btn-lg">'+data[i].CELL_CODE+'</button>';
                        $('#show_inspection').html(html);
                    }
             });
        }

        $('#show_inspection').on('click','.item_edit',function(){
            var PO_NO = $(this).data('PO_NO');
            var STATUS_PO = $(this).data('STATUS_PO');
             
            $('#Modal_Edit_Reject').modal('show');
            $('[name="PO_NO_edit"]').val(PO_NO);
            
        });


         
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var product_code = $(this).data('product_code');
            var product_name = $(this).data('product_name');
            var price        = $(this).data('price');
             
            $('#Modal_Edit').modal('show');
            $('[name="product_code_edit"]').val(product_code);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="price_edit"]').val(price);
        });
 

        $('#btnReject').on('click',function(){
            var PO_NO = $('#PO_NO_edit').val();
            var STATUS_PO = $('#STATUS_PO').val();
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('C_Inspection/update_status')?>",
              dataType : 'json',
              data : {PO_NO:PO_NO, STATUS_PO:STATUS_PO},
              success : function(data){
                  $('[name="PO_NO_edit"]').val("");
                  $('[name="STATUS_PO"]').val("");
                  $('#Modal_Edit_Reject').modal('hide');
                  inspection_po_list();
              }
            });
              return false;
        });


         //update record to database
         $('#btn_update').on('click',function(){
            var product_code = $('#product_code_edit').val();
            var product_name = $('#product_name_edit').val();
            var price        = $('#price_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/update')?>",
                dataType : "JSON",
                data : {product_code:product_code , product_name:product_name, price:price},
                success: function(data){
                    $('[name="product_code_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });





      });

      
</script>


</body>
</html>