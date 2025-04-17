<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="">
  <title>Factory Status</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>template/assets/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">

   
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark text-white layout-navbar-fixed sticky-top" style="background-color: #fffff;" >
    <div class="container" style="color:white">
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 justify-content-center" id="navbarCollapse">
      <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>template/assets/images/hwi.png" alt="AdminLTE Logo" width="100px"></a>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/C_SDD_report/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-truck"></i>
                <span class="menu-title">SDD List</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/C_SDD_report/model" class="nav-link {{ request()->is('inspection') ? 'active' : '' }}"> 
                <i class="fas fa-book"></i>
                <span class="menu-title">Model List</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/C_ProductionByModel/" class="nav-link {{ request()->is('inspection') ? 'active' : '' }}"> 
                <i class="fas fa-file"></i>
                <span class="menu-title">Production Result by Model</span>
            </a>
          </li>
         
         </ul>

        <!-- SEARCH FORM -->
       
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-wrapper">
      <div class="container-fluid">
          
    