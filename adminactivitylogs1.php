<!DOCTYPE html>
<?php
    // Name of the module : adminactivitylogs1.php
    // Module creation date : 02/05/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : this will handles the activity tab for admin as usertype
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
        <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="fix-header" style="font-family:Century Gothic"onload="<?php echo $_SESSION['Status'];?>">
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
                        <a class="logo" href="admin.php">
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
                                                    <a href="#" class="btn btn-rounded btn-danger btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="adminaccountsetttings.php"><i class="ti-settings"></i>&emsp;Account Setting</a></li>
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
                                <li> <a href="searchandupdate/adminSRR_Requests.php" class="waves-effect"><span class="hide-menu">System Revision Request</span></a> </li>
                                <li> <a href="searchandupdate/MCNewUser_Requests.php" class="waves-effect"><span class="hide-menu">Mc New User Request</span></a> </li>
                                <li> <a href="searchandupdate/MCChange_Requests.php" class="waves-effect"><span class="hide-menu">Mc Registration Change & Cancellation</span></a> </li>
                                <li> <a href="searchandupdate/MCPassword_Requests.php" class="waves-effect "><span class="hide-menu">Mc Password Reset</span></a> </li>
                                <li> <a href="searchandupdate/MCRequest_Requests.php" class="waves-effect "><span class="hide-menu">Mc Request Record</span></a> </li>
                            </ul>
                        </li>
                        <li><a href="adminactivitylogs.php" class="waves-effect active"><i class="mdi mdi-account-check"></i><span class="hide-menu">&emsp;Activity Logs</span></a></li>
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
                            <h4 class="page-title">Activity Logs</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="admin.php">Home</a></li>
                                <li class="active">Activity Logs</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                    
                        <div class="col-md-12">
                            
                         <!--*********************************
                                 ⭐⭐⭐   Modals  ⭐⭐⭐
                            *********************************** -->
    
                                <!--⭐⭐⭐NEW DATA⭐⭐⭐-->
                                
    <!--*********************************
                 MAIN CONTENT
      *********************************** -->
    <section id="main-content" >
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
                  <div class="white-box">
                  <div class="row">
                                <div class="col-sm-9"></div>
                                <div class="col-sm-3">
                                    <div class="row">
                                    <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker-autoclose" value="<?php echo $_GET['daten'];?>" onchange="tabledata()"> <span class="input-group-addon bg-info text-white"><i class="ti-calendar"></i></span> 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                         
      <div class="row ">
         <div class="col-sm-12">
              <div style="background-color:white; padding:20px;">
              <h3 class="box-title m-b-0" style="padding-bottom:15px;"></h3>
 
                            <!--MYTABLE5-->
                      <div class="table-responsive" style="display:;"id="singletable">
                              <table id="myTable5" class="table table-striped" style="overflow: hidden !important; margin-right:500px !important;" >                                   
                                <thead>
                                        <tr>
                                        <th style="text-align:center;">No.</th>
                                            <th style="text-align:center;">Activity Date</th>
                                            <th style="text-align:center;">Activity Time</th>
                                            <th style="text-align:center;">Activity</th>
                                            <!-- <th style="text-align:center;">Implementation Date</th> -->
                                            <th style="text-align:center; padding-right:30px; padding-left:30px; ">Activity Status</th> 
                                        </tr>
                                    </thead>
                                    <tbody style="text-align:center;">
                                    
                                        <?php  
                                            $no = 1;
                                            $dtes = explode(" ",$_GET['dte']);
                                            $dte = $dtes[0] . "%" .$dtes[1];
                                            $userid = $_SESSION['User_id'];
                                              $counter =0;                                  
                                              $sql = "SELECT * FROM [requestmonitoring].[dbo].[activitylogs] WHERE
                                              activitydate like '$dte' order by activitydate desc, activitytime desc "; // sql for server
                                              $stmt = sqlsrv_query( $conn, $sql ); 
                                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
                                              {
                                                  $counter++;?>
                                                    <tr>
                                                    <td style="text-align:center;"><?php echo $counter ;?></td>
                                                    <td><?php echo $row['activitydate'];?></td>
                                                    <td><?php echo $row['activitytime']; ?></td>
                                                    <td><?php echo $row['activitydetails']; ?></td>
                                                    <td><?php echo $row['activitystatus']; ?></td>
                                                    <!-- <td> <span class="label label-success label-outline label-circle">Success</span>
                                                    <span class="label label-danger label-outline label-circle">Failed</span></td> -->
                                                    </tr>
                                                    <?php } ?>
                                  </tbody>  
                                        
                                </table>
                              </div>
                          <!--MYTABLE5-->
                            
                        
                          
                                           
                                                  
                            
                        </div>
                        <!-- whit -->
                    </div> 
                </div> <!-- div class="row"-->
              </div><!--white box-->
   
 
      </section><!-- WRAPPER -->
    </section><!-- MAIN-CONTENT -->
        <!--*********************************
                 MAIN CONTENT END
      *********************************** -->
               
                            
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

        //Date Filter
            function tabledata()
            {
                var dte = document.getElementById("datepicker-autoclose").value;
                var res = dte.split("/");
                var mnth = res[0];
                var mname = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                for(var i = 0; i<= 11; i++)
                {
                    if(mname[i] == mnth)
                    {
                        if(i < 10)
                        {
                            mnth = "0" + (i + 1);
                        }else
                        {
                            mnth = i + 1;
                        }
                    }
                }
                var yr = res[1];
                if(dte != "<?php echo date('F/Y')?>")
                {
                    window.location = "adminactivitylogs1.php?dte=" + mnth + "%" + yr + "&daten=" + dte;
                }else
                {
                    window.location = "adminactivitylogs.php";
                }
            }
        </script>
         <script>
        $(document).ready(function()
        {
            $('[data-toggle="tooltip"]').tooltip();
            $('#myTable').DataTable(); 
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker(
        {
            format: "MM/yyyy",
            startView: "months", 
            minViewMode: "months",
            endDate: "0m",
            autoclose: true,
            todayHighlight: true
        });
    </script>

    <script>
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
    });
    </script>

  

    </body>
</html>
