<!--
Author: Chinmaya Pati
Author URL: https://shonak-chinmayapati.c9users.io
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
		<style>
			#process-label {
				color: #3F51B5; width: 100%; text-align: center; padding-bottom: 10px; display:none;
			}
		</style>
</head>
<body>
	<div class="main">
		<div class="header" >
			<h1>Login or Create a Free Account!</h1>
		</div>
		<p>Lorem iopsum dolor sit amit,consetetur sadipscing eliter,sed diam voluptua.At vero  eso et accusam et justo duo dolores et ea rebum. </p>
			<form>
				<!-- Signup Form -->
				<ul class="left-form">
					<h4 id="process-label">Processing Request...</h4>
					<h2>New Account:</h2>
					<li>
						<input type="text" id="su-inp-username" placeholder="Full Name" required/>
						<span id="su-username"> </span>
						<div class="clear"> </div>
					</li>
					<li id="su-err-username" style="border:none; margin:0px; display:none">
						<p style="color: tomato;">Enter a valid name.</p>
					</li>
					<li>
						<input type="email" id="su-inp-email" placeholder="Email" required/>
						<span id="su-email"> </span>
						<div class="clear"> </div>
					</li> 
					<li id="su-err-email" style="border:none; margin:0px; display:none">
						<p style="color: tomato;">Enter a valid email address.</p>
					</li>
					<li>
						<input type="password" id="su-inp-pwd" placeholder="Password" required/>
						<span id="su-pwd"> </span>
						<div class="clear"> </div>
					</li> 
					<li id="su-err-pwd" style="border:none; margin:0px; display:none">
						<p style="color: tomato;">Password must be alphanumberic 6-15 characters.</p>
					</li>
					<li>
						<input type="password" id="su-inp-cnfpwd" placeholder="Confirm Password" required/>
						<span id="su-cnfpwd"> </span>
						<div class="clear"> </div>
					</li> 
					<li id="su-err-cnfpwd" style="border:none; margin:0px; display:none">
						<p style="color: tomato;">Passwords do not match.</p>
					</li>
					<input type="button" onclick="validateSignup()" value="Create Account">
						<div class="clear"> </div>
				</ul>
			</form>
			
				<!-- Login Form -->
			<form>
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input type="email" id="li-inp-email" placeholder="Email" required/></li>
						<li> <input type="password" id="li-inp-pwd" placeholder="Password" required/></li>
						<h4><a href="#">I forgot my Password!</a></h4><div class="clear"> </div>
						<input type="button" onclick="validateLogin()" value="Login" >
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
			
		</div>
		<!-----start-copyright---->
   			<div class="copy-right">
				<p>Template by <a href="http://w3layouts.com">w3layouts</a></p> 
			</div>
		<!-----//end-copyright---->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>