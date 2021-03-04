<?php
require_once('connect.php'); // CONNECTION 
session_start();
    if(isset($_POST['login'])){
        // trim in php is use to remove whitespaces
        $username = trim($_POST['username']);
        $password = trim($_POST['pass']);
        // to avoid sql injection removing slashes in the string 
        $username = stripcslashes($username);
        $pass = stripcslashes($password);
        $password = md5($pass); // to change MD5($pass) MD5 tool for creating an hash from a string  
        if(empty($username) || empty($password)){
            echo("<script>alert('empty fields not available') </script>");
            $_SESSION['error'] = 'loginerror()';    
            header("Location: login.php");
        }else{
            //WHERE THE QUERY HAPPENS; 
            $sql = "SELECT * FROM logindata WHERE userid = '$username' and password1 = '$password'"; // sql for server
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }else{ 
                if($row_count = sqlsrv_has_rows( $stmt )>0){
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['usertype']=$row['usertype'];
                    // $_SESSION['username']=$row['username'];
                    // echo "<br/> ID : ". $_SESSION['ID']."<br/> USERID : ". $_SESSION['userid']."<br/> FIRST NAME :". $_SESSION['firstname']."";
                    $_SESSION['firstname']=$row['firstname'];
                    $_SESSION['middlename']=$row['middlename'];
                    $_SESSION['lastname']=$row['lastname'];
                    $_SESSION['position']=$row['position'];
                    $_SESSION['section-department']=$row['section-department'];
                    $_SESSION['profpic']=$row['profpic'];
                    $_SESSION['password']=$row['password1'];
                    //activity logs
                    $userid = $_SESSION['userid'];
                    $username = $_SESSION['username']; 
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $position = $_SESSION['position'];
                    $activitydate = date("m/d/Y");  
                    $activitytime = date("H:i:s");
                    $activitydetails = $_SESSION['firstname']." ".$_SESSION['lastname']." with user ID ".$_SESSION['userid']. " has logged in. ";
                    $activitystatus = "success";
                    $sql="INSERT INTO requestmonitoring.dbo.activitylogs(userid, username, firstname, lastname, position, activitydate,activitytime,activitydetails,activitystatus)
                        VALUES ('$userid', '$username' , '$firstname','$lastname','$position','$activitydate','$activitytime','$activitydetails','$activitystatus');";
                        $stmt = sqlsrv_query( $conn, $sql);
                    if($_SESSION['usertype']=='admin'){
                        header("Location:admin.php");
                       }else{
                           header("Location: index.php");
                       }//else of $_SESSION 
                    }// end of while $row
                }else{
                    $_SESSION['error'] = 'loginerror()'; 
                         // echo($_SESSION['error']);
                        header("Location: login.php");
                }//else of $row count
            }//else of $stmt 
        }// else of empty
    }else{
        // $_SESSION['error'] = 'loginerror()'; 
        header("Location: login.php");
    }//else of isset

?>