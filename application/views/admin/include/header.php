<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>VyaparBill | Dashboard</title>
  <link rel="icon" href="<?php echo base_url('assets/frontadmin/images/favicon.png');?>">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
      <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/custom.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet
   <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/flaticon.css');?>">
  <style>
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active, .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
    background-color: #28a745;
    color: #fff;
    }

    .card-header h4{
      text-align: center; margin-bottom:0rem;
    }
    
    tbody td{
      font-size: 16px;
    }
#partyname{
  border: 1px solid skyblue;
  padding-left: 0px;
  border-radius: 3px;
}
#partyname li{
  list-style-type: none;
  border-bottom: 1px solid skyblue;
  width: 100%;
  padding-left: 10px;
  cursor: pointer;
}
#partyname li:hover{
  list-style-type: none;
  border-bottom: 1px solid skyblue;
  width: 100%;
  padding-left: 10px;
  cursor: pointer;
  background: skyblue;
}

#itembody td{
    padding: 1px;
}

.partiCularTable td{
  padding: 0px;
}
.partiCularTable td input{
  padding: 5px;
}

.navbar-nav li a i{
  font-weight: 900;
    color: #fff;
    background: green;
    padding: 6px 8px;
    border-radius: 3px;
}



  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="width: 100%;">
        <a href="#" class="nav-link">
          <h5 style="color: green;"><?php echo $this->session->userdata('userCompanyName');?></h5>
        </a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color: green;"><?php echo $this->session->userdata('userName');?>
         <img src="<?php echo base_url('assets/admin/dist/img/male.jpg');?>" class="img-circle elevation-2" alt="User Image" style="width: 40px; margin-top:-7px; margin-left:10px;">
        <!-- <div class="info float-left">
          <a href="#" class="d-block"></a>
        </div> -->
        <!-- <div class="image float-right">
        </div> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('userCompanyName');?></span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('user/profile') ?> " class="dropdown-item">
            <i class="fas fa-user mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('user/changepassword') ?> " class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('user/setting') ?> " class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('user/logout') ?> " class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item dropdown-footer">VyaparBill.com</a> -->
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
   
  </nav>