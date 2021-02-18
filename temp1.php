<!DOCTYPE html>
<?php
require_once('FOLDERS/SES/SESUSER.php'); // CONNECTION 
  require_once('referencesession.php'); // ALL THE DATA
    if ($_SESSION['usertype']=='admin'){
     header("Location:admin.php");
   }else if(empty($_SESSION['usertype'])){
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
        <title>Request Monitoring System</title>
        <link rel="icon" type="image/png" href="images/favicon.ico" />

        <link rel="stylesheet" type="text/css" href="icons/themify-icons/themify-icons.css"><!-- Themify Icons CSS -->
        <link rel="stylesheet" type="text/css" href="icons/font-awesome/css/font-awesome.min.css"><!-- Font-awesome Icons CSS -->
        
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Core CSS -->
        <link href="assets/sidebar-nav.min.css" rel="stylesheet"><!-- Menu CSS -->
        <link href="assets/css/style.css" rel="stylesheet"><!-- Custom CSS -->
        <link href="assets/css/tpc.css" id="theme" rel="stylesheet"><!-- color CSS -->
        <!-- ⭐⭐⭐ ADDITIONAL LINKS ⭐⭐⭐ -->
        <link href="css/formstyle.css" rel="stylesheet">
    </head>

    <body class="fix-header" style="font-family:Century Gothic"onload="<?php echo $_SESSION['status'];?>">
     <!-- ⭐⭐⭐ HEADER & SIDE BAR ⭐⭐⭐ -->
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
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="images/user-default.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['firstname']?></b><span class="caret"></span> </a>
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
                                                    <p class="text-muted" style="text-transform: uppercase;"><small><?php echo $_SESSION['usertype']?></small></p>
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
                            <div><a href="myprofile.php"><img src="images/user-default.png" alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['usertype']?></small</h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li><a href="index.php" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
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
                <!-- End Left Side Navigation -->
            <!-- ⭐⭐⭐ END HEADER & SIDE BAR ⭐⭐⭐ -->
            
            <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Dashboard</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="home.php">Home</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="white-box"> -->
                         
                                <!--⭐⭐⭐NEW DATA⭐⭐⭐-->
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="white-box" id="box0">
                                        <h4 class="box-title"><?php echo date("F d")?> Log Request</h3>
                                        <!-- ACTIVITY FOR EVERY DATA -->
                                        <div class="stats-row" style="text-align:center">
                                            <div class="stat-item text-info">
                                                <h6 class="text-info">QAD Request</h6> <b><?php 
                                                    $userid =$_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $act_date = date("m/d/Y");
                                                    $refyear = date("y");
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                    ?> tasks</b></div>
                                            <div class="stat-item text-danger">
                                                <h6 class="text-danger">Lasysy Request</h6> <b><?php 
                                                    $userid =$_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $act_date = date("m/d/Y");
                                                    $refyear = date("y");
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed= '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                ?> tasks</b></div>
                                            <div class="stat-item text-success">
                                                <h6 class="text-success">Non-Lasys Request</h6> <b><?php 
                                                    $userid =$_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $act_date = date("m/d/Y");
                                                    $refyear = date("y");
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                ?> tasks</b></div>
                                            <div class="stat-item text-warning">
                                                <h6 class="text-warning">PAD Request</h6> <b><?php
                                                    $userid =$_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $act_date = date("m/d/Y");
                                                    $refyear = date("y");
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                ?> tasks</b></div>
                                            <div class="stat-item text-primary">
                                                <h6 class="text-primary">MAster ContRol Request</h6> <b><?php 
                                                    $userid = $_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $act_date = date("m/d/Y");
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$act_date';
                                                    ");
                                                    $counter=0;
                                                    while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) ) {
                                                        $counter = $counter+$row['cntr'];
                                                    }echo $counter;
                                                ?> tasks</b></div>
                                        </div>
                                        <!-- ACTIVITY FOR EVERY DATA -->
                                        <div class="table-responsive" style="height:315px;overflow-y: scroll;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="text-transform:uppercase;">
                                                        <th style="font-weight:bold;">Activity</th>
                                                        <th style="width:25%;font-weight:bold;text-align:center;">Date Requested</th>
                                                        <th style="width:25%;font-weight:bold;text-align:center;">Date Received</th>
                                                        <th style="width:20%;font-weight:bold;text-align:center;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$dte'");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.qadlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC)){
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed = '$dte' ");  
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                             <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.lasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet1 = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                  
                                                                if ($rowfet1['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$dte' ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.nonlasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                  
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$dte'");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.padlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                  
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                    <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcnewuser WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
                                                                ([department-section] IS NULL OR [department-section]='') OR
                                                                (systemusername IS NULL OR systemusername='') OR
                                                                (requestor IS NULL OR requestor='') OR
                                                                (systemuser IS NULL OR systemuser='') OR
                                                                (usertype IS NULL OR usertype='') OR
                                                                (dateregistered IS NULL OR dateregistered='') OR
                                                                (remarks IS NULL OR remarks='')) ; ");
                                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                               if ($rowfet['cntr'] == '0'){
                                                                   echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                               }else{
                                                                   echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                               };
                                                           }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                (datereceived IS NULL OR datereceived='') OR
                                                                ([department-section] IS NULL OR [department-section]='') OR
                                                                (systemusername IS NULL OR systemusername='') OR
                                                                (requestor IS NULL OR requestor='') OR
                                                                (systemuser IS NULL OR systemuser='') OR
                                                                (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                (datereset IS NULL OR datereset=''))");
                                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                               if ($rowfet['cntr'] == '0'){
                                                                   echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                               }else{
                                                                   echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                               };
                                                           }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                    $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcregistrationchange WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                    (datereceived IS NULL OR datereceived='') OR
                                                                    ([department-section] IS NULL OR [department-section]='') OR
                                                                    (systemusername IS NULL OR systemusername='') OR
                                                                    (requestor IS NULL OR requestor='') OR
                                                                    (systemuser IS NULL OR systemuser='') OR
                                                                    (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                    (datechangecancelled IS NULL OR datechangecancelled=''))");
                                                                    while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                                ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = date("m/d/Y");
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                        $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcrequestrecord WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                        (datereceived IS NULL OR datereceived='') OR
                                                                        ([department-section] IS NULL OR [department-section]='') OR
                                                                        (information IS NULL OR information='') OR
                                                                        (implementationdate IS NULL OR implementationdate=''))");
                                                                        while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                    if ($rowfet['cntr'] == '0'){
                                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                    }else{
                                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                    };
                                                                }
                                                                    ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php
                                                        $userid = $_SESSION['userid'];
                                                        date_default_timezone_set('Singapore');
                                                        $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$act_date'union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$act_date';
                                                        ");
                                                        while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) ) {
                                                            $counter = $counter+$row['cntr'];
                                                        } if ($counter == 0){
                                                            echo '<br><h5 class="text-purple" style="text-align:center">No available activity</h5>';
                                                        }
                                                    ?>
                                        </div>
                                    </div>

                                    <?php
                                        $last = date("d");
                                        for($x = 1 ; $x<= $last; $x++){
                                        $m = date("m");
                                        $y = date("Y"); 
                                        if($x <= 9){
                                            $d = "0" . $x;
                                        }
                                        else{
                                            $d = $x;
                                        }
                                        $act_date = $m . "/" . $d . "/" . $y;
                                   
                                    ?>
                                    <div class="white-box" id="box<?php echo $x;?>" style="display:none;">
                                        <h4 class="box-title"><?php echo date("F") . " " . $d?> Activity Count</h3>
                                        <div class="stats-row" style="text-align:center">
                                            <div class="stat-item text-info">
                                                <h6 class="text-info">QAD Request</h6> <b><?php 
                                                        $userid =$_SESSION['userid'];
                                                        date_default_timezone_set('Singapore');
                                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$act_date'");
                                                        $row = sqlsrv_fetch_array($count);
                                                        echo $row['total'];
                                                        ?> tasks</b></div>
                                            <div class="stat-item text-danger">
                                            <h6 class="text-danger">Lasysy Request</h6> <b><?php 
                                                    $userid =$_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed= '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                ?> tasks</b></div>
                                            <div class="stat-item text-success">
                                                <h6 class="text-success">Non-Lasys Request</h6> <b><?php 
                                                        $userid =$_SESSION['userid'];
                                                        date_default_timezone_set('Singapore');
                                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$act_date'");
                                                        $row = sqlsrv_fetch_array($count);
                                                        echo $row['total'];
                                                    ?> tasks</b></div>
                                            <div class="stat-item text-warning">
                                                <h6 class="text-warning">PAD Request</h6> <b><?php
                                                        $userid =$_SESSION['userid'];
                                                        date_default_timezone_set('Singapore');
                                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$act_date'");
                                                        $row = sqlsrv_fetch_array($count);
                                                        echo $row['total'];
                                                    ?> tasks</b></div>
                                            <div class="stat-item text-primary">
                                            <h6 class="text-primary">MAster ContRol Request</h6> <b><?php 
                                                    $userid = $_SESSION['userid'];
                                                    date_default_timezone_set('Singapore');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$act_date';
                                                    ");
                                                    $counter=0;
                                                    while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) ) {
                                                        $counter = $counter+$row['cntr'];
                                                    }echo $counter;
                                                ?> tasks</b></div>
                                        </div>
                                        <div class="table-responsive" style="height:315px;overflow-y: scroll;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="text-transform:uppercase;">
                                                        <th style="font-weight:bold;">Activity</th>
                                                        <th style="width:25%;font-weight:bold;text-align:center">Date Requested</th>
                                                        <th style="width:25%;font-weight:bold;text-align:center">Date Received</th>
                                                        <th style="width:20%;font-weight:bold;text-align:center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                                $userid = $_SESSION['userid'];
                                                                $dte = $act_date;
                                                                $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$dte'");
                                                                while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                                    $PID = $row['ID'];
                                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['requestnumber'];?></td>
                                                        <td style="text-align:center"> <?php echo $row['daterequested'];?></td>
                                                        <td style="text-align:center"> 
                                                        <?php 
                                                                 $totalrequest = 0;
                                                                 $foryear = date('y');
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                    $totalrequest =  $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                       $totalrequest = $totalrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                             $totalrequest = $totalrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $totalrequest = $totalrequest + $rowfet['cntr'];
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                             $totalrequest = $totalrequest + $rowfet['cntr'];  
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $totalrequest = $totalrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $totalrequest = $totalrequest + $rowfet['cntr'];
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where refyear=$foryear");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                                       $totalrequest = $totalrequest + $rowfet['cntr'];
                                                                       echo $totalrequest;
                                                                      
                                                                 $completedrequest = 0;
                                                                 $foryear = date('y');
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where refyear=$foryear
                                                                 and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                    $completedrequest =  $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where refyear=$foryear
                                                                 and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                       $completedrequest = $completedrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$foryear and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                             $completedrequest = $completedrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where refyear=$foryear and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $completedrequest = $completedrequest + $rowfet['cntr'];
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$foryear and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
                                                                 ([department-section] IS NULL OR [department-section]='') OR
                                                                 (systemusername IS NULL OR systemusername='') OR
                                                                 (requestor IS NULL OR requestor='') OR
                                                                 (systemuser IS NULL OR systemuser='') OR
                                                                 (usertype IS NULL OR usertype='') OR
                                                                 (dateregistered IS NULL OR dateregistered='') OR
                                                                 (remarks IS NULL OR remarks=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                             $completedrequest = $completedrequest + $rowfet['cntr'];  
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$foryear and ((daterequested IS NULL OR daterequested='') OR
                                                                 (datereceived IS NULL OR datereceived='') OR
                                                                 ([department-section] IS NULL OR [department-section]='') OR
                                                                 (systemusername IS NULL OR systemusername='') OR
                                                                 (requestor IS NULL OR requestor='') OR
                                                                 (systemuser IS NULL OR systemuser='') OR
                                                                 (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                 (datereset IS NULL OR datereset=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $completedrequest = $completedrequest + $rowfet['cntr']; 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where refyear=$foryear and ((daterequested IS NULL OR daterequested='') OR
                                                                 (datereceived IS NULL OR datereceived='') OR
                                                                 ([department-section] IS NULL OR [department-section]='') OR
                                                                 (systemusername IS NULL OR systemusername='') OR
                                                                 (requestor IS NULL OR requestor='') OR
                                                                 (systemuser IS NULL OR systemuser='') OR
                                                                 (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                 (datechangecancelled IS NULL OR datechangecancelled=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                            $completedrequest = $completedrequest + $rowfet['cntr'];
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where refyear=$foryear and ((daterequested IS NULL OR daterequested='') OR
                                                                 (datereceived IS NULL OR datereceived='') OR
                                                                 ([department-section] IS NULL OR [department-section]='') OR
                                                                 (information IS NULL OR information='') OR
                                                                 (implementationdate IS NULL OR implementationdate=''))");
                                                                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                                                       $completedrequest = $completedrequest + $rowfet['cntr'];
                                                                       echo $completedrequest =$totalrequest - $completedrequest ;
                                                            ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                 $display_details1 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.qadlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                                 (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC)){
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed = '$dte' ");  
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                             <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.lasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet1 = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                  
                                                                if ($rowfet1['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$dte' ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.nonlasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                  
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$dte'");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                 $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.padlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                                 while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                    <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcnewuser WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
                                                                ([department-section] IS NULL OR [department-section]='') OR
                                                                (systemusername IS NULL OR systemusername='') OR
                                                                (requestor IS NULL OR requestor='') OR
                                                                (systemuser IS NULL OR systemuser='') OR
                                                                (usertype IS NULL OR usertype='') OR
                                                                (dateregistered IS NULL OR dateregistered='') OR
                                                                (remarks IS NULL OR remarks='')) ; ");
                                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                               if ($rowfet['cntr'] == '0'){
                                                                   echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                               }else{
                                                                   echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                               };
                                                           }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                        <?php 
                                                                $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                (datereceived IS NULL OR datereceived='') OR
                                                                ([department-section] IS NULL OR [department-section]='') OR
                                                                (systemusername IS NULL OR systemusername='') OR
                                                                (requestor IS NULL OR requestor='') OR
                                                                (systemuser IS NULL OR systemuser='') OR
                                                                (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                (datereset IS NULL OR datereset=''))");
                                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                               if ($rowfet['cntr'] == '0'){
                                                                   echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                               }else{
                                                                   echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                               };
                                                           }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                    $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcregistrationchange WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                    (datereceived IS NULL OR datereceived='') OR
                                                                    ([department-section] IS NULL OR [department-section]='') OR
                                                                    (systemusername IS NULL OR systemusername='') OR
                                                                    (requestor IS NULL OR requestor='') OR
                                                                    (systemuser IS NULL OR systemuser='') OR
                                                                    (reasonforapplication IS NULL OR reasonforapplication='') OR
                                                                    (datechangecancelled IS NULL OR datechangecancelled=''))");
                                                                    while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                if ($rowfet['cntr'] == '0'){
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else{
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                                ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                    <?php
                                                         $userid = $_SESSION['userid'];
                                                         $dte = $act_date;
                                                         $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$dte' 
                                                         ");
                                                         while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                                            $PID = $row['ID'];
                                                    ?>
                                                    <!-- Same -->
                                                    <tr>
                                                        <td><?php echo $row['requestnumber']?></td>
                                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                                        <td style="text-align:center">
                                                            <?php 
                                                                        $display_details12 = sqlsrv_query($conn, "SELECT count(*) as cntr FROM requestmonitoring.dbo.mcrequestrecord WHERE ID=$PID and dateprocessed = '$dte' and ((daterequested IS NULL OR daterequested='') OR
                                                                        (datereceived IS NULL OR datereceived='') OR
                                                                        ([department-section] IS NULL OR [department-section]='') OR
                                                                        (information IS NULL OR information='') OR
                                                                        (implementationdate IS NULL OR implementationdate=''))");
                                                                        while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC)){
                                                                    if ($rowfet['cntr'] == '0'){
                                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                    }else{
                                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                    };
                                                                }
                                                                    ?>
                                                        </td>
                                                    </tr>
                                                        <!--  -->         
                                                    <?php } ?>
                                                </tbody>
                                            </table><?php
                                                       
                                                        $userid = $_SESSION['userid'];
                                                        date_default_timezone_set('Singapore');
                                                        $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where userid='$userid' and dateprocessed = '$act_date'union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.qadlog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.lasyslog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.nonlasyslog where userid='$userid' and dateprocessed = '$act_date' union all
                                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.padlog where userid='$userid' and dateprocessed = '$act_date';
                                                        ");
                                                        while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) ) {
                                                            $counter = $counter+$row['cntr'];
                                                        } if ($counter == 0){
                                                            echo '<br><h5 class="text-purple" style="text-align:center">No available activity</h5>';
                                                        }
                                                    ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <!-- row -->
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                   <div class="calendar-widget m-b-30"width="100%">
                                    <div class="cal-left">
                                        <h1 id="day"><?php echo date("d")?></h1>
                                        <h4 id="dday"><?php echo date("l")?></h4> <span></span>
                                        <h5><?php echo date("F Y")?></h5>
                                    </div>
                                    <div class="cal-right bg-extralight">
                                        <table class="cal-table" >
                                            <tbody style="padding-left:300px; padding-right:30px">
                                                <tr>
                                                    <td colspan="4">
                                                        <h2 style="font-size:40px;text-align:left"><?php echo date("F")?></h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>SUN</td>
                                                    <td>MON</td>
                                                    <td>TUE</td>
                                                    <td>WED</td>
                                                    <td>THU</td>
                                                    <td>FRI</td>
                                                    <td>SAT</td>
                                                </tr>
                                                    <?php
                                                        $curMonth = date('F');
                                                        $curYear  = date('Y');
                                                        $timestamp    = strtotime($curMonth.' '.$curYear);
                                                        $first_second = date('l', $timestamp);
                                                        $last_second  = date('t', $timestamp);
                                                        $num = 1;
                                                        $row2 = 0;
                                                        $week = 0;
                                                        for ($row = 0; $row < 6; $row ++) {
                                                            $week = 7;
                                                            echo "<tr>";
                                                            for ($col = 1; $col <= $week; $col ++) {
                                                                if ($num <= $last_second){
                                                                    if ($row2 == 0){
                                                                        if ($first_second == "Sunday"){
                                                                            if ($num == date("j")){
                                                                                echo "<td id='get$num' class='cal-active'><button class='text-purple' style='background-color:transparent;border:none;font-weight:bold' onclick='getValue$num();'>", $num, "</button></td>";
                                                                                $num++;
                                                                            }else{
                                                                                echo "<td>", $num, "</td>";
                                                                                $num++;
                                                                            }
                                                                        }else if ($first_second == "Monday"){
                                                                            echo "<td>", "", "</td>";
                                                                            $row2 = 1;
                                                                        }else if ($first_second == "Tuesday"){
                                                                            echo "<td colspan='2'>", "", "</td>";
                                                                            $week = $week - 1;
                                                                            $row2 = 1;
                                                                        }else if ($first_second == "Wednesday"){
                                                                            echo "<td colspan='3'>", "", "</td>";
                                                                            $week = $week - 2;
                                                                            $row2 = 1;
                                                                        }else if ($first_second == "Thursday"){
                                                                            echo "<td colspan='4'>", "", "</td>";
                                                                            $week = $week - 3;
                                                                            $row2 = 1;
                                                                        }else if ($first_second == "Friday"){
                                                                            echo "<td colspan='5'>", "", "</td>";
                                                                            $week = $week - 4;
                                                                            $row2 = 1;
                                                                        }else if ($first_second == "Saturday"){
                                                                            echo "<td colspan='6'>", "", "</td>";
                                                                            $week = $week - 5;
                                                                            $row2 = 1;
                                                                        } 
                                                                    }else{
                                                                        if ($num == date("j")){
                                                                            echo "<td id='get$num' class='cal-active'><button class='text-purple' style='background-color:transparent;border:none;font-weight:bold' onclick='getValue$num();'>", $num, "</button></td>";
                                                                            $num++;
                                                                        }else{
                                                                            echo "<td id='get$num'><button class='btn-default' style='background-color:transparent;border:none' onclick='getValue$num();'>", $num, "</button></td>";
                                                                            $num++;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            echo "</tr>";
                                                        } 
                                                    ?>
                                                <tr>
                                                    <td colspan="7"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    <script>
                        //Calendar Select Date
                        $last = date("d");
                        <?php for($i = 1; $i <= $last; $i++){ ?>
                            function getValue<?php echo $i;?>(){
                                document.getElementById("box0").style.display = "none";
                                <?php 
                                    for($a = 1; $a<=$last; $a++){
                                ?>
                                document.getElementById("box<?php echo $a;?>").style.display = "none";
                                document.getElementById("get<?php echo $a;?>").className = "";
                                <?php 
                                    if($i == $a){ 
                                        $ddate = date("m") . "/" . $a . "/" . date("Y");
                                        $l = date("l",strtotime($ddate));?>
                                        document.getElementById("box<?php echo $a;?>").style.display = "";
                                        document.getElementById("day").innerHTML = "<?php echo $a;?>";
                                        document.getElementById("dday").innerHTML = "<?php echo $l;?>";
                                        document.getElementById("get<?php echo $a;?>").className = "cal-active";
                                    <?php }
                                } ?>
                            }
                        <?php } ?>
                    </script>
                  
                    <!-- /.row -->
                   
                            <!--⭐⭐⭐NEW DATA⭐⭐⭐-->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center" style="color:#008d61;">Copyright &copy; <?php echo date("Y"); ?> Request Monitoring System. All Rights Reserved</footer>
                <!-- <footer class="site-footer">
                    <div class="footer text-center">
                        <p>&copy; Copyrights <strong>TPC</strong>. All Rights Reserved</p>
                          <div class="credits">
                            Created with TPC by <a href="">ICT Application Management Team</a>
                            <a href="index.html#" class="go-top"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                </footer> -->
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
        <!-- <script src="assets/Chart.js/chartjs.init.js"></script>
        <script src="assets/Chart.js/Chart.min.js"></script> -->

    </body>
</html>

<!-- Data for completion -->
<!-- SELECT * FROM requestmonitoring.dbo.qadlog WHERE (ID='2') AND
((daterequested IS NULL OR daterequested='') OR
(datereceived IS NULL OR datereceived='') OR 
([department-section] IS NULL OR [department-section]='') OR
(natureofrequest IS NULL OR natureofrequest='') OR
(requestor IS NULL OR requestor='') OR
(dateapproved IS NULL OR dateapproved='') OR
(datedone IS NULL OR datedone='') OR
(accomplishedby IS NULL OR accomplishedby='') OR
(remarks IS NULL OR remarks='')) ; -->
