<?php
 $userid         = $_POST['user_id'];
 $username        = $_POST['user_name'];
 $position        = $_POST['position'];
 $usertype         = $_POST['user_type'];
 $firstname         = $_POST['first_name'];
 $middlename         = $_POST['middle_name'];
  $lastname         = $_POST['last_name'];
  $sectiondepartment         = $_POST['section_department'];
  $password         = $_POST['pass_word'];
  $compassword         = $_POST['conpass_word'];
// user_image
        $userid           =$_SESSION['userid'];
        $requestnumber    ="";
        $selector         = $_POST['selector'];
        $requestor        =$_POST['requestor'];
        // $section          = $_POST['section'];
        $department       = $_POST['department'];
        $natureofrequest  = $_POST['nor'];
        $daterequested    = $_POST['daterequested'];
        $datereceived     = $_POST['datereceived'];
        $details          = $_POST['details'];

        $systemusername   = $_POST['sysusername'];
        $systemuser       = $_POST['sysuser'];
        $usertype         = $_POST['usertype'];
        $dateregistered   = $_POST['inputdatereg'];
        $infocard         = $_POST['infocard'];
        $reasonforapplication   = $_POST['reasonforapp'];
        $datechange       = $_POST['datecan'];
        $datereset      = $_POST['datereset'];
        $information      = $_POST['information'];
        $implementationdate   = $_POST['impdate'];
        $dateapproved     = $_POST['dateapproved'];
        $datedone         = $_POST['datedone'];
        $accomplished     = $_POST['accb'];
        $remarks          = $_POST['remarks'];
        $candel           = $_POST['canc'];
        // for attachment handling
        $attachment       = $_FILES['atta']['name'];
        $attachment1      =$_FILES['atta']['tmp_name'];
        $fileext = $_FILES["atta"]["type"];
            $fileext1 = $_FILES["atta"]["size"];
        $target = "../images/".basename($attachment);
        if($fileext=="image/png" || $fileext=="image/jpeg" || $fileext=="image/jpg" || 
        $fileext=="application/pdf" and $_FILES['atta']['size']<400000 ){
        if (move_uploaded_file($attachment1 , $target)) {
        //   $msg = "Image uploaded successfully";
        //   echo $msg;
        $_SESSION['status'] = 'success()'; 
        // header("Location: http://localhost/FORMS/addform.php");
        }else{
        $msg = "Failed to upload image";
        echo $msg;
        $_SESSION['status'] = 'invalid()'; 
        header("Location: ../index1.php");
        }
        }else{
        $_SESSION['status'] = 'invalid()'; 
        header("Location: ../index1.php");
        }
        $refyear = date("y");
        date_default_timezone_set('Singapore');
        $dateprocessed = date("m/d/Y");


?>