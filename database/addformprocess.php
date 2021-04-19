  <?php
    // Name of the module : addformprocess.php
    // Module creation date : 01/21/21
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : Adding of requests to database and validating 
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
        $_SESSION['New_status'] = $new_status; 
        header("Location: ../admin1.php");
      }else
      {
        $_SESSION['Status'] = $new_status; 
        header("Location: ../index1.php");
      } 
    }
    function requestnum_generation($system_name,$request_number,$extensionnumber,$conn,$system_type)
    {
        $refyear = date("y");
        $dateprocessed = date("m/d/Y");
        $sql = "SELECT count(*) AS count FROM requestmonitoring.dbo.".$system_name." WHERE refyear=$refyear"; // sql for server
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
              $count=$row['count'];
            }// end of while $row
            if($count>0)
            {
              $sql = "SELECT MAX(extensionnumber) AS extnum FROM requestmonitoring.dbo.".$system_name." WHERE refyear=$refyear"; // sql for server
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
                  $ext=$row['extnum'];
                  }
                  $extensionnumber=$ext+1;
                }//another row count
              }
            }else // if $session for numbering
            {  // the number of extension number should be 0;
              $extensionnumber=1;
            }//end of if row count
          }else
          {//no data available
            $extension_number=1;
          }//else of $row count
        }//else of $stmt 
        if($extensionnumber<10)
        {
          $extensionnumber="000".$extensionnumber;
        }elseif($extensionnumber>9 & $extensionnumber <100)
        {
          $extensionnumber="00".$extensionnumber;
        }elseif($extensionnumber>99 & $extensionnumber <1000)
        {
          $extensionnumber="0".$extensionnumber;
        }
      $request_number=$system_type."-".$refyear."-".$extensionnumber;
      return array($system_name,$request_number,$extensionnumber,$conn,$system_type);
    }
    
  if(isset($_POST['submit']))
  {
    //all data needed for different requests 
      $user_id           =$_SESSION['User_id'];
      $request_number    ="";
      $selector         = $_POST['selector'];
      $requestor        =$_POST['requestor'];
      $department       = $_POST['department'];
      $nature_of_request  = $_POST['nor'];
      $date_requested    = $_POST['daterequested'];
      $date_received     = $_POST['datereceived'];
      $details          = $_POST['details'];
      $system_username   = $_POST['sysusername'];
      $system_user       = $_POST['sysuser'];
      $user_type         = $_POST['usertype'];
      $date_registered   = $_POST['inputdatereg'];
      $infocard         = $_POST['infocard'];
      $reasonfor_application   = $_POST['reasonforapp'];
      $date_change       = $_POST['datecan'];
      $date_reset        = $_POST['datereset'];
      $information      = $_POST['information'];
      $implementation_date   = $_POST['impdate'];
      $date_approved     = $_POST['dateapproved'];
      $date_done         = $_POST['datedone'];
      $accomplished     = $_POST['accb'];
      $remarks          = $_POST['remarks'];
      $candel           = $_POST['canc'];
      // for attachment handling
      $attachment       = $_FILES['atta']['name'];
      $attachment_name      =$_FILES['atta']['tmp_name'];
      $file_extension = $_FILES["atta"]["type"];
      $file_size = $_FILES["atta"]["size"];
      $target = "../images/".basename($attachment);
          if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
            $file_extension=="application/pdf" and $_FILES['atta']['size']<5000000 )
          { //5,000,000 is equivalent to 5,000 kb
            if (move_uploaded_file($attachment_name , $target))
            {
              $_SESSION['Status'] = 'success()'; 
            }else
            {
              $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an attachment";
              redirection_summary('lack()',$activity_details,$conn,'failed');
            }
          }else
          {
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an attachment because of invalid format";
            redirection_summary('lack()',$activity_details,$conn,'failed');
          }
          // for current date
          date_default_timezone_set('Singapore');
          $refyear = date("y");
          $dateprocessed = date("m/d/Y");
      // if the selector is equal to qad staple
      if($selector == 'QAD' )
      {
        if(empty($requestor) || empty($department) || empty($nature_of_request) || empty($date_requested) || empty($date_received) ) // To check if the qad requestor field is empty 
        {
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an QAD Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else // Add data to qad
        {
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('qadlog','',0,$conn,'S-QAD');
            // Insert qad 
          $sql = "INSERT INTO requestmonitoring.dbo.qadlog (userid, extensionnumber, requestnumber, daterequested,
                  datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                  remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
                  '$date_requested ','$date_received ', '$department','$nature_of_request','$details','$requestor',
                  '$date_approved','$accomplished','$date_done','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          //redirection 
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an QAD Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        } // else for error checking
      }else if ($selector == 'LAS' ) // To check all the needed field in LASYS request
      { 
        if(empty($requestor)||empty($department)||empty($nature_of_request)||empty($date_requested)||empty($date_received))// To check the if the requestor field is empty
        {
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an LASYS Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        {  // Insert data to lasys request
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('lasyslog','',0,$conn,'S-LA');
          $sql = "INSERT INTO requestmonitoring.dbo.lasyslog (userid, extensionnumber, requestnumber, daterequested,
                datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
                '$date_requested ','$date_received ', '$department','$nature_of_request','$details','$requestor',
                '$date_approved','$accomplished','$date_done','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          // for lasys activity logs
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an LASYS Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        }// end of else tag for addition of sytem
      }else if ($selector == 'NON' )
      {// check if the selector is equal to non lasys request
        if(empty($requestor)||empty($department)||empty($nature_of_request)||empty($date_requested)||empty($date_received))
        {// To check the if the requestor field is empty in non lasys request
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an NON-LASYS Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        {
         list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('nonlasyslog','',0,$conn,'S-NL');
            // Insert data to non lasys request
            $sql = "INSERT INTO requestmonitoring.dbo.nonlasyslog (userid, extensionnumber, requestnumber, daterequested,
                    datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                    remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
                    '$date_requested ','$date_received ', '$department','$nature_of_request','$details','$requestor',
                    '$date_approved','$accomplished','$date_done','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
            $stmt = sqlsrv_query( $conn, $sql);
              // if of non 
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an NON-LASYS Request. ";
            redirection_summary('success()',$activity_details,$conn,'success');
        }
      }else if ($selector == 'PAD' )
      {// check if the selector is equal to pad request
        if(empty($requestor)||empty($department)||empty($nature_of_request)||empty($date_requested)||empty($date_received) )
        {// To check the if the requestor field is empty in pad request
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an PAD Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        { // to add the current request to pad log
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('padlog','',0,$conn,'S-PAD');
            // INSERT INTO
          $sql = "INSERT INTO requestmonitoring.dbo.padlog (userid, extensionnumber, requestnumber, daterequested,
                  datereceived, [department-section],natureofrequest,details,requestor,dateapproved,accomplishedby,datedone,
                  remarks,ifcanceldelay,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
                  '$date_requested ','$date_received ', '$department','$nature_of_request','$details','$requestor',
                  '$date_approved','$accomplished','$date_done','$remarks','$candel','$attachment','$refyear','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          // for activity logs of pad request
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an PAD Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        }//else
      }else if ($selector == 'MCUR')
      { // to selector is equal to MC User Registration
        if(empty($requestor)||empty($department)||empty($system_username)||empty($system_user)||empty($date_requested)||empty($date_received)
        ||empty($user_type)||empty($date_registered))
        {// to check if the requestor field in mc new user registration is empty
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an MC New User Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        { // insert all the need data to mc new user registration form
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('mcnewuser','',0,$conn,'MC-UR');
            //Insert quert in database 
          $sql = "INSERT INTO requestmonitoring.dbo.mcnewuser (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],systemusername,systemuser,usertype,dateregistered,infocard,
                  remarks,requestor,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number','$date_requested ',
                  '$date_received ', '$department','$system_username','$system_user','$user_type','$date_registered',
                  '$infocard','$remarks','$requestor','$attachment','$refyear','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          // for MCUR activity logs
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an MC New User Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        }
      }else if ($selector == 'MCRC' )
      { // to if the selector is equal to mc registration and change cancellationm
        if(empty($requestor)||empty($department)||empty($system_username)||empty($system_user)||empty($date_requested)||empty($date_received)||
        empty($reasonfor_application)||empty($date_change))
        {// to check if the requestor field for mc registration and change cancellation is empty
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an MC Registration Change Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        { // generate a request number and insert it to data for mc registration change
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('mcregistrationchange','',0,$conn,'MC-RC');
            // Insert query for mc registration change
          $sql = "INSERT INTO requestmonitoring.dbo.mcregistrationchange (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],systemusername,systemuser,reasonforapplication,
                  datechangecancelled,requestor,attachment,refyear,remarks,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
                  '$date_requested ','$date_received ','$department','$system_username','$system_user','$reasonfor_application',
                  '$date_change','$requestor','$attachment','$refyear','$remarks','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          // for activity logs of requestmonitoring system registration change
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an MC Registration Change Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        }
      }else if ($selector == 'MCRR' )
      {// if the selector is equal to request record
        if(empty($department)||empty($date_requested)||empty($date_received)||empty($information))
        {
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an MC Request Record Request. ";
          redirection_summary('lack()',$activity_details,$conn,'failed');
        }else
        {          
          list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('mcrequestrecord','',0,$conn,'MC-RR');
          // SQL Query for  insertion of data to master control request record 
          $sql = "INSERT INTO requestmonitoring.dbo.mcrequestrecord (userid, extensionnumber, requestnumber, 
                  daterequested, datereceived, [department-section],information,implementationdate,attachment,refyear,dateprocessed)
                  VALUES ('$user_id', '$extensionnumber', '$request_number','$date_requested ','$date_received ', '$department','$information','$implementation_date ',
                  '$attachment','$refyear','$dateprocessed')";
          $stmt = sqlsrv_query( $conn, $sql);
          // for activity logs request record
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an MC Request Record Request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        } 
    }else if ($selector == 'MCPR' )
    {//if the selector is equal to master control password reset 
      if(empty($requestor)||empty($department)||empty($system_username)||empty($system_user)||empty($date_requested)||empty($date_received)||
      empty($reasonfor_application)||empty($date_reset))
      {// to check if the requestor field is empty
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an MC Reset Password Request. ";
        redirection_summary('lack()',$activity_details,$conn,'failed');
      }else
      {        
        list($system_name,$request_number,$extensionnumber,$conn,$system_type) = requestnum_generation('mcpasswordrequest','',0,$conn,'MC-PR');
                      // INSERT INTO
              $sql = "INSERT INTO requestmonitoring.dbo.mcpasswordrequest (userid, extensionnumber, requestnumber, 
            daterequested, datereceived, [department-section],systemusername,systemuser,reasonforapplication,
            datereset,requestor,attachment,refyear,remarks,dateprocessed) VALUES ('$user_id', '$extensionnumber', '$request_number',
            '$date_requested ','$date_received ', '$department','$system_username','$system_user','$reasonfor_application',
            '$date_reset','$requestor','$attachment','$refyear','$remarks','$dateprocessed')";
            $stmt = sqlsrv_query( $conn, $sql);
        // for activity logs of Master Contorl Reset Password 
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an MC Reset Password Request. ";
        redirection_summary('success()',$activity_details,$conn,'success');
      }
    }else
    { // this is else is to check if the selector selected is not equal to selector value needed in the system
      $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has try to access add form process ";
      redirection_summary('unsuccess()',$activity_details,$conn,'unsuccess');
    }
  }else if(isset($_POST['add_department']))
  {
    $userid             =$_SESSION['User_id'];
    $department         = $_POST['DEPT'];
    $section            = $_POST['SECT'];
    $department_section =$department." - ".$section;
    $today_date              = date("m/d/y");
    // Query to check if the data is submitted has already a value 
    // QUERY FOR SELECTION 
    $sql = "SELECT * FROM requestmonitoring.dbo.deptandsec WHERE Department='$department_section'"; 
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
      die( print_r( sqlsrv_errors(), true) );
    }else
    { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {// add data  to activity log
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add a department or the department was already on the lists of department. ";
        redirection_summary('unsuccess()',$activity_details,$conn,'failed');
      }else
      { // insert new department 
        $sql = "INSERT INTO [requestmonitoring].[dbo].[deptandsec] (Department, Section, Dateadded, Addedby) 
                VALUES ('$department_section','$section','$today_date','$userid')";
        $stmt = sqlsrv_query( $conn, $sql);
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added a new department . ";
          redirection_summary('success()',$activity_details,$conn,'success');
      }
    }
  }else  if(isset($_POST['add_nature']))
  {
    $user_id           =$_SESSION['User_id'];
    $nature_of_request  = $_POST['nature'];
    $date_today            = date("m/d/y");
    // Query to select if there's and existing data on the system
    $sql = "SELECT * FROM requestmonitoring.dbo.natureofrequest WHERE Natureofrequest='$nature_of_request'"; 
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
      die( print_r( sqlsrv_errors(), true) );
    }else
    { 
      if($row_count = sqlsrv_has_rows( $stmt )>0)
      {
        $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add a nature of request or the nature of request was already on the list. ";
        redirection_summary('unsuccess()',$activity_details,$conn,'failed');
      }else
      {// Query to add data into nature of request 
        $sql = "INSERT INTO [requestmonitoring].[dbo].[natureofrequest] (Natureofrequest, Addedby, Dateaddded) 
                VALUES ('$nature_of_request','$user_id','$date_today')";
        $stmt = sqlsrv_query( $conn, $sql);  
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added a new nature of request . ";
          redirection_summary('success()',$activity_details,$conn,'success');
      }
    }
  }else if(isset($_POST['add_person']))
  {
      $user_id           =$_SESSION['User_id'];
      $name           = $_POST['name'];
      $user_identification            = $_POST['UID'];
      $details        = $_POST['details'];
      $sql = "SELECT * FROM requestmonitoring.dbo.users WHERE accomplishedby='$name'"; 
      $stmt = sqlsrv_query( $conn, $sql );
      if( $stmt === false)
      {
        die( print_r( sqlsrv_errors(), true) );
      }else
      { 
        if($row_count = sqlsrv_has_rows( $stmt )>0)
        {// addition of data to activity logs database
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add a person or the person are already on the list to accomplish the request. ";
          redirection_summary('unsuccess()',$activity_details,$conn,'failed');
        }else
        {// addition of name data credential to database
          $sql = "INSERT INTO [requestmonitoring].[dbo].[users] (accomplishedby, Details, UserID, Addedby) 
              VALUES ('$name','$details','$user_identification','$userid')";
          $stmt = sqlsrv_query( $conn, $sql);
          $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has add a new person to accomplished a request. ";
          redirection_summary('success()',$activity_details,$conn,'success');
        }
      }
  }else if(isset($_POST['batch_upload']))
  {
        $UR = "MC-UR";
        $user_id           =$_SESSION['User_id'];
        $date_requested    = $_POST['daterequested'];
        $date_received     = $_POST['datereceived'];
        $user_type         = "View only";
        $date_registered   = $_POST['datereg'];
        $info_card         = " ";
        $remarks          = $_POST['remarks1'];
        $requestor        =$_POST['requestor1'];
        $date_processed = date("m/d/Y");
        $reference_year = date("y");
        $attachment       = $_FILES['atta']['name'];
        $attachment_name      =$_FILES['atta']['tmp_name'];
        $file_extension = $_FILES["atta"]["type"];
        $file_size = $_FILES["atta"]["size"];
        $target = "../images/".basename($attachment);
        if($file_extension=="image/png" || $file_extension=="image/jpeg" || $file_extension=="image/jpg" || 
        $file_extension=="application/pdf" and $_FILES['atta']['size']<400000 )
        {
          if (move_uploaded_file($attachment_name , $target)) 
          {
            $_SESSION['Status'] = 'success()'; 
          }
        }
        list($system_name,$request_number,$extension_number,$conn,$system_type) = requestnum_generation('mcnewuser','',0,$conn,'MC-UR');
      // EXCEL FILE
      include "../xlsx.php";
      $file_data = $_FILES['batch']['type'];
      // .xls      application/vnd.ms-excel
      // .xlt      application/vnd.ms-excel
      // .xla      application/vnd.ms-excel
      // .xlsx     application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
      // .xltx     application/vnd.openxmlformats-officedocument.spreadsheetml.template
      // .xlsm     application/vnd.ms-excel.sheet.macroEnabled.12
      // .xltm     application/vnd.ms-excel.template.macroEnabled.12
      // .xlam     application/vnd.ms-excel.addin.macroEnabled.12
      // .xlsb     application/vnd.ms-excel.sheet.binary.macroEnabled.12
      if($file_data=="application/vnd.ms-excel" || $file_data=="application/vnd.ms-excel" || 
          $file_data=="application/vnd.ms-excel" 
          || $file_data=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" 
          || $file_data=="application/vnd.openxmlformats-officedocument.spreadsheetml.template" 
          || $file_data=="application/vnd.ms-excel.sheet.macroEnabled.12" 
          || $file_data=="application/vnd.ms-excel.template.macroEnabled.12" 
          || $file_data=="application/vnd.ms-excel.addin.macroEnabled.12" 
          || $file_data=="application/vnd.ms-excel.sheet.binary.macroEnabled.12" 
          and $_FILES['batch']['size']<400000 )
          {// to chekc if data is is an valid excel file
            $excel=SimpleXLSX::parse($_FILES['batch']['tmp_name']);
            for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++)
            { 
              $rowcol=$excel->dimension($sheet);
              $i=0;
              if($rowcol[0]!=1 &&$rowcol[1]!=1)
              {
                foreach ($excel->rows($sheet) as $key => $row) 
                {
                    //print_r($row);
                    $q="";$a=array();
                    // array_push($a,"blue","yellow");
                    // print_r($a);
                    foreach ($row as $key => $cell) 
                    {
                        //print_r($cell);echo "<br>";
                        if($i==0)
                        {
                            // $q.=$cell. " varchar(50),";
                        }else
                        {
                            // $q.="'".$cell. "',";
                            array_push($a,$cell);
                        }//if else $i==0;
                        echo "<br>";
                    }// foreach $row 
                      if(!empty($a)) 
                      { 
                        // print_r($a);
                        $system_user = $a[3]." ".$a[2];
                        if($a[1]=="" && $a[2]=="" && $a[3]=="")
                        {
                            $msg = "no data";
                        }else
                        {
                          $sql = "INSERT INTO requestmonitoring.dbo.mcnewuser (userid, extensionnumber, requestnumber, 
                                  daterequested, datereceived, [department-section],systemusername,systemuser,usertype,dateregistered,infocard,
                                  remarks,requestor,attachment,refyear,dateprocessed) VALUES ('$user_id', '$extension_number', '$request_number','$date_requested ',
                                  '$date_received ', '$a[8]','$a[1]','$system_user','$user_type','$date_registered',
                                  '$info_card','$remarks','$requestor','$attachment','$reference_year','$date_processed')";
                          $stmt = sqlsrv_query( $conn, $sql);
                        }
                      } 
                        echo "<br>";
                        $i++;
                }// for each excel
                  echo $a[4];
              } // if row
            }//for sheet
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has added an MC New User Registration. ";
            redirection_summary('success()',$activity_details,$conn,'success');
          }else
          {// if data is unsuccess it will be log to the activty log
            $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has failed to add an MC New User Registration. ";
            redirection_summary('unsuccess()',$activity_details,$conn,'failed');
          }
  }else
  {
    $activity_details = $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has try to access add form process ";
    redirection_summary('unsuccess()',$activity_details,$conn,'unsuccess');
  }//else of isset
?>
