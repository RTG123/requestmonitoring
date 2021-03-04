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

    <body class="fix-header" style="font-family:Century Gothic" onload="<?php echo $_SESSION['status'];?>">
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
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="images/<?php echo $_SESSION['profpic']?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['firstname']?></b><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="u-img"><img src="images/<?php echo $_SESSION['profpic']?>" alt="user" /></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="u-text">
                                                    <p style="font-size:14px"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></p>
                                                    <p class="text-muted" style="text-transform: uppercase;"><small><?php echo $_SESSION['usertype']?></small></p>
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
                            <div><a href="myprofile.php"><img src="images/<?php echo $_SESSION['profpic']?>" alt="user-img" class="img-circle"></a></div>
                            <h5 style="font-family:Century Gothic"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?><br><small style="text-transform: uppercase;" ><?php echo $_SESSION['usertype']?></small</h5>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li><a href="index.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">&emsp;Dashboard</span></a></li>
                        <li><a href="index1.php" class="waves-effect active"><i class="mdi mdi-clipboard-outline fa-fw"></i><span class="hide-menu">&emsp;Add Request</span></a></li>
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
            <!-- ⭐⭐⭐ END HEADER & SIDE BAR ⭐⭐⭐ -->
            
            <!-- ⭐⭐⭐ Page Content ⭐⭐⭐ -->
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
                         <!-- ⭐⭐⭐ NOTIFICATION ⭐⭐⭐-->
                            <div class="success show " id="stat" style="background-color: rgb(106,168,126);  "  >
                                <span class="check"><i class="fa fa-check-circle"></i></span>
                                    <span class="msg" > Success: Record added Successfully!</span>
                                    <!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                                    </div> 
                                    <!-- NOTIFICATION FAILED -->
                            <div class="unsuccess show " id="stat1" style="background-color: rgb(255,204,203);  "  >
                                <span class="check"><i class="fa fa-times"></i></span>
                                    <span class="msg" style="font-size:13px"> Failed: Record not added!</span>
                                    <!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                                    </div> 
                                    <!-- NOTIFICATION INVALID -->
                            <div class="invalid show " id="stat2" style="background-color: rgb(255,204,203);  "  >
                                <span class="check"><i class="fa fa-times"></i></span>
                                    <span class="msg" style="font-size:13px">Invalid data: Please check you're inputs</span>
                                    <!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                                    </div>  
                                     <!-- NOTIFICATION INVALID -->
                            <div class="invalid show " id="stat3" style="background-color: rgb(255,204,203); margin-right:10px; "  >
                                <span class="check"><i class="fa fa-times"></i></span>
                                    <span class="msg" style="font-size:13px">Error : Some data needs to be filled</span>
                                    <!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                                    </div>     
                                <!--⭐⭐⭐MODAL⭐⭐⭐-->
                                <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                            <div class="modal-header" style="background:whitesmoke">
                            <h5 class="modal-title" id="exampleModalLabel"style="padding-top:10px;text-align:center; font-size:30px; 
                            color:grey; font-family: 'Montserrat', sans-serif;">Batch Upload</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span> -->
                            </button>
                            </div>
                            <div class="modal-body"  >
                            <form action="database/batchupload.php" method="POST" enctype="multipart/form-data">
                                <div style="text-align:center;">

                                <h1 id="referencenumbe1r" style="text-decoration:underline;" ><?php echo $_SESSION['MCNUR']?></h1>
                                        <label>Reference Number</label>
                                </div>
                                <div class="row margin" >
                                <div style="margin-bottom:20px;padding-left:50px;margin-left:50px; border: 1px solid black;outline-style: solid;"
                                class="col-lg-10">
                                        <label style="margin-left:-30px; font-size:30px;">Note : </label>
                                        <h5 style="margin-left:-30px;font-size:16px;">Please rename the file that you are inserting on the attachment tab. Rename it as the Reference Number
                                        as seen above. Also please use the template below for batch data uploading.  </h5>
                                        <a style="font-size:20px;text-align:center;color: #008D61;" href="attachments/MCNewUserTemplate.xlsx" download>Master Control New Users Template.xlsx</a>
                                    </div>
                                    <div class="col-lg-12" style=" margin-bottom:30px;">
                                        <div   id="attach" >
                                            <label>Batch Data :</label>
                                            <div class="input-size">
                                                <input type="file" id="batchdata" style="padding-bottom:30px; " name="batch" class="form-control" >
                                            </div> 
                                        </div>
                                        </div>
                                        <div class="col-lg-6" >
                                    <div  id="remarks"  >
                                            <label>Requestor :</label>
                                            <div class="input-size">
                                                <input type="text"  name="requestor1" id="inputremarks" class="form-control" >
                                            </div> 
                                        </div>
                                        </div>
                                    <!-- date requested -->
                                        <div class="col-lg-6" id="date1">
                                        <label>Date Requested :</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                                <div class="input-size">
                                                <input class="form-control" style="width:100%;" id="inputdate1"
                                                name="daterequested" placeholder="YYYY/MM/DD" type="text"autocomplete="off"/>
                                                </div> 
                                            </div>  
                                        </div>
                                    

                                        <div class="col-lg-6" id="date2"  >
                                        <label>Date Received : </label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-size">
                                                <input class="form-control"  style="width:100%;" id="inputdate2"
                                                name="datereceived" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                                            </div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-6" id="date2"  >
                                        <label>Date Registered : </label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-size">
                                                <input class="form-control"  style="width:100%;" id="inputdate"
                                                name="inputdatereg" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                                            </div> 
                                            </div>
                                        </div>

                                        <div class="col-lg-6" >
                                    <div  id="remarks"  >
                                            <label>Remarks :</label>
                                            <div class="input-size">
                                                <input type="text"  name="remarks1" id="inputremarks" class="form-control" >
                                            </div> 
                                        </div>
                                        </div>
                                        
                                        <div class="col-lg-6" >
                                        <div   id="attach"  >
                                            <label>Attachment :</label>
                                            <div class="input-size">
                                                <input type="file" id="inputattach1" style="padding-bottom:30px; " name="atta" class="form-control" >
                                            </div> 
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"style="background:#008D61;">Submit</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                <!-- END MODAL -->
                <div class="modal fade" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"style="background:#008D61;">
              <h5 class="modal-title" id="exampleModalLabel" style="text-align:center; padding-top:10px;">ADD NEW PERSON</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="database/addperson.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <div   id="name"  >
                                  <label>Name :</label>
                                    <div class="input-size">
                                      <input type="text" id="name"  name="name" class="form-control"required >
                                    </div> 
                                </div>
                </div>
                <div class="form-group">
                <div   id="uid"  >
                                  <label>User ID :</label>
                                    <div class="input-size">
                                      <input type="text" id="UID"  name="UID" class="form-control" required >
                                    </div> 
                                </div>
                </div>
                <div class="form-group">
                <div   id="details1"  >
                                  <label>Details :</label>
                                    <div class="input-size">
                                      <input type="text" id="details1"  name="details" class="form-control" required>
                                    </div> 
                                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"style="background:#008D61;">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
        <!--  add new department -->
            <div class="modal fade" id="modaladddept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                aria-hidden="true" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header"style="background:#008D61;">
                      <h5 class="modal-title" id="exampleModalLabel" style="text-align:center; padding-top:10px;">ADD NEW DEPARTMENT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="database/adddept.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <div   id="DEPT"  >
                                          <label>Department :</label>
                                            <div class="input-size">
                                              <input type="text" id="DEPT"  name="DEPT" class="form-control" required >
                                            </div> 
                                        </div>
                        </div>
                        <div class="form-group">
                        <div   id="SECT"  >
                                          <label>Section :</label>
                                            <div class="input-size">
                                              <input type="text" id="SECT"  name="SECT" class="form-control"required >
                                            </div> 
                                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"style="background:#008D61;">Submit</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--  add new nature of request -->
              <div class="modal fade" id="modaladdnature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                aria-hidden="true" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header"style="background:#008D61;">
                      <h5 class="modal-title" id="exampleModalLabel" style="text-align:center; padding-top:10px;">ADD NEW NATURE OF REQUEST</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="database/addnature.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <div   id="DEPT"  >
                                          <label>Nature of Request :</label>
                                            <div class="input-size">
                                              <input type="text" id="nature" pattern="[A-Za-z0-9]"  name="nature"
                                              title="Special Characters are not allowed in this field"
                                              class="form-control" required >
                                            </div> 
                                        </div>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"style="background:#008D61;">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                                <!--⭐⭐⭐NEW DATA⭐⭐⭐-->
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
                      <select class="form-control " id="inputnor"  name="nor" onchange="nature()"
                    data-toggle="tooltip"data-delay="{'show:50', 'hide:3000'}" data-placement="left"
                     title="When you add a new user the page will be refreshed."
                      style="input:focus; padding: 5px;border: 1px solid#008D61;" id="inputnature" >
                             <option selected disabled></option>
                             <?php          
                    $sql = "SELECT DISTINCT(Natureofrequest) FROM [requestmonitoring].[dbo].[natureofrequest] "; // sql for server
                    $stmt = sqlsrv_query( $conn, $sql ); 
                       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                      <option value="<?php echo $row['Natureofrequest'] ?>"><?php echo $row['Natureofrequest'] ?></option>
                       <?php    
                         }
                    ?>
                      <option value="NEW">Add Nature of Request</option>
                        </select>
                        <!-- <input  type="text " id="inputnor" name="nor"   > -->
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
                  <div style="display:none;" id="usertype">
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
                          <input class="form-control"  style="width:100%;" id="inputdatereg"
                          name="inputdatereg" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
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
                    <!-- date reset-->
                  <div style="display:none;" id="datereset" class="margin">
                    <label>Date Reset : </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;"  id="inputdatereset"
                          name="datereset" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
                      </div>
                  </div>
                  <!--date change-->
                  <div style="display:none;" id="datechan" class="margin">
                    <label>Date Change/Cancelled : </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;"  id="inputdatechan"
                          name="datecan" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
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
                  <!-- <div style="display:none;" id="impdate" class="input">
                    <label>Implementation Date: </label>
                      <div class="inputfield">
                        <input type="text"id="inputimpdate" name="impdate" class="input" >
                      </div> 
                  </div> -->
                  <div style="display:none;" id="impdate" class="margin">
                    <label>Implementation Date: </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <div class="input-size">
                          <input class="form-control"  style="width:100%;"  id="inputimpdate"
                          name="impdate" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
                        </div> 
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
                           name="dateapproved" placeholder="YYYY/MM/DD" type="text" autocomplete="off"/>
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
                            <!-- </div> -->
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
        <!-- <link rel="stylesheet" href="datepicker/jquery-ui.css"/> -->
        <script type="text/javascript" src="js/toastr.js"></script>
        <script type="text/javascript" src="js/jquery_toast.js"></script>
        <script type="text/javascript" src="js/toaster.js"></script>
        <link href="lib/toast-master/css/jquery.toast.css" rel="stylesheet"><!-- Toast CSS -->
        <!-- <link rel="stylesheet" href="css/jsstyle.css"> -->
        <!-- <link rel="stylesheet" href="/resources/demos/style.css">  -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>                  -->
        <!-- <script>
          $( function() {
            var availableTags = [
              <?php  
                $sql = "SELECT DISTINCT(Department) FROM [requestmonitoring].[dbo].[deptandsec] "; // sql for server
                $stmt = sqlsrv_query( $conn, $sql ); 
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        echo '"'.$row['Department'].'",';
                    }
                ?>
            ];
            $( "#inputrequestor" ).autocomplete({
              source: availableTags
            });
          } );
          
          </script> -->
