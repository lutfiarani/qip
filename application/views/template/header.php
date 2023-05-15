<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="900;url=<?php echo base_url();?>/index.php/C_login">
  <title>QIP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/new_css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/summernote/summernote-bs4.css">
  <!--datepicker-->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
  <link href="<?php echo base_url();?>template/plugins/new_css/select2.min.css" rel="stylesheet" />

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- select2 end -->
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script>
    // Add the following into your HEAD section
      var timer = 0;
      function set_interval() {
        // the interval 'timer' is set as soon as the page loads
        timer = setInterval("auto_logout()", 60000);
        // the figure '10000' above indicates how many milliseconds the timer be set to.
        // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
        // So set it to 300000
      }

      function reset_interval() {
        //resets the timer. The timer is reset on each of the below events:
        // 1. mousemove   2. mouseclick   3. key press 4. scroliing
        //first step: clear the existing timer

        if (timer != 0) {
          clearInterval(timer);
          timer = 0;
          // second step: implement the timer again
          timer = setInterval("auto_logout()", 10000);
          // completed the reset of the timer
        }
      }

      function auto_logout() {
        // this function will redirect the user to the logout script
        window.location = "your_logout_script.php";
      }

      // Add the following attributes into your BODY tag
      onload="set_interval()"
      onmousemove="reset_interval()"
      onclick="reset_interval()"
      onkeypress="reset_interval()"
      onscroll="reset_interval()"

  </script>
</head> 
<body class="hold-transition sidebar-mini sidebar-collapse">
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
    <a href="<?php echo base_url();?>index.php/C_Export/admin" class="brand-link">
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
          <a href="<?php echo base_url();?>index.php/C_Login/logout" class="d-block">Logout | 
          <?php echo $username?> (<?php 
              if($tingkat== 1){
                echo 'Administrator';
              }elseif($tingkat == 2){
                echo 'Inspector';
              }elseif($tingkat == 3){
                echo 'Third Party';
              }elseif($tingkat == 5){
                echo 'Representative';
              }elseif($tingkat == 6){
                echo 'Validator';
              }elseif($tingkat == 4){
                echo 'P. Manager';
              }elseif($tingkat == 7){
                echo 'PPIC User';
              }elseif($tingkat == 8){
                echo 'Development Stage';
              }
          
          ?>) </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($tingkat == 1){?>
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_pivot" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pivot88
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_dev_stage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Development Stage</p>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_pivot/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pivot Interface Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_pivot/cell" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Defect Rate Cell</p>
                </a>
              </li>
              
            </ul>
          </li>
         <?php }?>
          <?php if($tingkat == 8){?>
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_dev_stage" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Development Stage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_dev_stage/email_list" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Email List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
         <?php }?>
         <?php if($tingkat <= 6){?>
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Export Today
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_dev_stage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Development Stage</p>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Status PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/import_data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload PO</p>
                </a>
              </li>
              <?php if($tingkat == 6){?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/po_validation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PO Validation</p>
                </a>
              </li>
              <?php }?>
              <!--li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Export/list_export" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Export Data</p>
                </a>
              </li-->
            </ul>
          </li>
         <?php }?>
         <?php if($tingkat == 7){?>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inspection Today
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
<!--            
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input PO</p>
                </a>
              </li>
           -->
          
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/list_inspection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_inspection/multiple_update" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PO Inspected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_inspection/input_schedule_ppic" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PPIC Input Inspect</p>
                </a>
              </li>
              
           
            </ul>
          </li>
          <?php }?>
          <?php if($tingkat <= 6){?>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Aql/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AQL Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report AQL Inspection</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql/monthly_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Report AQL Inspection</p>
                </a>
              </li> -->
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

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AQL Inspection
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if(($tingkat == 1)){?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/upload_inspection_result" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Inspection Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/import_pivot" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Pivot Result</p>
                </a>
              </li>
            <?php }?>
            <?php if(($tingkat == 2)||($tingkat ==3)||($tingkat == 1)){?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_pivot/input_aql" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Inspect</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/input_repacking" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Repacking</p>
                </a>
              </li>
            <?php }?>
            <?php if(($tingkat == 6)||($tingkat == 4)||($tingkat == 5)){?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/input_validation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation Inspect</p>
                </a>
              </li>
              <?php }?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/inspect_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inspection Confirm List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/edit_carton" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Carton Number</p>
                </a>
              </li>
              <?php if($tingkat=='1'){?>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_aql_inspect/delete_inspection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete Inspection</p>
                </a>
              </li>
              <?php }?>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql_inspect/daily_report_inspection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report Inspection</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Aql_inspect/summary_aql" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Summary of AQL</p>
                </a>
              </li> -->
              </ul>
            </li>
           <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inspection Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_report_inspection" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>AQL Inspection Report</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_third_inspection" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Third Party Inspection Report</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_third_inspection_ys" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Third Party Inspection Report - YS</p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_summary_third" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Summary Third Party</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_report_validator" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Validation Report LO</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/C_aql_inspect/monthly_report_validator_ys" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Validation Report YS-SCCHO</p>
                  </a>
                </li>
                
              </ul>
            </li>
              </li>
              
            </ul>
          </li>
          <?php }?>

          
          
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
            <h1><?php echo $formtitle;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
