<!DOCTYPE html>
<?php
    // Name of the module : admin.php
    // Module creation date : 01/29/21
    // Author of the Module : Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : The Dashboard for Admin Usertype
    // Done aligning in module to PHQD020
    require_once('FOLDERS/SES/SESADMIN.php'); // CONNECTION 
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
                                            <div class="u-img"><img src="images/<?php echo $_SESSION['Profile_pic']?>" alt="user" /></div>
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
                            <!-- to be removed  -->
                            <li role="separator" class="divider"></li>
                            <li><a href="adminaccountsetting.php"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout"></i>&emsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End Dropdown User -->
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
                        <div><a href="adminmyprofile.php"><img src="images/<?php echo $_SESSION['Profile_pic']?>" alt="user-img" class="img-circle"></a></div>
                        <h5 style="font-family:Century Gothic"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['User_type']?></small</h5>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li><a href="admin.php" class="waves-effect active"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                    <li><a href="admin1.php" class="waves-effect"><i class="mdi mdi-clipboard-outline fa-fw"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-folder-multiple-outline"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="searchandupdate/adminSRR_Requests.php" class="waves-effect"><span class="hide-menu">System Revision Request</span></a> </li>
                            <li> <a href="searchandupdate/adminMCNewUser_Requests.php" class="waves-effect"><span class="hide-menu">Mc New User Request</span></a> </li>
                            <li> <a href="searchandupdate/adminMCChange_Requests.php" class="waves-effect"><span class="hide-menu">Mc Registration Change & Cancellation</span></a> </li>
                            <li> <a href="searchandupdate/adminMCPassword_Requests.php" class="waves-effect "><span class="hide-menu">Mc Password Reset</span></a> </li>
                            <li> <a href="searchandupdate/adminMCRequest_Requests.php" class="waves-effect "><span class="hide-menu">Mc Request Record</span></a> </li>
                        </ul>
                    </li>
                    <li><a href="adminactivitylogs.php" class="waves-effect"><i class="mdi mdi-account-check"></i><span class="hide-menu">&emsp;Activity Logs</span></a></li>
                    <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">&emsp;Log out</span></a></li>
                </ul>
            </div>
        </div>
            <!-- End Left Side Navigation -->
        <!-- ⭐⭐⭐  End Header and Side Bar ⭐⭐⭐ -->
        
        <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <!-- <div class="white-box"> -->
                     
                            <!--⭐⭐⭐ Current Data-->
                            <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- For counter -->
                                <div class="white-box">
                                    <div class="row row-in">
                                        <!-- For Qad Daily Count -->
                                        <div class="col-lg-3 col-sm-6 row-in-br">
                                            <ul class="col-in">
                                                <?php
                                                    date_default_timezone_set('Singapore');
                                                    $date_today =date('m/d/Y');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.qadlog where dateprocessed='$date_today'");
                                                    $row = sqlsrv_fetch_array($count);
                                                ?>  
                                                <li>
                                                    <span class="circle circle-md " style="background-color:#008D61"><i class="ti-clipboard"></i></span>
                                                </li>
                                                <li class="col-last">
                                                    <h3 class="counter text-right m-t-15"><?php echo $row['cntr'];?></h3>
                                                </li>
                                                <li class="col-middle">
                                                    <h4>QAD REQUEST</h4>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $row['cntr'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['cntr'];?>%"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- For Lasys Daily Count -->
                                        <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                            <ul class="col-in">
                                                <?php
                                                    date_default_timezone_set('Singapore');
                                                    $date_today =date('m/d/Y');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.lasyslog where dateprocessed='$date_today'");
                                                    $row = sqlsrv_fetch_array($count);
                                                ?>  
                                                <li>
                                                    <span class="circle circle-md " style="background-color:#008D61"><i class="fa fa-newspaper-o"></i></span>
                                                </li>
                                                <li class="col-last">
                                                    <h3 class="counter text-right m-t-15"><?php echo $row['cntr'];?></h3>
                                                </li>
                                                <li class="col-middle">
                                                    <h4>LASYS REQUEST</h4>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $row['cntr'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['cntr'];?>%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- For Non-Lasys Daily Count -->
                                        <div class="col-lg-3 col-sm-6 row-in-br">
                                            <ul class="col-in">
                                                <?php
                                                    date_default_timezone_set('Singapore');
                                                    $combi=0;
                                                    $date_today =date('m/d/Y');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.nonlasyslog where dateprocessed='$date_today'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    $combi=$row['cntr'];
                                                    $count1 = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.padlog where dateprocessed='$date_today'");
                                                    $row1 = sqlsrv_fetch_array($count1);
                                                    $combi=$combi + $row1['cntr']
                                                ?>  
                                                <li>
                                                    <span class="circle circle-md" style="background-color:#008D61"><i class=" fa fa-ticket"></i></span>
                                                </li>
                                                <li class="col-last">
                                                    <h3 class="counter text-right m-t-15"><?php echo $combi;?></h3>
                                                </li>
                                                <li class="col-middle">
                                                    <h4>NON-LASYS </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $combi;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $combi;?>%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- For Pad Daily Count -->
                                        <div class="col-lg-3 col-sm-6  b-0">
                                            <ul class="col-in">
                                                <?php
                                                    date_default_timezone_set('Singapore');
                                                    $date_today =date('m/d/Y');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed='$date_today' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed='$date_today' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed='$date_today' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed='$date_today';
                                                    ");
                                                    $counter=0;
                                                    while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) )
                                                    {
                                                        $counter = $counter+$row['cntr'];
                                                    }
                                                ?>
                                                <li>
                                                    <span class="circle circle-md " style="background-color:#008D61"><i class="fa fa-desktop"></i></span>
                                                </li>
                                                <li class="col-last">
                                                    <h3 class="counter text-right m-t-15"><?php echo $counter;?></h3>
                                                </li>
                                                <li class="col-middle">
                                                    <h4>Master Control</h4>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $counter;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $counter;?>%">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end counter -->
                            <div class="col-lg-9">
                                <div class="white-box col-sm-12 col-xs-12">
                                    <?php
                                        // Montly Requests
                                        $month_thisyear = date("m");
                                        $this_year =date("Y");
                                        if($month_thisyear=='01'||$month_thisyear=='02'||$month_thisyear=='03'||$month_thisyear=='04'||$month_thisyear=='05'||$month_thisyear=='06')
                                        {
                                            $previous_year = date("Y", strtotime("-1 year"))."-";
                                        }else
                                        {
                                            $previous_year=" ";
                                        }
                                    ?>
                                    <h3 class="box-title">Monthly Requests for year <?php echo $previous_year."".$this_year ?></h3>
                                        <ul class="list-inline text-right">
                                            <li>
                                                    <h5><i class="fa fa-circle m-r-5"style="color:#008D61"></i>System Revision Request</h5>
                                                    <h5><i class="fa fa-circle m-r-5" style="color:#dcdcdc"></i>Master Control</h5>
                                            </li>
                                        </ul>
                                <div>
                                <canvas id="chart2" height="100"></canvas>
                            </div>
                        </div>
                     
                        <div class="white-box col-lg-4 col-md-12 col-sm-12 col-xs-12 row-in-br  b-r-none" >
                            <!--⭐⭐⭐WEekly Requests⭐⭐⭐-->
                            <?php
                            $tempdate=date('l');
                            if($tempdate=='Sunday')
                            {
                                $forfirst = 0; $forlast = 6; $sund= 0; $mond= +1; $tues= +2; $wedn= +3; $thur= +4;$frid= +5;$satu= +6;
                            }else if($tempdate=='Monday')
                            {
                                $forfirst = 1; $forlast = 5; $sund= -1; $mond= 0; $tues= +1; $wedn= +2; $thur= +3; $frid= +4; $satu= +5;
                            }else if($tempdate=='Tuesday')
                            {
                                $forfirst = 2; $forlast = 4; $sund= -2; $mond= -1; $tues= 0; $wedn= 1; $thur= 2; $frid= 3; $satu= 4;
                            }else if($tempdate=='Wednesday')
                            {
                                $forfirst = 3; $forlast = 3; $sund= -3; $mond= -2; $tues= -1; $wedn= 0; $thur= 1; $frid= 2; $satu= 3;
                            }else if($tempdate=='Thursday')
                            {
                                $forfirst = 4; $forlast = 2; $sund= -4; $mond= -3; $tues= -2; $wedn= -1; $thur= 0; $frid= 1; $satu= 2;
                            }else if($tempdate=='Friday')
                            {
                                $forfirst = 5; $forlast = 1; $sund= -6; $mond= -4; $tues= -3; $wedn= -2; $thur= -1; $frid= 0; $satu= 1;
                            }else if($tempdate=='Saturday')
                            {
                                $forfirst = 6; $forlast = 0; $sund= -6; $mond= -5; $tues= -4; $wedn= -3; $thur= -2; $frid= -1; $satu= 0;
                            }
                            date_default_timezone_set('Singapore');
                            $act_date = date("m/d/Y");
                            $act_date = date("m/d/Y");
                            $first_weekday = date("M/d", strtotime("-$forfirst days"));
                            $last_weekday = date("M/d/Y", strtotime("+$forlast days"));
                            $first_weekday1 = date("m/d/Y", strtotime("-$forfirst days"));
                            $last_weekday1 = date("m/d/Y", strtotime("+$forlast days"));
                            $monday = date("m/d/Y", strtotime("$mond days"));
                            $tuesday = date("m/d/Y", strtotime("$tues days"));
                            $wednesday = date("m/d/Y", strtotime("$wedn days"));
                            $thursday = date("m/d/Y", strtotime("$thur days"));
                            $friday = date("m/d/Y", strtotime("$frid days"));
                            $dates = array($monday, $tuesday, $wednesday, $thursday, $friday); 
                            $storage = array();
                            for ($x = 0; $x <5; $x++)
                            {//Counter
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.qadlog where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] = $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.lasyslog where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x]=  $storage[$x] + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.nonlasyslog where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x] + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.padlog where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x] + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcnewuser where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x]+ $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcrequestrecord where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x] + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcpasswordrequest where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x] + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcregistrationchange where (dateprocessed ='$dates[$x]');");
                                $rows = sqlsrv_fetch_array($counters);
                                $storage[$x] =  $storage[$x] + $rows['total'];                            
                            }
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.qadlog where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.lasyslog where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.nonlasyslog where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.padlog where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcnewuser where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcrequestrecord where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcpasswordrequest where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                $counters = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcregistrationchange where (dateprocessed between '$first_weekday1' and '$last_weekday1');");
                                $rows = sqlsrv_fetch_array($counters);
                                $totality = $totality + $rows['total'];
                                    
                            ?>
                            <h3 class="box-title m-b-0" style="text-align:center">WEEKLY requests FROM    </h3>
                            <h3 class="box-title m-b-0" style="text-align:center"><?php echo $first_weekday."  -  ".$last_weekday?> </h3>
                            <h1 class="m-b-30 m-t-0 font-medium" style="text-align:center"><?php echo $totality?></h1>
                            <!-- <div class="m-t-20 m-b-20  p-t-10"></div> -->
                            <ul class="dp-table m-t-30" style="margin-bottom:-13px;">
                                    <li>
                                    <div class="progress progress-md progress-vertical-bottom m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="height:<?php echo $storage[0]?>%;"> <span class="sr-only">88% Complete</span></div>
                                    </div>
                                    <br/> <b>M</b> <b><?php echo "</br>".$storage[0]?></b></li>
                                <li>
                                    <div class="progress progress-md progress-vertical-bottom m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="height:<?php echo $storage[1]?>%;"> <span class="sr-only">88% Complete</span></div>
                                    </div>
                                    <br/> <b>T</b> <b><?php echo "</br>".$storage[1]?></b></li>
                                <li>
                                    <div class="progress progress-md progress-vertical-bottom m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="height:<?php echo $storage[2]?>%;"> <span class="sr-only">88% Complete</span></div>
                                    </div>
                                    <br/> <b>W</b> <b><?php echo "</br>".$storage[2]?></b> </li>
                                <li>
                                    <div class="progress progress-md progress-vertical-bottom m-0">
                                    
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="height:<?php echo $storage[3]?>%;"><span class="sr-only">88% Complete</span></div>
                                    </div>
                                    <br/> <b>Th</b> <b><?php echo "</br>".$storage[3]?></b> </li>
                                <li>
                                    <div class="progress progress-md progress-vertical-bottom m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="height:<?php echo $storage[4]?>%;"> <span class="sr-only">88% Complete</span></div>
                                    </div>
                                    <br/> <b>F</b> <b><?php echo "</br>".$storage[4]?></b> </li>
                            </ul>
                        </div>
                        <!--⭐⭐⭐Monthly Accomplished Request⭐⭐⭐-->
                        <div style="padding-bottom:-100px; " class="white-box col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title"> MONTHLY ACCOMPLISHED REQUEST </h3>
                            <div class=" text-right" style="margin-bottom:30px;">
                                <h5><i class="fa fa-circle m-r-5"style="color:#008D61"></i>Completed Request</h5>
                                <h5><i class="fa fa-circle m-r-5" style="color:#C94C4C"></i>Pending Request</h5>
                            </div>
                            <div class="row">
                            <div style="padding-top:30px;"  class="col-lg-6 col-sm-6 col-xs-6 row-in-br  b-r-none">
                                <canvas  id="chart4" height="150"> </canvas>
                                <h4 style=" padding-top:30px;" > SYSTEM REVISION REQUEST </h4>
                            </div>
                            <div style="padding-top:30px;" class="col-lg-6 col-sm-6 col-xs-6">
                                <canvas id="chart41" height="150"> </canvas>
                                <h4 style=" padding-top:30px;"   > MASTER CONTROL REQUEST </h4>
                            </div>
                        </div> <!-- row -->
                    </div>
                        <!--  -->
                </div>
                <!-- col-9 -->
                <div class="col-lg-3 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <div>
                            <h3 class="box-title"style="text-align:center">Completed Actions & Progress For Year <?php echo date('Y')?></h3>
                            <div id="morris-donut-chart"></div>     
                        </div>
                        <h3 class="box-title">Requests For Year <?php echo date('Y')?></h3>
                            <ul class="country-state  p-t-20">
                                <li><!--QAD Request for year 2021-->
                                    <?php
                                        date_default_timezone_set('Singapore');
                                        $year_today =date('y');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.qadlog where refyear=$year_today");
                                        $row = sqlsrv_fetch_array($count);
                                        $total_qad = $row['cntr'];
                                        $for_year = date('y');
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where refyear=$for_year
                                        and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR(dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                        $completed_request =  $rowfet['cntr']; 
                                        $qad_completed = $total_qad-$completed_request;
                                        $qad_percentage = floor(($qad_completed/$total_qad)*100);
                                    ?>  
                                    <h2><?php echo $row['cntr'];?></h2> <small>QAD Requests</small>
                                    <div class="pull-right" style="font-size:10px;"><?php echo $qad_percentage;?>% completed  <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li><!--Lasys Request for year 2021-->
                                    <?php
                                        $year_today =date('y');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.lasyslog where refyear=$year_today");
                                        $row = sqlsrv_fetch_array($count);
                                        $totallasys = $row['cntr'];
                                        $for_year = date('y');
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where refyear=$for_year
                                        and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR(dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                        $completed_request =  $rowfet['cntr']; 
                                        $lasyscompleted = $totallasys-$completed_request;
                                        $lasyspercentage = floor(($lasyscompleted/$totallasys)*100);
                                    ?>  
                                    <h2><?php echo $row['cntr'];?></h2> <small>Lasys RequesT</small>
                                    <div class="pull-right" style="font-size:10px;"><?php echo $lasyspercentage;?>% completed  <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li><!--Non-Lasys Request for year 2021-->
                                    <?php
                                        $year_today =date('y');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$year_today");
                                        $row = sqlsrv_fetch_array($count);
                                        $totalnonlasys = $row['cntr'];
                                        $for_year = date('y');
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$for_year
                                        and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR(dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                        $completed_request =  $rowfet['cntr']; 
                                        $nonlasyscompleted = $totalnonlasys-$completed_request;
                                        $nonlasyspercentage = floor(($nonlasyscompleted/$totalnonlasys)*100);
                                    ?>
                                    <h2><?php echo $row['cntr'];?></h2> <small>NOn- lasys request</small>
                                    <div class="pull-right" style="font-size:10px;"><?php echo $nonlasyspercentage;?>% completed  <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li><!--Pad Request for year 2021-->
                                    <?php   
                                        $year_today =date('y');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) AS cntr FROM requestmonitoring.dbo.padlog where refyear=$year_today");
                                        $row = sqlsrv_fetch_array($count);
                                        $totalpad = $row['cntr'];
                                        $for_year = date('y');
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where refyear=$for_year
                                        and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR(dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                        $completed_request =  $rowfet['cntr']; 
                                        $padcompleted = $totalpad-$completed_request;
                                        $padpercentage = floor(($padcompleted/$totalpad)*100);
                                    ?>
                                    <h2><?php echo $row['cntr'];?></h2> <small>PAD Request</small>
                                    <div class="pull-right" style="font-size:10px;"><?php echo $padpercentage;?>% completed  <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li><!--Master Control Request for year 2021-->
                                    <?php
                                        $year_today =date('y');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$year_today union all
                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$year_today union all
                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where refyear=$year_today union all
                                        SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where refyear=$year_today;
                                        ");
                                        $counter=0;
                                        while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) )
                                        {
                                            $counter = $counter+$row['cntr'];
                                        } $totalmc= $counter;
                                        $for_year = date('y');
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR
                                        (systemuser IS NULL OR systemuser='') OR (usertype IS NULL OR usertype='') OR (dateregistered IS NULL OR dateregistered='') OR (remarks IS NULL OR remarks=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                $completed_request = $rowfet['cntr'];  
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR (reasonforapplication IS NULL OR reasonforapplication='') OR (datereset IS NULL OR datereset=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                $completed_request = $completed_request + $rowfet['cntr']; 
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
                                        (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
                                        (reasonforapplication IS NULL OR reasonforapplication='') OR (datechangecancelled IS NULL OR datechangecancelled=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                $completed_request = $completed_request + $rowfet['cntr'];
                                        $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
                                        (information IS NULL OR information='') OR (implementationdate IS NULL OR implementationdate=''))");
                                        $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                                                $completed_request = $completed_request + $rowfet['cntr'];
                                                $mccompleted = $totalmc-$completed_request;
                                                $mcpercentage = floor(($mccompleted/$totalmc)*100);
                                    ?>
                                    <h2><?php echo $counter?></h2> <small>Master Control Request</small>
                                    <div class="pull-right" style="font-size:9px;"><?php echo $mcpercentage;?>%  completed  <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="white-box" id="box0">
                        <h4 class="box-title"><?php echo date("F d")?> Log Request</h3>
                        <!-- ACTIVITY FOR EVERY DATA -->
                        <div class="stats-row" style="text-align:center">
                            <div class="stat-item text-info">
                                <h6 class="text-info">QAD Request</h6> <b><?php 
                                    date_default_timezone_set('Singapore');
                                    $act_date = date("m/d/Y");
                                    $ref_year = date("y");
                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.qadlog where dateprocessed = '$act_date'");
                                    $row = sqlsrv_fetch_array($count);
                                    echo $row['total'];
                                    ?> tasks</b>
                            </div>
                            <div class="stat-item text-danger">
                                <h6 class="text-danger">Lasysy Request</h6> <b><?php 
                                    date_default_timezone_set('Singapore');
                                    $act_date = date("m/d/Y");
                                    $ref_year = date("y");
                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.lasyslog where dateprocessed= '$act_date'");
                                    $row = sqlsrv_fetch_array($count);
                                    echo $row['total'];
                                ?> tasks</b>
                            </div>
                            <div class="stat-item text-success">
                                <h6 class="text-success">Non-Lasys Request</h6> <b><?php 
                                    date_default_timezone_set('Singapore');
                                    $act_date = date("m/d/Y");
                                    $ref_year = date("y");
                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.nonlasyslog where dateprocessed = '$act_date'");
                                    $row = sqlsrv_fetch_array($count);
                                    echo $row['total'];
                                ?> tasks</b>
                            </div>
                            <div class="stat-item text-warning">
                                <h6 class="text-warning">PAD Request</h6> <b><?php
                                    date_default_timezone_set('Singapore');
                                    $act_date = date("m/d/Y");
                                    $ref_year = date("y");
                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.padlog where dateprocessed = '$act_date'");
                                    $row = sqlsrv_fetch_array($count);
                                    echo $row['total'];
                                ?> tasks</b>
                            </div>
                            <div class="stat-item text-primary">
                                <h6 class="text-primary">MAster ContRol Request</h6> <b><?php 
                                    date_default_timezone_set('Singapore');
                                    $act_date = date("m/d/Y");
                                    $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$act_date' union all
                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$act_date' union all
                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed = '$act_date' union all
                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$act_date';
                                    ");
                                    $counter=0;
                                    while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) ) 
                                    {
                                        $counter = $counter+$row['cntr'];
                                    }echo $counter;
                                ?> tasks</b>
                            </div>
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
                                    <!--Displays Qad Request-->
                                    <?php
                                        $dte = date("m/d/Y");
                                        $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.qadlog where dateprocessed = '$dte'");
                                        while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                        {
                                        $PID = $row['ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['requestnumber']?></td>
                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                        <td style="text-align:center">
                                            <?php 
                                                $display_details1 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.qadlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                while($rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC))
                                                {
                                                    if ($rowfet['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>      
                                    <?php } ?>
                                        <!--Displays Lasys Request -->   
                                    <?php
                                            $dte = date("m/d/Y");
                                            $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.lasyslog where dateprocessed = '$dte' ");  
                                            while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                            {
                                            $PID = $row['ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['requestnumber']?></td>
                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                        <td style="text-align:center">
                                                <?php 
                                                    $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.lasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                    while($rowfet1 = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                    {
                                                    if ($rowfet1['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                    };
                                                    }
                                            ?>
                                        </td>
                                    </tr>     
                                    <?php } ?>
                                        <!--Displays Non-Lasys Request --> 
                                    <?php
                                            $dte = date("m/d/Y");
                                            $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.nonlasyslog where dateprocessed = '$dte' ");
                                            while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                            {
                                            $PID = $row['ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['requestnumber']?></td>
                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                        <td style="text-align:center">
                                        <?php 
                                            $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.nonlasyslog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                            {
                                                if ($rowfet['cntr'] == '0')
                                                {
                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                }else
                                                {
                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                };
                                            }   
                                        ?>
                                        </td>
                                    </tr>     
                                    <?php } ?>
                                    <!--Displays Pad Request --> 
                                    <?php
                                            $dte = date("m/d/Y");
                                            $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.padlog where dateprocessed = '$dte'");
                                            while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                            {
                                            $PID = $row['ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['requestnumber']?></td>
                                        <td style="text-align:center"><?php echo $row['daterequested']?></td>
                                        <td style="text-align:center"><?php echo $row['datereceived']?></td>
                                        <td style="text-align:center">
                                        <?php 
                                            $display_details12 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.padlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                            {
                                                if ($rowfet['cntr'] == '0')
                                                {
                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                }else
                                                {
                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                };
                                            }
                                        ?>
                                        </td>
                                    </tr>        
                                    <?php } ?>
                                    <!--Displays Master Contorl New User Registration Request --> 
                                    <?php
                                        $dte = date("m/d/Y");
                                        $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$dte' 
                                        ");
                                        while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                        {
                                        $PID = $row['ID'];
                                    ?>
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
                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                {
                                                    if ($rowfet['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                    };
                                                }
                                            ?>
                                        </td>
                                    </tr>       
                                    <?php } ?>
                                    <!--Displays Master Contorl Reset Password Request -->  
                                    <?php
                                        $dte = date("m/d/Y");
                                        $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$dte' 
                                        ");
                                        while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                        {
                                        $PID = $row['ID'];
                                    ?>
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
                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                {
                                                    if ($rowfet['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                    };
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <!--Displays Master Contorl Registration Change and Cancellation Request -->  
                                    <?php
                                        $dte = date("m/d/Y");
                                        $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed = '$dte' 
                                        ");
                                        while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC)){
                                        $PID = $row['ID'];
                                    ?>
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
                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                {
                                                    if ($rowfet['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
                                                        echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                    };
                                                }
                                            ?>
                                        </td>
                                    </tr>         
                                    <?php } ?>
                                    <!--Displays Master Control Request Record Request -->  
                                    <?php
                                        $dte = date("m/d/Y");
                                        $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$dte' ");
                                        while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                        {
                                        $PID = $row['ID'];
                                    ?>
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
                                                while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                {
                                                    if ($rowfet['cntr'] == '0')
                                                    {
                                                        echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                    }else
                                                    {
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
                                date_default_timezone_set('Singapore');
                                $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where  dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$act_date'union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.qadlog where dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.lasyslog where dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.nonlasyslog where dateprocessed = '$act_date' union all
                                SELECT COUNT(ID) FROM requestmonitoring.dbo.padlog where dateprocessed = '$act_date';
                                ");
                                while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) )
                                {
                                    $counter = $counter+$row['cntr'];
                                } if ($counter == 0)
                                {
                                    echo '<br><h5 class="text-purple" style="text-align:center">No available activity</h5>';
                                }
                            ?>
                        </div>
                    </div>
                        <?php
                            $last = date("d");
                            for($x = 1 ; $x<= $last; $x++)
                            {
                                $m = date("m");
                                $y = date("Y"); 
                                if($x <= 9)
                                {
                                    $d = "0" . $x;
                                }
                                else
                                {
                                    $d = $x;
                                }
                            $act_date = $m . "/" . $d . "/" . $y;
                        
                        ?>
                        <div class="white-box" id="box<?php echo $x;?>" style="display:none;">
                            <h4 class="box-title"><?php echo date("F") . " " . $d?> Activity Count</h3>
                            <div class="stats-row" style="text-align:center">
                                <div class="stat-item text-info">
                                    <h6 class="text-info">QAD Request</h6> <b>
                                        <?php 
                                        date_default_timezone_set('Singapore');
                                        $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.qadlog where dateprocessed = '$act_date'");
                                        $row = sqlsrv_fetch_array($count);
                                        echo $row['total'];
                                        ?> tasks</b>
                                </div>
                                <div class="stat-item text-danger">
                                    <h6 class="text-danger">Lasysy Request</h6> <b>
                                    <?php 
                                    date_default_timezone_set('Singapore');
                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.lasyslog where dateprocessed= '$act_date'");
                                    $row = sqlsrv_fetch_array($count);
                                    echo $row['total'];
                                    ?> tasks</b>
                                </div>
                                    <div class="stat-item text-success">
                                            <h6 class="text-success">Non-Lasys Request</h6> <b>
                                                <?php 
                                                date_default_timezone_set('Singapore');
                                                $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.nonlasyslog where dateprocessed = '$act_date'");
                                                $row = sqlsrv_fetch_array($count);
                                                echo $row['total'];
                                                ?> tasks</b>
                                        </div>
                                        <div class="stat-item text-warning">
                                            <h6 class="text-warning">PAD Request</h6> <b><?php
                                                    date_default_timezone_set('Singapore');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(*) as total from requestmonitoring.dbo.padlog where dateprocessed = '$act_date'");
                                                    $row = sqlsrv_fetch_array($count);
                                                    echo $row['total'];
                                                ?> tasks</b>
                                        </div>
                                        <div class="stat-item text-primary">
                                        <h6 class="text-primary">MAster ContRol Request</h6> <b><?php 
                                                date_default_timezone_set('Singapore');
                                                $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$act_date' union all
                                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$act_date' union all
                                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed = '$act_date' union all
                                                SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$act_date';
                                                ");
                                                $counter=0;
                                                while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) )
                                                {
                                                    $counter = $counter+$row['cntr'];
                                                }echo $counter;
                                            ?> tasks</b>
                                        </div>
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
                                                            $dte = $act_date;
                                                            $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.qadlog where dateprocessed = '$dte'");
                                                            while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                $PID = $row['ID'];
                                                        ?>
                                                <tr>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td style="text-align:center"> <?php echo $row['daterequested'];?></td>
                                                    <td style="text-align:center"> <?php echo $row['datereceived'];?></td>
                                                    <td style="text-align:center">
                                                    <?php 
                                                             $display_details1 = sqlsrv_query($conn, "SELECT count (ID) as cntr FROM requestmonitoring.dbo.qadlog where ID=$PID and dateprocessed = '$dte'  and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
                                                             (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
                                                             while($rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC))
                                                             {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                }
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.lasyslog where dateprocessed = '$dte' ");  
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                             while($rowfet1 = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                             {
                                                                if ($rowfet1['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                        
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <!--  -->         
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.nonlasyslog where dateprocessed = '$dte' ");
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <!--  -->         
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.padlog where dateprocessed = '$dte'");
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <!--  -->         
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$dte'");
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
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
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$dte' 
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
                                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <!--  -->         
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed = '$dte' 
                                                     ");
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                            while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                            {
                                                                if ($rowfet['cntr'] == '0')
                                                                {
                                                                    echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                }else
                                                                {
                                                                    echo '<span class="btn btn-danger btn-outline btn-xs btn-rounded">Not Complete</span>';
                                                                };
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                    <!--  -->         
                                                <?php } ?>
                                                <?php
                                                     $dte = $act_date;
                                                     $display_details = sqlsrv_query($conn, "SELECT * FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$dte'");
                                                     while($row = sqlsrv_fetch_array( $display_details, SQLSRV_FETCH_ASSOC))
                                                     {
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
                                                                    while($rowfet = sqlsrv_fetch_array( $display_details12, SQLSRV_FETCH_ASSOC))
                                                                    {
                                                                        if ($rowfet['cntr'] == '0')
                                                                        {
                                                                            echo '<span class="btn btn-success btn-outline btn-xs btn-rounded">Complete</span>';  
                                                                        }else
                                                                        {
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
                                                    date_default_timezone_set('Singapore');
                                                    $count = sqlsrv_query($conn, "SELECT COUNT(ID)AS cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed = '$act_date'union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.qadlog where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.lasyslog where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.nonlasyslog where dateprocessed = '$act_date' union all
                                                    SELECT COUNT(ID) FROM requestmonitoring.dbo.padlog where dateprocessed = '$act_date';
                                                    ");
                                                    while( $row = sqlsrv_fetch_array( $count, SQLSRV_FETCH_ASSOC) )
                                                    {
                                                        $counter = $counter+$row['cntr'];
                                                    }if ($counter == 0)
                                                    {
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
                                                    for ($row = 0; $row < 6; $row ++) 
                                                    {
                                                        $week = 7;
                                                        echo "<tr>";
                                                        for ($col = 1; $col <= $week; $col ++) 
                                                        {
                                                            if ($num <= $last_second)
                                                            {
                                                                if ($row2 == 0){
                                                                    if ($first_second == "Sunday")
                                                                    {
                                                                        if ($num == date("j"))
                                                                        {
                                                                            echo "<td id='get$num' class='cal-active'><button class='text-purple' style='background-color:transparent;border:none;font-weight:bold' onclick='getValue$num();'>", $num, "</button></td>";
                                                                            $num++;
                                                                        }else
                                                                        {
                                                                            echo "<td>", $num, "</td>";
                                                                            $num++;
                                                                        }
                                                                    }else if ($first_second == "Monday")
                                                                    {
                                                                        echo "<td>", "", "</td>";
                                                                        $row2 = 1;
                                                                    }else if ($first_second == "Tuesday")
                                                                    {
                                                                        echo "<td colspan='2'>", "", "</td>";
                                                                        $week = $week - 1;
                                                                        $row2 = 1;
                                                                    }else if ($first_second == "Wednesday")
                                                                    {
                                                                        echo "<td colspan='3'>", "", "</td>";
                                                                        $week = $week - 2;
                                                                        $row2 = 1;
                                                                    }else if ($first_second == "Thursday")
                                                                    {
                                                                        echo "<td colspan='4'>", "", "</td>";
                                                                        $week = $week - 3;
                                                                        $row2 = 1;
                                                                    }else if ($first_second == "Friday")
                                                                    {
                                                                        echo "<td colspan='5'>", "", "</td>";
                                                                        $week = $week - 4;
                                                                        $row2 = 1;
                                                                    }else if ($first_second == "Saturday")
                                                                    {
                                                                        echo "<td colspan='6'>", "", "</td>";
                                                                        $week = $week - 5;
                                                                        $row2 = 1;
                                                                    } 
                                                                }else{
                                                                    if ($num == date("j"))
                                                                    {
                                                                        echo "<td id='get$num' class='cal-active'><button class='text-purple' style='background-color:transparent;border:none;font-weight:bold' onclick='getValue$num();'>", $num, "</button></td>";
                                                                        $num++;
                                                                    }else
                                                                    {
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
                    <?php for($i = 1; $i <= $last; $i++)
                    { ?>
                        function getValue<?php echo $i;?>()
                        {
                            document.getElementById("box0").style.display = "none";
                            <?php 
                                for($a = 1; $a<=$last; $a++)
                                {
                            ?>
                            document.getElementById("box<?php echo $a;?>").style.display = "none";
                            document.getElementById("get<?php echo $a;?>").className = "";
                            <?php 
                                if($i == $a)
                                { 
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
        <?php 
            $totalrequest = 0;
            $for_year = date('y');
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest =  $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];  
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where refyear=$for_year");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
                    $_SESSION["total"] = $totalrequest;

            $completed_request = 0;
            $for_year = date('y');
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where refyear=$for_year
            and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR(dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request =  $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where refyear=$for_year
            and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where refyear=$for_year and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where refyear=$for_year and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
            ([department-section] IS NULL OR [department-section]='') OR (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR
            (systemuser IS NULL OR systemuser='') OR (usertype IS NULL OR usertype='') OR (dateregistered IS NULL OR dateregistered='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];  
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
            (reasonforapplication IS NULL OR reasonforapplication='') OR (datereset IS NULL OR datereset=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
            (reasonforapplication IS NULL OR reasonforapplication='') OR (datechangecancelled IS NULL OR datechangecancelled=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where refyear=$for_year and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (information IS NULL OR information='') OR (implementationdate IS NULL OR implementationdate=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
                    $_SESSION["pending"] = $completed_request;
                    $_SESSION["completed"] = $totalrequest - $completed_request;
              ?>
        
        Morris.Donut(
        {
            element: 'morris-donut-chart',
            data: [
                {
            label: 'PENDING TASK',
            value: "<?php echo $_SESSION["pending"];?>",
            },
            {
            label: "COMPLETED TASK",
            value: "<?php echo $_SESSION['completed'];?>",
            }],
        resize: true,
        colors:['#C94C4C','#008D61']
        });

        
$( document ).ready(function()
{
    var ctx2 = document.getElementById("chart2").getContext("2d");
    var data2 = 
    {
        labels: [<?php 
           // for year
           date_default_timezone_set('Singapore');
           $month_thisyear =date("m");
           $this_year =date("Y");
           if($month_thisyear=='01'||$month_thisyear=='02'||$month_thisyear=='03'||$month_thisyear=='04'||$month_thisyear=='05'||$month_thisyear=='06')
           {
               $previous_year = date("Y", strtotime("-1 year"))."-";
               $previousyear1 = date("Y", strtotime("-1 year"));
           }else
           {
               $previous_year=" ";
           }
           //for year
               $w=1;
               $dashboard_months = array("A","B","C","D","E","F","G");
               $start_date =array("01/01/$this_year","02/01/$this_year","03/01/$this_year","04/01/$this_year","05/01/$this_year","06/01/$this_year","07/01/$this_year");
               $end_date =array("01/31/$this_year","02/28/$this_year","03/31/$this_year","04/30/$this_year","05/31/$this_year","06/30/$this_year","07/31/$this_year");
               if($month_thisyear=='01')
               {
                $dashboard_months = array("July","August","September","October","November","December","January");
                $start_date =array("07/01/$this_year","08/01/$this_year","09/01/$this_year","10/01/$this_year","11/01/$this_year","12/01/$this_year","01/01/$this_year");
                $end_date =array("07/31/$this_year","08/31/$this_year","09/30/$this_year","10/31/$this_year","11/30/$this_year","12/31/$this_year","01/31/$this_year");  
               }else if($month_thisyear==02)
               {
                $dashboard_months = array("August","September","October","November","December","January","February"); 
                $start_date =array("08/01/$this_year","09/01/$this_year","10/01/$this_year","11/01/$this_year","12/01/$this_year","01/01/$this_year","02/01/$this_year");
                $end_date =array("08/31/$this_year","09/30/$this_year","10/31/$this_year","11/30/$this_year","12/31/$this_year","01/31/$this_year","02/28/$this_year");   
               }else if($month_thisyear==03)
               {
                $dashboard_months = array("September","October","November","December","January","February","March"); 
                $start_date =array("09/01/$this_year","10/01/$this_year","11/01/$this_year","12/01/$this_year","01/01/$this_year","02/01/$this_year","03/01/$this_year");
                $end_date =array("09/30/$this_year","10/31/$this_year","11/30/$this_year","12/31/$this_year","01/31/$this_year","02/28/$this_year","03/31/$this_year");   
               }else if($month_thisyear==04)
               {
                $dashboard_months = array("October","November","December","January","February","March","April"); 
                $start_date =array("10/01/$this_year","11/01/$this_year","12/01/$this_year","01/01/$this_year","02/01/$this_year","03/01/$this_year","04/01/$this_year");
                $end_date =array("10/31/$this_year","11/30/$this_year","12/31/$this_year","01/31/$this_year","02/28/$this_year","03/31/$this_year","04/30/$this_year");  
               }else if($month_thisyear==05)
               {
                $dashboard_months = array("November","December","January","February","March","April","May");
                $start_date =array("11/01/$this_year","12/01/$this_year","01/01/$this_year","02/01/$this_year","03/01/$this_year","04/01/$this_year","05/01/$this_year");
                $end_date =array("11/30/$this_year","12/31/$this_year","01/31/$this_year","02/28/$this_year","03/31/$this_year","04/30/$this_year","05/31/$this_year");    
               }else if($month_thisyear==06)
               {
                $dashboard_months = array("December","January","February","March","April","May","June");
                $start_date =array("12/01/$this_year","01/01/$this_year","02/01/$this_year","03/01/$this_year","04/01/$this_year","05/01/$this_year","06/01/$this_year");
                $end_date =array("12/31/$this_year","01/31/$this_year","02/28/$this_year","03/31/$this_year","04/30/$this_year","05/31/$this_year","06/30/$this_year");    
               }else if($month_thisyear==07)
               {
                $dashboard_months = array("January","February","March","April","May","June","July");
                $start_date =array("01/01/$this_year","02/01/$this_year","03/01/$this_year","04/01/$this_year","05/01/$this_year","06/01/$this_year","07/01/$this_year");
                $end_date =array("01/31/$this_year","02/28/$this_year","03/31/$this_year","04/30/$this_year","05/31/$this_year","06/30/$this_year","07/31/$this_year");     
               }else if($month_thisyear=='08')
               {
                $dashboard_months = array("February","March","April","May","June","July","August");  
                $start_date =array("02/01/$this_year","03/01/$this_year","04/01/$this_year","05/01/$this_year","06/01/$this_year","07/01/$this_year","08/01/$this_year");
                $end_date =array("02/28/$this_year","03/31/$this_year","04/30/$this_year","05/31/$this_year","06/30/$this_year","07/31/$this_year","08/31/$this_year");      
               }else if($month_thisyear=='09')
               {
                $dashboard_months = array("March","April","May","June","July","August","September");
                $start_date =array("03/01/$this_year","04/01/$this_year","05/01/$this_year","06/01/$this_year","07/01/$this_year","08/01/$this_year","09/01/$this_year");
                $end_date =array("03/31/$this_year","04/30/$this_year","05/31/$this_year","06/30/$this_year","07/31/$this_year","08/31/$this_year","09/30/$this_year");      
               }elseif($month_thisyear==10)
               {
                $dashboard_months = array("April","May","June","July","August","September","October");
                $start_date =array("04/01/$this_year","05/01/$this_year","06/01/$this_year","07/01/$this_year","08/01/$this_year","09/01/$this_year","10/01/$this_year");
                $end_date =array("04/30/$this_year","05/31/$this_year","06/30/$this_year","07/31/$this_year","08/31/$this_year","09/30/$this_year","10/31/$this_year");     
               }elseif($month_thisyear==11)
               {
                $dashboard_months = array("May","June","July","August","September","October","November");
                $start_date =array("05/01/$this_year","06/01/$this_year","07/01/$this_year","08/01/$this_year","09/01/$this_year","10/01/$this_year","11/01/$this_year");
                $end_date =array("05/31/$this_year","06/30/$this_year","07/31/$this_year","08/31/$this_year","09/30/$this_year","10/31/$this_year","11/30/$this_year");      
               }elseif($month_thisyear==12)
               {
                $dashboard_months = array("June","July","August","September","October","November","December"); 
                $start_date =array("06/01/$this_year","07/01/$this_year","08/01/$this_year","09/01/$this_year","10/01/$this_year","11/01/$this_year","12/01/$this_year");
                $end_date =array("06/30/$this_year","07/31/$this_year","08/31/$this_year","09/30/$this_year","10/31/$this_year","11/30/$this_year","12/31/$this_year",);     
               }  
        for($x=0;$x<7;$x++)
        { 
            echo '"'.$dashboard_months[$x].'",';
                }?> ],
            datasets: [
            {
                label: "My First dataset",
                fillColor: "#008D61",
                strokeColor: "#008D61",
                highlightFill: "#008D61",
                highlightStroke: "#008D61",
                data: [<?php 
                
                for($cntr=0;$cntr<7;$cntr++)
                {
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.qadlog where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.lasyslog where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.nonlasyslog where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.padlog where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    echo $totality.","; $_SESSION['month1']=$totality;
                }
               
                
                ?>]
                
            },
            {
                label: "My Second dataset",
                fillColor: "#dcdcdc",
                strokeColor: "#dcdcdc",
                highlightFill: "#dcdcdc",
                highlightStroke: "#dcdcdc",
                data: [<?php 
                for($cntr=0;$cntr<7;$cntr++)
                {
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcnewuser where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcregistrationchange where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcpasswordrequest where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    $counter123 = sqlsrv_query($conn, "SELECT COUNT(dateprocessed) as total from requestmonitoring.dbo.mcrequestrecord where (dateprocessed between '$start_date[$cntr]' and '$end_date[$cntr]');");
                    $rows = sqlsrv_fetch_array($counter123);
                    $totality = $totality + $rows['total'];
                    echo $totality.","; $_SESSION['month2']=$totality;
                }
                ?>]
            }
        ]
    };
    
    var chart2 = new Chart(ctx2).Bar(data2, 
    {
        scaleBeginAtZero : true,
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.005)",
        scaleGridLineWidth : 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke : true,
        barStrokeWidth : 0,
        tooltipCornerRadius: 2,
        barDatasetSpacing : 3,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });

    <?php 
            $totalrequest = 0;
            date_default_timezone_set('Singapore');
            $formonth = date('m')."%".date('Y');
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest =  $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
                    $_SESSION['srr1']=$totalrequest;
                    $totalrequest = 0;
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];  
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed like '$formonth'");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $totalrequest = $totalrequest + $rowfet['cntr'];
                    $_SESSION['mcr1']=$totalrequest;

            $completed_request = 0;
            date_default_timezone_set('Singapore');
            $formonth = date('m')."%".date('Y');
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.qadlog where dateprocessed like '$formonth'
            and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request =  $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.lasyslog where dateprocessed like '$formonth'
            and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.nonlasyslog where dateprocessed like '$formonth' and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.padlog where dateprocessed like '$formonth' and((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR  ([department-section] IS NULL OR [department-section]='') OR (natureofrequest IS NULL OR natureofrequest='') OR (requestor IS NULL OR requestor='') OR
            (dateapproved IS NULL OR dateapproved='') OR (datedone IS NULL OR datedone='') OR (accomplishedby IS NULL OR accomplishedby='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
                    $_SESSION['srr']=$completed_request;
            $completed_request = 0;
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
            ([department-section] IS NULL OR [department-section]='') OR (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR
            (systemuser IS NULL OR systemuser='') OR (usertype IS NULL OR usertype='') OR (dateregistered IS NULL OR dateregistered='') OR (remarks IS NULL OR remarks=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];  
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
            (reasonforapplication IS NULL OR reasonforapplication='') OR (datereset IS NULL OR datereset=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr']; 
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
            (reasonforapplication IS NULL OR reasonforapplication='') OR (datechangecancelled IS NULL OR datechangecancelled=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
            $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
            (information IS NULL OR information='') OR (implementationdate IS NULL OR implementationdate=''))");
            $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
                    $completed_request = $completed_request + $rowfet['cntr'];
                    $_SESSION['mcr']=$completed_request;
                    $_SESSION["completed"] = $totalrequest - $completed_request;
              ?>
    
    var ctx4 = document.getElementById("chart4").getContext("2d");
    var data4 = [
    {
        value: <?php echo ($_SESSION['srr1']-$_SESSION['srr']);?>,
        color:"#008D61",
        highlight: "#008D61",
        label: "COMPLETED REQUEST"
    },
    {
        value: <?php echo $_SESSION['srr'];?>,
        color: "#C94C4C",
        highlight: "#C94C4C",
        label: "PENDING REQUEST"
    }
    ];
    
    var myDoughnutChart = new Chart(ctx4).Doughnut(data4,
    {
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 0,
        animationSteps : 100,
        tooltipCornerRadius: 2,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    var ctx41 = document.getElementById("chart41").getContext("2d");
    var data41 = [
    {
        value: <?php echo ($_SESSION['mcr1']-$_SESSION['mcr']);?>,
        color:"#008D61",
        highlight: "#008D61",
        label: "Completed Request"
    },
    {
        value: <?php echo $_SESSION['mcr'];?>,
        color: "#C94C4C",
        highlight: "#C94C4C",
        label: "Pending Request"
    }
    ];
    
    var myDoughnutChart = new Chart(ctx41).Doughnut(data41,
    {
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 0,
        animationSteps : 100,
        tooltipCornerRadius: 2,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    
    
});
    </script>


</body>
</html>
