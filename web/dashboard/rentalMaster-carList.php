<?php session_start() ?> <!--
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
    <script type="text/javascript" src="http://www.carqueryapi.com/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>
    <script type="text/javascript" src="dist/js/carquery.js"></script>
    <script type="text/javascript" src="dist/js/checkLogin.js"></script>
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
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
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
        <li><a href="rentalMaster-main.php"><i class="fa fa-link"></i> <span>Overview</span></a></li>
        <li><a href="rentalMaster-profile.php"><i class="fa fa-link"></i> <span>My Profile</span></a></li>
       <li><a href="rentalMaster-calendar.php"><i class="fa fa-link"></i> <span>Booking Calendar</span></a></li>
       
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>My Cars</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="rentalMaster-carList.php">View Car List</a></li>
            <li><a href="rentalMaster-addCar.php">Add New Car</a></li>
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
        My Cars
        <small>Manage your cars here</small>
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
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Cars List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Car ID: activate to sort column descending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Make: activate to sort column ascending" style="width: 25%;">Car Make</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Model: activate to sort column ascending" style="width: 25%;">Car Model</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Max Passengers: activate to sort column ascending" style="width: 15%;">Max Passenger</th>
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 25%;">Action</th></tr>
                </thead>
                <tbody>
                
                <?php
                  include('../php/config.php');                
                  $ownerID=$_SESSION['ID'];
                  $sql="select * from car where ownerID='$ownerID'";
                  $result=mysqli_query($conn,$sql);
                  if($result->num_rows> 0)
                  {
                    while($row=mysqli_fetch_array($result))
                    {?>
                     <tr role="row" class="odd">
                        <td class="sorting_1"><?php echo("{$row['carID']}") ?></td>
                        <td><?php echo("{$row['makes']}") ?></td>
                        <td><?php echo("{$row['models']}") ?></td>
                        <td><?php echo("{$row['maxPassenger']}")?></td>
                        <td style="width: 12.5%;"><button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" href="#modal-edit" data-car-id=<?php echo($row['carID']) ?> name='carID' value=<?php echo($row['carID']) ?>>Edit</button></td>
                        <td><button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete">Delete</button></td>
                      </tr>
                    <?php }
                  }
                  else
                  { ?>
                    <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo("none") ?></td>
                      <td><?php echo("none") ?></td>
                      <td><?php echo("none") ?></td>
                      <td><?php echo("none")?></td>
                  <?php } 
              ?>

                  

                
<!--                  <tr role="row" class="odd">
                   <td class="sorting_1">id1</td>
                   <td>make 1</td>
                   <td>model 1</td>
                   <td>num 1</td>
                   <td style="width: 12.5%;"><button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button></td>
                   <td><button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete">Delete</button></td>
                 </tr><tr role="row" class="even">
                   <td class="sorting_1">id2</td>
                   <td>make 2</td>
                   <td>model 2</td>
                   <td>num 2</td>
                   <td style="width: 12.5%;"><button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit">Edit</button></td>
                   <td><button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete">Delete</button></td> -->
               <tfoot>
                <tr role="row"><th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Car ID: activate to sort column descending" style="width: 10%;">Car ID</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Make: activate to sort column ascending" style="width: 25%;">Car Make</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Model: activate to sort column ascending" style="width: 25%;">Car Model</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Max Passengers: activate to sort column ascending" style="width: 15%;">Max Passenger</th>
                    <th class=" text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="2" aria-label="Action" style="width: 25%;">Action</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
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
                <p>Delete car #carid?<br>Car details will be DELETED from the system.</p>
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
     
     <!--edit car modal-->   
     <div class="modal modal-info fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action="../php/editCar.php" method="POST" enctype="multipart/form-data" id="editCarDetails">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Car Details</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                <?php $carID=$_GET['carID']; ?>
                  <div class="form-group">
                      <label for="carID">Car ID</label>
                      <input type="text" name="carID" disabled value=<?php echo("{$carID}") ?>>
                  </div>  
                  
                <div class="form-group">
                  <label for="carDetails">Car Details: </label>
                  <select name="car-years" id="car-years"></select>  
                    <select name="car-makes" id="car-makes"></select> 
                    <select name="car-models" id="car-models"></select>
                </div>
                  
                <div class="form-group">
                  <label for="hourlyRate">Hourly Rate (RM): </label>
                  <input type="number" style="width: 10em;" min="1" max="100" step="0.10" class="form-control" id="hourlyRate" name='hourlyRate' placeholder="Enter rate">
                </div>
                  
                <div class="form-group">
                  <label for="maxPassenger">Maximum Passenger (including Driver): </label>
                  <input type="number" style="width: 10em;" min="1" max="10" step="1" class="form-control" id="maxPassenger" name='maxPassenger' placeholder="Enter maximum passenger allowed">
                </div>  
                  
                <div class="form-group">
                  <label for="carDesc">Car Description: </label>
                  <textarea class="form-control" rows="10" cols="50" style="width: 50%;" id="carDesc" name='carDesc' placeholder="Descibe your car & more details about the car rental"></textarea>
                </div>  
                  
                <div class="form-group">
                  <label for="addedPhotos">Car's photo:</label>
                  <img src="" alt="uploaded image here">
                  <button type="button" class="btn btn-block btn-danger btn-xs" style="width: 100px;">Delete Photo</button>
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

<script src="dist/js/extra.js"></script>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>