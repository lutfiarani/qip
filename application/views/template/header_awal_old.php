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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/summernote/summernote-bs4.css">
  <!--datepicker-->
  <link rel="stylesheet" href="<?php echo base_url();?>template/plugins/datepicker/dist/css/bootstrap-datepicker.min.css">
 

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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


</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>index.php/C_Export/index" class="brand-link">
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
          <a href="<?php echo base_url();?>index.php/C_Login/" class="d-block">Login</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Export Schedule
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Inspection Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect_all_building" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Building</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/A" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung A</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/B" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung B</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/C" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung C</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/D" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung D</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/E" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung E</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>index.php/C_Inspection/inspect/H" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gedung H</p>
                </a>
              </li>
              
            </ul>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_aql_inspect/summary_inspection" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Summary Inspection
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/inspect_balance" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               PO Table Balance
               
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Aql_inspect/po_reject" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
              <p>
              PO Reject
               
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>index.php/C_Export/search_po" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Search PO
               
              </p>
            </a>
           
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
    
    