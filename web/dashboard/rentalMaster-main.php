<?php session_start() ?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rental Master | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="dist/js/checkLogin.js"></script>

<?php 

  if($_SESSION['LOGIN']!="YES")
  {
    ?><script>window.onload=haventLogin();</script><?php
  }
  if($_SESSION['LEVEL']!="RentalMaster")
  {
    ?><script>window.onload=notRentalMaster();</script><?php
  }
?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="rentalMaster-main.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php
                  include('../php/config.php');    
                  $ownerID=$_SESSION['ID'];
                  $sql="select * from rentalmaster where userID='$ownerID'";
                  $result=mysqli_query($conn,$sql)or trigger_error($conn->error."[$sql]");
                  $row=mysqli_fetch_array($result);
                  $_SESSION['username']=$row['username'];
                  $_SESSION['picName'] = $row['firstName']." ".$row['lastName'];
                  echo ($_SESSION['username']);
              ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                <p>
                  <?php echo ($_SESSION['username']);?>
                  <br>
                  Person incharge:<br>
                  <?php echo ($_SESSION['picName']);?>
                  <small>Member since Nov. 2017</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="rentalMaster-main.php"><i class="fa fa-link"></i> <span>Overview</span></a></li>
        <li><a href="rentalMaster-profile.php"><i class="fa fa-link"></i> <span>My Profile</span></a></li>
       <li><a href="rentalMaster-calendar.php"><i class="fa fa-link"></i> <span>Booking Calendar</span></a></li>
       
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>My Cars</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rentalMaster-carList.php">View Car List</a></li>
            <li ><a href="rentalMaster-addCar.php">Add New Car</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Overview
        <small>Overview your car rentals</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>2</h3>

              <p>New Booking <br>Request(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-plus"></i>
            </div>
            <a href="#tab_3-2" data-toggle="tab" aria-expanded="false" class="small-box-footer" onclick="addClass('accordian',2,'active',0,1);">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>2</h3>

              <p>Confirmed <br>Booking(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="#tab_2-2" data-toggle="tab" aria-expanded="false" class="small-box-footer" onclick="addClass('accordian',1,'active',0,2);">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>    
        
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>10</h3>

              <p>Completed <br>Booking(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle"></i>
            </div>
            <a href="#tab_1-1" data-toggle="tab" aria-expanded="false" class="small-box-footer" onclick="addClass('accordian',0,'active',1,2);">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
    </div>    
    
        
        
        <div class="col-md-12" id="accordian">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Completed Booking(s)</a></li>
              <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="true">Confirmed Booking(s)</a></li>
              <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">New Booking Request(s)</a></li>
              
              <li class="pull-left header"><i class="fa fa-th"></i><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">Detailed Overview</a></li>
              
            </ul>
            <div class="tab-content" aria-expanded="false">
              <div class="tab-pane" id="tab_1-1">
                <b>Completed Booking(s):</b>

                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking(s) List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 15%;">Remarks</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 10%;">Action</th></tr>
                </thead>
                <tbody>
                
                
                <tr role="row" class="odd">
                  <td class="">booking_id1</td>
                  <td>car_id1</td>
                  <td>username1</td>
                  <td>startDT1</td>
                  <td class="">endDT1</td>
                  <td>totalhrs1</td>
                  <td>totalpass1</td>
                  <td>totalprice1</td>
                  <td>remarks1</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block bg-orange btn-xs" data-toggle="modal" data-target="#modal-delete">Delete</button>
                  </td>
                  
                </tr><tr role="row" class="even">
                   <td class="">booking_id2</td>
                  <td>car_id2</td>
                  <td>username2</td>
                  <td>startDT2</td>
                  <td class="">endDT2</td>
                  <td>totalhrs2</td>
                  <td>totalpass2</td>
                  <td>totalprice2</td>
                  <td>remarks2</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block bg-orange btn-xs" data-toggle="modal" data-target="#modal-delete">Delete</button>
                  </td>
                <tfoot>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 15%;">Remarks</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 10%;">Action</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane confirmed booking-->
              <div class="tab-pane" id="tab_2-2">
                <b>Confirmed Booking(s):</b>

                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking(s) List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 10%;">Approval Date</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="3" aria-label="Action" style="width: 15%;">Action</th></tr>
                </thead>
                <tbody>
                
                
                <tr role="row" class="odd">
                  <td class="">booking_id1</td>
                  <td>car_id1</td>
                  <td>username1</td>
                  <td>startDT1</td>
                  <td class="">endDT1</td>
                  <td>approve1</td>
                  <td>totalhrs1</td>
                  <td>totalpass1</td>
                  <td>totalprice1</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#modal-cancel">Cancel</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block bg-olive btn-xs" data-toggle="modal" data-target="#modal-complete">Complete</button>
                  </td>
                </tr><tr role="row" class="even">
                   <td class="">booking_id2</td>
                  <td>car_id2</td>
                  <td>username2</td>
                  <td>startDT2</td>
                  <td class="">endDT2</td>
                  <td>approve2</td>
                  <td>totalhrs2</td>
                  <td>totalpass2</td>
                  <td>totalprice2</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#modal-cancel">Cancel</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block bg-olive btn-xs" data-toggle="modal" data-target="#modal-complete">Complete</button>
                  </td>
                <tfoot>
                <tr role="row">
                     <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 10%;">Approval Date</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="3" aria-label="Action" style="width: 15%;">Action</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane new booking-->
              <div class="tab-pane" id="tab_3-2">
                <b>New Booking Request(s):</b>

                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking(s) List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12">
                          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column ascending" style="width: 10%;">Start Date</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Time: activate to sort column ascending" style="width: 10%;">Start Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date: activate to sort column ascending" style="width: 10%;">End Date</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Time: activate to sort column ascending" style="width: 10%;">End Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 10%;">Action</th></tr>
                </thead>
                <tbody>
                
                
                <tr role="row" class="odd">
                  <td class="">booking_id1</td>
                  <td>car_id1</td>
                  <td>username1</td>
                  <td>startdate1</td>
                  <td class="">starttime1</td>
                  <td>enddate1</td>
                  <td>endtime1</td>
                  <td>totalhrs1</td>
                  <td>totalpass1</td>
                  <td>totalprice1</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#modal-approve">Approve</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-reject">Reject</button>
                  </td>
                </tr><tr role="row" class="even">
                  <td class="">booking_id2</td>
                  <td>car_id2</td>
                  <td>username2</td>
                  <td>startdate2</td>
                  <td class="">starttime2</td>
                  <td>enddate2</td>
                  <td>endtime2</td>
                  <td>totalhrs2</td>
                  <td>totalpass2</td>
                  <td>totalprice2</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-target="#modal-approve">Approve</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-reject">Reject</button>
                  </td>
                <tfoot>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 10%;">Username</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column ascending" style="width: 10%;">Start Date</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Time: activate to sort column ascending" style="width: 10%;">Start Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date: activate to sort column ascending" style="width: 10%;">End Date</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Time: activate to sort column ascending" style="width: 10%;">End Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 10%;">Action</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        
     <!--approve booking modal-->   
     <div class="modal modal-success fade" id="modal-approve">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Approve Booking</h4>
              </div>
              <div class="modal-body">
                  <p>Approve booking #bookingid?<br>Booking will be moved to CONFIRMED BOOKING LISTS.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>   
     
     <!--reject booking modal-->   
     <div class="modal modal-danger fade" id="modal-reject">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Reject Booking</h4>
              </div>
              <div class="modal-body">
                <p>Reject booking #bookingid?<br>Booking will be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
      <!--delete booking modal-->   
     <div class="modal modal-warning fade" id="modal-delete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Booking</h4>
              </div>
              <div class="modal-body">
                <p>Delete booking #bookingid?<br>Booking will be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
     <!--edit booking modal-->   
     <div class="modal modal-info fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Booking</h4>
              </div>
              <div class="modal-body">
                <p>EDIT BOOKING FORM WILL BE PLACED HERE.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
     <!--cancel booking modal-->   
     <div class="modal modal-warning fade" id="modal-cancel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cancel Booking</h4>
              </div>
              <div class="modal-body">
                <p>Cancel booking #bookingid?<br>Booking will be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
     <!--complete booking modal-->   
     <div class="modal modal-success fade" id="modal-complete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Complete Booking</h4>
              </div>
              <div class="modal-body">
                 <p>Complete booking #bookingid?<br>Booking will be moved to COMPLETED BOOKING LISTS.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      RentIt.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">by Encoderz Inc</a>.</strong> For Application Development Project.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-tag bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Car 1 will be rented out</h4>

                <p>20th November 2017 @ 10.00AM</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script src="dist/js/extra.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>