<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	});
    $(document).ready(function(){
		var date_input=$('input[name="inputdatereg"]'); //our date input has the name "inputdatereg"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		  })
    });
     // For daterequested and datereceived
     $(document).ready(function(){
      var fordatereq=0;
      var fordaterec=0;
      $('input[name="daterequested"]').datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      }).on("changeDate", function (e) {
        fordatereq=this.value;
         if(fordatereq>fordaterec){
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          fordatereq=0;
          fordaterec=0; 
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
    
		var date_input=$('input[name="datereceived"]'); //our date input has the name "inputdatereg"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
            format: 'yyyy/mm/dd',
            showAnim:'slideDown',
			container: container,
			todayHighlight: true,
            autoclose: true,
            endDate:"0m",
		}).on("changeDate", function (e) {
         fordaterec = this.value;
        if(fordatereq==0){
          document.getElementById("inputdate10").value=""; 
          document.getElementById("inputdate20").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date requested first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordatereq>fordaterec){     
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
        var minDate = new Date();
      var datestor=0;
      var datestor1 = 0;
      var date_input=$('input[name="dateapproved"]'); //our date input has the name "inputdatereg"
	  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        showAnim:'slideDown',
        numberOfMonth: 1,
        todayHighlight: true,
        minDate: minDate,
        autoclose: true,
        endDate:"0d",
        // endDate:"0m",
      }).on("changeDate", function (e) {
        datestor=this.value;
        if(fordatereq==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill this date requested first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordaterec==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date received first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordatereq>datestor){
          document.getElementById("inputdate3").value=""; 
         datestor=0; 
         datestor1=0; 
          $.toast({
            heading: 'ERROR',
            text: 'The date requested must be earlier than the date approved',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
        }else if(fordaterec>datestor){
          document.getElementById("inputdate3").value=""; 
         datestor=0; 
         datestor1=0; 
          $.toast({
            heading: 'ERROR',
            text: 'The date received must be earlier than the date approved',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
        }else if(datestor>datestor1){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value="";
         datestor=0; 
         datestor1=0; 
          $.toast({
            heading: 'ERROR',
            text: 'The date approved must be earlier than the date done',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });   
        }
      });

      $('#inputdate4').datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0d",
        minDate: $('#inputdate3'),
        // startDate: '-2d'
      }).on("changeDate", function (e) {
         datestor1 = this.value;
        if(fordatereq==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill this date requested first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(fordaterec==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date received first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(datestor==0){
          document.getElementById("inputdate3").value=""; 
          document.getElementById("inputdate4").value=""; 
          $.toast({
            heading: 'ERROR',
            text: 'Please fill in the date approved first',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
        }else if(datestor>datestor1){
            document.getElementById("inputdate4").value="";
            $.toast({
            heading: 'ERROR',
            text: 'The date approved must be earlier than the date done',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 4000,
            bgColor:'#fc050d',
            stack: false
            });
          }//if
        });
    });
    //<!--⭐⭐⭐DATE APPROVED AND DATE DONE⭐⭐⭐-->
    // // For daterequested and datereceived
    // $(document).ready(function(){
    //   var fordatereq=0;
    // var fordaterec=0;
    //   $('input[name="daterequested"]').datepicker({
    //     format: 'yyyy/mm/dd',
    //     container: container,
    //     todayHighlight: true,
    //     autoclose: true,
    //     endDate:"0m",
    //   }).on("changeDate", function (e) {
    //     fordatereq=this.value;
    //     if(fordatereq>fordaterec){
    //       document.getElementById("inputdate10").value=""; 
    //       document.getElementById("inputdate20").value=""; 
    //       fordatereq=0;
    //       fordaterec=0; 
    //       $.toast({
    //         heading: 'ERROR',
    //         text: 'The date requested must be earlier than the date received',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });   
    //     }
    //   });
    
		// var date_input=$('input[name="datereceived"]'); //our date input has the name "inputdatereg"
		// var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		// date_input.datepicker({
    //         format: 'yyyy/mm/dd',
    //         showAnim:'slideDown',
		// 	container: container,
		// 	todayHighlight: true,
    //         autoclose: true,
    //         endDate:"0m",
		// }).on("changeDate", function (e) {
    //      fordaterec = this.value;
    //     if(fordatereq==0){
    //       document.getElementById("inputdate10").value=""; 
    //       document.getElementById("inputdate20").value=""; 
    //       $.toast({
    //         heading: 'ERROR',
    //         text: 'Please fill in the date requested first',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });
    //     }else if(fordatereq>fordaterec){     
    //       document.getElementById("inputdate20").value="";  
    //       $.toast({
    //         heading: 'ERROR',
    //         text: 'The date requested must be earlier than the date received',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });   
    //       }
    //     });
    // });
    // //<!--⭐⭐⭐DATE APPROVED AND DATE DONE⭐⭐⭐-->
    // $(document).ready(function(){
    //   var minDate = new Date();
    //   var datestor=0;
    //   var datestor1 = 0;
    //   var date_input=$('input[name="dateapproved"]'); //our date input has the name "inputdatereg"
	  // var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    //   date_input.datepicker({
    //     format: 'yyyy/mm/dd',
    //     showAnim:'slideDown',
    //     numberOfMonth: 1,
    //     todayHighlight: true,
    //     minDate: minDate,
    //     autoclose: true,
    //     endDate:"0d",
    //     // endDate:"0m",
    //   }).on("changeDate", function (e) {
    //     datestor=this.value;
    //     if(datestor>datestor1){
    //       document.getElementById("inputdate3").value=""; 
    //       document.getElementById("inputdate4").value="";
    //      datestor=0; 
    //      datestor1=0; 
    //       $.toast({
    //         heading: 'ERROR',
    //         text: 'The date approved must be earlier than the date done',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });   
    //     }
    //   });

    //   $('#inputdate4').datepicker({
    //     format: 'yyyy/mm/dd',
    //     container: container,
    //     todayHighlight: true,
    //     autoclose: true,
    //     endDate:"0d",
    //     minDate: $('#inputdate3'),
    //     // startDate: '-2d'
    //   }).on("changeDate", function (e) {
    //      datestor1 = this.value;
    //     if(datestor==0){
    //       document.getElementById("inputdate3").value=""; 
    //       document.getElementById("inputdate4").value=""; 
    //       $.toast({
    //         heading: 'ERROR',
    //         text: 'Please fill in the date approved first',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });
    //     }else if(datestor>datestor1){
    //         document.getElementById("inputdate4").value="";
    //         $.toast({
    //         heading: 'ERROR',
    //         text: 'The date approved must be earlier than the date done',
    //         position: 'top-right',
    //         loaderBg: '#ff6849',
    //         icon: 'warning',
    //         hideAfter: 4000,
    //         bgColor:'#fc050d',
    //         stack: false
    //         });
    //       }//if
    //     });
    // })
    // //<!--⭐⭐⭐DATE APPROVED AND DATE DONE⭐⭐⭐-->
    $(document).ready(function(){
      var date_input=$('input[name="infocard"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })
    $(document).ready(function(){
      var date_input=$('input[name="datecan"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })
    $(document).ready(function(){
      var date_input=$('input[name="datereset"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })
    $(document).ready(function(){
      var date_input=$('input[name="impdate"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate:"0m",
      })
    })
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
        function nature(){  
            var dept = document.getElementById("inputnor").value;
            if(dept=="NEW"){
            $('#modaladdnature').modal('show');
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
        // alert("qweqweq");
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
        function lack(){
            document.getElementById("stat3").style.display="";
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

    </body>
</html>
