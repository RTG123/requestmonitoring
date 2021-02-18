<!DOCTYPE html>
<?php
  require_once('referencesession.php'); // ALL THE DATA
    session_start();
    if(empty($_SESSION['userid'])){
      header("Location:login.php");
    }
  ?>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>System Name | Module Name</title>
        <link rel="icon" type="image/png" href="images/favicon.ico" />

        <link rel="stylesheet" type="text/css" href="icons/themify-icons/themify-icons.css"><!-- Themify Icons CSS -->
        <link rel="stylesheet" type="text/css" href="icons/font-awesome/css/font-awesome.min.css"><!-- Font-awesome Icons CSS -->
        
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Core CSS -->
        <link href="assets/sidebar-nav.min.css" rel="stylesheet"><!-- Menu CSS -->
        <link href="assets/css/style.css" rel="stylesheet"><!-- Custom CSS -->
        <link href="assets/css/tpc.css" id="theme" rel="stylesheet"><!-- color CSS -->
        
        <link href="img/icon.png-removebg-preview.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Bootstrap core CSS -->
        <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/animate.css">  -->
        <!--external css-->
        <link href="css/formstyle.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
        <!-- Custom styles for this template -->
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <link href="lib/toast-master/css/jquery.toast.css" rel="stylesheet"><!-- Toast CSS -->
        <!-- <link href="css/style-responsive.css" rel="stylesheet"> -->
        <script src="lib/chart-master/Chart.js"></script>
    </head>

    <body class="fix-header" style="font-family:Century Gothic">
        <!-- Preloader -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- End Preloader -->
        <!-- Wrapper -->
        <div id="wrapper">
             <!--\\\\\\\\\\\\\\\\\\\\\\ END NEEDED TO BE COPY ////////////////////-->
            <!-- **************** Top Navigation *********************** -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="top-left-part">
                        <a class="logo" href="home.php">
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
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="images/user-default.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['firstname']."  "?></b><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="u-img"><img src="images/user-default.png" alt="user" /></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="u-text">
                                                    <p style="font-size:14px"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></p>
                                                    <p class="text-muted" style="text-transform:uppercase"
                                                    ><small><?php echo $_SESSION['usertype'];?></small></p>
                                                    <a href="#" class="btn btn-rounded btn-danger btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="myprofile.html"><i class="ti-user"></i>&emsp;My Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout"></i>&emsp;Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Dropdown User -->
                </div>
            </nav>
            <!-- **************** End Top Navigation *********************** -->
            <!-- **************** Left Side Navigation ********************* -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu" style="color:#54667a"></i></span> <span class="hide-menu"><img src="images/tpc.png" alt="Terumo" style="width:80%" /></span></h3> 
                    </div>
                    <div class="row"><br></div>
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                            <div><a href="myprofile.php"><img src="images/user-default.png" alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?><br><small><?php echo $_SESSION['usertype'];?></small></h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <!-- LINKS -->
                        <li><a href="index.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="addrequest.php" class="waves-effect active "><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-file-find"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="searchandupdate\srr-request.php" class="waves-effect "><span class="hide-menu">System Revision Requests</span></a> </li>
                                <li> <a href="connection.php" class="waves-effect "><span class="hide-menu">MC New User Registration</span></a> </li>
                                <li> <a href="connection.php" class="waves-effect "><span class="hide-menu">MC Change/Cancellation</span></a> </li>
                                <li> <a href="connection.php" class="waves-effect "><span class="hide-menu">MC Password Request</span></a> </li>
                                <li> <a href="connection.php" class="waves-effect "><span class="hide-menu">MC Request Record</span></a> </li>
                                
                            </ul>
                        </li>
                        <li><a href="table.html" class="waves-effect"><i class="mdi mdi-file-find"></i><span class="hide-menu">&emsp;Search and Update</span></a></li>
                        <li><a href="table.html" class="waves-effect"><i class="mdi mdi-table fa-fw"></i><span class="hide-menu">&emsp;Sample Table</span></a></li>
                        <li><a href="button.html" class="waves-effect"><i class="mdi mdi-album fa-fw"></i><span class="hide-menu">&emsp;Sample Button</span></a></li>
                        <li><a href="modal.html" class="waves-effect"><i class="mdi mdi-clipboard fa-fw"></i><span class="hide-menu">&emsp;Sample Modal</span></a></li>
                        <li><a href="notification.html" class="waves-effect"><i class="mdi mdi-bell fa-fw"></i><span class="hide-menu">&emsp;Sample Notification</span></a></li>
                        <li><a href="chart.html" class="waves-effect"><i class="mdi mdi-chart-pie fa-fw"></i><span class="hide-menu">&emsp;Sample Chart</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-face fa-fw"></i><span class="hide-menu">&emsp;Icons<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="fontawesome.html" class="waves-effect"><i class="fa-fw">F</i><span class="hide-menu">Font awesome</span></a> </li>
                                <li> <a href="themifyicon.html" class="waves-effect"><i class="fa-fw">T</i><span class="hide-menu">Themify Icons</span></a> </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-view-list fa-fw"></i><span class="hide-menu">&emsp;Multi Dropdown<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="javascript:void(0)"><i class="mdi mdi-check fa-fw"></i><span class="hide-menu">&emsp;Second Level Item</span></a> </li>
                                <li> <a href="javascript:void(0)"><i class="mdi mdi-close fa-fw"></i><span class="hide-menu">&emsp;Second Level Item</span></a> </li>
                                <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-help fa-fw"></i><span class="hide-menu">&emsp;Third Level </span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="javascript:void(0)"><i class="mdi mdi-heart fa-fw"></i><span class="hide-menu">&emsp;Third Level Item</span></a> </li>
                                        <li> <a href="javascript:void(0)"><i class="mdi mdi-crown fa-fw"></i><span class="hide-menu">&emsp;Third Level Item</span></a> </li>
                                        <li> <a href="javascript:void(0)"><i class="mdi mdi-diamond fa-fw"></i><span class="hide-menu">&emsp;Third Level Item</span></a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">&emsp;Log out</span></a></li>
                    </ul>
                </div>
            </div>
                        <!-- **************** End Left Side Navigation  ************** -->
                <!--\\\\\\\\\\\\\\\\\\\\\\ END NEEDED TO BE COPY ////////////////////-->
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Module Name</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="home.php">Home</a></li>
                                <li class="active">Module Name</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <!-- <h3 class="box-title">Blank Starter Page</h3>  -->
                                
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- /.container-fluid -->
                <footer class="footer text-center" style="color:#008d61;">Copyright &copy; Year System Name. All Rights Reserved</footer>
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
                        <button type="submit"  class="btn btn-success btn-outline">Yes, Log out</button>
                        <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">No, Cancel</button>
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
    </body>
</html>
