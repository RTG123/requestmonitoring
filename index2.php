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
        <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
       <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                                <li> <a href="fontawesome.html" class="waves-effect"><i class="fa-fw">F</i><span class="hide-menu">Font awesome</span></a> </li>
                                <li> <a href="themifyicon.html" class="waves-effect"><i class="fa-fw">T</i><span class="hide-menu">Themify Icons</span></a> </li>
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
                            <div class="white-box">
                         
                                <!--⭐⭐⭐NEW DATA⭐⭐⭐-->
                                
    <!--*********************************
                 MAIN CONTENT
      *********************************** -->
    <section id="main-content">
      <section class="wrapper">
         
             <!-- NOTIFICATION SUCCESS -->
        <div class="success show " id="stat" style="background-color: rgb(106,168,126);  "  >
            <span class="check"><i class="fa fa-check-circle"></i></span>
	            <span class="msg" > Success: Record added Successfully!</span>
              	<!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                  </div> 
                  <!-- NOTIFICATION FAILED -->
        <div class="unsuccess show " id="stat" style="background-color: rgb(255,204,203);  "  >
            <span class="check"><i class="fa fa-times"></i></span>
	            <span class="msg" style="font-size:13px"> Failed: Record not added!</span>
              	<!-- <span id="xsign"class="cross"><i class="fa fa-times"></i></span> -->
                  </div> 

      <div class="row ">
         <div class="col-sm-12">
              <div  >
                            <h3 class="box-title m-b-0">Search and Update</h3>
                            <p class="text-muted m-b-30">Search & Update Data</p>
                        
                            
                      <div style="margin-left:25%;margin-right:25%;margin-bottom:30px;">
                    <!--selector -->
                    <label >Please select the applicable form: </label>  
                  <div class="inputfield">
                    <select class="form-control " name="selector" 
                      style="input:focus; border: 1px solid#008D61;" id="sel1" onchange="select()" required>
                      <option value="" ></option>
                      
                      <option value="QAD">QAD REQUEST</option>
                      <option value="LAS">LASYS REQUEST</option>
                      <option value="NON">NON-LASYS REQUEST </option>
                      <option value="PAD">PAD REQUEST</option>
                 
                        </select>
                        </div>
                      </div> <!-- MARGIN-left -->
                      <!--MYTABLE-->
                      <div class="table-responsive" style="display:;"id="tab">
                              <table id="myTable" class="table table-striped">                                   
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
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[qadlog] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                                    <tr>
                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['natureofrequest']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                           
                  <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                    <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                      </button>
                      <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE-->
                          <!--MYTABLE2-->
                      <div class="table-responsive" style="display:none;"id="tab2">
                              <table id="myTable2" class="table table-striped">                                   
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
                                   
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[lasyslog] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>
                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['natureofrequest']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE2-->
                          <!--MYTABLE3-->
                      <div class="table-responsive" style="display:none;"id="tab3">
                              <table id="myTable3" class="table table-striped">                                   
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
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[nonlasyslog] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>

                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['natureofrequest']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE3-->
                                <!--MYTABLE4-->
                      <div class="table-responsive" style="display:none;"id="tab4">
                              <table id="myTable4" class="table table-striped">                                   
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
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[padlog] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>

                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['natureofrequest']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE4-->
                            <!--MYTABLE5-->
                      <div class="table-responsive" style="display:none;"id="tab5">
                              <table id="myTable5" class="table table-striped">                                   
                                <thead>
                                        <tr>
                                        <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Request Number</th>
                                            <th style="text-align:center;">Requestor</th>
                                            <th style="text-align:center;">Nature of Request</th>
                                            <th style="text-align:center;">Attachment</th>
                                            <th style="text-align:center;">Details</th> 
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                    
                                        <?php  
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcnewuser] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>

                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE5-->
                            <!--MYTABLE6-->
                      <div class="table-responsive" style="display:none;"id="tab6">
                              <table id="myTable6" class="table table-striped">                                   
                                <thead>
                                        <tr>
                                        <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Request Number</th>
                                            <th style="text-align:center;">Requestor</th>
                                            <th style="text-align:center;">Nature of Request</th>
                                            <th style="text-align:center;">Attachment</th>
                                            <th style="text-align:center;">Details</th> 
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                    
                                        <?php  
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcregistrationchange] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>

                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['requestor']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE6-->
                           <!--MYTABLE7-->
                      <div class="table-responsive" style="display:none;"id="tab7">
                              <table id="myTable7" class="table table-striped">                                   
                                <thead>
                                        <tr>
                                        <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Request Number</th>
                                            <th style="text-align:center;">Requestor</th>
                                            <th style="text-align:center;">Nature of Request</th>
                                            <th style="text-align:center;">Attachment</th>
                                            <th style="text-align:center;">Details</th> 
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                    
                                        <?php  
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcrequestrecord] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>
                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['daterequested']; ?></td>
                                                    <td><?php echo $row['department-section']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?> ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE7-->
                          <!--MYTABLE8-->
                      <div class="table-responsive" style="display:none;" id="tab8">
                              <table id="myTable8" class="table table-striped">                                   
                                <thead>
                                        <tr>
                                        <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Request Number</th>
                                            <th style="text-align:center;">Requestor</th>
                                            <th style="text-align:center;">Nature of Request</th>
                                            <th style="text-align:center;">Attachment</th>
                                            <th style="text-align:center;">Details</th> 
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                    
                                        <?php  
                           
                                        
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[mcpasswordrequest] "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){?>
                                       
                                                    <tr>

                                                    <td style="text-align:center;"><?php echo $row['ID'];?></td>
                                                    <td><?php echo $row['requestnumber'];?></td>
                                                    <td><?php echo $row['daterequested']; ?></td>
                                                    <td><?php echo $row['department-section']; ?></td>
                                                    <td><?php echo $row['attachment']; ?></td>
                                                    <td>
                                            <div class="row">
                                            <button type="button" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" >
                                             <a data-toggle="modal" data-target="#exampleModal<?php echo $row['requestnumber']?>" ><span class="glyphicon glyphicon-pencil " aria-hidden="true"></span></a>
                                            </button>
                                            <button data-toggle="modal" data-target="#viewreportModal<?php echo $row['requestnumber']?>" class="btn btn-primary btn-xs dt-edit"style="background-color:#008D61;" title="View Report" style="padding:0;margin:0"><span class="glyphicon glyphicon-info-sign " aria-hidden="true"></span></button>
 
                                      
                                            <button type="button" class="btn btn-danger btn-xs dt-delete" style="background-color:#008D61;" disabled  >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                            </div>
                                          </td>
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE8-->
                          
                                           
                                                  
                            
                        </div>
                        <!-- whit -->
                    </div> 
              </div> <!-- div class="row"-->
   
 
      </section><!-- WRAPPER -->
    </section><!-- MAIN-CONTENT -->
        <!--*********************************
                 MAIN CONTENT END
      *********************************** -->
               
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
        <!-- datatables -->
        <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


    </body>
</html>
