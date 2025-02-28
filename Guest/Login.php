<?php
session_start();
include("../Assets/Connection/Connection.php");


if(isset($_POST['btnlogin']))
{
		$email=$_POST['txtemail'];
		$pwd=$_POST['txtpwd'];
		$selUser="select * from tbl_newuser where user_email='".$email."'and user_password='".$pwd."'";
		$selAdmin="select * from tbl_admin where admin_email='".$email."'and admin_password='".$pwd."'";
		$selCompany="select * from tbl_company where company_email='".$email."'and company_password='".$pwd."'";
		
		$resUser=$con->query($selUser);
		$resAdmin=$con->query($selAdmin);
		$resCompany=$con->query($selCompany);
		
		if($row=$resUser->num_rows>0)
		{
			$row=$resUser->fetch_assoc();
			$_SESSION['uid']=$row['user_id'];
			$_SESSION['uname']=$row['user_name'];
			header("location:../User/Homepage.php");
		}
		else if($resAdmin->num_rows>0)
		{
			$row=$resAdmin->fetch_assoc();
			$_SESSION['aid']=$row['admin_id'];
			$_SESSION['aname']=$row['admin_name'];
			header("location:../Admin/Homepage.php");
			
		}
		else if($resCompany->num_rows>0)
		{
			$row=$resCompany->fetch_assoc();
			$_SESSION['cid']=$row['company_id'];
			$_SESSION['cname']=$row['company_name'];
			header("location:../Company/Homepage.php");
			
		}
}
	
?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../Assets/Template/Main/imgg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100" >
						<input class="input100" type="text" name="txtemail" placeholder="Enter Your Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="txtpwd" placeholder="Enter Your Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
                    <b><a href="ForgotPassword.php" class="nav-item nav-link active">Forgot Password</a></b>
</div>
                    
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="btnlogin">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<b><a href="../index.php">Back to Home</a><b>
					</div>
				

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Template/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/Template/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/js/main.js"></script>

</body>
</html>

