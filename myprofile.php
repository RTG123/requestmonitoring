<!DOCTYPE html>
<?php
    // Name of the module : myprofile.php
    // Module creation date : 00/00/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module handles the user profile
    // Done aligning in module to PHQD020
require_once('FOLDERS/SES/SESUSER.php'); // CONNECTION 
require_once('referencesession.php'); // ALL THE DATA
  ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Request Monitoring System</title><!-- Header of the module -->
        <link rel="icon" type="image/png" href="images/favicon.ico" /><!-- Icon of the module -->

        <link rel="stylesheet" type="text/css" href="icons/themify-icons/themify-icons.css"><!-- Themify Icons CSS -->
        <link rel="stylesheet" type="text/css" href="icons/font-awesome/css/font-awesome.min.css"><!-- Font-awesome Icons CSS -->
        
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Core CSS -->
        <link href="assets/sidebar-nav.min.css" rel="stylesheet"><!-- Menu CSS -->
        <link href="assets/css/style.css" rel="stylesheet"><!-- Custom CSS -->
        <link href="assets/css/tpc.css" id="theme" rel="stylesheet"><!-- color CSS -->
        <!-- ⭐⭐⭐ ADDITIONAL LINKS ⭐⭐⭐ -->
        <link href="css/formstyle.css" rel="stylesheet">
        <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    </head>
    <body class="fix-header" style="font-family:Century Gothic"onload="<?php echo $_SESSION['Status'];?>">
     <!-- ⭐⭐⭐ Header and Side Bar ⭐⭐⭐ -->
        <!-- Preloader -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- End Preloader -->
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Top Navigation -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="top-left-part">
                        <a class="logo" href="index.php">
                            <span class="hidden-xs">
                            <!--This is dark logo text--><img src="images/tpc.png" alt="Terumo" class="dark-logo" style="width:90%" /><!--This is light logo text--><img src="images/tpc.png" alt="Terumo" class="light-logo" style="width:90%" />
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-left">
                        <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                    </ul>
                    <!-- Dropdown User -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="images/<?php echo $_SESSION['Profile_pic']?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['First_name']?></b><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="u-img"><img src="images/<?php echo $_SESSION['Profile_pic']?>"  alt="user" /></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="u-text">
                                                    <p style="font-size:14px"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?></p>
                                                    <p class="text-muted" style="text-transform: uppercase;"><small><?php echo $_SESSION['User_type']?></small></p>
                                                    <a href="adminmyprofile.php" class="btn btn-rounded btn-danger btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="myprofile.php"><i class="ti-user"></i>&emsp;My Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="accountsetting.php"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout"></i>&emsp;Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Dropdown User -->
                </div>
            </nav>
            <!-- End Top Navigation -->
            <!-- Left Side Navigation -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu" style="color:#54667a"></i></span> <span class="hide-menu"><img src="images/tpc.png" alt="Terumo" style="width:80%" /></span></h3> 
                    </div>
                    <div class="row"><br></div>
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                            <div><a href="myprofile.php"><img src="images/<?php echo $_SESSION['Profile_pic']?>"  alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['User_type']?></small</h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li><a href="index.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="index1.php" class="waves-effect"><i class="mdi mdi-clipboard-outline fa-fw"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-folder-multiple-outline"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="searchandupdate/SRR_Requests.php" class="waves-effect"><span class="hide-menu">System Revision Request</span></a> </li>
                                <li> <a href="searchandupdate/MCNewUser_Requests.php" class="waves-effect"><span class="hide-menu">Mc New User Request</span></a> </li>
                                <li> <a href="searchandupdate/MCChange_Requests.php" class="waves-effect"><span class="hide-menu">Mc Registration Change & Cancellation</span></a> </li>
                                <li> <a href="searchandupdate/MCPassword_Requests.php" class="waves-effect "><span class="hide-menu">Mc Password Reset</span></a> </li>
                                <li> <a href="searchandupdate/MCRequest_Requests.php" class="waves-effect "><span class="hide-menu">Mc Request Record</span></a> </li>
                            </ul>
                        </li>
                        <li><a href="activitylogs.php" class="waves-effect"><i class="mdi mdi-account-check"></i><span class="hide-menu">&emsp;Activity Logs</span></a></li>
                       
                        <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">&emsp;Log out</span></a></li>
                    </ul>
                </div>
            </div>
                <!-- End Left Side Navigation -->
            <!-- ⭐⭐⭐ End Header and Side Bar ⭐⭐⭐ -->
            
            <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
             <!-- Page Content -->
             <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">My Profile</h4> 
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">My Profile</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                            <!--  User Profile Picture with different request  -->
                        <div class="col-md-4 col-xs-12">
                            <div class="white-box">
                                <div class="user-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <a href="javascript:void(0)"><img src="images/<?php echo $_SESSION['Profile_pic']?>"  class="thumb-lg img-circle" alt="img"></a>
                                            <h4 class="text-white"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?></h4>
                                            <h5 class="text-white"><?php echo $_SESSION['User_type'];?></h5> 
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple"><i class="ti-pencil-alt"></i></p>
                                        <h5>Added Request FY- <?php echo date('Y');?></h5>
                                        <h1><?php echo $_SESSION["total"];?></h1> 
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue"><i class="ti-write"></i></p>
                                        <h5>Pending Request FY- <?php echo date('Y');?></h5>
                                        <h1><?php echo $_SESSION["pending"];?></h1>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger"><i class="ti-files"></i></p>
                                        <h5>This Month's Request</h5>
                                        <h1><?php echo $_SESSION["month1"]+$_SESSION["month2"];?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Different Tabs for navigation -->
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                    <li class="active tab">
                                        <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                    </li>
                                </ul>
                                <!-- Profile Tab -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Associate No.</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $_SESSION['User_id'];?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>User Type</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $_SESSION['User_type'];?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Position</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $_SESSION['Position'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30" style="font-weight:bold">Contributing to Society through Healthcare</p>
                                        <p>We contribute to society by providing valued products and
                                            services in the healthcare market and by responding to the needs of patients and healthcare professionals.</p>
                                        <p class="m-t-30" style="font-weight:bold">Group Code of Conduct</p>
                                        <p>The rules regarding conduct that associates must follow in order to
                                            behave appropriately and with the highest ethics.</p>
                                    </div>
                                    <!-- Activity Tab -->
                                    <div class="tab-pane" id="home">
                                        <div class="steamline">
                                            <?php  
                                              $dte = date("m")."%".date("Y");
                                              $userid = $_SESSION['User_id'];
                                                                              
                                              $sql = "SELECT TOP 5* FROM [requestmonitoring].[dbo].[activitylogs] WHERE userid = '$userid' and
                                              activitydate like '$dte' order by activitydate desc, activitytime desc,ID desc"; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                                              {
                                                  ?>
                                            <div class="sl-item">
                                              <div class="sl-left"> <img src="images/user-default.png" alt="user" class="img-circle" />  </div>
                                                <div class="sl-right">
                                                    <div class="m-l-40"><a href="#" class="text-info"><?php echo $row['firstname']." ".$row['lastname'] ; ?></a> <span class="sl-date"><?php echo $row['activitydate'] ." ". $row['activitytime'] ?></span>
                                                        <p class="m-t-10"><?php echo $row['activitydetails']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Settings Tab -->
                                    <div class="tab-pane" id="settings">
                                      <form class="form-horizontal form-material" method="POST" action="database/updateprof.php" name="updateForm" onsubmit="return validateForm()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-12">User Profile</label>
                                            <div class="col-md-12">
                                                <input type="file" accept=".png, .jpg, .jpeg"  class="form-control form-control-line" name="user_image"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Associate Number</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" value="<?php echo $_SESSION['User_id'];?>" readonly> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="First Name" class="form-control form-control-line" value="<?php echo $_SESSION['First_name'];?>" name="first_name"> 
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Middle Name" class="form-control form-control-line" value="<?php echo $_SESSION['Middle_name'];?>" name="middle_name"> 
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Last Name" class="form-control form-control-line" value="<?php echo $_SESSION['Last_name'];?>" name="last_name"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Section - Department</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-line" value="<?php echo $_SESSION['Section_department'];?>" name="user_team" >
                                            </div>
                                        </div>
                                        <div  style= " border: 1px solid green; padding: 10px; margin-bottom:10px;">
                                        <h4>Change Password: </h4>
                                        <div class="form-group">
                                            <label class="col-md-12">Current Password</label>
                                            <div class="col-md-12">
                                             <div class="col-md-11">
                                                <input type="password" placeholder="Password" class="form-control form-control-line"  id="password-field" name="currentpass_word" >
                                                </div>
                                              <div class="col-md-1">
                                                <span style="color: green; margin-bottom: 100px;" class="eye" onclick="unsee()" >
                                                    <i id="hide1" style="display:none" class="fa fa-eye"  ></i>
                                                    <i id="hide2"class="fa fa-eye-slash" ></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">New Password</label>
                                            <div class="col-md-12">
                                             <div class="col-md-11">
                                                <input type="password" placeholder="Password" class="form-control form-control-line"  id="password-field1" name="newpass_word" >
                                                </div>
                                              <div class="col-md-1">
                                                <span style="color: green; margin-bottom: 100px;" class="eye" onclick="unsee1()" >
                                                    <i id="hide3" style="display:none" class="fa fa-eye"  ></i>
                                                    <i id="hide4"class="fa fa-eye-slash" ></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Confirm Password</label>
                                            <div class="col-md-12">
                                              <div class="col-md-11">
                                                <input type="password" placeholder="Confirm Password" class="form-control form-control-line"  id="password-field2" name="confirmpass_word" >
                                                </div>
                                              <div class="col-md-1">
                                                <span style="color: green; margin-bottom: 100px;" class="eye" onclick="unsee2()" >
                                                    <i id="hide5"style="display:none"class="fa fa-eye"  ></i>
                                                    <i id="hide6"class="fa fa-eye-slash" ></i>
                                                    </span>
                                                </div>
                                            </div>
                                         </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" style="background-color:#008D61"class="btn btn-success" name="updateprofile2" value="<?php echo $_SESSION['userinfo_id'];?>">Update Profile</button>
                                            </div>
                                         </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center" style="color:#008d61;">Copyright &copy; <?php echo date("Y"); ?> Request Monitoring System. All Rights Reserved</footer>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- End Wrapper -->

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#fdfdfd">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="mdi mdi-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row"><br></div>  
                        <div class="row">
                            <center><div class="col-sm-2"></div>
                            <div class="col-sm-8"><p style="font-size:14px">Do you really wish to leave and log out?<br>All the unsaved changes will be lost.</p></div>
                            <div class="col-sm-2"></div></center>
                        </div>
                        <div class="row"><br></div> 
                    </div>
                    <div class="modal-footer" style="background-color:#fdfdfd">
                        <form action="logout.php">
                            <button type="submit"  class="btn btn-success btn-outline">Yes, Log out</button>
                            <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">No, Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Logout Modal -->
       
        <script src="assets/jquery.min.js"></script><!-- jQuery -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
        <script src="assets/sidebar-nav.min.js"></script><!-- Menu Plugin JavaScript -->
        <script src="assets/js/jquery.slimscroll.js"></script><!--slimscroll JavaScript -->
        <script src="assets/js/custom.min.js"></script><!-- Custom Theme JavaScript -->

        <script type="text/javascript" src="datepicker/datepicker.js"></script>
        <link rel="stylesheet" href="datepicker/datepicker.css"/>
        <script type="text/javascript" src="js/toastr.js"></script>
        <script type="text/javascript" src="js/jquery_toast.js"></script>
        <script type="text/javascript" src="js/toaster.js"></script>
        <link href="lib/toast-master/css/jquery.toast.css" rel="stylesheet"><!-- Toast CSS -->
        <!-- Chart JS -->
        <script src="assets/Chart.js/chartjs.init.js"></script>
        <script src="assets/Chart.js/Chart.min.js"></script>
        <!-- Morris chart -->
        <!--Morris JavaScript -->
        <script src="plugins/bower_components/raphael/raphael-min.js"></script>
        <script src="plugins/bower_components/morrisjs/morris.js"></script>
        <!-- <script src="plugins/js/morris-data.js"></script> -->
        <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
        <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
        <script>
        function success()
        {
            $.toast(
            {
            heading: 'Successfully Added',
            text: 'You have successfully updated your account',
            position: 'top-right',
            loaderBg: '#247f34',
            icon: 'success',
            hideAfter: 4000,
            bgColor:'#2b993e',
            stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        function invalid()
        {
            $.toast(
            {
                heading: 'ERROR',
                text: 'Failed to update your account',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 4000,
                bgColor:'#fc050d',
                stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        </script>
        <script>
        function unsee()
        {
            var x= document.getElementById("password-field");
            var y= document.getElementById("hide1");
            var z= document.getElementById("hide2");
            if(x.type === "password")
            {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none"
            console.log("successfull")
            }else
            {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block"
            console.log("unsuccess")
            }
        }
        function unsee1()
        {
            var x= document.getElementById("password-field1");
            var y= document.getElementById("hide3");
            var z= document.getElementById("hide4");
            if(x.type === "password")
            {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none"
            console.log("successfull")
            }else
            {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block"
            console.log("unsuccess")
            }
        }
        function invaliddata1()
        {
            $.toast(
            {
            heading: 'Unable to Update',
            text: 'Please fiil up the current password first.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        function invaliddata2()
        {
            $.toast(
            {
                heading: 'Unable to Update',
                text: 'Incorrect current password.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 4000,
                bgColor:'#fc050d',
                stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        function invaliddata3()
        {
            $.toast(
            {
                heading: 'Unable to Update',
                text: "Can't update when new password is empty.",
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 4000,
                bgColor:'#fc050d',
                stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        function invaliddata4()
        {
            $.toast(
            {
                heading: 'Unable to Update',
                text: 'The New Password & Confirmpassword does not match.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 4000,
                bgColor:'#fc050d',
                stack: false
            });
            <?php $_SESSION['Status'] = '';?>
        }
        function unsee2()
        {
            var x= document.getElementById("password-field2");
            var y= document.getElementById("hide5");
            var z= document.getElementById("hide6");
            if(x.type === "password")
            {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none"
                console.log("successfull")
            }else
            {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block"
                console.log("unsuccess")
            }
        }
        function loginerror()
        {
            document.getElementById("wrong").style.display="";
            <?php $_SESSION['error'] = '';?>
        }
        function onChange() 
        {
            const password = document.querySelector('input[name=newpass_word]');
            const confirm = document.querySelector('input[name=confirmpass_word]');
            const current = document.querySelector('input[name=currentpass_word]');
           if(current.value != '')
           { 
                if (confirm.value === password.value) 
                {
                    confirm.setCustomValidity('');
                }else 
                {
                    confirm.setCustomValidity('Passwords do not match');
                }
                const current = document.querySelector('input[name=currentpass_word]');
                if (current.value == <?php echo $_SESSION['Password']?>) 
                {
                    current.setCustomValidity('');
                }else if(current.value == '')
                {
                    current.setCustomValidity('');   
                }else
                {
                    current.setCustomValidity('Passwords does not match on current');
                }
            }else
            {
                current.setCustomValidity('Please fill it up first');
            }
        }
    </script>
    </body>
</html>
