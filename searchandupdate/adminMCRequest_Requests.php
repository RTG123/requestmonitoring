<!DOCTYPE html>
<?php
    // Name of the module : adminMCRequest_Request.php
    // Module creation date : 01/21/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module handles the update for Master Request Record for admin as a Usertype
    require_once('../FOLDERS/SES/SESADMIN.php'); // CONNECTION 
    require_once('../referencesession.php'); // ALL THE DATA
  ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Request Monitoring System</title><!-- Header of the module -->
        <link rel="icon" type="image/png" href="../images/favicon.ico" /><!-- Icon of the module -->
        <link rel="stylesheet" type="text/css" href="../icons/themify-icons/themify-icons.css"><!-- Themify Icons CSS -->
        <link rel="stylesheet" type="text/css" href="../icons/font-awesome/css/font-awesome.min.css"><!-- Font-awesome Icons CSS -->
        <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Core CSS -->
        <link href="../assets/sidebar-nav.min.css" rel="stylesheet"><!-- Menu CSS -->
        <link href="../assets/css/style.css" rel="stylesheet"><!-- Custom CSS -->
        <link href="../assets/css/tpc.css" id="theme" rel="stylesheet"><!-- color CSS -->
        <!-- ⭐⭐⭐ ADDITIONAL LINKS ⭐⭐⭐ -->
        <link href="../css/formstyle.css" rel="stylesheet">
        <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="fix-header" style="font-family:Century Gothic"onload="<?php echo $_SESSION['Confirmation'];?>">
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
                            <!--This is dark logo text--><img src="../images/tpc.png" alt="Terumo" class="dark-logo" style="width:90%" /><!--This is light logo text--><img src="../images/tpc.png" alt="Terumo" class="light-logo" style="width:90%" />
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
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../images/<?php echo $_SESSION['Profile_pic']?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['First_name']?></b><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="u-img"><img src="../images/<?php echo $_SESSION['Profile_pic']?>" alt="user" /></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="u-text">
                                                    <p style="font-size:14px"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?></p>
                                                    <p class="text-muted" style="text-transform: uppercase;"><small><?php echo $_SESSION['User_type']?></small></p>
                                                    <a href="../adminmyprofile.php" class="btn btn-rounded btn-danger btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../adminaccountsetting.php"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
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
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu" style="color:#54667a"></i></span> <span class="hide-menu"><img src="../images/tpc.png" alt="Terumo" style="width:80%" /></span></h3> 
                    </div>
                    <div class="row"><br></div>
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                            <div><a href="../adminmyprofile.php"><img src="../images/<?php echo $_SESSION['Profile_pic']?>" alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['User_type']?></small</h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li><a href="../admin.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="../admin1.php" class="waves-effect"><i class="mdi mdi-clipboard-outline fa-fw"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-folder-multiple-outline"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                                <li> <a href="adminSRR_Requests.php" class="waves-effect"><span class="hide-menu">System Revision Request</span></a> </li>
                                <li> <a href="adminMCNewUser_Requests.php" class="waves-effect"><span class="hide-menu">Mc New User Request</span></a> </li>
                                <li> <a href="adminMCChange_Requests.php" class="waves-effect"><span class="hide-menu">Mc Registration Change & Cancellation</span></a> </li>
                                <li> <a href="adminMCPassword_Requests.php" class="waves-effect "><span class="hide-menu">Mc Password Reset</span></a> </li>
                                <li> <a href="adminMCRequest_Requests.php" class="waves-effect active"><span class="hide-menu">Mc Request Record</span></a> </li>
                            </ul>
                        </li>
                        <li><a href="../adminactivitylogs.php" class="waves-effect"><i class="mdi mdi-account-check"></i><span class="hide-menu">&emsp;Activity Logs</span></a></li>
                     
                        <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">&emsp;Log out</span></a></li>
                    </ul>
                </div>
            </div>
                <!-- End Left Side Navigation -->
            <!-- ⭐⭐⭐ End Header and Side Bar ⭐⭐⭐ -->
            <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Search and Update</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="../index.php">Home</a></li>
                                <li class="active">Search and Update</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                         <!--*********************************
                                 ⭐⭐⭐   Modals  ⭐⭐⭐
                            *********************************** -->
            <!-- View Report Modal -->
            <?php  
                $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord ";// sql for server
                $stmt = sqlsrv_query( $conn, $sql ); 
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                {
            ?>
            <div class="modal fade"  id="viewreportModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#008d61">
                            <div class="col-sm-11"><h4 class="modal-title" style="font-family:Century Gothic;font-weight:bold;background-color:#008d61">VIEW REQUEST</h4>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form action="database/updatedata.php" method="POST" enctype="multipart/form-data" class="form-material form-horizontal">
                                        <!-- Reference Number View Report Modal -->
                                    <div class="form-group"style="padding: 10px 100px;">
                                        <div class="col-md-12">
                                            <input type="text" name="requestnum" class="form-control form-control-line" style="text-align:center;font-size:35px;padding-bottom: 30px;padding-top:30px;"value="<?php echo $row['requestnumber']?>" readonly> 
                                        </div>
                                        <h5 class="col-md-12" id="references"style="text-align:center">Reference Number </h5>
                                    </div>
                                        <!-- Added by View Report Modal -->
                                    <div class="col-sm-6">
                                        <div class="form-group"style="padding: 0px 5px;" >
                                            <label class="col-md-12"> Added by: </label>
                                            <div class="col-md-12">
                                                <input  id="addedby0"  type="text" name="addedby" class="form-control form-control-line" value="<?php echo $row['userid']?>" readonly> 
                                            </div>
                                        </div> 
                                            <!-- Department - Section View Report Modal -->
                                        <div class="form-group"style="padding: 0px 5px;">
                                            <label class="col-md-12"> Department - Section: </label>
                                            <div class="col-md-12">
                                                <input type="text" name="deptsect"  class="form-control form-control-line" value="<?php echo $row['department-section']?>"readonly> 
                                            </div>
                                        </div> 
                                        <div class="row margin" >
                                                <!-- Date Requested View Report Modal -->
                                            <div class="col-lg-6" id="date1">
                                                <label>Date Requested :</label>
                                                <div class="input-group">
                                                    <div class="input-size">
                                                        <input style="padding-left:20px;" class="form-control" style="width:100%;" 
                                                        placeholder="MM/DD/YYYY" type="text"autocomplete="off"
                                                        value="<?php echo $row['daterequested']?>" readonly/>
                                                    </div> 
                                                </div>  
                                            </div>
                                                <!-- Date Received View Report Modal -->
                                            <div class="col-lg-6" id="date2" >
                                                <label>Date Received : </label>
                                                <div class="input-group">
                                                    <div class="input-size" >
                                                        <input style="padding-left:20px;" class="form-control"  style="width:100%;" 
                                                        placeholder="MM/DD/YYYY" type="text" autocomplete="off"
                                                        value="<?php echo $row['datereceived']?>" readonly/>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- First Column -->
                                    <div class="col-sm-6">
                                            <!-- Information View Report Modal -->
                                        <div class="form-group"style="padding: 0px 5px;">
                                            <label class="col-md-12"> Information : </label>
                                            <div class="col-md-12">
                                                <input style="padding-left:20px;" class="form-control"  style="width:100%;" 
                                                    name="information" type="text" autocomplete="off"
                                                    value="<?php echo $row['information']?>" readonly />
                                            </div>
                                        </div> 
                                            <!-- Implementation Date View Report Modal -->
                                        <div style="display:;" class="form-group"style="padding: 10px 5px;">
                                            <label class="col-md-12"> Implementation Date : </label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-line" value="<?php echo $row['implementationdate']?>"readonly> 
                                            </div>
                                        </div>
                                            <!-- Remarks View Report Modal -->
                                        <div class="form-group"style="padding: 0px 10px;">
                                            <label class="col-md-12">Remarks : </label>
                                            <div class="col-md-12">
                                                <input type="text" name="remarks"   class="form-control form-control-line" value="<?php echo $row['remarks']?>"readonly> 
                                            </div>
                                        </div>
                                            <!-- Attachement View Report Modal -->
                                        <div class="form-group"style="padding: 0px 10px;">
                                            <label class="col-md-12">Attachment : </label>
                                            <div class="col-md-12">
                                            <input type="text" name="attachment" accept="image/*,.pdf" class="form-control form-control-line" value="<?php echo $row['attachment']?>" disbled> 
                                            <?php 
                                            if($row['attachment']==null)
                                            {
                                            echo "No  Attachment uploaded";
                                            }else
                                            {
                                            echo "Current Attachment ";  
                                            ?>
                                            <img src="../images/<?php echo $row['attachment']?> " alt="No photo in the gallery" style="width:80%" />
                                            <?php 
                                            }?>
                                            </div>
                                        </div>
                                    </div><!-- Second Column -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                            </div>
                        </div>
                    </form> <!-- form end-->
                </div>
            </div>
            <?php } ?>
            <!-- View Report Modal end -->
            <!-- EDIT MODAL -->
            <?php  
                $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord ";// sql for server
                $stmt = sqlsrv_query( $conn, $sql ); 
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                {
            ?>
            <div class="modal fade"  id="exampleModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#008d61">
                            <div class="col-sm-11"><h4 class="modal-title" style="font-family:Century Gothic;font-weight:bold;background-color:#008d61">EDIT REQUEST</h4></div>
                                <div class="col-sm-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form action="../database/updaterequestrecord.php" method="POST" enctype="multipart/form-data" class="form-material form-horizontal">
                                            <!-- Reference Number Edit Report Modal -->
                                        <div class="form-group"style="padding: 10px 100px;">
                                            <div class="col-md-12">
                                                <input type="text" name="requestnum" class="form-control form-control-line" style="text-align:center;font-size:35px;padding-bottom: 30px;padding-top:30px;"value="<?php echo $row['requestnumber']?>" readonly> 
                                            </div>
                                            <h5 class="col-md-12" id="references"style="text-align:center">Reference Number </h5>
                                        </div>
                                        <div class="col-sm-6">
                                                <!-- Addded by Edit Report Modal -->
                                            <div class="form-group"style="padding: 0px 5px;" >
                                                <label class="col-md-12"> Added by: </label>
                                                <div class="col-md-12">
                                                    <input  id="addedby0"  type="text" name="addedby" class="form-control form-control-line" value="<?php echo $row['userid']?>" readonly> 
                                                </div>
                                            </div> 
                                                <!-- Departmment Section Edit Report Modal -->
                                            <div class="form-group"style="padding: 0px 5px;">
                                                <label class="col-md-12"> Department - Section: </label>
                                                <div class="col-md-12">
                                                    <select class="form-control form-control-line" name="deptsect"id="inputdepartment" >
                                                        <option value="<?php echo $row['department-section']?>"><?php echo $row['department-section']?></option>
                                                            <?php    
                                                                $deptvalue = $row['department-section'];      
                                                                $sql2 = "SELECT DISTINCT(Department) FROM [requestmonitoring].[dbo].[deptandsec] WHERE NOT Department ='$deptvalue' "; // sql for server
                                                                $stmt2 = sqlsrv_query( $conn, $sql2 ); 
                                                                while( $rows2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) )
                                                            {?>
                                                        <option value="<?php echo $rows2['Department'] ?>"><?php echo $rows2['Department'] ?></option>
                                                            <?php }
                                                            ?>
                                                        <option value="NEW" style="font-weight: bold; text-transform: uppercase;">To add New User go to add request panel</option>
                                                    </select> 
                                                </div>
                                            </div> 
                                            <div class="row margin" >
                                                <!-- Date Requested Edit Report Modal -->
                                                <div class="col-lg-6" id="date1">
                                                    <label>Date Requested :</label>
                                                    <div class="input-group">
                                                        <div class="input-size">
                                                            <input style="padding-left:20px;" class="form-control" style="width:100%;" id="inputdate10"
                                                                name="daterequested" placeholder="YYYY/MM/DD" type="text"autocomplete="off"
                                                                value="<?php echo $row['daterequested']?>"/>
                                                        </div> 
                                                    </div>  
                                                </div>
                                                    <!-- Date Received Edit Report Modal -->
                                                <div class="col-lg-6" id="date2" >
                                                    <label>Date Received : </label>
                                                    <div class="input-group">
                                                        <div class="input-size" >
                                                            <input style="padding-left:20px;" class="form-control"  style="width:100%;" id="inputdate20"
                                                            name="datereceived" placeholder="YYYY/MM/DD" type="text" autocomplete="off"
                                                            value="<?php echo $row['datereceived']?>" />
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div><!-- END CALENDAR -->
                                        </div><!-- First Column -->
                                        <div class="col-sm-6">
                                                <!-- Information Edit Report Modal -->                    
                                            <div class="form-group"style="padding: 0px 5px;">
                                                <label class="col-md-12"> Information : </label>
                                                <div class="col-md-12">
                                                    <input style="padding-left:20px;" class="form-control"  style="width:100%;" 
                                                        name="information" type="text" autocomplete="off"
                                                        value="<?php echo $row['information']?>" />
                                                </div>
                                            </div> 
                                               <!-- Implementation Date Edit Report Modal -->     
                                            <div style="display:;" class="form-group"style="padding: 10px 5px;">
                                                <label class="col-md-12"> Implementation Date : </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="impdate" class="form-control form-control-line" value="<?php echo $row['implementationdate']?>"> 
                                                </div>
                                            </div> 
                                                <!-- Remarks Edit Report Modal -->
                                            <div class="form-group"style="padding: 0px 10px;">
                                                <label class="col-md-12">Remarks : </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="remarks"   class="form-control form-control-line" value="<?php echo $row['remarks']?>"> 
                                                </div>
                                            </div>
                                                <!-- New Attachment Edit Report Modal -->
                                            <div class="form-group"style="padding: 0px 10px;">
                                                <label class="col-md-12">New Attachment : </label>
                                                <div class="col-md-12">
                                                <input type="file" name="attachment" accept="image/*,.pdf" class="form-control form-control-line" value="<?php echo $row['attachment']?>"> 
                                                <?php 
                                                if($row['attachment']==null)
                                                {
                                                echo "No  Attachment uploaded";
                                                }else
                                                {
                                                echo "Current Attachment : ".$row['attachment'];  
                                                ?>
                                                <img src="../images/<?php echo $row['attachment']?> " alt="No photo in the gallery" style="width:80%" />
                                                <?php 
                                                }?>
                                                </div>
                                            </div>
                                        </div><!-- Second Column -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                                    <input type="submit" value="SUBMIT" style="background-color:#008d61; color:white;"  name="submit" 
                                        class="fcbtn btn btn-outline btn-primary btn-1f">
                                </div>
                            </div>
                        </form> <!-- form end-->
                    </div>
                </div>
                <?php 
                }?>
                <!-- MODAL -->
                <!-- delete Report Modal -->
                <?php  
                $sql = "SELECT * FROM requestmonitoring.dbo.mcrequestrecord ";// sql for server
                $stmt = sqlsrv_query( $conn, $sql ); 
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                {
                ?>
                <div class="modal fade"  id="deletereportModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#008d61">
                                <div class="col-sm-11"><h4 class="modal-title" style="font-family:Century Gothic;font-weight:bold;background-color:#008d61">DELETE REQUEST</h4>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form action="../database/admindelete.php" method="POST" enctype="multipart/form-data" class="form-material form-horizontal">
                                            <!-- Reference Number Delete Report Modal -->
                                        <div class="form-group"style="padding: 10px 100px;">
                                            <div class="col-md-12">
                                                <input type="text" name="request_num" class="form-control form-control-line" style="text-align:center;font-size:35px;padding-bottom: 30px;padding-top:30px;"value="<?php echo $row['requestnumber']?>" readonly> 
                                            </div>
                                            <h5 class="col-md-12" id="references"style="text-align:center">Reference Number </h5>
                                        </div>
                                        <div class="col-sm-6">
                                                <!-- Added By Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 5px;" >
                                                <label class="col-md-12"> Added by: </label>
                                                <div class="col-md-12">
                                                    <input  id="addedby0"  type="text" name="addedby" class="form-control form-control-line" value="<?php echo $row['userid']?>" readonly> 
                                                </div>
                                            </div> 
                                                <!-- Department - Section Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 5px;">
                                                <label class="col-md-12"> Department - Section: </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="deptsect"  class="form-control form-control-line" value="<?php echo $row['department-section']?>"readonly> 
                                                </div>
                                            </div> 
                                            <div class="row margin" >
                                                <!-- Date Requested Delete Report Modal -->
                                                <div class="col-lg-6" id="date1">
                                                    <label>Date Requested :</label>
                                                    <div class="input-group">
                                                        <div class="input-size">
                                                            <input style="padding-left:20px;" class="form-control" style="width:100%;" id="inputdate10"
                                                             placeholder="MM/DD/YYYY" type="text"autocomplete="off"
                                                            value="<?php echo $row['daterequested']?>"readonly/>
                                                        </div> 
                                                    </div>  
                                                </div>
                                                    <!-- Date Received Delete Report Modal -->
                                                <div class="col-lg-6" id="date2" >
                                                    <label>Date Received : </label>
                                                    <div class="input-group">
                                                        <div class="input-size" >
                                                            <input style="padding-left:20px;" class="form-control"  style="width:100%;" id="inputdate20"
                                                             placeholder="MM/DD/YYYY" type="text" autocomplete="off"
                                                            value="<?php echo $row['datereceived']?>" readonly/>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="col-sm-6">
                                                <!-- Information Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 5px;">
                                                <label class="col-md-12"> Information : </label>
                                                <div class="col-md-12">
                                                    <input style="padding-left:20px;" class="form-control"  style="width:100%;" 
                                                        name="information" type="text" autocomplete="off"
                                                        value="<?php echo $row['information']?>" readonly/>
                                                </div>
                                            </div> 
                                                <!-- Implementation Date Delete Report Modal -->
                                            <div style="display:;" class="form-group"style="padding: 10px 5px;">
                                                <label class="col-md-12"> Implementation Date : </label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" value="<?php echo $row['implementationdate']?>"readonly> 
                                                </div>
                                            </div> 
                                                <!-- Remarks Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 10px;">
                                                <label class="col-md-12">Remarks : </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="remarks"   class="form-control form-control-line" value="<?php echo $row['remarks']?>"readonly> 
                                                </div>
                                            </div>
                                                <!-- Date Processed Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 10px; display:none;">
                                                <label class="col-md-12">Date Processed </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="date_processed" class="form-control form-control-line" value="<?php echo $row['dateprocessed']?>"readonly>  
                                                </div>
                                            </div>
                                                <!-- password Confirmation Delete Report Modal -->
                                            <div class="form-group"style="padding: 0px 10px;">
                                                <label class="col-md-12">Enter your password to officially delete the data </label>
                                                <div class="col-md-12">
                                                    <input type="password" name="pass_word" class="form-control form-control-line" required> 
                                                    </div>
                                                </div>
                                            </div><!-- Second Column -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                                        <input type="submit" value="Delete Data" style="background-color:#008d61;color:white;"  name="submit" 
                                                class="fcbtn btn btn-outline btn-primary btn-1f">
                                    </div>
                                </div>
                            </form> <!-- form end-->
                         </div>
                     </div>
                    <?php 
                } ?>
                    <!-- delete Report Modal end -->
    <!--*********************************
                 MAIN CONTENT
      *********************************** -->
    <section id="main-content" >
      <section class="wrapper">
                    <!-- NOTIFICATION SUCCESS -->
                <div class="success show " id="stat" style="background-color: rgb(106,168,126);  "  >
                    <span class="check"><i class="fa fa-check-circle"></i></span>
                    <span class="msg" > Success: Record added Successfully!</span>
                </div> 
                    <!-- NOTIFICATION FAILED -->
                <div class="unsuccess show " id="stat" style="background-color: rgb(255,204,203);  "  >
                    <span class="check"><i class="fa fa-times"></i></span>
                    <span class="msg" style="font-size:13px"> Failed: Record not added!</span>
                </div> 

            <div class="row ">
                <div class="col-sm-12">
                    <div style="background-color:white; padding:20px;">
                        <h3 class="box-title m-b-0" style="padding-bottom:15px;">Master Control Request Record</h3>
                        <div class="table-responsive" style="display:;"id="singletable">
                            <table id="myTable5" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;" >                                   
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">ID</th>
                                        <th style="text-align:center;">Request Number</th>
                                        <th style="text-align:center;">Department - Section </th>
                                        <th style="text-align:center;">Information</th>
                                        <th style="text-align:center;">Implementation Date</th>
                                        <th style="text-align:center; padding-right:30px; padding-left:30px; ">Actions</th> 
                                    </tr>
                                </thead>
                                <tbody style="text-align:center;">
                                    <?php  
                                        $count=0;
                                        $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcrequestrecord] ORDER BY ID DESC"; // sql for server
                                        $stmt = sqlsrv_query( $conn, $sql ); 
                                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                                        {
                                                $count++;?>
                                    <tr>
                                        <td style="text-align:center;"><?php echo $count;?></td>
                                        <td><?php echo $row['requestnumber'];?></td>
                                        <td><?php echo $row['department-section']; ?></td>
                                        <td><?php echo $row['information']; ?></td>
                                        <td><?php echo $row['implementationdate']; ?></td>
                                        <td>
                                            <div class="row">
                                                <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="Edit Request">
                                                <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " style="color:white"aria-hidden="true"></span></a>
                                                </button>
                                                <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Request" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
                                                <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>"  class="btn btn-xs dt-delete" style="background-color:#008D61; color:white" title="Delete Request">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }
                                    ?>
                                </tbody>  
                                        
                            </table>
                        </div>
                    </div>
                </div> 
            </div> <!-- div class="row"-->
      </section><!-- WRAPPER -->
    </section><!-- MAIN-CONTENT -->  
                        </div>
                    </div>
                </div>
                <footer class="footer text-center" style="color:#008d61;">Copyright &copy; <?php echo date("Y"); ?> Request Monitoring System. All Rights Reserved</footer>
            </div><!-- End Page Content -->
        </div>  <!-- End Wrapper -->
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
                        <form action="../logout.php">
                            <button type="submit"  class="btn btn-success btn-outline">Yes, Log out</button>
                            <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">No, Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Logout Modal -->
        
        <script src="../assets/jquery.min.js"></script><!-- jQuery -->
        <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
        <script src="../assets/sidebar-nav.min.js"></script><!-- Menu Plugin JavaScript -->
        <script src="../assets/js/jquery.slimscroll.js"></script><!--slimscroll JavaScript -->
        <script src="../assets/js/custom.min.js"></script><!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="../datepicker/datepicker.js"></script>
        <link rel="stylesheet" href="../datepicker/datepicker.css"/>
        <script type="text/javascript" src="../js/toastr.js"></script>
        <script type="text/javascript" src="../js/jquery_toast.js"></script>
        <script type="text/javascript" src="../js/toaster.js"></script>
        <link href="../lib/toast-master/css/jquery.toast.css" rel="stylesheet"><!-- Toast CSS -->
        <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
             <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script>
     function success()
     {
        $.toast(
        {
            heading: 'Successfully Updated',
            text: "The data has been succesfully updated",
            position: 'top-right',
            loaderBg: '#247f34',
            icon: 'success',
            hideAfter: 4000,
            bgColor:'#2b993e',
            stack: false
        });
            <?php $_SESSION['Confirmation'] = '';?>
    }
    function incorrect()
    {
        $.toast(
        {
            heading: 'Unable to Delete',
            text: "The password is incorrect.",
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
        });
            <?php $_SESSION['Confirmation'] = '';?>
    }
    function deleted()
    {
        $.toast(
        {
            heading: 'Successfully Deleted',
            text: "The data has been succesfully deleted",
            position: 'top-right',
            loaderBg: '#247f34',
            icon: 'success',
            hideAfter: 4000,
            bgColor:'#2b993e',
            stack: false
        });
            <?php $_SESSION['Confirmation'] = '';?>
    }
    $(document).ready(function()
    {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#myTable4').DataTable();
        $('#myTable5').DataTable();
        $('#myTable6').DataTable();
        $('#myTable7').DataTable();
        $('#myTable8').DataTable();
        $(document).ready(function() 
        {
            var table = $('#example').DataTable(
            {
                "columnDefs": [
                {
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings)
                 {
                    var api = this.api();
                    var rows = api.rows(
                    {
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, 
                    {
                        page: 'current'
                    }).data().each(function(group, i) 
                    {
                        if (last !== group) 
                        {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function()
             {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc')
                {
                    table.order([2, 'desc']).draw();
                } else
                {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $(document).ready(function()
    {
      var date_input=$('input[name="impdate"]'); //our date input has the name "inputdatereg"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker(
          {
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
            autoclose: true,
            endDate:"0m",
		  });
    });
    $(document).ready(function()
    {
      var fordatereq=0;
      var fordaterec=0;
      $('input[name="daterequested"]').datepicker(
      {
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      }).on("changeDate", function (e) 
      {
        fordatereq=this.value;
        if(fordatereq>fordaterec)
        {
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          fordatereq=0;
          fordaterec=0; 
          $.toast(
          {
            heading: 'ERROR',
            text: 'The date requested must be earlier than the date received',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
          });   
        }
      });
    
		var date_input=$('input[name="datereceived"]'); //our date input has the name "inputdatereg"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker(
        {
            format: 'yyyy/mm/dd',
            showAnim:'slideDown',
			container: container,
			todayHighlight: true,
            autoclose: true,
            endDate:"0m",
		}).on("changeDate", function (e)
        {
         fordaterec = this.value;
        if(fordatereq==0)
        {
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          $.toast(
          {
            heading: 'ERROR',
            text: 'Please fill in the date requested first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordatereq>fordaterec)
        {     
          document.getElementById("inputdate20").value="";  
          $.toast({
            heading: 'ERROR',
            text: 'The date requested must be earlier than the date received',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
          }
        });
    });
    </script>
    </body>
</html>
