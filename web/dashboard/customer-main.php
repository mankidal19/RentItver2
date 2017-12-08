<?php session_start(); ?>
<?php 
  if($_SESSION['LOGIN']!="YES")
  {
    ?><script>window.onload=haventLogin();</script><?php
  }
  if($_SESSION['LEVEL']!="user")
  {
    ?><script>window.onload=notUser();</script><?php
  }
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer | Dashboard</title>
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
  <script>
    function haventLogin()
    {
      alert('U are not currently Log in');
      window.location.replace('../login.html');
    }
    function notUser()
    {
      alert("You are not user");
      window.location.replace("../index.html");
    }
  </script>
  <?php 
    if($_SESSION['LOGIN']!="YES")
    {
      ?><script>window.onload=haventLogin();</script><?php
    }
    if($_SESSION['LEVEL']!="user")
    {
      ?><script>window.onload=notUser();</script><?php
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
    <a href="../index.html" class="logo">
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
        <li class="active"><a href="customer-main.php"><i class="fa fa-link"></i> <span>Overview</span></a></li>
        <li><a href="customer-profile.php"><i class="fa fa-link"></i> <span>My Profile</span></a></li>
       <li><a href="customer-calendar.php"><i class="fa fa-link"></i> <span>Booking Calendar</span></a></li>
       
        
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
        <small>Overview your rented cars</small>
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
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>2</h3>

              <p>Future <br>Booking(s)</p>
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
              <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="true">Future Booking(s)</a></li>
              
              
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
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div>

              <div class="row"><div class="col-sm-12">

                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company name: activate to sort column ascending" style="width: 10%;">Company Name</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company contact: activate to sort column ascending" style="width: 15%;">Company's Contact</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                </thead>
                <tbody>
                  <?php
                  $userID=$_SESSION['ID']; 
                  $sql="select * from booklist where borrorID='$userID' and status=3";
                  $result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
                  $count = mysqli_num_rows($result);
                  $count = 0;
                  while($row=mysqli_fetch_array($result))
                  {
                    $ownerID=$row['ownerID'];
                    $sql2="select * from rentalmaster where userID='$ownerID'";
                    $result2=mysqli_query($conn,$sql2) or trigger_error($conn->error."[$sql2]");
                    $row2=mysqli_fetch_array($result2);
                    $companyName=$row2['username'];
                    $companyContact=$row2['phone'];
                    $carID=$row['carID'];
                    $sql3="select * from car where carID='$carID'";
                    $result3=mysqli_query($conn,$sql3) or trigger_error($conn->error."[$sql3]");
                    $row3=mysqli_fetch_array($result3);
                    $maxPassenger=$row3['maxPassenger'];
                    if($count%2!=0)
                    {
                        ?><tr role="row" class="odd"><?php
                    }
                    else
                    {
                        ?><tr role='row' class='even'><?php
                    }?>
                    <td><?php echo($row['bookID']); ?></td>
                    <td><?php echo($companyName) ?></td>
                    <td><?php echo($companyContact); ?></td>
                    <td><?php echo($row['startDate'].' '.$row['startTime']) ?></td>
                    <td><?php echo($row['returnDate'].' '.$row['returnTime']) ?></td>
                    <td><?php echo($row['hoursRent']); ?></td>
                    <td><?php echo($maxPassenger); ?></td>
                    <td><?php echo($row['totalPay']) ?></td>
                  </tr><?php
                } ?>
                <tfoot>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company name: activate to sort column ascending" style="width: 10%;">Company Name</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company contact: activate to sort column ascending" style="width: 15%;">Company's Contact</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                </tfoot>
              </table></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane future booking-->
              <div class="tab-pane" id="tab_2-2">
                <b>Future Booking(s):</b>

                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking(s) List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company name: activate to sort column ascending" style="width: 10%;">Company Name</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company contact: activate to sort column ascending" style="width: 15%;">Company's Contact</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 10%;">Status</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="3" aria-label="Action" style="width: 10%;">Action</th></tr>
                </thead>
                <tbody>
                
                <?php
                  $userID=$_SESSION['ID']; 
                  $sql="select * from booklist where borrorID='$userID' and status!=3";
                  $result=mysqli_query($conn,$sql) or trigger_error($conn->error."[$sql]");
                  $count = mysqli_num_rows($result);
                  $count = 0;

                  //getting user's username
                  $sqlName="select * from user where userID='$userID'";
                  $resultName=mysqli_query($conn,$sqlName) or trigger_error($conn->error."[$sqlName]");
                  $rowName = mysqli_fetch_array($resultName);
                  $username = $rowName['username'];


                  while($row=mysqli_fetch_array($result))
                  {
                    $ownerID=$row['ownerID'];
                    $sql2="select * from rentalmaster where userID='$ownerID'";
                    $result2=mysqli_query($conn,$sql2) or trigger_error($conn->error."[$sql2]");
                    $row2=mysqli_fetch_array($result2);
                    $companyName=$row2['username'];
                    $companyContact=$row2['phone'];
                    $carID=$row['carID'];
                    $sql3="select * from car where carID='$carID'";
                    $result3=mysqli_query($conn,$sql3) or trigger_error($conn->error."[$sql3]");
                    $row3=mysqli_fetch_array($result3);
                    $maxPassenger=$row3['maxPassenger'];
                    $strCompanyName = str_replace(' ', '&nbsp;', $companyName);

                    if($count%2!=0)
                    {
                        ?><tr role="row" class="odd"><?php
                    }
                    else
                    {
                        ?><tr role='row' class='even'><?php
                    }?>
                    <td><?php echo($row['bookID']); ?></td>
                    <td><?php echo($companyName) ?></td>
                    <td><?php echo($companyContact); ?></td>
                    <td><?php echo($row['startDate']) ?></td>
                    <td><?php echo($row['returnDate']) ?></td>
                    <td><?php 
                      if($row['status']==0)
                      {
                        echo("Processing");
                      }
                      else if($row['status']==2)
                      {
                        echo('Approved');
                      }
                      else
                      {
                        echo("Not Approved");
                      }
                    ?></td>
                    <td><?php echo($row['hoursRent']); ?></td>
                    <td><?php echo($maxPassenger); ?></td>
                    <td><?php echo($row['totalPay']) ?></td>
                    <td style="width: 10%;">
                    <button type="button" class="btn btn-block bg-olive btn-md" data-toggle="modal" data-target="#modal-contact" data-book-id=<?php echo($row['bookID']) ?> data-user-id=<?php echo($username) ?> data-company-name=<?php echo($strCompanyName)?>>
                        <img src="dist/img/whatsapp-logo.png" width="20px">
                        
                    </button>
                    <button type="button" class="btn btn-block bg-yellow btn-md" data-toggle="modal" data-target="#modal-location">
                        <img src="dist/img/location.png" width="20px">
                        
                    </button>
                    </td>
                  </tr><?php
                } ?>

                <tfoot>
                <tr role="row">
                     <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Booking ID</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company name: activate to sort column ascending" style="width: 10%;">Company Name</th>

                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Company contact: activate to sort column ascending" style="width: 15%;">Company's Contact</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Start Date & Time</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">End Date & Time</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 10%;">Status</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Hour(s): activate to sort column ascending" style="width: 5%;">Total Hour(s)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Num of Passenger(s): activate to sort column ascending" style="width: 5%;">Num of People</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 10%;">TOTAL PRICE (RM)</th>
                    
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="3" aria-label="Action" style="width: 10%;">Action</th></tr>
                </tfoot>
              </table></div></div></div>
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
        
    
     <!--contact booking modal-->   
     <div class="modal modal-success fade" id="modal-contact">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Contact the Rental Company</h4>
              </div>
              <div class="modal-body">
                 <p>Contact company 
                  <input style="background-color: transparent; border: none;" type="text" name="companyName" readonly="">
                  <br>regarding booking #
                  <input style="background-color: transparent; border: none;" type="text" name="bookingID" readonly="">
                  <br><br>REDIRECT TO COMPANY'S WHATSAPP CONTACT FOR FURTHER COMMUNICATION.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" >Cancel</button>
                <a href="" role="button" id="contact" class="btn btn-outline">Proceed</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     
     <!--view location modal-->   
     <div class="modal modal-info fade" id="modal-location">
          <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pickup Location Details</h4>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                    
                      <label for="pickupLocation" >Location:    </label>
                
                    <input style="border:none; background-color: transparent;" type="text" name="pickupLocation" readonly="">
                  </div>  
                  <div class="form-group">

                      <label for="pickupCity" >City:    </label>
                
                    <input style="border:none; background-color: transparent;" type="text" name="pickupCity" readonly="">
                  </div> 
                  
                  <div class="form-group">

                      <label for="pickupPostcode" >Postcode:    </label>
                
                    <input style="border:none; background-color: transparent;" type="text" name="pickupPostcode" readonly="">
                  </div> 
                  
                  <!--coding for displaying map-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal" >OK</button>
                
              </div>
                    </form>
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
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD7CsNY-Lx-oqoJFePf2hBS9DFpLuMpH2k&sensor=false&libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

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
<script src="assets/js/jquery.geocomplete.js"></script>
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
<script>
    $('#modal-contact').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var userId = $(e.relatedTarget).data('user-id');
    var bookingId = $(e.relatedTarget).data('book-id');
    var companyName = $(e.relatedTarget).data('company-name');
    var message = "Hi " + companyName + "! I am " + userId +", want to ask about my car rental booking with booking id #"+bookingId+" status made through RentIt website.";
    var encodeMsj = encodeURIComponent(message);

   // var message = 'Hi%20'+companyName+'%20I%20am%20'+userId+'%20want%20to%20ask%20about%20my%20booking%20with%20id%20'+bookingID+'%20status';

    var url = "https://api.whatsapp.com/send?phone=60135184849&text=" + encodeMsj;

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
    $(e.currentTarget).find('input[name="userID"]').val(userId);
    $(e.currentTarget).find('input[name="companyName"]').val(companyName);
   //$(e.currentTarget).find('a[name="contact"]').href(url);
     $("#contact").attr("href",url);
});

