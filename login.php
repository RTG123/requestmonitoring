<?php
    // Name of the module : login.php
    // Module creation date : 11/24/20
    // Author of the Module : Rian Canua
    // Revision History : Rev 0  == DONE
    // Description : This is the login module of the system where in the valid users are only allowed to log in
    // Done aligning in module to PHQD020
    require_once('FOLDERS/SES/SESLOGIN.php'); // Redirection 
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"><!-- CSS -->
    <link rel="stylesheet" href="css/animate.css"><!-- Additional plugins -->
    <title>Requests Monitoring System</title><!-- Title of the system -->
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body onload="<?php echo $_SESSION['Error'];?>">
	<div class="container">
		<div class="img">
			<img src="img/tpc-removebg-preview.png">
		</div>  <!--end of div class = img -->
		<div class="login-content">
			<form action="logindata.php" method="POST">
                <h3 class="title">Welcome</h3>
                <!-- Username -->
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username" name="user_name" required>
           		   </div>
                </div> <!--end of div class =input-div one-->
                <!-- Password -->
           		<div class="input-div pass">
           		    <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		    </div>
           		    <div class="div">
           		    	<h5>Password</h5>
                        <input type="password" class="input" id ="pass" name="password" required >
                        <span style="color: green; margin-bottom: 100px;" class="eye" onclick="unsee()" >
                        <!-- Eye Icon -->
                            <i id="reveal"class="fa fa-eye"  ></i>
                            <i id="hide"class="fa fa-eye-slash" ></i>
                        </span>
                    </div>             
                </div><!--end of div class =input-div pass-->
                <!-- Invalid Notification -->
                <p id="wrong" class="w3-center w3-animate-right" style="display:none; color:#000;background-color:#ffdddd ">INVALID USERNAME OR PASSWORD</p>
            	<a >  &nbsp  </a>
            	<input type="submit" class="btn" name="login" value="Login">
            </form>
        </div> <!--end of div class =login-content-->
    </div><!--end of div class =container-->
    <script type="text/javascript" src="js/login.js"></script>
    <script href="js/net.js"></script>
    <script type="text/javascript" src="js/net.js"></script>
    <script>
        //For eye icon to see through password 
        function unsee()
        {
            var x= document.getElementById("pass");
            var y= document.getElementById("reveal");
            var z= document.getElementById("hide");
            if(x.type === "password")
            {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none"
            console.log("successfull")
            }else
            {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block"
            console.log("unsuccess")
            }
        }
        function login_error()
        {
            document.getElementById("wrong").style.display="";
            <?php $_SESSION['Error'] = '';?>
        }
    </script>
</body>
</html>