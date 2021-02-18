<!DOCTYPE html>
<?php
  require_once('referencesession.php'); // ALL THE DATA
    session_start();
    // if(empty($_SESSION['userid'])){
    //   header("Location:login.php");
    // }
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
        <link href="lib/toast-master/css/jquery.toast.css" rel="stylesheet"><!--   CSS -->
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
                        <li><a href="index.php" class="waves-effect active "><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="addrequest.php" class="waves-effect "><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-file-find"></i><span class="hide-menu">&emsp;Search and Update<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="srr-request.php" class="waves-effect "><span class="hide-menu">System Revision Requests</span></a> </li>
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
                            <h4 class="page-title">Add Request</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="home.php">Home</a></li>
                                <li class="active">Add Request </li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="white-box"> -->
                                <!-- <h3 class="box-title">Blank Starter Page</h3>  -->
        <!--NEW DATA-->
                <div class="row ">
                 <div class="myform col-sm-12" >
                  <div class="wrapper1" id="wrap1">
          <!-- divs form header -->
            <div class="title1" id="DEF">REQUEST FORM</div>
            <div class="title1" id="QAD1" style="display:none;">QAD REQUEST</div>
            <div class="title1" id="LAS1"style="display:none;">LASYS REQUEST</div>
            <div class="title1" id="NON1"style="display:none;">NON-LASYS REQUEST</div>
            <div class="title1" id="PAD1"style="display:none;">PAD REQUEST</div>
            <div class="title1" id="MCUR" style="display:none;">MC NEW USER REGISTRATION</div>
            <div class="title1" id="MCRC"style="display:none;">MC REGISTRATION CHANGE/CANCELLATION </div>
            <div class="title1" id="MCRR"style="display:none;">MC REQUEST RECORD</div>
            <div class="title1" id="MCPR"style="display:none;">MC PASSWORD REQUEST </div>
          <!-- divs form header -->
          <div class="form">
            <form action="database/addformprocess.php" method="POST" enctype="multipart/form-data">
              <!-- div reference and batch upload -->
              <div class="col-lg-12 reference-num" style="text-align:center; margin-bottom:20px; margin-top:-20px; ">
                <div class="col-sm-10 ref-num">  
                  <h1 id="referencenumber" style="text-decoration:underline;" >*-***-**-***</h1>
                  <label>Reference Number</label>
                    </div>
                <div class="col-sm-2" id="batch" style="margin-top:20px; color:grey; margin-left:-50px;display:none;">
                  <div class="icon-list-demo">
                    <a data-toggle="modal" data-target="#exampleModal" ><span >
                    <i class="fa fa-folder-open batch"  style="font-size:60px;color:grey;" ></i>
                    </span><span style="color:grey;"> Batch Upload </span></a>
                      </div> 
                    </div>
              </div>
                    <!--** first col **-->
            <div class="col-lg-6">
                    <!--selector -->
                <label >Please select the applicable form: </label>   
                  <div class="inputfield">
                    <select class="form-control " name="selector" 
                      style="input:focus; border: 1px solid#008D61;" id="sel1" onchange="select()" required>
                        <option value="">SELECT</option>
                        <option value="QAD">QAD REQUEST</option>
                        <option value="LAS">LASYS REQUEST</option>
                        <option value="NON">NON-LASYS REQUEST </option>
                        <option value="PAD">PAD REQUEST</option>
                        <option value="MCUR">MC NEW USER REGISTRATION</option>
                        <option value="MCRC">MC REGISTRATION CHANGE/CANCELATION</option>
                        <option value="MCRR">MC REQUEST RECORD</option>
                        <option value="MCPR">MC PASSWORD REQUEST</option>
                        </select>
                      </div>
                     <!-- requestor -->
                  <div id="requestor" class="margin">
                    <label >Requestor : </label>   
                      <div class="inputfield">
                        <input type="text" id="inputrequestor" name="requestor" class="input" >
                      </div>  
                  </div> <!-- department -->
                  <div id="department" class="margin">
                    <label>Department - Section : </label>
                      <div class="inputfield">
                        <!-- <input type="text" id="inputdepartment" name="department" class="input" > -->
                        <select class="form-control " name="department" onchange="dept()"
                    data-toggle="tooltip"data-delay="{'show:50', 'hide:3000'}" data-placement="left"
                     title="When you add a new user the page will be refreshed."
                      style="input:focus; padding: 5px;border: 1px solid#008D61;" id="inputdepartment" >
                             <option selected disabled></option>
                             <?php          
                    $sql = "SELECT DISTINCT(Department) FROM [requestmonitoring].[dbo].[deptandsec] "; // sql for server
                    $stmt = sqlsrv_query( $conn, $sql ); 
                       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                      <option value="<?php echo $row['Department'] ?>"><?php echo $row['Department'] ?></option>
                       <?php    
                         }
                    ?>
                      <option value="NEW">Add User</option>
                        </select>
                      </div>  
                  </div>
        
                 
                    <!-- nature of request -->
                  <div id="nor" class="margin" >
                    <label>Nature of Request : </label>
                      <div class="inputfield">
                        <input  type="text " id="inputnor" name="nor"  class="input" >
                      </div> 
                  </div> 
                    <!-- system username -->
                  <div style="display:none" id="systemusername" class="margin">
                    <label>System Username : </label>
                      <div class="inputfield">
                        <input type="text" id="inputsysusername" name="sysusername" class="input" >
                      </div> 
                  </div>
                  <!--systemuser-->
                  <div style="display:none" id="systemuser" class="margin">
                    <label>System User : </label>
                      <div class="inputfield">
                        <input type="text" id="inputsysuser" name="sysuser" class="input" >
                      </div> 
                  </div>
                    <!-- CALENDAR -->
                <div class="row margin" >
                    <!-- date requested -->
                  <div class="col-lg-6" id="date1">
                    <label>Date Requested :</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                          <div class="input-size">
                            <input class="form-control" style="width:100%;" id="inputdate10"
                            name="daterequested" placeholder="YYYY/MM/DD" type="text"autocomplete="off"/>
                          </div> 
                      </div>  
                  </div>

                  <div class="col-lg-6" id="date2" >
                    <label>Date Received : </label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;" id="inputdate20"
                          name="datereceived" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
                      </div>
                  </div>
                </div><!-- END CALENDAR -->
                    <!-- details -->
                  <div id="details" class="margin" >
                    <label style="padding-top:10px;">Details : </label>
                      <div class="inputfield"   >
                        <textarea style="height:100px;" id="inputdetails" type="text" name="details"  
                          class="input" ></textarea>
                      </div>  
                  </div> 
                </div> <!--** first col **-->

                <!--** second col **-->
              <div class="col-lg-6" >
                    <!-- user type -->
                  <div style=" display:none;" id="usertype">
                    <label>User Type : </label>
                      <div class="inputfield">
                        <input type="text" id="inputusertype" name="usertype" class="input">
                      </div> 
                  </div>
                    <!-- date registered -->
                  <div style="display:none;" id="datereg" class="margin" > 
                      <label>Date Registered : </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;" name="inputdatereg" id="inputdatereg"
                           placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
                      </div>
                  </div>
                    <!-- info card releease date  -->
                  <div style="display:none;" id="infocard" class="margin">
                    <label>Info Card Release Date : </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;"  id="inputinfocard"
                          name="infocard" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
                      </div>
                  </div>
                    <!-- reason for application -->
                  <div style="display:none;" id="reapp" class="margin" >
                    <label >Reason for Application : </label>
                      <div class="inputfield">
                        <textarea style="height:100px;" type="text" 
                        name="reasonforapp"  id="inputreapp" class="input"></textarea>
                      </div>
                  </div>
                    <!-- reason for application -->
                  <div style="display:none;" id="datereset" class="margin" >
                    <label>Date Reset : </label>
                      <div class="inputfield">
                        <input type="text" id="inputdatereset" name="datereset" class="input" >
                      </div> 
                  </div>
                  <!--date change-->
                  <div style="display:none;" id="datechan" class="margin" >
                    <label>Date Change/Cancelled : </label>
                      <div class="inputfield">
                        <input type="text" id="inputdatechan" name="datecan" class="input" >
                      </div> 
                  </div>
                    <!-- information -->
                  <div style=" display:none;" id="information" class="margin"  >
                    <label>Information : </label>
                      <div class="inputfield">
                        <input type="text" id="inputinformation"name="information" class="input">
                      </div> 
                  </div>
                    <!-- inplementation date -->
                  <div style="display:none;" id="impdate" class="input">
                    <label>Implementation Date: </label>
                      <div class="inputfield">
                        <input type="text"id="inputimpdate" name="impdate" class="input" >
                      </div> 
                  </div>
                    <!-- QAD LASYS NONLASYS PAD COLUMN 2 -->
                      <!-- calendar -->
                  <div class="row">
                    <div class="col-lg-6" id="date3">
                      <label>Date Approved :</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;" id="inputdate3"
                           name="dateapproved" placeholder="YYYY/MM/DD" type="text"autocomplete="off"/>
                        </div> 
                      </div>
                  </div>
                      
                    <div class="col-lg-6" id="date4">
                      <label>Date done : </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <div class="input-size">
                            <input class="form-control"  style="width:100%;" id="inputdate4"
                             name="datedone" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                          </div> 
                        </div>
                    </div>
                  </div>
            <!-- **** end calendar *** -->
                      <!-- accomplished by -->
                    <div style="margin-top:15px;" id="accomp">
                    <label>Accomplished By : </label>
                   
                      <div class="inputfield">
                    <select class="form-control " name="accb" onchange="accomp()"
                    data-toggle="tooltip"data-delay="{'show:50', 'hide:3000'}" data-placement="left"
                     title="When you add a new user the page will be refreshed."
                      style="input:focus; padding: 5px;border: 1px solid#008D61;" id="inputaccomp" >
                             <option selected disabled></option>
                             <?php          
                    $sql = "SELECT accomplishedby as users FROM [requestmonitoring].[dbo].[users] "; // sql for server
                    $stmt = sqlsrv_query( $conn, $sql ); 
                       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                      <option value="<?php echo $row['users'] ?>"><?php echo $row['users'] ?></option>
                       <?php    
                         }
                    ?>
                      <option value="NEW">Add User</option>
                        </select>
                      </div>
                    </div>
                      <!-- remarks -->
                    <div class="margin" id="remarks">
                      <label>Remarks :</label>
                        <div class="inputfield">
                          <input type="text"  name="remarks" id="inputremarks" class="input" >
                        </div> 
                    </div>
                      <!-- Cancel/Delayed -->
                    <div class="margin" id="candel">
                      <label>If Cancel/Delayed Reason :</label>
                        <div class="inputfield">
                          <input type="text" id="inputcandel" name="canc" class="input" >
                        </div> 
                    </div>
                      <!-- Attachment -->
                    <div class="margin" id="attach">
                      <label>Attachment :</label>
                        <div class="inputfield">
                          <input type="file" id="inputattach"  name="atta" class="input" >
                        </div> 
                    </div>
                      <!-- Submit button -->
                    <div class="col-lg-7" style="text-align:center; margin-left:80px;">
                      <div class="inputfield"style="padding-top:30px; ">
                        <input type="submit" value="SUBMIT"  name="submit" 
                        class="fcbtn btn btn-outline btn-primary btn-1f">
                      </div>
                    </div>
                </div><!--** second col **-->
              </form><!-- form-->
            </div> <!-- div class="form"-->
            </div> <!-- div class="wrapper1"-->
        </div> <!-- div class="myform col-sm-12"-->
      </div> <!-- div class="row"-->
                <!--NEW DATA-->
                            </div>
                        </div>
                    <!-- </div> -->
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
        <!-- js placed at the end of the document so the pages load faster -->
        <!-- <script src="lib/jquery/jquery.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="lib/jquery.scrollTo.min.js"></script>
        <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="lib/jquery.sparkline.js"></script>
        <!--common script for all pages-->
        <script src="lib/common-scripts.js"></script>
        <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="lib/gritter-conf.js"></script>
        <!--script for this page-->
        <script src="lib/sparkline-chart.js"></script>
        <script src="lib/zabuto_calendar.js"></script>
        <!-- <script src="js/hide.js"></script> -->
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script type="text/javascript" src="js/toastr.js"></script>
        <script type="text/javascript" src="js/jquery_toast.js"></script>
        <script type="text/javascript" src="js/toaster.js"></script>
        <!-- for datepicker -->
        <link rel="stylesheet" href="datepicker/datepicker.css"/>
        <script type="text/javascript" src="js/mydatepicker.js"></script>
        <script type="text/javascript" src="datepicker/datepicker.js"></script>
        <!--Original Template-->
        <script src="assets/jquery.min.js"></script>
        <!-- jQuery -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
        <script src="assets/sidebar-nav.min.js"></script><!-- Menu Plugin JavaScript -->
        <script src="assets/js/jquery.slimscroll.js"></script><!--slimscroll JavaScript -->
        <script src="assets/js/custom.min.js"></script><!-- Custom Theme JavaScript -->
        <!-- End of Original Template-->

        <script type="application/javascript">
           
            function err(){
              $.toast({
                    heading: 'ERROR',
                    text: 'Data already in the list',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'warning',
                    hideAfter: 4000,
                    bgColor:'#fc050d',
                    stack: false
                    });   
              }
            function myNavFunction(id) {
              $("#date-popover").hide();
              var nav = $("#" + id).data("navigation");
              var to = $("#" + id).data("to");
              console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
              }
            function success(){
              document.getElementById("stat").style.display="";
                  $('.success').addClass("show");
                  $('.success').addClass("alert");
                  $('.success').removeClass("qwe");
                  setTimeout(function(){
                  $('.success').removeClass("show");
                  $('.success').addClass("qwe");
                  }, 4000);
                  //onclick
                  $('.cross').on('click',function(){
                  $('.success').removeClass("show");
                  $('.success').addClass("qwe");
                  <?php $_SESSION['status'] = '';?>
                  });
              }
            function unsuccess(){
                document.getElementById("stat1").style.display="";
                $('.unsuccess').addClass("show");
                $('.unsuccess').addClass("alert");
                $('.unsuccess').removeClass("qwe");
                setTimeout(function(){
                $('.unsuccess').removeClass("show");
                $('.unsuccess').addClass("qwe");
                }, 4000);
                //onclick
                $('.cross').on('click',function(){
                $('.unsuccess').removeClass("show");
                $('.unsuccess').addClass("qwe");
                <?php $_SESSION['status'] = '';?>
                });
              }

            function invalid(){
              document.getElementById("stat2").style.display="";
                $('.invalid').addClass("show");
                $('.invalid').addClass("alert");
                $('.invalid').removeClass("qwe");
                setTimeout(function(){
                $('.invalid').removeClass("show");
                $('.invalid').addClass("qwe");
                }, 4000);
                //onclick
                $('.cross').on('click',function(){
                $('.invalid').removeClass("show");
                $('.invalid').addClass("qwe");
                <?php $_SESSION['status'] = '';?>
                });
              }

        </script>
           <script>
              function accomp(){
                var data = document.getElementById("inputaccomp").value;
                if(data=="NEW"){
                  $('#modaladduser').modal('show');
                }
                
              }
              function dept(){  
                var dept = document.getElementById("inputdepartment").value;
                if(dept=="NEW"){
                  $('#modaladddept').modal('show');
                }
              
              }
              function select(){
                var x = document.getElementById("sel1").value;
                if(x=="QAD"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFQAD']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                document.getElementById("requestor").style.display="";
                  // document.getElementById("section").style.display="";
                document.getElementById("department").style.display="";
                document.getElementById("nor").style.display="";
                document.getElementById("systemusername").style.display="NONE";
                document.getElementById("systemuser").style.display="NONE";
                document.getElementById("date1").style.display="";
                document.getElementById("date2").style.display="";
                document.getElementById("details").style.display="";
                document.getElementById("batch").style.display="NONE";
                        

                  document.getElementById("date3").style.display="";
                  document.getElementById("date4").style.display="";
                  document.getElementById("accomp").style.display="";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";
                        
                  
                  document.getElementById("QAD1").style.display="";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="LAS"){//for lasys
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFLA']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="";
                  document.getElementById("systemusername").style.display="NONE";
                  document.getElementById("systemuser").style.display="NONE";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="";
                  document.getElementById("date4").style.display="";
                  document.getElementById("accomp").style.display="";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="NON"){//for non lasys
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFNON']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="";
                  document.getElementById("systemusername").style.display="NONE";
                  document.getElementById("systemuser").style.display="NONE";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="";
                  document.getElementById("date4").style.display="";
                  document.getElementById("accomp").style.display="";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                          
                }else if(x=="PAD"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFPAD']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="";
                  document.getElementById("systemusername").style.display="NONE";
                  document.getElementById("systemuser").style.display="NONE";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="";
                  document.getElementById("date4").style.display="";
                  document.getElementById("accomp").style.display="";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="MCUR"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFNEW']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputsysuser").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";
                                        

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="NONE";
                  document.getElementById("systemusername").style.display="";
                  document.getElementById("systemuser").style.display="";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="NONE";
                  document.getElementById("batch").style.display="";

                  document.getElementById("date3").style.display="NONE";
                  document.getElementById("date4").style.display="NONE";
                  document.getElementById("accomp").style.display="NONE";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="NONE";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="";
                  document.getElementById("datereg").style.display="";
                  document.getElementById("infocard").style.display="";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="MCRC"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFREGCHA']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="NONE";
                  document.getElementById("systemusername").style.display="";
                  document.getElementById("systemuser").style.display="";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="NONE";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="NONE";
                  document.getElementById("date4").style.display="NONE";
                  document.getElementById("accomp").style.display="NONE";
                  document.getElementById("remarks").style.display="NONE";
                  document.getElementById("candel").style.display="NONE";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="";
                  document.getElementById("datechan").style.display="";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="MCRR"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFREQ']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="NONE";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="NONE";
                  document.getElementById("systemusername").style.display="NONE";
                  document.getElementById("systemuser").style.display="NONE";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="NONE";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="NONE";
                  document.getElementById("date4").style.display="NONE";
                  document.getElementById("accomp").style.display="NONE";
                  document.getElementById("remarks").style.display="NONE";
                  document.getElementById("candel").style.display="NONE";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="";
                  document.getElementById("impdate").style.display="";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="";
                  document.getElementById("MCPR").style.display="NONE";
                }else if(x=="MCPR"){
                  document.getElementById("referencenumber").innerHTML="<?php echo $_SESSION['REFPAS']?>";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputsysuser").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="NONE";
                  document.getElementById("systemusername").style.display="";
                  document.getElementById("systemuser").style.display="";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="NONE";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="NONE";
                  document.getElementById("date4").style.display="NONE";
                  document.getElementById("accomp").style.display="NONE";
                  document.getElementById("remarks").style.display="NONE";
                  document.getElementById("candel").style.display="NONE";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="";
                  document.getElementById("datechan").style.display="none";
                  document.getElementById("datereset").style.display="";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="NONE";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="";
                }else {
                  document.getElementById("referencenumber").innerHTML="**-**-**-****";
                  document.getElementById("inputrequestor").value="";
                  document.getElementById("inputremarks").value="";
                    // document.getElementById("inputsection").value=""; 
                  document.getElementById("inputdepartment").value="";
                  document.getElementById("inputnor").value="";
                  document.getElementById("inputsysusername").value="";
                  document.getElementById("inputdate10").value="";
                  document.getElementById("inputdate20").value="";
                  document.getElementById("inputdetails").value="";
                  document.getElementById("inputdate3").value="";
                  document.getElementById("inputdate4").value="";
                  document.getElementById("inputaccomp").value="";
                  document.getElementById("inputcandel").value="";
                  document.getElementById("inputattach").value="";
                  document.getElementById("inputusertype").value="";
                  document.getElementById("inputdatereg").value="";
                  document.getElementById("inputinfocard").value="";
                  document.getElementById("inputreapp").value="";
                  document.getElementById("inputdatechan").value="";
                  document.getElementById("inputdatereset").value="";
                  document.getElementById("inputinformation").value="";
                  document.getElementById("inputimpdate").value="";

                  document.getElementById("requestor").style.display="";
                  //  document.getElementById("section").style.display="";
                  document.getElementById("department").style.display="";
                  document.getElementById("nor").style.display="";
                  document.getElementById("systemusername").style.display="NONE";
                  document.getElementById("systemuser").style.display="NONE";
                  document.getElementById("date1").style.display="";
                  document.getElementById("date2").style.display="";
                  document.getElementById("details").style.display="";
                  document.getElementById("batch").style.display="NONE";

                  document.getElementById("date3").style.display="";
                  document.getElementById("date4").style.display="";
                  document.getElementById("accomp").style.display="";
                  document.getElementById("remarks").style.display="";
                  document.getElementById("candel").style.display="";
                  document.getElementById("attach").style.display="";

                  document.getElementById("usertype").style.display="NONE";
                  document.getElementById("datereg").style.display="NONE";
                  document.getElementById("infocard").style.display="NONE";
                  document.getElementById("reapp").style.display="NONE";
                  document.getElementById("datechan").style.display="NONE";
                  document.getElementById("datereset").style.display="NONE";
                  document.getElementById("information").style.display="NONE";
                  document.getElementById("impdate").style.display="NONE";
                  document.getElementById("DEF").style.display="";

                  document.getElementById("QAD1").style.display="NONE";
                  document.getElementById("LAS1").style.display="NONE";
                  document.getElementById("NON1").style.display="NONE";
                  document.getElementById("PAD1").style.display="NONE";
                  document.getElementById("DEF").style.display="  ";
                  document.getElementById("MCUR").style.display="NONE";
                  document.getElementById("MCRC").style.display="NONE";
                  document.getElementById("MCRR").style.display="NONE";
                  document.getElementById("MCPR").style.display="NONE";
                }
              
              }
              </script>

    
    </body>
</html>
