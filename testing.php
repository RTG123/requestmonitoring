<!DOCTYPE html>
<?php
    // Name of the module : adminSRR_Requests.php
    // Module creation date : 01/21/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module handles the update for System Revision Request for admin as a Usertype
  require_once('FOLDERS/SES/SESADMIN.php'); // Connection for admin
  require_once('referencesession.php'); // reference session for admin as a usertype   
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
        <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                                <li role="separator" class="divider"></li>
                                <li><a href="adminaccountsetting.php"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
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
                            <div><a href="adminmyprofile.php"><img src="images/<?php echo $_SESSION['Profile_pic']?>" alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['First_name']." ".$_SESSION['Last_name'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['User_type']?></small</h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li><a href="admin.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="admin1.php" class="waves-effect"><i class="mdi mdi-clipboard-outline fa-fw"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-folder-multiple-outline"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                          <ul class="nav nav-second-level">
                                <li> <a href="adminSRR_Requests.php" class="waves-effect active"><span class="hide-menu">System Revision Request</span></a> </li>
                                <li> <a href="adminMCNewUser_Requests.php" class="waves-effect"><span class="hide-menu">Mc New User Request</span></a> </li>
                                <li> <a href="adminMCChange_Requests.php" class="waves-effect"><span class="hide-menu">Mc Registration Change & Cancellation</span></a> </li>
                                <li> <a href="adminMCPassword_Requests.php" class="waves-effect "><span class="hide-menu">Mc Password Reset</span></a> </li>
                                <li> <a href="adminMCRequest_Requests.php" class="waves-effect "><span class="hide-menu">Mc Request Record</span></a> </li>
                            </ul>
                        </li>
                        <li><a href="adminactivitylogs.php" class="waves-effect"><i class="mdi mdi-account-check"></i><span class="hide-menu">&emsp;Activity Logs</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect" data-toggle="modal" data-target="#logoutModal"><i class="mdi mdi-logout fa-fw"></i><span class="hide-menu">&emsp;Log out</span></a></li>
                    </ul>
                </div>
            </div>
                <!-- End Left Side Navigation -->
            <!-- ⭐⭐⭐ End Navabar and Side Bar⭐⭐⭐ -->
            
            <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
            <div id="page-wrapper">
              <div class="container-fluid">
                <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Search and Update</h4> 
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                      <li><a href="index.php">Home</a></li>
                      <li class="active">Search and Update</li>
                    </ol>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-12">
      <!--*********************************
                 Modals
      *********************************** -->
      <!-- View Report Modal -->
      <?php  
         $sql = "SELECT * FROM requestmonitoring.dbo.qadlog UNION
                  SELECT * FROM requestmonitoring.dbo.lasyslog UNION
                  SELECT * FROM requestmonitoring.dbo.nonlasyslog UNION
                  SELECT * FROM requestmonitoring.dbo.padlog ;
                  ";// sql for server
        $stmt = sqlsrv_query( $conn, $sql ); 
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
        {
      ?>
      <div class="modal fade"  id="viewreportModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Modal Body Content -->
                      <p><?php echo $row['requestnumber']?></p>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Date Requested  : </label>
                        <div class="col-md-12">
                          <input  id="date_requested<?php echo $row['requestnumber']?>"  type="text" name="date_requested"  class="form-control form-control-line" value="<?php echo $row['daterequested'] ?>"  onchange="test('<?php echo $row['requestnumber']?>')"> 
                        </div>
                      </div>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Date Received : </label>
                        <div class="col-md-12">
                          <input  id="date_received<?php echo $row['requestnumber']?>"  type="text" name="date_received" class="form-control form-control-line" value="<?php echo $row['datereceived'] ?>"  onchange="test('<?php echo $row['requestnumber']?>')"> 
                        </div>
                      </div>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Date Approved  : </label>
                        <div class="col-md-12">
                          <input  id="date_approved<?php echo $row['requestnumber']?>"  type="text" name="date_approved"  class="form-control form-control-line" value="<?php echo $row['dateapproved'] ?>"  onchange="test('<?php echo $row['requestnumber']?>')"> 
                        </div>
                      </div>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Date Done : </label>
                        <div class="col-md-12">
                          <input  id="date_done<?php echo $row['requestnumber']?>"  type="text" name="date_done" class="form-control form-control-line" value="<?php echo $row['datedone'] ?>"  onchange="test('<?php echo $row['requestnumber']?>')"> 
                        </div>
                      </div>
                      <!-- Modal Body Content End  -->
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                      <input type="submit" value="Delete Data" style="background-color:#008d61;color:white;"  name="submit" 
                          class="fcbtn btn btn-outline btn-primary btn-1f">
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } ?>
              <!-- View Report Modal end -->
               <!-- EDIT MODAL -->
     <?php  
      $sql = "SELECT * FROM requestmonitoring.dbo.qadlog UNION
              SELECT * FROM requestmonitoring.dbo.lasyslog UNION
              SELECT * FROM requestmonitoring.dbo.nonlasyslog UNION
              SELECT * FROM requestmonitoring.dbo.padlog ;";// sql for server
              $stmt = sqlsrv_query( $conn, $sql ); 
              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
              {
        ?>
      <div class="modal fade"  id="exampleModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $row['requestnumber']?></p>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Added by: </label>
                        <div class="col-md-12">
                          <input  id="addedby0"  type="text" name="addedby" class="form-control form-control-line" value="<?php echo $row['userid']?>"> 
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
      </div>
      <?php 
      } ?>
        <!-- EDIT Modal end -->
        <!--delete Report Modal -->
      <?php  
        $sql = "SELECT * FROM requestmonitoring.dbo.qadlog UNION
                  SELECT * FROM requestmonitoring.dbo.lasyslog UNION
                  SELECT * FROM requestmonitoring.dbo.nonlasyslog UNION
                  SELECT * FROM requestmonitoring.dbo.padlog ;
                  ";// sql for server
        $stmt = sqlsrv_query( $conn, $sql ); 
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
        {
      ?>
      <div class="modal fade"  id="deletereportModal<?php echo $row['requestnumber']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $row['requestnumber']?></p>
                      <div class="form-group"style="padding: 0px 5px;" >
                        <label class="col-md-12"> Added by: </label>
                        <div class="col-md-12">
                          <input  id="addedby0"  type="text" name="addedby" class="form-control form-control-line" value="<?php echo $row['userid']?>"> 
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
      <?php
     } ?>
    <!--*********************************
                 MAIN CONTENT
      *********************************** -->
    <section id="main-content">
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
            <div  style="padding-bottom:15px;background-color:white; padding:20px;">
              <h3 class="box-title m-b-0" style="padding-bottom:20px;">System Revision Request </h3>
              <div style="margin-left:25%;margin-right:25%;margin-bottom:30px;">
                    <!--selector -->
                <label >Please select the applicable form: </label>  
                <div class="inputfield">
                  <select class="form-control " name="selector" 
                    style="input:focus; border: 1px solid#008D61;" id="sel1" onchange="select()" required>
                    <option value="default"></option>
                    <option value="QAD">QAD REQUEST</option>
                    <option value="LAS">LASYS REQUEST</option>
                    <option value="NON">NON-LASYS REQUEST </option>
                    <option value="PAD">PAD REQUEST</option>
                  </select>
                </div>
              </div> <!-- Default table -->
              <div class="table-responsive" style="display:;" id="defaulttab">
                <table id="defaultmyTable" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;" >                                   
                  <thead>
                    <tr>
                      <th style="text-align:center;">ID</th>
                      <th style="text-align:center;">Request Number</th>
                      <th style="text-align:center;">Requestor</th>
                      <th style="text-align:center;">Nature of Request</th>
                      <th style="text-align:center;">Attachment</th>
                      <th style="text-align:center;">Actions</th> 
                    </tr>
                  </thead>
                  <tbody style="text-align:center;">
                    <?php  
                          $count=0;
                          $sql = "SELECT * FROM requestmonitoring.dbo.qadlog UNION
                          SELECT * FROM requestmonitoring.dbo.lasyslog UNION
                          SELECT * FROM requestmonitoring.dbo.nonlasyslog UNION
                          SELECT * FROM requestmonitoring.dbo.padlog  ORDER BY ID desc;
                          ";// sql for server
                          $stmt = sqlsrv_query( $conn, $sql ); 
                          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                          {
                            $count++;?>
                          <tr>
                            <td style="text-align:center;"><?php echo $count;?></td>
                            <td><?php echo $row['requestnumber'];?></td>
                            <td><?php echo $row['requestor']; ?></td>
                            <td><?php echo $row['natureofrequest']; ?></td>
                            <td><?php echo $row['attachment']; ?></td>
                            <td>
                              <div class="row">
                                <!-- <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                  <a data-toggle="modal" style="color:white;" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                </button> -->
                                <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" 
                                title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span>
                                </button>
                                <!-- <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button> -->
                              </div>
                            </td>
                          </tr>
                          <?php 
                          } ?>
                    </tbody>          
                  </table>
                </div>
                      <!--QAD Table-->
                <div class="table-responsive" style="display:none;"id="tab">
                  <table id="myTable" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;" >                                   
                    <thead>
                      <tr>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Request Number</th>
                        <th style="text-align:center;">Requestor</th>
                        <th style="text-align:center;">Nature of Request</th>
                        <th style="text-align:center;">Attachment</th>
                        <th style="text-align:center;">Actions</th> 
                      </tr>
                    </thead>
                    <tbody style="text-align:center;">
                      <?php  
                        $count=0;
                        $sql = "SELECT * FROM [requestmonitoring].[dbo].[qadlog] ORDER BY ID+0 desc "; // sql for server
                        $stmt = sqlsrv_query( $conn, $sql ); 
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                        {
                          $count++;?>
                        <tr>
                          <td style="text-align:center;"><?php echo $count;?></td>
                          <td><?php echo $row['requestnumber'];?></td>
                          <td><?php echo $row['requestor']; ?></td>
                          <td><?php echo $row['natureofrequest']; ?></td>
                          <td><?php echo $row['attachment']; ?></td>
                          <td>
                            <div class="row">
                              <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                <a data-toggle="modal" style="color:white;" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                              </button>
                              <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span>
                              </button>
                              <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                              </button>
                            </div>
                          </td>
                        </tr>
                      <?php 
                      } ?>
                    </tbody>               
                  </table>
                </div>
                          <!--Lasys table-->
                <div class="table-responsive" style="display:none;"id="tab2">
                  <table id="myTable2" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;">                                   
                    <thead>
                      <tr>
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Request Number</th>
                        <th style="text-align:center;">Requestor</th>
                        <th style="text-align:center;">Nature of Request</th>
                        <th style="text-align:center;">Attachment</th>
                        <th style="text-align:center;">Actions</th> 
                      </tr>
                    </thead>
                    <tbody style="text-align:center;">
                      <?php  
                        $count=0;
                        $sql = "SELECT * FROM [requestmonitoring].[dbo].[lasyslog] order by ID desc "; // sql for server
                        $stmt = sqlsrv_query( $conn, $sql ); 
                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                        {
                          $count++;?>
                              <tr>
                                <td style="text-align:center;"><?php echo $count;?></td>
                                <td><?php echo $row['requestnumber'];?></td>
                                <td><?php echo $row['requestor']; ?></td>
                                <td><?php echo $row['natureofrequest']; ?></td>
                                <td><?php echo $row['attachment']; ?></td>
                                <td>
                                  <div class="row">
                                    <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                    <a data-toggle="modal" style="color:white;" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                    </button>
                                    <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span>
                                    </button>
                                    <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0">
                                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                        <?php
                        } ?>
                      </tbody>    
                    </table>
                  </div> 
                    <!--Non-Lasys Log-->
                  <div class="table-responsive" style="display:none;"id="tab3">
                    <table id="myTable3" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;">                                   
                      <thead>
                        <tr>
                          <th style="text-align:center;">ID</th>
                          <th style="text-align:center;">Request Number</th>
                          <th style="text-align:center;">Requestor</th>
                          <th style="text-align:center;">Nature of Request</th>
                          <th style="text-align:center;">Attachment</th>
                          <th style="text-align:center;">Actions</th> 
                        </tr>
                      </thead>
                      <tbody style="text-align:center;">
                        <?php  
                          $count=0;
                          $sql = "SELECT * FROM [requestmonitoring].[dbo].[nonlasyslog] order by ID desc"; // sql for server
                          $stmt = sqlsrv_query( $conn, $sql ); 
                          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                          {
                          $count++;?>
                        <tr>
                          <td style="text-align:center;"><?php echo $count;?></td>
                          <td><?php echo $row['requestnumber'];?></td>
                          <td><?php echo $row['requestor']; ?></td>
                          <td><?php echo $row['natureofrequest']; ?></td>
                          <td><?php echo $row['attachment']; ?></td>
                          <td>
                            <div class="row">
                              <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                <a data-toggle="modal" style="color:white;" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                              </button>
                              <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span>
                              </button>
                              <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <?php 
                        } ?>
                      </tbody> 
                    </table>
                  </div>
                    <!--PAD Log-->
                  <div class="table-responsive" style="display:none;"id="tab4">
                    <table id="myTable4" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;">                                   
                      <thead>
                        <tr>
                          <th style="text-align:center;">ID</th>
                          <th style="text-align:center;">Request Number</th>
                          <th style="text-align:center;">Requestor</th>
                          <th style="text-align:center;">Nature of Request</th>
                          <th style="text-align:center;">Attachment</th>
                          <th style="text-align:center;">Actions</th> 
                        </tr>
                      </thead>
                      <tbody style="text-align:center;">
                        <?php   
                          $count=0;
                          $sql = "SELECT * FROM [requestmonitoring].[dbo].[padlog] order by ID desc"; // sql for server
                          $stmt = sqlsrv_query( $conn, $sql ); 
                          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                          {
                          $count++;
                        ?>
                        <tr>
                          <td style="text-align:center;"><?php echo $count;?></td>
                          <td><?php echo $row['requestnumber'];?></td>
                          <td><?php echo $row['requestor']; ?></td>
                          <td><?php echo $row['natureofrequest']; ?></td>
                          <td><?php echo $row['attachment']; ?></td>
                          <td>
                            <div class="row">
                              <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                <a data-toggle="modal" style="color:white;" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                              </button>
                              <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span>
                              </button>
                              <button data-toggle="modal" data-target="#deletereportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <?php 
                         } ?>
                      </tbody>  
                    </table>
                  </div>
                </div>
              </div> 
            </div> <!-- end of div class="row"-->
          </section><!-- WRAPPER -->
        </section>
        <!--*********************************
                 MAIN CONTENT END
            *********************************** -->
      </div>
    </div>
  </div>
        <footer class="footer text-center" style="color:#008d61;">Copyright &copy; <?php echo date("Y"); ?> Request Monitoring System. All Rights Reserved
        </footer>
        </div> <!-- End Page Content -->
      </div><!-- End Wrapper -->
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
        </div> <!-- End Logout Modal -->
        
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
        <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
          <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  <script>
    function test(data)
    {
            
      var date_requested = document.getElementById("date_requested"+data);
      var date_received = document.getElementById("date_received"+data);
      var date_approved = document.getElementById("date_approved"+data);
      var date_done = document.getElementById("date_done"+data);
      console.log("Date requested : " + date_requested.value);
      console.log("Date received : " + date_received.value);
      console.log("Date approved : " + date_approved.value);
      console.log("Date done : " + date_done.value);
      if((date_requested.value>date_received.value))
      {
        date_received.value =" ";
        date_approved.value =" ";
        date_done.value =" ";
        $.toast(
        {
          heading: 'Invalid Date',
          text: "The date received value should be lesser than others dates",
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'warning',
          hideAfter: 4000,
          bgColor:'#fc050d',
          stack: false
        });
      }
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
    function invalid()
    {
      $.toast(
      {
        heading: 'Failed to update:',
        text: "You have entered an invalid data. ",
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'warning',
        hideAfter: 4000,
        bgColor:'#fc050d',
        stack: false
      });
      <?php $_SESSION['Confirmation'] = '';?>
    }
    function select()
    {
      var x = document.getElementById("sel1").value;
      if(x == "default")
      {
        document.getElementById("defaulttab").style.display="";
        document.getElementById("tab").style.display="none";
        document.getElementById("tab2").style.display="none";
        document.getElementById("tab3").style.display="none";
        document.getElementById("tab4").style.display="none";
      }else if(x=="QAD")
      {
        document.getElementById("defaulttab").style.display="none";
        document.getElementById("tab").style.display="";
        document.getElementById("tab2").style.display="none";
        document.getElementById("tab3").style.display="none";
        document.getElementById("tab4").style.display="none";
      }else if(x=="LAS")
      {//for lasys
        document.getElementById("defaulttab").style.display="none";
        document.getElementById("tab").style.display="none";
        document.getElementById("tab2").style.display="";
        document.getElementById("tab3").style.display="none";
        document.getElementById("tab4").style.display="none";
      }else if(x=="NON")
      {//for non lasys
        document.getElementById("defaulttab").style.display="none";
        document.getElementById("tab").style.display="none";
        document.getElementById("tab2").style.display="none";
        document.getElementById("tab3").style.display="";
        document.getElementById("tab4").style.display="none";
      }else if(x=="PAD")
      {
        document.getElementById("defaulttab").style.display="none";
        document.getElementById("tab").style.display="none";
        document.getElementById("tab2").style.display="none";
        document.getElementById("tab3").style.display="none";
        document.getElementById("tab4").style.display="";
      }
    }
    $(document).ready(function()
    {
      $('#defaultmyTable').DataTable();
      $('#myTable').DataTable();
      $('#myTable2').DataTable();
      $('#myTable3').DataTable();
      $('#myTable4').DataTable();
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
     
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      $('input[name="date_requested"]').datepicker(
      {
        format: 'yyyy/mm/dd',
        showAnim:'slideDown',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0d",
      });
      var date_input=$('input[name="date_received"]'); //our date input has the name "inputdatereg"
      $('input[name="date_received"]').datepicker(
      {
        format: 'yyyy/mm/dd',
        showAnim:'slideDown',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      });
        $('input[name="datedone"]').datepicker();
      $('input[name="date_approved"]').datepicker(
      {
        format: 'yyyy/mm/dd',
        showAnim:'slideDown',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0d",
      });
      var date_input1=$('input[name="datedone"]'); //our date input has the name "inputdatereg"
      $('input[name="date_done"]').datepicker(
      {
        format: 'yyyy/mm/dd',
        showAnim:'slideDown',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0d",
      });
    }); 
    </script>
   </body>
</html>
