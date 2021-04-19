<?php
        // Name of the module : updatedata.php
        // Module creation date : 01/21/21
        // Author of the Module : Engr. Rian Canua
        // Revision History : Rev 0  == DONE
        // Description : This module is created to update the current data in System Revision Request.
        // Done aligning in module to PHQD020
        require_once('../connect.php'); // CONNECTION 
        session_start();
        date_default_timezone_set('Singapore');
        function redirection_summary($new_status,$activity_details2,$re_conn,$act_status)
        {   
          $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                  VALUES (".$_SESSION['User_id'].",'".$_SESSION['First_name']."','".$_SESSION['Last_name']."','".$_SESSION['Position']."',
                  '".date("m/d/Y")."','".date("H:i:s")."','$activity_details2','$act_status');";
          $stmt = sqlsrv_query( $re_conn, $sql); 
          if($_SESSION['User_type']=='admin')
          {
            $_SESSION['Confirmation'] = $new_status;
            header("location:../searchandupdate/adminSRR_Requests.php");
          }else
          {
            $_SESSION['Confirmation'] = $new_status;
            header("location:../searchandupdate/SRR_Requests.php");
          }
        }
      if(isset($_POST['update_srr']))
      {
        $request_number    =$_POST['requestnum'];
        $sys_name = substr($request_number,2,3);
        $added_by          =$_SESSION['User_id'];
        $requestor        =$_POST['requestor'];
        $department_section         =$_POST['deptsect'];
        $nature_of_request      =$_POST['natofreq'];
        $date_requested    =trim($_POST['daterequested']);
        $date_received     =trim($_POST['datereceived']);
        $details          =$_POST['details'];
        $date_approved     =trim($_POST['dateapproved']);
        $date_done         =trim($_POST['datedone']);
        $accomplished_by   =$_POST['accomplishedby'];
        $remarks          =$_POST['remarks'];
        $ifcancel_delay    =$_POST['ifcanceldelay'];
        $attachment         = $_FILES['attachment']['name'];
        $attachment_name    =$_FILES['attachment']['tmp_name'];
        $file_extension     = $_FILES["attachment"]["type"];
        $file_size          = $_FILES["attachment"]["size"];
        $target = "../images/".basename($attachment);
        // for attachment update 
        if($attachment==" " || $attachment==null )
        {
          $sql = "SELECT * FROM [requestmonitoring].[dbo].[qadlog] WHERE requestnumber = '$request_number' union 
                  SELECT * FROM [requestmonitoring].[dbo].[lasyslog] WHERE requestnumber = '$request_number' union
                  SELECT * FROM [requestmonitoring].[dbo].[nonlasyslog] WHERE requestnumber = '$request_number' union
                  SELECT * FROM [requestmonitoring].[dbo].[padlog] WHERE requestnumber = '$request_number'";  // sql for server
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false)
          {
            die( print_r( sqlsrv_errors(), true) );
          }else
          { 
            if($row_count = sqlsrv_has_rows( $stmt )>0)
            {
              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
              {
                $attachment = $row['attachment'];
              }// end of while $row
            }
          }//else of $stmt 
        }else
        {
          if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
          $file_extension=="application/pdf" and $_FILES['attachment']['size']<5000000 )
          {
            if (move_uploaded_file($attachment_name , $target))
            {
              $_SESSION['Status'] = 'success()'; 
            }
          }else
          {
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an attachment because of invalid format";
            redirection_summary('invalid()',$activity_details,$conn,'failed');
          }
        }
        // for checking of system name;
        if($sys_name == "QAD")
        {
          $db_name = 'qadlog';
        }else if($sys_name == "LA-")
        {
          $db_name = 'lasyslog';
        }else if($sys_name == "NL-")
        {
          $db_name = 'nonlasyslog';
        }else 
        {
          $db_name = 'padlog';
        }
        $sql = "UPDATE requestmonitoring.dbo.".$db_name."
                SET userid = '$added_by' ,requestor='$requestor',[department-section]='$department_section',
                natureofrequest='$nature_of_request', daterequested='$date_requested',datereceived='$date_received',
                details='$details',dateapproved='$date_approved',datedone='$date_done',accomplishedby='$accomplished_by',
                remarks='$remarks',ifcanceldelay='$ifcancel_delay',attachment='$attachment'
                WHERE requestnumber = '$request_number' ";
        $stmt = sqlsrv_query( $conn, $sql);
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has updated data with Request number : ".$request_number;
        redirection_summary('success()',$activity_details,$conn,'success');
      }else
      {
        echo "Invalid access";
      }
 
?>