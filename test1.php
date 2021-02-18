<?php
 session_start();
 require_once('connect.php'); // CONNECTION 
 <a data-toggle="modal" href="#myModal" class="btn btn-primary">Launch modal</a>

<div class="modal" id="myModal">
	<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal title</h4>    
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          Content for the dialog / modal goes here.
          <a data-toggle="modal" href="#myModal2" class="btn btn-primary">Launch modal</a>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
        </div>
      </div>
    </div>
</div>
<div class="modal" id="myModal2" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">2nd Modal title</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          Content for the dialog / modal goes here.
          Content for the dialog / modal goes here.
          Content for the dialog / modal goes here.
          Content for the dialog / modal goes here.
          Content for the dialog / modal goes here.
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Save changes</a>
        </div>
      </div>
    </div>
</div>
    // date_default_timezone_set('Singapore');
    // $userid = $_SESSION['userid'];
    // $username = $_SESSION['username']; 
    // $firstname = $_SESSION['firstname'];
    // $lastname = $_SESSION['lastname'];
    // $position = $_SESSION['position'];
    // $activitydate = date("m/d/Y");  
    // $activitytime = date("g:i a");
    // $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has logged in. ";
    // $activitystatus = "success";
    // $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
    //     VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
    // $stmt = sqlsrv_query( $conn, $sql);
//     date_default_timezone_set('Singapore');
//     $formonth = date('m')."%".date('Y');
//     $totalrequest = 0;
//     $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed like '$formonth'");
//     $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//             $totalrequest = $totalrequest + $rowfet['cntr'];  
//     $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed like '$formonth'");
//     $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//             $totalrequest = $totalrequest + $rowfet['cntr']; 
//     $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed like '$formonth'");
//     $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//             $totalrequest = $totalrequest + $rowfet['cntr'];
//     $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed like '$formonth'");
//     $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//             $totalrequest = $totalrequest + $rowfet['cntr'];
//             echo $totalrequest."</br>";
//             $completedrequest = 0;
//                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcnewuser where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR
//                 ([department-section] IS NULL OR [department-section]='') OR (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR
//                 (systemuser IS NULL OR systemuser='') OR (usertype IS NULL OR usertype='') OR (dateregistered IS NULL OR dateregistered='') OR (remarks IS NULL OR remarks=''))");
//                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//                         $completedrequest = $completedrequest + $rowfet['cntr'];  
//                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcpasswordrequest where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
//                 (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
//                 (reasonforapplication IS NULL OR reasonforapplication='') OR (datereset IS NULL OR datereset=''))");
//                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//                         $completedrequest = $completedrequest + $rowfet['cntr']; 
//                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcregistrationchange where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
//                 (systemusername IS NULL OR systemusername='') OR (requestor IS NULL OR requestor='') OR (systemuser IS NULL OR systemuser='') OR
//                 (reasonforapplication IS NULL OR reasonforapplication='') OR (datechangecancelled IS NULL OR datechangecancelled=''))");
//                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//                         $completedrequest = $completedrequest + $rowfet['cntr'];
//                 $display_details1 = sqlsrv_query($conn, "SELECT count (*) as cntr FROM requestmonitoring.dbo.mcrequestrecord where dateprocessed like '$formonth' and ((daterequested IS NULL OR daterequested='') OR (datereceived IS NULL OR datereceived='') OR ([department-section] IS NULL OR [department-section]='') OR
//                 (information IS NULL OR information='') OR (implementationdate IS NULL OR implementationdate=''))");
//                 $rowfet = sqlsrv_fetch_array( $display_details1, SQLSRV_FETCH_ASSOC);
//                         $completedrequest = $completedrequest + $rowfet['cntr'];
//                        echo $completedrequest."</br>";;
//                         $_SESSION["completed"] = $totalrequest - $completedrequest;
//                         echo $_SESSION["completed"];
                // INSERT INTO requestmonitoring.dbo.logindata(userid, usertype, username,
                // firstname,middlename,lastname,position,[section-department],password1, profpic)
                // VALUES ('2009011', 'user','Pedro@Penduko', 'Pedro', 'Uy', 'Penduko', 'Staff',
                // 'ICT-CSV','2009011','test1.php');
                // INSERT INTO requestmonitoring.dbo.logindata(userid, usertype, username,
                // firstname,middlename,lastname,position,[section-department],password1, profpic)
                // VALUES ('2009012', 'admin','Rian@Canua', 'Rian', 'Sy', 'Canua', 'Lead Developer',
                // 'ICT-App Team','2009012','test1.php');
                // INSERT INTO requestmonitoring.dbo.logindata(userid, usertype, username,
                // firstname,middlename,lastname,position,[section-department],password1, profpic)
                // VALUES ('2009013', 'user','Juan@Doe', 'Juan', 'Mc', 'Doe', 'Senior Developer',
                // 'ICT-Assistant Manager','2009013','test1.php');
                // INSERT INTO requestmonitoring.dbo.logindata(userid, usertype, username,
                // firstname,middlename,lastname,position,[section-department],password1, profpic)
                // VALUES ('2009014', 'admin','John@Doe', 'John', 'Mc', 'Doe', 'Senior Developer',
                // 'ICT-Manager','2009014','test1.php');
                // $sql = "INSERT INTO requestmonitoring.dbo.logindata(userid, usertype, username,
                // firstname,middlename,lastname,position,[section-department],password1, profpic)
                // VALUES ('2009014', 'admin','John@Doe', 'John', 'Mc', 'Doe', 'Senior Developer',
                // 'ICT-Manager','$str','test1.php')"; 
   
                // $attachment       = $_FILES['atta']['name'];
                // $attachment1      =$_FILES['atta']['tmp_name'];
                // $fileext = $_FILES["atta"]["type"];
                //             $fileext1 = $_FILES["atta"]["size"];
                // $target = "../images/".basename($attachment);
        //         if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
        //       $fileext=="application/pdf" and $_FILES['atta']['size']<400000 ){
        //         if (move_uploaded_file($attachment1 , $target)) {
        //                 //   $msg = "Image uploaded successfully";
        //                 //   echo $msg;
        //                 $_SESSION['status'] = 'success()'; 
        //                 // header("Location: http://localhost/FORMS/addform.php");
        //            }else{
        //                 $msg = "Failed to upload image";
        //                 echo $msg;
        //                 $_SESSION['status'] = 'invalid()'; 
        //                 header("Location: ../index1.php");
        //                 }
        //       }else{// for error checking
        //         $_SESSION['status'] = 'invalid()'; 
        //         header("Location: ../index1.php");
        //       }
//                 $str="hello1";
//                 $sql = "SELECT * FROM requestmonitoring.dbo.logindata WHERE userid='2009013'"; // sql for server
//                 $stmt = sqlsrv_query( $conn, $sql );
//                 if($row_count = sqlsrv_has_rows( $stmt )>0){
//                   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//                                 echo "user account already taken";
//                     }
//                 }else{
//                         echo "user account available";
//                 }
// ?>