<?php 
    session_start(); 
    include("php/config.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
    <meta name="author" content="Alvarez.is - BlackTie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>RentIt | Search Results</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <link href="assets/css/styles.css" rel="stylesheet">
     <link rel="stylesheet" href="dashboard/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" type="text/css"/>


    <link rel="stylesheet" href="dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script type="text/javascript" src="dist/js/checkLogin.js"></script>

</head>
<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!--modal view chosen car details-->
<div class="modal modal-info fade" id="modal-details">
          <div class="modal-dialog">
              
            <div class="modal-content">
              
              <form role="form" method="POST" action="php/madeBooking.php" enctype="multipart/form-data" id="viewRentalInfo" class="form-horizontal">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">View Rental Info</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
              <div class="box-body">
                    <div class="form-group">
                    
                      <label for="carID" class="col-sm-3">Car ID:    </label>
                
                    <input style="border:none;" class="col-sm-8" type="text" name="carId" readonly="">
                  </div>  
                  <div class="form-group">

                      <label for="carMake" class="col-sm-3">Car Make:    </label>
                
                    <input style="border:none;" class="col-sm-8" type="text" name="carMake" readonly="">
                  </div>  
               
                  <div class="form-group">
                      <label for="carModel" class="col-sm-3">Car Model:  </label>
                
                    <input style="border:none;" type="text" name="carModel" readonly="" class="col-sm-8">
                  </div> 

                  <div class="form-group">
                      <label for="companyName" class="col-sm-3">Company Name:    </label>
                
                    <input style="border:none;" type="text" name="companyName" readonly="" class="col-sm-8">
                  </div> 

                    <div class="form-group">
                        <label for="startDate" class="col-sm-4">Start Date:  </label>
                
                        <input style="border:none;" type="text" step="0.01" name="startDate" readonly="" class="col-sm-8">
                    </div> 
                    <div class="form-group">
                      <label for="returnDate" class="col-sm-4">Return Date:  </label>
                
                    <input style="border:none;" type="text" step="0.01" name="returnDate" readonly="" class="col-sm-8">
                  </div>
                  <div class="form-group">
                        <label for="startTime" class="col-sm-4">Start Time:  </label>
                
                        <input style="border:none;" type="text" step="0.01" name="startTime" readonly="" class="col-sm-8">
                    </div> 
                    <div class="form-group">
                      <label for="returnTime" class="col-sm-4">Return Time:  </label>
                
                    <input style="border:none;" type="text" step="0.01" name="returnTime" readonly="" class="col-sm-8">
                  </div> 



                <br><hr>
                <h3>Payment Details:</h3>
                <br>
                <div class="form-group">
                      <label for="hourlyRate" class="col-sm-4">Hourly Rate(RM):  </label>
                
                    <input style="border:none;" type="number" step="0.01" name="hourlyRate" readonly="" class="col-sm-8">
                  </div> 

                <div class="form-group">
                      <label for="hoursRent" class="col-sm-4">Hour(s) Rent:  </label>
                
                    <input style="border:none;" type="number" name="hoursRent" readonly="" class="col-sm-8">
                  </div> 
                  <br><br>
                <div class="form-group">
                      <label for="totalRate" class="h3">Total Rate(RM): </label>
                
                    <input style="border:none;" type="number" step="0.01" name="totalRate" readonly="" class="h3">
                  </div> 

                
              </div>
              <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">CONFIRM</button>
              </div>
            </form>   
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 

    <!--modal login-->
    <div class="modal fade" id="modal_login">
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login RentIt</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div >
                            <div class="well">
                                <form id="loginForm" novalidate="novalidate" role="form" method="POST" action="php/check_login.php" onsubmit="return validate();" >
                                    <div class="form-group">
                                        <label for="emailInput" class="control-label">Username</label>
                                        <input type="text" class="form-control"  id="emailInput" name="emailInput"  value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="passwordInput" name='passwordInput'  value="" required="" title="Please enter your password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group select"><p>
                                            <label for="usertype" class="control-label">Login As:</label><br>
                                            <input type="radio" name="usertype" value="RentalMaster" checked>Rental Master<br>
                                            <input type="radio" name="usertype" value="Customer"> Customer<br>
                                            <input type="radio" name="usertype" value="Admin"> Admin
                                        </p></div>
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember"> Remember login
                                        </label>
                                        <p class="help-block">(if this is a private computer)</p>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                    <a href="/forgot/" class="btn btn-default btn-block">Forget Password</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>  
    </div>

    <!--modal customer reg-->
    <div class="modal fade" id="modal_cust_reg">
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register as a Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div >
                            <div class="well">
                                <form name='customer' id='form1' action='php/insertUser.php' method='POST'>
                                    <h3>User Information</h3>


                                    <div class='form-group'>
                                        <p>
                                            <label for='EMail_div1'>* E-mail:</label>
                                            <input type="text" id="EMail_div1" name="EMail_div1" class='form-control' placeholder="johndoe@mail.com" required/>
                                        </p>
                                    </div>

                                    <div class="btn-group form-group" data-toggle="buttons">
                                        <label for='gender_div1'>* Gender:</label><br>
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="gender_div1" id='gender_div1' value="Male" class='form-control'>Male
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="gender_div1" id='gender_div1' value="Female" class='form-control'>Female
                                        </label>

                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='birthDate_div1'>* Date of Birth:</label>
                                            <input type="input" id="birthDate_div1" name="birthDate_div1" class='form-control' required/>
                                        </p>
                                    </div>


                                    <div class='form-group'>
                                        <p>
                                            <label for='Phone_div1'>Contact Number:</label>
                                            <input type="input" id="Phone_div1" name="Phone_div1" class='form-control' placeholder="0123456789" required/>
                                        </p>
                                    </div>

                                    <h3>Security Verification</h3>
                                    <div class='form-group'>
                                        <p>
                                            <label for='password_div1'>Password</label>
                                            <input type="password" id="password_div1" name="password_div1" class='form-control' required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='confirm_password_div1'>Re-enter Password</label>
                                            <input type="password" id="confirm_password_div1" name="confirm_password_div1" class='form-control' required onkeyup="check(1);"/>
                                            <label id="message_div1"></label>
                                        </p>
                                    </div>

                                    <!--wants to add captcha features here-->

                                    <br><br><div class='checkbox'>
                                        <input type='checkbox' name='agree' value='yes' checked class='form-control'>
                                        <center>I agree to the terms of service.</center>
                                        <br><br></div>
                                    <center><button type="submit" id='registerButton_div1' class="btn btn-default">Register</button></center>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>  
    </div>

    <!--modal master reg-->
    <div class="modal fade" id="modal_master_reg">
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register as a Rental Master</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div >
                            <div class="well">
                                <form name='rentalMaster' id='form2' action='php/insertRentalMaster.php' method='POST'>

                                    <h3>Company Information</h3>
                                    <div class='form-group'>
                                        <p>
                                            <label for='companyName' style='color:red;'>* Company Name:</label>
                                            <input type="text" id="companyName_div2" name="companyName_div2" class='form-control' placeholder="Car Rental SDN BHD" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='companyRegNum' style='color:red;'>* Company Registration Number:</label>
                                            <input type="text" id="companyRegNum_div2" name="companyRegNum_div2" class='form-control' placeholder="Enter Company Registration Number" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='establishDate' style='color:red;'>* Date of Establishment:</label>
                                            <input type="date" id="establishDate_div2" name="establishDate_div2" class='form-control' required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='address1' style='color:red;'>Address (line 1):</label>
                                            <input type="text" id="address1_div2" name="address1_div2" class='form-control' placeholder="123, Street ABC" required/>

                                            <label for='address2'>Address (line 2):</label>
                                            <input type="text" id="address2_div2" name="address2_div2" class='form-control' placeholder="off Petaling Street"/>

                                            <label for='postcode' style='color:red;'>* Postcode</label>
                                            <input type="text" id="postcode_div2" name="postcode_div2" class='form-control' placeholder="08100" required/>

                                            <input type="hidden" name="country_div2" id="countryId" value="MY"/>
                                            <label for='state' style='color:red;'>* State</label>
                                            <select name="state" class="states order-alpha form-control" id="stateId" required>
                                                <option style="background-color: black;" value="">Select State</option>
                                            </select>

                                            <label for='city' style='color:red;'>* City</label>
                                            <select name="city_div2" class="cities order-alpha form-control" id="cityId" required>
                                                <option value="">Select City</option>
                                            </select>

                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='EMail' style='color:red;'>* Company E-mail:</label>
                                            <input type="text" id="EMail_div2" name="EMail_div2" class='form-control' placeholder="rentacar@mail.com" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='Phone' style='color:red;'>* Company Contact Number:</label>
                                            <input type="text" id="Phone_div2" name="Phone_div2" class='form-control' placeholder="0123456789" required/>
                                        </p>
                                    </div>

                                    <h3>Person in-Charge Information</h3>
                                    <div class='form-group'>
                                        <p>
                                            <label for='title' style='color:red;'>* Title:</label>
                                            <select id="title_div2" name="title_div2" class='form-control'>
                                                <option selected>Please select one </option>
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Sir">Sir</option>
                                                <option value="Madam">Madam</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Dato">Dato</option>
                                                <option value="Datuk">Datuk</option>
                                                <option value="Datin">Datin</option>
                                                <option value="Professor">Professor</option>

                                            </select>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='firstName' style='color:red;'>* First Name:</label>
                                            <input type="text" id="firstName_div2" name="firstName_div2" class='form-control' placeholder="John" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='lastName' style='color:red;'>* Last Name:</label>
                                            <input type="text" id="lastName_div2" name="lastName_div2" class='form-control' placeholder="Doe" required/>
                                        </p>
                                    </div>

                                    <div class="btn-group form-group" data-toggle="buttons">
                                        <label for='gender_div2'>* Gender:</label><br>
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="gender_div2" id='gender_div2' value="Male" class='form-control'>Male
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="gender_div2" id='gender_div2' value="Female" class='form-control'>Female
                                        </label>

                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='position' style='color:red;'>* Position:</label>
                                            <input type="text" id="position_div2" name="position_div2" class='form-control' placeholder="Marketing Officer" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='EMail' style='color:red;'>* E-mail:</label>
                                            <input type="text" id="privateEMail_div2" name="privateEMail_div2" class='form-control' placeholder="johndoe@mail.com" required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='Phone'>Contact Number:</label>
                                            <input type="text" id="privatePhone_div2" name="privatePhone_div2" class='form-control' placeholder="0123456789" required/>
                                        </p>
                                    </div>

                                    <h3>Security Verification</h3>
                                    <div class='form-group'>
                                        <p>
                                            <label for='password'>Password</label>
                                            <input type="password" id="password_div2" name="password_div2" class='form-control' required/>
                                        </p>
                                    </div>

                                    <div class='form-group'>
                                        <p>
                                            <label for='confirm_password'>Re-enter Password</label>
                                            <input type="password" id="confirm_password_div2" name="confirm_password_div2" class='form-control' required onkeyup='check(2);'/>
                                            <label id="message_div2"></label>
                                        </p>
                                    </div>

                                    <!--wants to add captcha features here-->

                                    <br><br><div class='checkbox'>
                                        <input type='checkbox' name='agree' value='yes' checked class='form-control'><center>I agree to the terms of service.</center>
                                        <br><br></div>
                                    <center><button type="submit" id='registerButton_div2' class="btn btn-default">Register</button></center>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>  
    </div>

    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>RentIt</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smothscroll">Home</a></li>
                    <li><a href="#desc" class="smothscroll">Description</a></li>
                    <li><a href="#showcase" class="smothScroll">Showcase</a></li>
                    <li><a href="#contact" class="smothScroll">Contact</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="btn-cta">
                        <a href="#modal_login" role="button" data-toggle="modal" data-target="#modal_login"><span>LOGIN </span></a>
                    </li>
                    <li class="btn-cta">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>REGISTER </span></a>
                        <ul class="dropdown-menu">
                            <li><a id="registerLink1" role="button" data-toggle="modal" data-target="#modal_cust_reg" >As a Customer</a></li>
                            <li><a id="registerLink2" role="button" data-toggle="modal" data-target="#modal_master_reg" > As an Advertiser (Rental Master)</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-12" style="overflow: auto;">
                    <img class="img-responsive" src="assets/img/newlogowhite.png" alt=""  style="width: 200px; float:left;">
                    <h2 style="float:left;">Search Results</h2>
                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->
    
    
    <!--SEARCH WRAP-->
    <div id="searchCar">
        <div class="container-fluid">
            <div class="row centered">
                <h1>Find a Car</h1>
                <div class="col-lg-2"></div>
                <div class="col-lg-8 panel panel-primary">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <form name="searchCarForm" id="searchCarForm" method="POST" action="">

                            <!--<input id="find" type="button" value="find" />-->

                            <div class="row centered">
                                <div class="form-group col-md-3 col-md-offset-2" >
                                    <i class="fa fa-location-arrow fa-lg"></i>
                                    <label for="geocomplete" class="control-label" >Pickup Location</label>
                                    <input style="margin: auto;" type="text" class="form-control" id="geocomplete" placeholder="Type in pickup location" >
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group col-md-3 col-md-offset-2">
                                    <i class="fa fa-users fa-lg"></i>
                                    <label for="passNum" class="control-label" >Number of Passengers</label>
                                    <select class="form-control" id="passNum" name='passNum'>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">



                                <div class="form-group col-md-3 col-md-offset-3">
                                    <label for="pickupDate" class="control-label" >Pickup Date</label>
                                        <div class="input-group date" data-provide="datepicker" id="pickupDateGroup" data-date-format="dd-mm-yyyy" data-date-start-date="new Date()">
                                        
                                        <input style="margin: auto;" type="text" class="form-control" id="pickupDate" name="pickupDate" size="90">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <i class="fa fa-clock-o fa-lg"></i>
                                    <label for="pickupTime" class="control-label" >Pickup Time</label>
                                    <select class="form-control" id="pickupTime " name="pickupTime" >
                                        <option value="00:00:01">12.00AM</option>
                                        <option value="00:30:00">12.30AM</option>
                                        <option value="01:00:00">1.00AM</option>
                                        <option value="01:30:00">1.30AM</option>
                                        <option value="02:00:00">2.00AM</option>
                                        <option value="02:30:00">2.30AM</option>
                                        <option value="03:00:00">3.00AM</option>
                                        <option value="03:30:00">3.30AM</option>
                                        <option value="04:00:00">4.00AM</option>
                                        <option value="04:30:00">4.30AM</option>
                                        <option value="05:00:00">5.00AM</option>
                                        <option value="05:30:00">5.30AM</option>
                                        <option value="06:00:00">6.00AM</option>
                                        <option value="06:30:00">6.30AM</option>
                                        <option value="07:00:00">7.00AM</option>
                                        <option value="07:30:00">7.30AM</option>
                                        <option value="08:00:00">8.00AM</option>
                                        <option value="08:30:00">8.30AM</option>
                                        <option value="09:00:00">9.00AM</option>
                                        <option value="09:30:00">9.30AM</option>
                                        <option value="10:00:00">10.30AM</option>
                                        <option value="10:30:00">10.30AM</option>
                                        <option value="11:00:00">11.00AM</option>
                                        <option value="11:30:00">11.30AM</option>
                                        <option value="12:00:00">12.00PM</option>
                                        <option value="12:30:00">12.30PM</option>
                                        <option value="13:00:00">1.00PM</option>
                                        <option value="13:30:00">1.30PM</option>
                                        <option value="14:00:00">2.00PM</option>
                                        <option value="14:30:00">2.30PM</option>
                                        <option value="15:00:00">3.00PM</option>
                                        <option value="15:30:00">3.30PM</option>
                                        <option value="16:00:00">4.00PM</option>
                                        <option value="16:30:00">4.30PM</option>
                                        <option value="17:00:00">5.00PM</option>
                                        <option value="17:30:00">5.30PM</option>
                                        <option value="18:00:00">6.00PM</option>
                                        <option value="18:30:00">6.30PM</option>
                                        <option value="19:00:00">7.00PM</option>
                                        <option value="19:30:00">7.30PM</option>
                                        <option value="20:00:00">8.00PM</option>
                                        <option value="20:30:00">8.30PM</option>
                                        <option value="21:00:00">9.00PM</option>
                                        <option value="21:30:00">9.30PM</option>
                                        <option value="22:00:00">10.00PM</option>
                                        <option value="22:30:00">10.30PM</option>
                                        <option value="23:00:00">11.00PM</option>
                                        <option value="23:30:00">11.30PM</option>

                                    </select>
                                </div>

                                <span class="help-block"></span>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 col-md-offset-3">
                                    <label for="returnDate" class="control-label" >Return Date</label>
                                        <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy" id="returnDateGroup" data-date-start-date="$('#pickupDateGroup').val()">
                                        
                                        <input style="margin: auto;" type="text" class="form-control" id="returnDate" name="returnDate" size="90" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <i class="fa fa-clock-o fa-lg"></i>
                                    <label for="returnTime" class="control-label" >Return Time</label>
                                    <select class="form-control" id="returnTime" name="returnTime" >
                                        <option value="00:00:01">12.00AM</option>
                                        <option value="00:30:00">12.30AM</option>
                                        <option value="01:00:00">1.00AM</option>
                                        <option value="01:30:00">1.30AM</option>
                                        <option value="02:00:00">2.00AM</option>
                                        <option value="02:30:00">2.30AM</option>
                                        <option value="03:00:00">3.00AM</option>
                                        <option value="03:30:00">3.30AM</option>
                                        <option value="04:00:00">4.00AM</option>
                                        <option value="04:30:00">4.30AM</option>
                                        <option value="05:00:00">5.00AM</option>
                                        <option value="05:30:00">5.30AM</option>
                                        <option value="06:00:00">6.00AM</option>
                                        <option value="06:30:00">6.30AM</option>
                                        <option value="07:00:00">7.00AM</option>
                                        <option value="07:30:00">7.30AM</option>
                                        <option value="08:00:00">8.00AM</option>
                                        <option value="08:30:00">8.30AM</option>
                                        <option value="09:00:00">9.00AM</option>
                                        <option value="09:30:00">9.30AM</option>
                                        <option value="10:00:00">10.30AM</option>
                                        <option value="10:30:00">10.30AM</option>
                                        <option value="11:00:00">11.00AM</option>
                                        <option value="11:30:00">11.30AM</option>
                                        <option value="12:00:00">12.00PM</option>
                                        <option value="12:30:00">12.30PM</option>
                                        <option value="13:00:00">1.00PM</option>
                                        <option value="13:30:00">1.30PM</option>
                                        <option value="14:00:00">2.00PM</option>
                                        <option value="14:30:00">2.30PM</option>
                                        <option value="15:00:00">3.00PM</option>
                                        <option value="15:30:00">3.30PM</option>
                                        <option value="16:00:00">4.00PM</option>
                                        <option value="16:30:00">4.30PM</option>
                                        <option value="17:00:00">5.00PM</option>
                                        <option value="17:30:00">5.30PM</option>
                                        <option value="18:00:00">6.00PM</option>
                                        <option value="18:30:00">6.30PM</option>
                                        <option value="19:00:00">7.00PM</option>
                                        <option value="19:30:00">7.30PM</option>
                                        <option value="20:00:00">8.00PM</option>
                                        <option value="20:30:00">8.30PM</option>
                                        <option value="21:00:00">9.00PM</option>
                                        <option value="21:30:00">9.30PM</option>
                                        <option value="22:00:00">10.00PM</option>
                                        <option value="22:30:00">10.30PM</option>
                                        <option value="23:00:00">11.00PM</option>
                                        <option value="23:30:00">11.30PM</option>

                                    </select>
                                </div>

                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <fieldset style="display: none;">
                                    <h3>Address-Details</h3>

                                    <label>Name</label>
                                    <input name="name" type="text" value="">

                                    <label>POI Name</label>
                                    <input name="point_of_interest" type="text" value="">

                                    <label>Latitude</label>
                                    <input name="lat" type="text" value="">

                                    <label>Longitude</label>
                                    <input name="lng" type="text" value="">

                                    <label>Location</label>
                                    <input name="location" type="text" value="">

                                    <label>Location Type</label>
                                    <input name="location_type" type="text" value="">

                                    <label>Formatted Address</label>
                                    <input name="formatted_address" type="text" value="">

                                    <label>Bounds</label>
                                    <input name="bounds" type="text" value="">

                                    <label>Viewport</label>
                                    <input name="viewport" type="text" value="">

                                    <label>Route</label>
                                    <input name="route" type="text" value="">

                                    <label>Street Number</label>
                                    <input name="street_number" type="text" value="">

                                    <label>Postal Code</label>
                                    <input name="postal_code" type="text" value="">

                                    <label>Locality</label>
                                    <input name="locality" type="text" value="">

                                    <label>Sub Locality</label>
                                    <input name="sublocality" type="text" value="">

                                    <label>Country</label>
                                    <input name="country" type="text" value="">

                                    <label>Country Code</label>
                                    <input name="country_short" type="text" value="">

                                    <label>State</label>
                                    <input name="administrative_area_level_1" type="text" value="">

                                    <label>Place ID</label>
                                    <input name="place_id" type="text" value="">

                                    <label>ID</label>
                                    <input name="id" type="text" value="">

                                    <label>Reference</label>
                                    <input name="reference" type="text" value="">

                                    <label>URL</label>
                                    <input name="url" type="text" value="">

                                    <label>Website</label>
                                    <input name="website" type="text" value="">
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="Search" value="Search">Search</button>
                                <button type="reset" class="btn btn-danger" name="Clear" value="Clear">Clear</button>
                            </div>

                        </form>
                    </div>

                    <br>
                    <div class="map_canvas" style="display: none;"></div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
    
    <!--SEARCH RESULT WRAP-->
    <div id="searchCarResults">
        <div class="container-fluid" style="background-color: #999b9e;">
            <div class="row centered">
                <!-- /.box-header -->
            <div class="box-body col-lg-10 col-lg-offset-1">
              <div id="carList" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row"><div class="col-sm-6">
                          <div class="dataTables_length" id="example1_length">
                              
                          </div>
                      </div>
                      <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"></div>
                          
                      </div>
                          
                  </div>
                  <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead style="background-color: #b8ceef;">
                <tr role="row"><th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car image" style="width: 20%;">Image</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Make: activate to sort column ascending" style="width: 15%;">Car Make</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Model: activate to sort column ascending" style="width: 15%;">Car Model</th>
                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Description" style="width: 20%;">Description</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hourly Rate: activate to sort column ascending" style="width: 10%;">Hourly Rate(RM)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Rate: activate to sort column ascending" style="width: 10%;">Total Rate(RM)</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 10%;">Action</th>

                </tr>   
                </thead>
                <tbody>

                <?php 
                    if(isset($_POST['passNum']))
                    {
                        $postal_code=$_POST['postal_code'];
                        $locality=$_POST['locality'];
                        $pickupDate=$_POST['pickupDate'];
                        $pickupTime=$_POST['pickupTime'];
                        $returnDate=$_POST['returnDate'];
                        $returnTime=$_POST['returnTime'];
                        $pickup=("$pickupDate"." $pickupTime");
                        $return=("$returnDate"." $returnTime");
                        // $diff=0;
                        // $diff=round((strtotime($return)-strtotime($pickup))/3600,1);
                        
                        $sql="select * from rentalmaster where postcode='$postal_code' or city='$locality'";
                        $result=mysqli_query($conn,$sql)or trigger_error($conn->error."[$sql]");
                        $row=mysqli_fetch_array($result);
                        $ownerID=$row['userID'];
                        $ownerName=$row['username'];
                        $strOwner = str_replace(' ', '&nbsp;', $ownerName);

                        $maxPassenger=$_POST['passNum'];
                        //$sql="select* from car where maxPassenger='$maxPassenger'";
                        $sql="select* from car where maxPassenger='$maxPassenger' and ownerID='$ownerID'";
                        $result=mysqli_query($conn,$sql)or trigger_error($conn->error."[$sql]");
                        while($row=mysqli_fetch_array($result))
                        {
                            // $total=$row['hourlyRate']*$diff;
                            ?>
                            <tr role="row" class="odd" >
                            <?php 
                                $diff=0;
                                $diff=round((strtotime($return)-strtotime($pickup))/3600,1);
                                $total=$row['hourlyRate']*$diff;
                                $carID="{$row['carID']}";
                                $et="jpg";
                                $carPhoto= "profile".$carID.".".$et;
                                $path="images/uploadCar/".$carPhoto;
                            ?>
                                <td class="sorting_1"><?php echo("<img src='$path' height='130' width='220'>"); ?></td>
                                <td><?php echo("{$row['makes']}"); ?></td>
                                <td><?php echo("{$row['models']}"); ?></td>
                                <td><?php echo("{$row['description']}"); ?></td>
                                <td><?php echo( number_format((float)$row['hourlyRate'], 2, '.', '')); ?></td>
                                <td><?php 
                                        $total=$row['hourlyRate']*$diff;
                                        echo( number_format((float)$total, 2, '.', '')); ?></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" href="#modal-details" data-car-id=<?php echo($row['carID']); ?> data-start-date=<?php echo($pickupDate); ?> data-start-time=<?php echo($pickupTime); ?> data-return-date=<?php echo($returnDate); ?> data-return-time=<?php echo($returnTime); ?> data-car-makes=<?php echo($row['makes']); ?> data-car-models=<?php echo($row['models']); ?> data-owner-name=<?php echo($strOwner);?> data-total-price=<?php echo($total);?>  data-total-hours=<?php echo($diff);?> data-hourly-rate=<?php echo("{$row['hourlyRate']}");?>>Select</button>
                                </td>
                            </tr><?php
                        }
                    }
                ?>


                
                <tfoot style="background-color: #b8ceef;">
                <tr role="row"><th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car image" style="width: 20%;">Image</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Make: activate to sort column ascending" style="width: 15%;">Car Make</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Car Model: activate to sort column ascending" style="width: 15%;">Car Model</th>
                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Description" style="width: 20%;">Description</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hourly Rate: activate to sort column ascending" style="width: 10%;">Hourly Rate(RM)</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Total Rate: activate to sort column ascending" style="width: 120%;">Total Rate(RM)</th>
                    <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 10%;">Action</th>

                </tr>   </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                          <ul class="pagination">
                              <li class="paginate_button previous disabled" id="example1_previous">
                              
            <!-- /.box-body -->
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/statecity.js"></script>
    <script src="js/formValidation.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD7CsNY-Lx-oqoJFePf2hBS9DFpLuMpH2k&sensor=false&libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


<!-- jQuery 3 -->
<script src="dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="dashboard/dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
        
        
        <script src="dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        
    
    <script src="assets/js/jquery.geocomplete.js"></script>
    <script src="assets/js/logger.js"></script>
    <script src="dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dashboard/dist/js/extra.js"></script>
    <!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="dashboard/bower_components/fastclick/lib/fastclick.js"></script>
    <script>
                                                $('.carousel').carousel({
                                                    interval: 3500
                                                })
    </script>
    <script>
        $(function () {
            var center = new google.maps.LatLng(1.4927, 103.7414);
            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                types: ['establishment'],
                country: 'my',
                details: "form"
            });
            var map = $("#geocomplete").geocomplete("map")
            map.setCenter(center);
            map.setZoom(10);
        });
        $("#find").click(function () {
            $("#geocomplete").trigger("geocode");
        });
    </script>
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
<script>
      //triggered when modal is about to be shown
