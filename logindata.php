<?php
    // Name of the module : logindata.php
    // Module creation date : 11/27/20
    // Author of the Module : Engr. Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This module handles the data inserted in the login page;
    // Done aligning in module to PHQD020
    require_once('connect.php'); // Used for connection
    session_start();// To access $_SESSION variables
    if(isset($_POST['login']))
    { // To check if the button is clicked
        // trim in php is use to remove whitespaces
        $username = trim($_POST['user_name']);
        $password = trim($_POST['password']);
        // to avoid sql injection removing slashes in the string 
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        // to change MD5($pass) MD5 tool for creating an hash from a string  
        $password = md5($password); 
        
        if(empty($username) || empty($password))
        { // Checking for empty User
            // echo("<script>alert('empty fields not available') </script>");
            $_SESSION['Error'] = 'login_error()'; 
            header("Location: login.php");
        }else
        {  //Query to check if the login data has a matching account in our database 
            $sql = "SELECT * FROM logindata WHERE userid = '$username' and password1 = '$password'"; // sql for server
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
                        // Session declaration for User Information
                        $_SESSION['User_id']            = $row['userid'];
                        $_SESSION['User_type']          = $row['usertype'];
                        $_SESSION['First_name']         = $row['firstname'];
                        $_SESSION['Middle_name']        = $row['middlename'];
                        $_SESSION['Last_name']          = $row['lastname'];
                        $_SESSION['Position']           = $row['position'];
                        $_SESSION['Section_department'] = $row['section-department'];
                        $_SESSION['Profile_pic']        = $row['profpic'];
                        $_SESSION['Password']           = $row['password1'];
                        //for Activity logs
                        //***** */
                        date_default_timezone_set('Singapore');
                        $user_id         = $_SESSION['User_id'];
                        $first_name      = $_SESSION['First_name'];
                        $last_name       = $_SESSION['Last_name'];
                        $position        = $_SESSION['Position'];
                        //***** */
                        $activity_date   = date("m/d/Y");  
                        $activity_time   = date("H:i:s");
                        $activity_details= $_SESSION['First_name']." ".$_SESSION['Last_name']." with user ID ".$_SESSION['User_id']. " has logged in. ";
                        $activity_status = "success";
                        $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, firstname, lastname, position, activitydate, activitytime, activitydetails, activitystatus)
                              VALUES ('$user_id', '$first_name', '$last_name', '$position', '$activity_date', '$activity_time', '$activity_details', '$activity_status');";
                        $stmt = sqlsrv_query( $conn, $sql);
                        if($_SESSION['User_type']=='admin')
                        {
                            header("Location:admin.php");//admin page 
                        }else
                        {
                            header("Location: index.php");//user page
                        }//else of $_SESSION 
                    }// end of while $row
                }else
                {
                    $_SESSION['Error'] = 'login_error()'; 
                    header("Location: login.php");
                }//else of $row count
            }
            //else of $stmt 
        }// else of empty
    }else
    {// if the submit button is not clicked or the user directly goes to this page 
        $_SESSION['Error'] = 'login_error()'; 
        header("Location: login.php");
    }//end of else isset

?>