$('#modal-location').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
  /*  var carId = $(e.relatedTarget).data('car-id');
    var carMake = $(e.relatedTarget).data('car-makes');
    var carModel =$(e.relatedTarget).data('car-models');
    var ownerName =$(e.relatedTarget).data('owner-name'); 
    var startDate = $(e.relatedTarget).data('start-date');
    var returnDate = $(e.relatedTarget).data('return-date');
    var startTime = $(e.relatedTarget).data('start-time');
    var returnTime = $(e.relatedTarget).data('return-time');
    var hourlyRate =parseFloat($(e.relatedTarget).data('hourly-rate')).toFixed(2);
    var totalPrice =parseFloat($(e.relatedTarget).data('total-price')).toFixed(2);
    var totalHours =parseFloat($(e.relatedTarget).data('total-hours'));*/
 

    //populate the textbox
   /* $(e.currentTarget).find('input[name="carId"]').val(carId);
    $(e.currentTarget).find('input[name="carMake"]').val(carMake);
    $(e.currentTarget).find('input[name="carModel"]').val(carModel);
    $(e.currentTarget).find('input[name="companyName"]').val(ownerName);
    $(e.currentTarget).find('input[name="startDate"]').val(startDate);
    $(e.currentTarget).find('input[name="returnDate"]').val(returnDate);
    $(e.currentTarget).find('input[name="startTime"]').val(startTime);
    $(e.currentTarget).find('input[name="returnTime"]').val(returnTime);
    $(e.currentTarget).find('input[name="hourlyRate"]').val(hourlyRate);
    $(e.currentTarget).find('input[name="hoursRent"]').val(totalHours);
    $(e.currentTarget).find('input[name="totalRate"]').val(totalPrice);*/
});
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>