$('#modal-details').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var carId = $(e.relatedTarget).data('car-id');
    var carMake = $(e.relatedTarget).data('car-makes');
    var carModel =$(e.relatedTarget).data('car-models');
    var ownerName =$(e.relatedTarget).data('owner-name'); 
    var startDate = $(e.relatedTarget).data('start-date');
    var returnDate = $(e.relatedTarget).data('return-date');
    var startTime = $(e.relatedTarget).data('start-time');
    var returnTime = $(e.relatedTarget).data('return-time');
    var hourlyRate =parseFloat($(e.relatedTarget).data('hourly-rate')).toFixed(2);
    var totalPrice =parseFloat($(e.relatedTarget).data('total-price')).toFixed(2);
    var totalHours =parseFloat($(e.relatedTarget).data('total-hours'));
    // var sD = new Date(startDate);
    // var startDay = sD.getDate();
    // var startMonth =  sD.getMonth()+1;  // JavaScript months are 0-11
    // var startYear = sD.getFullYear();
    // var startDate2=startYear+"."+startMonth+"."+startDay;
    // var rD = new Date(returnDate);
    // var rd = rD.getDate();
    // var rm =  rD.getMonth();
    // rm += 1;  // JavaScript months are 0-11
    // var ry = rD.getFullYear();
    // var endDate=rd+"."+rm+"."+ry;

    //populate the textbox
    $(e.currentTarget).find('input[name="carId"]').val(carId);
    $(e.currentTarget).find('input[name="carMake"]').val(carMake);
    $(e.currentTarget).find('input[name="carModel"]').val(carModel);
    $(e.currentTarget).find('input[name="companyName"]').val(ownerName);
    $(e.currentTarget).find('input[name="startDate"]').val(startDate);
    $(e.currentTarget).find('input[name="returnDate"]').val(returnDate);
    $(e.currentTarget).find('input[name="startTime"]').val(startTime);
    $(e.currentTarget).find('input[name="returnTime"]').val(returnTime);
    $(e.currentTarget).find('input[name="hourlyRate"]').val(hourlyRate);
    $(e.currentTarget).find('input[name="hoursRent"]').val(totalHours);
    $(e.currentTarget).find('input[name="totalRate"]').val(totalPrice);
});


</script>
</body>

</html>