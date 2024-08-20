<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url; ?>Assets/img/logo.png" type="image/x-icon">
    <title><?php echo $data['tag_page']; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/datatables/datatables.min.css">

    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/dataTables.bootstrap4.min.css">


    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/responsive.bootstrap.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/jquery.dataTables.min.css" rel="stylesheet" />

   

    <!--Font-------->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- SELECT 2 -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/select2/select2.min.css">

    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/checkbox.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader 
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url; ?>Assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
-->
        <!-- Navbar -fixed-top--->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Ajuster Usuario</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#nuevaClave">
                            <i class="fas fa-tools mr-2"></i> Perfil

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url; ?>Usuarios/salir" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Salir
                        </a>

                    </div>
                </li>



            </ul>
        </nav>
        <!-- /.navbar -->