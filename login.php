<!DOCTYPE html>
<?php
require_once('FOLDERS/SES/SESLOGIN.php'); // CONNECTION 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script href="js/net.js"></script>
    <script type="text/javascript" src="js/net.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Additional plugins -->
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="Dashboard">
      <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
      <title>Requests Monitoring System</title>
    
      <!-- Favicons -->
      <link rel="icon" type="image/png" href="images/favicon.ico" />
      <!-- <link href="img/Icon.png" rel="icon"> -->
      <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

</head>
<body onload="<?php echo $_SESSION['error'];?>">
    <!-- <img class="wave" src="img/tpc-removebg-preview.png"> -->
   
	<div class="container">
		<div class="img">
			<img src="img/tpc-removebg-preview.png">
		</div>
		<div class="login-content">
			<form action="logindata.php" method="POST">
                <h3 class="title">Welcome</h3>
                <!-- <div id="wrong "  class="w3-container" > -->
              
                <!-- </div> -->
                <!-- **** USERNAME **** -->
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username" name="username" required>
           		   </div>
                </div> <!-- **** END OF USERNAME **** -->
                <!-- **** PASSWORD **** -->
                
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
                           <input type="password" class="input" id ="pass" name="pass" required >
                           <span style="color: green; margin-bottom: 100px;" class="eye" onclick="unsee()" >
                   <i id="hide1"class="fa fa-eye"  ></i>
                   <i id="hide2"class="fa fa-eye-slash" ></i>
                </span>
                   </div>             
                </div><!-- **** END OF PASSWORD **** -->
                <p id="wrong" class="w3-center w3-animate-right" style="display:none; color:#000;background-color:#ffdddd ">INVALID USERNAME OR PASSWORD</p>
            	<a href="forgotpass.php">Forgot Password?</a>
                
            	<input type="submit" class="btn" name="login" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
   
    <script>
        function unsee(){
            var x= document.getElementById("pass");
            var y= document.getElementById("hide1");
            var z= document.getElementById("hide2");

            if(x.type === "password"){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none"
            console.log("successfull")
            }else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block"
            console.log("unsuccess")
            }
        }
        function loginerror(){
            document.getElementById("wrong").style.display="";
            <?php $_SESSION['error'] = '';?>
        }
    </script>
</body>
</html>