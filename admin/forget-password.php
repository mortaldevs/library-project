<?php
	include '../db.php';
	//This code runs if the form has been submitted
if (isset($_POST['reset']))
{
  $email = $_POST['email'];
  $query = "select * from wp_admin where admin_email='$email'";  
  $run = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $check = mysqli_num_rows($run);
  $row = mysqli_fetch_assoc($run);
  $name = $row['admin_name'];
  $password = $row['admin_password'];
    if($check==1){
        $to = "$email";
        $subject = "Admin Password";
        $txt = "Hello $name here is your Password: $password ";
        $headers = "From: support@gcuw.com" . "\r\n" .
        "CC: support@gcuw.com";

        mail($to,$subject,$txt,$headers);
        echo "<script>window.open('admin_login.php', '_self')</script>";
        exit();
    }else{
			echo "<script>alert('Wrong Email Address!!!')</script>";
			echo "<script>window.open('forget-password.php','_self')</script>";
      exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recover Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/img/apple-icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets1/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets1/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets1/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="forget-password.php">
					<span class="login100-form-title">
						Admin Email
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Admin Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="reset" type="submit">
							RESET PASSWORD
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Remember Details?
						</span>
						<a class="txt2" href="admin_login.php">
							LOGIN
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/bootstrap/js/popper.js"></script>
	<script src="assets1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets1/js/main.js"></script>

</body>
</html>