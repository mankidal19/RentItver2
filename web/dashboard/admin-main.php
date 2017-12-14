<?php session_start(); 
  include('../php/config.php'); 
  $sql5="select* from user where level='user'";
  $result5=mysqli_query($conn,$sql5) or trigger_error($conn->error."[$sql5]");
  $_SESSION['TOTALUSER']= mysqli_num_rows($result5);
  $sql6="select* from car";
  $result6=mysqli_query($conn,$sql6) or trigger_error($conn->error."[$sql6]");
  $_SESSION['TOTALCAR']= mysqli_num_rows($result6);
  $sql7="select* from rentalmaster";
  $result7=mysqli_query($conn,$sql7) or trigger_error($conn->error."[$sql7]");
  $_SESSION['TOTALRENTALMASTER']= mysqli_num_rows($result7);
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
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
  if($_SESSION['LEVEL']!="admin")
  {
    ?><script>window.onload=notAdmin();</script><?php
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
      <span class="logo-mini"><b>R</b>IT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RENT</b>IT</span>
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
                  $ownerID=$_SESSION['ID'];
                  $sql="select * from user where userID='$ownerID'";
                  $result=mysqli_query($conn,$sql)or trigger_error($conn->error."[$sql]");
                  $row=mysqli_fetch_array($result);
                  $_SESSION['username']=$row['username'];
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
        <!--delete car modal-->   
      <form action="../php/deleteCarAdmin.php" method="POST">
     <div class="modal modal-warning fade" id="modal-delete-car">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Car</h4>
              </div>
              <div class="modal-body">
                <p>Delete car with ID:  <input type="text" style="color:black; background: transparent; border: none;" name="carID" readonly="">
                  <br>Car details will be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     </form>
        
        <!--delete rental master modal-->   
      <form action="../php/deleteRentalMaster.php" method="POST">
     <div class="modal modal-warning fade" id="modal-delete-RM">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Booking</h4>
              </div>
              <div class="modal-body">
                <p>Delete Rental Master with username:  <input type="text" style="color:black; background: transparent; border: none;" name="username" readonly="">
                  <input type="text" style="color:black; background: transparent; border: none;" name="userID" readonly="" hidden>
                  <br>All related car details will also be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     </form>
        
         <!--delete rental master modal-->   
      <form action="../php/deleteUser.php" method="POST">
     <div class="modal modal-warning fade" id="modal-delete-user">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete User</h4>
              </div>
              <div class="modal-body">
                <p>Delete user with username:  <input type="text" style="color:black; background: transparent; border: none;" name="username" readonly="">
                  <input type="text" style="color:black; background: transparent; border: none;" name="userID" readonly="" hidden>
                  <br>All related details will also be DELETED from the system.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
     </form>
        
         <!--edit car modal-->   
     <div class="modal modal-info fade" id="modal-edit-car">
          <div class="modal-dialog">
              
            <div class="modal-content">
              
              <form role="form" action="../php/editCarAdmin.php" method="POST" enctype="multipart/form-data" id="editCarDetails">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Car Details</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                  <div class="form-group">
                      <label for="carID">Car ID</label>
                
                    <input type="text" name="carID" readonly="">
                  </div>  
                  
                <div class="form-group">
                  <label for="carDetails">Car Details: </label>
                  <select name="car-years" id="car-years" required></select>  
                    <select name="car-makes" id="car-makes" required></select> 
                    <select name="car-models" id="car-models" required></select>
                </div>
                  
                <div class="form-group">
                  <label for="hourlyRate">Hourly Rate (RM): </label>
                  <input type="number" style="width: 10em;" min="1" max="100" step="0.10" class="form-control" id="hourlyRate" name='hourlyRate' placeholder="Enter rate" required>
                </div>
                  
                <div class="form-group">
                  <label for="maxPassenger">Maximum Passenger (including Driver): </label>
                  <input type="number" style="width: 10em;" min="1" max="10" step="1" class="form-control" id="maxPassenger" name='maxPassenger' placeholder="Enter maximum passenger allowed" required>
                </div>  
                  
                <div class="form-group">
                  <label for="carDesc">Car Description: </label>
                  <textarea class="form-control" rows="10" cols="50" style="width: 50%;" id="carDesc" name='carDesc' placeholder="Descibe your car & more details about the car rental" required></textarea>
                </div>  
                  
                <div class="form-group">
                <label for="exampleInputFile">Add new car's photo:</label>
                  <input type="file" id="carPhoto" name="carFile">
                </div> 
                
              </div>
              <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">Update</button>
              </div>
            </form>   
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
         
         <!--view more car modal-->   
     <div class="modal modal-info fade" id="modal-view-car">
          <div class="modal-dialog">
              
            <div class="modal-content">
              
              <form role="form" method="" enctype="multipart/form-data" id="edi
              tCarDetails">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">View Car Details</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                  <div class="form-group">
                      <label for="carID">Car ID</label>
                
                    <input type="text" name="carID" readonly=""  style="color:black; border: none;">
                  </div>  
                  
                <div class="form-group">
                  <label for="carDetails">Car Details: </label>
                  <input name="car-years" id="car-years" readonly=""  style="color:black; border: none;">
                  <input name="car-makes" id="car-makes" readonly=""  style="color:black;  border: none;">
                  <input name="car-models" id="car-models" readonly=""  style="color:black;  border: none;">
                </div>
                  
                <div class="form-group">
                  <label for="hourlyRate">Hourly Rate (RM): </label>
                  <input type="number" readonly="" style="width: 10em;" min="1" max="100" step="0.10" class="form-control" id="hourlyRate" name='hourlyRate' placeholder="Enter rate" required>
                </div>
                  
                <div class="form-group">
                  <label for="maxPassenger">Maximum Passenger (including Driver): </label>
                  <input type="number" readonly="" style="width: 10em;" min="1" max="10" step="1" class="form-control" id="maxPassenger" name='maxPassenger' placeholder="Enter maximum passenger allowed" required>
                </div>  
                  
                <div class="form-group">
                  <label for="carDesc">Car Description: </label>
                  <textarea class="form-control" readonly="" rows="10" cols="50" style="width: 50%;" id="carDesc" name='carDesc' placeholder="Descibe your car & more details about the car rental" required></textarea>
                </div>  
                  
              </div>
              <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">OK</button>
              </div>
            </form>   
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
         
         <!--view more rental master modal-->   
     <div class="modal modal-info fade" id="modal-view-RM">
          <div class="modal-dialog">
              
            <div class="modal-content">
              
              
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">View Rental Master Details</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                  
                                    <form name='rentalMaster' id='form2' action='php/insertRentalMaster.php' method='POST'>

                                        <h3>Company Information</h3>
                                        <div class='form-group'>
                                            <p>
                                                <label for='companyName'>* Company Name:</label>
                                                <input readonly="" type="text" id="companyName_div2" name="companyName_div2" class='form-control' placeholder="Car Rental SDN BHD" required/>
                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='companyRegNum'>* Company Registration Number:</label>
                                                <input readonly="" type="text" id="companyRegNum_div2" name="companyRegNum_div2" class='form-control' placeholder="Enter Company Registration Number" required/>
                                            </p>
                                        </div>

<!--                                         <div class='form-group'>
                                            <p>
                                                <label for='establishDate'>* Date of Establishment:</label>
                                                <input readonly="" type="date" id="establishDate_div2" name="establishDate_div2" class='form-control' required/>
                                            </p>
                                        </div> -->

                                        <div class='form-group'>
                                            <p>
                                                <label for='address1'>Address (line 1):</label>
                                                <input readonly="" type="text" id="address1_div2" name="address1_div2" class='form-control' placeholder="123, Street ABC" required/>

                                                <label for='address2'>Address (line 2):</label>
                                                <input readonly="" type="text" id="address2_div2" name="address2_div2" class='form-control' placeholder="off Petaling Street"/>

                                                <label for='postcode' >* Postcode</label>
                                                <input readonly="" type="text" id="postcode_div2" name="postcode_div2" class='form-control' placeholder="08100" required/>

                                                <input type="hidden" name="country_div2" id="countryId" value="MY"/>
                                                <label for='state' >* State</label>
                                                <input readonly="" type="text" id="state" name="state" class='form-control' placeholder="08100" required/>

                                                <label for='city' >* City</label>
                                                <input readonly="" type="text" id="city" name="city" class='form-control' placeholder="08100" required/>


                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='EMail' >* Company E-mail:</label>
                                                <input readonly="" type="text" id="EMail_div2" name="EMail_div2" class='form-control' placeholder="rentacar@mail.com" required/>
                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='Phone' >* Company Contact Number:</label>
                                                <input readonly="" type="text" id="Phone_div2" name="Phone_div2" class='form-control' placeholder="0123456789" required/>
                                            </p>
                                        </div>

                                        <h3>Person in-Charge Information</h3>
                                        <div class='form-group'>
                                            <p>
                                                <label for='title' >* Title:</label>
                                                <input readonly="" type="text" id="title" name="title" class='form-control' placeholder="08100" required/>

                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='firstName'>* First Name:</label>
                                                <input readonly="" type="text" id="firstName_div2" name="firstName_div2" class='form-control' placeholder="John" required/>
                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='lastName' >* Last Name:</label>
                                                <input readonly="" type="text" id="lastName_div2" name="lastName_div2" class='form-control' placeholder="Doe" required/>
                                            </p>
                                        </div>

                                        <div class="btn-group form-group" data-toggle="buttons">
                                            <label for='gender_div2'>* Gender:</label><br>
                                            <input readonly="" type="text" id="gender_div2" name="gender_div2" class='form-control' placeholder="08100" required/>


                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='position' >* Position:</label>
                                                <input readonly="" type="text" id="position_div2" name="position_div2" class='form-control' placeholder="Marketing Officer" required/>
                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='EMail' >* E-mail:</label>
                                                <input readonly="" type="text" id="privateEMail_div2" name="privateEMail_div2" class='form-control' placeholder="johndoe@mail.com" required/>
                                            </p>
                                        </div>

                                        <div class='form-group'>
                                            <p>
                                                <label for='Phone'>Contact Number:</label>
                                                <input readonly="" type="text" id="privatePhone_div2" name="privatePhone_div2" class='form-control' placeholder="0123456789" required/>
                                            </p>
                                        </div>
                                        </form>   

                                       
                
              </div>
              <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">OK</button>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
         
         <!--view more user modal-->   
     <div class="modal modal-info fade" id="modal-view-user">
          <div class="modal-dialog">
              
            <div class="modal-content">
              
              
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">View User Details</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                  
                                    <form name='customer' id='form1' action='php/insertUser.php' method='POST'>
                                        <h3>User Information</h3>


                                        <div class='form-group'>
                                            <p>
                                                <label for='EMail_div1'>* E-mail:</label>
                                                <input readonly="" type="text" id="EMail_div1" name="EMail_div1" class='form-control' placeholder="johndoe@mail.com" required/>
                                            </p>
                                        </div>

                                        <div class="btn-group form-group" data-toggle="buttons">
                                            <label for='gender_div1'>* Gender:</label><br>
                                             <input readonly="" type="text" id="gender_div1" name="gender_div1" class='form-control' placeholder="johndoe@mail.com" required/>
                                           

                                        </div>

<!--                                         <div class='form-group'>
                                            <p>
                                                <label for='birthDate_div1'>* Date of Birth:</label>
                                                <input readonly="" type="date" id="birthDate_div1" name="birthDate_div1" class='form-control' required/>
                                            </p>
                                        </div> -->


                                        <div class='form-group'>
                                            <p>
                                                <label for='Phone_div1'>Contact Number:</label>
                                                <input readonly="" type="text" id="Phone_div1" name="Phone_div1" class='form-control' placeholder="0123456789" required/>
                                            </p>
                                        </div>

                                       </form>

                                       
                
              </div>
              <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline">OK</button>
              </div>
            
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
        
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo($_SESSION['TOTALUSER']) ?> </h3>

              <p>Total<br>Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
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
              <h3><?php echo($_SESSION['TOTALRENTALMASTER']) ?> </h3>

              <p>Total <br>Rental Masters</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
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
              <h3><?php echo($_SESSION['TOTALCAR']) ?> </h3>

              <p>Cars <br>Registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
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
              <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Registered Cars List</a></li>
              <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="true">Rental Masters List</a></li>
              <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">Customers List</a></li>
              
              <li class="pull-left header"><i class="fa fa-th"></i><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">Detailed Overview</a></li>
              
            </ul>
            <div class="tab-content" aria-expanded="false">
              <div class="tab-pane" id="tab_1-1">
                <b>Cars Registered:</b>

                <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Owner Name</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Car Make</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">Car Model</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 20%;">Picture</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 5%;">Action</th>
                    
                </thead>
                <tbody>
                <?php 
                  $count=0;
                  while($row=mysqli_fetch_array($result6))
                  { 
                    if($count%2!=0)
                    {
                      ?><tr role="row" class="odd"><?php
                    }
                    else
                    {
                      ?><tr role="row" class="even"><?php
                    }
                    $sql2="select* from rentalmaster where userID='{$row['ownerID']}'";
                    $result2=mysqli_query($conn,$sql2) or trigger_error($conn->error."[$sql2]");
                    $row2=mysqli_fetch_array($result2);
                    ?><td><?php echo ("{$row2['username']}"); ?></td><?php 
                    ?><td><?php echo ("{$row['carID']}"); ?></td><?php 
                    ?><td><?php echo ("{$row['makes']}"); ?></td><?php 
                    ?><td><?php echo ("{$row['models']}"); ?></td><?php 
                    ?><td><?php 
                            $carID="{$row['carID']}";
                            $et="jpg";
                            $carPhoto= "profile".$carID.".".$et;
                            $path="../images/uploadCar/".$carPhoto;
                            echo("<img src='$path' height='130' width='400'>"); ?></td>
                      <td>
                            <?php $description=str_replace(' ','&nbsp;',$row['description']); ?>
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit-car" data-carid=<?php echo($row['carID']); ?> data-year=<?php echo($row['year']); ?> data-makes=<?php echo($row['makes']); ?> data-models=<?php echo($row['models']); ?> data-hourlyrate=<?php echo($row['hourlyRate']); ?> data-maxpassenger=<?php echo($row['maxPassenger']); ?> data-description=<?php echo($description); ?>>Edit</button>
                            <button type="button" class="btn btn-block btn-success btn-xs" data-carid=<?php echo($row['carID']); ?> data-year=<?php echo($row['year']); ?> data-makes=<?php echo($row['makes']); ?> data-models=<?php echo($row['models']); ?> data-hourlyrate=<?php echo($row['hourlyRate']); ?> data-maxpassenger=<?php echo($row['maxPassenger']); ?> data-description=<?php echo($description); ?> data-toggle="modal" data-target="#modal-view-car" >View More</button>
                            <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-car" data-carid=<?php echo($row['carID']); ?> >Delete</button>
                     
                      </td>
                      </tr><?php
                    $count+=1;
                  }
                ?>                
                <tfoot>
                <tr role="row">
                   <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Booking ID: activate to sort column descending" style="width: 10%;">Owner Name</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car ID: activate to sort column ascending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start Date & Time: activate to sort column ascending" style="width: 12.5%;">Car Make</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="End Date & Time: activate to sort column ascending" style="width: 12.5%;">Car Model</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 20%;">Picture</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Approval Date: activate to sort column ascending" style="width: 5%;">Action</th>
                    </tr>
                </tfoot>
              </table></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane confirmed booking-->
              <div class="tab-pane" id="tab_2-2">
                <b>Rental Masters List:</b>

                <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example2_length"></div></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                 <?php 
                  $count=0;
                  while($row=mysqli_fetch_array($result7))
                  { 
                    if($count%2!=0)
                    {
                      ?><tr role="row" class="odd"><?php
                    }
                    else
                    {
                      ?><tr role="row" class="even"><?php
                    }
                      ?><td><?php echo("{$row['userID']}") ?></td><?php
                      ?><td><?php echo("{$row['username']}") ?></td><?php
                      ?><td><?php echo("{$row['firstName']}") ?></td><?php
                      ?><td><?php echo("{$row['lastName']}") ?></td><?php
                      ?><td><?php echo("{$row['email']}") ?></td><?php
                      ?><td><?php echo("{$row['city']}") ?></td><?php
                      ?><td><?php echo("{$row['state']}") ?></td>
                      <td style="width: 5%;">
                            <?php $address1 = str_replace(' ','&nbsp;',$row['address1']); ?> 
                            <?php $address2 = str_replace(' ','&nbsp;',$row['address2']); ?> 
                            <?php $city = str_replace(' ','&nbsp;',$row['city']); ?> 
                            <button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-userid=<?php echo($row['userID']); ?> data-companyname=<?php echo($row['username']); ?> data-companyregistrationnumber=<?php echo($row['businessId']); ?> data-address1=<?php echo($address1); ?> data-address2=<?php echo($address2); ?> data-postcode=<?php echo($row['postcode']); ?> data-state=<?php echo($row['state']); ?> data-city=<?php echo($city); ?> data-companyemail=<?php echo($row['cemail']); ?> data-companycontactnumber=<?php echo($row['cphone']); ?> data-title=<?php echo($row['title']); ?> data-firstname=<?php echo($row['firstName']); ?> data-lastname=<?php echo($row['lastName']); ?> data-gender=<?php echo($row['gender']); ?> data-position=<?php echo($row['position']); ?> data-email=<?php echo($row['email']); ?> data-contactnumber=<?php echo($row['phone']); ?> data-target="#modal-view-RM" >View More</button>
                            <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-userid=<?php echo($row['userID']); ?> data-companyname=<?php echo($row['username']); ?> data-target="#modal-delete-RM" >Delete</button>
                     
                       </td><?php
                  } ?>
                       </tr>
                    <tr role="row" class="even">
                  <!--  <td class="">booking_id2</td>
                  <td>car_id2</td>
                  <td>username2</td>
                  <td>startDT2</td>
                  <td class="">endDT2</td>
                  <td>approve2</td>
                  <td>totalhrs2</td>
                  <td>totalpass2</td>
                  <td>totalprice2</td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit" data-book-id=<?php echo($row['bookID']) ?>>Edit</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#modal-cancel" data-book-id=<?php echo($row['bookID']) ?>>Cancel</button>
                  </td>
                  <td style="width: 5%;">
                  <button type="button" class="btn btn-block bg-olive btn-xs" data-toggle="modal" data-target="#modal-complete" data-book-id=<?php echo($row['bookID']) ?>>Complete</button>
                  </td> -->
                <tfoot>
                <tr role="row">
                   <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"></div></div></div>
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
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example3_length"></div></div></div><div class="row"><div class="col-sm-12">
                          <table id="example3" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example3_info">
                <thead>
                <tr role="row">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                 <?php 
                  $count=0;
                  while($row=mysqli_fetch_array($result5))
                  { 
                    if($count%2!=0)
                    {
                      ?><tr role="row" class="odd"><?php
                    }
                    else
                    {
                      ?><tr role="row" class="even"><?php
                    }
                      ?><td><?php echo("{$row['userID']}") ?></td><?php
                      ?><td><?php echo("{$row['username']}") ?></td><?php
                      ?><td><?php echo("{$row['gender']}") ?></td><?php
                      ?><td><?php echo("{$row['email']}") ?></td><?php
                      ?><td><?php echo("{$row['phone']}") ?></td>
                      <td style="width: 5%;">
                           <button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" data-email=<?php echo($row['email']); ?> data-gender=<?php echo($row['gender']); ?> data-phone=<?php echo($row['phone']); ?> data-birthDate=<?php echo($row['birthDate']); ?> data-target="#modal-view-user" >View More</button>
                            <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-userid=<?php echo($row['userID']); ?> data-username=<?php echo($row['username']); ?> data-target="#modal-delete-user" >Delete</button>
                       </td><?php
                    } ?>
                       </tr>
                    <tr role="row" class="even">
                 
                <tfoot>
                <tr role="row">
                   <th>User ID</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"></div></div></div>
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
    $('#example2').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
 $('#modal-edit-car').on('show.bs.modal', function(e) {

   var carId = $(e.relatedTarget).data('carid');
   var carMake = $(e.relatedTarget).data('makes');
   var year = $(e.relatedTarget).data('year');
   var carModel =$(e.relatedTarget).data('models');
   var carMax =$(e.relatedTarget).data('maxpassenger');
   var carDesc =$(e.relatedTarget).data('description');
   var carRate =$(e.relatedTarget).data('hourlyrate');

   $(e.currentTarget).find('input[name="carID"]').val(carId);
   $(e.currentTarget).find('select[name="car-years"]').val(year);
   $(e.currentTarget).find('select[name="car-makes"]').val(carMake);
   $(e.currentTarget).find('select[name="car-models"]').val(carModel);
   $(e.currentTarget).find('input[name="maxPassenger"]').val(carMax);
   $(e.currentTarget).find('input[name="hourlyRate"]').val(carRate);
   $(e.currentTarget).find('textarea[name="carDesc"]').val(carDesc);
});

 $('#modal-view-car').on('show.bs.modal', function(e) {
   var carId = $(e.relatedTarget).data('carid');
   var carMake = $(e.relatedTarget).data('makes');
   var year = $(e.relatedTarget).data('year');
   var carModel =$(e.relatedTarget).data('models');
   var carMax =$(e.relatedTarget).data('maxpassenger');
   var carDesc =$(e.relatedTarget).data('description');
   var carRate =$(e.relatedTarget).data('hourlyrate');

   $(e.currentTarget).find('input[name="carID"]').val(carId);
   $(e.currentTarget).find('input[name="car-years"]').val(year);
   $(e.currentTarget).find('input[name="car-makes"]').val(carMake);
   $(e.currentTarget).find('input[name="car-models"]').val(carModel);
   $(e.currentTarget).find('input[name="maxPassenger"]').val(carMax);
   $(e.currentTarget).find('input[name="hourlyRate"]').val(carRate);
   $(e.currentTarget).find('textarea[name="carDesc"]').val(carDesc);
});

 $('#modal-view-RM').on('show.bs.modal', function(e) {
    var companyName=$(e.relatedTarget).data('companyname');
    var companyRegistrationNumber=$(e.relatedTarget).data('companyregistrationnumber');
    var address1=$(e.relatedTarget).data('address1');
    var address2=$(e.relatedTarget).data('address2');
    var postcode=$(e.relatedTarget).data('postcode');
    var state=$(e.relatedTarget).data('state');
    var city=$(e.relatedTarget).data('city');
    var companyEmail=$(e.relatedTarget).data('companyemail');
    var companyContactNumber=$(e.relatedTarget).data('companycontactnumber');
    var title=$(e.relatedTarget).data('title');
    var firstName=$(e.relatedTarget).data('firstname');
    var lastName=$(e.relatedTarget).data('lastname');
    var gender=$(e.relatedTarget).data('gender');
    var position=$(e.relatedTarget).data('position');
    var email=$(e.relatedTarget).data('email');
    var phone=$(e.relatedTarget).data('contactnumber');
    //populate the textbox
    $(e.currentTarget).find('input[name="companyName_div2"]').val(companyName);
    $(e.currentTarget).find('input[name="companyRegNum_div2"]').val(companyRegistrationNumber);
    $(e.currentTarget).find('input[name="address1_div2"]').val(address1);
    $(e.currentTarget).find('input[name="address2_div2"]').val(address2);
    $(e.currentTarget).find('input[name="postcode_div2"]').val(postcode);
    $(e.currentTarget).find('input[name="state"]').val(state);
    $(e.currentTarget).find('input[name="city"]').val(city);
    $(e.currentTarget).find('input[name="EMail_div2"]').val(companyEmail);
    $(e.currentTarget).find('input[name="Phone_div2"]').val(companyContactNumber);
    $(e.currentTarget).find('input[name="title"]').val(title);
    $(e.currentTarget).find('input[name="firstName_div2"]').val(firstName);
    $(e.currentTarget).find('input[name="lastName_div2"]').val(lastName);
    $(e.currentTarget).find('input[name="gender_div2"]').val(gender);
    $(e.currentTarget).find('input[name="position_div2"]').val(position);
    $(e.currentTarget).find('input[name="privateEMail_div2"]').val(email);
    $(e.currentTarget).find('input[name="privatePhone_div2"]').val(phone);

});

 $('#modal-view-user').on('show.bs.modal', function(e) {

   var email = $(e.relatedTarget).data('email');
   var gender = $(e.relatedTarget).data('gender');
   var phone =$(e.relatedTarget).data('phone');
   // var birthDate =$(e.relatedTarget).data('birthDate');
   // alert(birthDate);
   $(e.currentTarget).find('input[name="EMail_div1"]').val(email);
   $(e.currentTarget).find('input[name="gender_div1"]').val(gender);
   $(e.currentTarget).find('input[name="Phone_div1"]').val(phone);
   // $(e.currentTarget).find('input[name="birthDate_div1"]').val(birthDate);
});

 $('#modal-delete-car').on('show.bs.modal', function(e) {

   var carId = $(e.relatedTarget).data('carid');
   $(e.currentTarget).find('input[name="carID"]').val(carId);
});

$('#modal-delete-RM').on('show.bs.modal', function(e) {
    var companyName=$(e.relatedTarget).data('companyname');
    var companyID=$(e.relatedTarget).data('userid');
    $(e.currentTarget).find('input[name="username"]').val(companyName);
    $(e.currentTarget).find('input[name="userID"]').val(companyID);

});

$('#modal-delete-user').on('show.bs.modal', function(e) {
    var userID = $(e.relatedTarget).data('userid');
    var username = $(e.relatedTarget).data('username');
    $(e.currentTarget).find('input[name="userID"]').val(userID);
    $(e.currentTarget).find('input[name="username"]').val(username);
});
</script>
<script src="dist/js/extra.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>