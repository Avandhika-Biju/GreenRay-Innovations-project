<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recovery</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  .body{
    background-image: url("../Assets/Template/11.jpg");
  }
.required {
  color: red;
}
span
{
	color: red;
	text: 12px;
	font-size: 14px;
	
}
</style>
</head>
<div class="body">
<body>
  
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include("../Assets/Connection/Connection.php");

// include("Head.php");

if(isset($_POST["btnotp"]))
{
$email=$_POST["txtemail"];
echo $sel="select * from tbl_newuser where user_email='$email'";
$res = $con->query($sel);
$row = $res->fetch_assoc();
$name = $row["user_name"];
$email=test_input($email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
	?>
    <script>
    alert("Invalid email");
	window.location="RecoveryPassword.php";
	</script>
    <?php
    }	
else
{	
	
	$_SESSION["femail"]=$_POST["txtemail"];
	$ran=rand(100000,999999);
		$_SESSION["token"]=$ran;
	require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'greenrayinnovations@gmail.com';// Your gmail
    $mail->Password = 'cmcgtjoynfmdufmf'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom( 'greenrayinnovations@gmail.com'); // Your gmail
    $mail->addAddress($_POST["txtemail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Recover Password";
    $mail->Body = "Hello"." ".$name." "."Your OTP for New Password is"." ".$_SESSION["token"]."";
  if($mail->send())
  {

		?>
		<script>
	 window.location="OTP.php";
		
		</script>
        <?php
	
  }
  else
  {
		?>
		<script>
		    alert("Failed");
		
		</script>
        <?php
	
  }

}
  	}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<br><br><br><br><br><br><br><br>
<div id="tab" align="center">
<div class="container">
    <form id="form1" name="form1" method="post" action="">
      <table class="table table-bordered" style="border: 1px solid #000; padding: 10px;">
        <tr>
          <td>
            <h2>Account Recovery</h2>
          </td>
        </tr>
        <tr>
          <td>
            <p>Enter Email <span class="required"> *</span></p>
            <div class="input-group">
              <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Email" size="35" onfocusout="validateEmail(this)" required="required" autocomplete="off">
              <div class="input-group-append">
                <span class="input-group-text" id="email">@example.com</span>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div align="center">
              <input type="submit" class="btn btn-primary" name="btnotp" id="btnotp" value="Send OTP" />
            </div>
          </td>
        </tr>
      </table>
      <br><br><br>
    </form>
  </div>
</div>

</body>
</div>
</html>
<script src="../Assets/JQ/jQuery.js"></script>




<?php 
// include("Foot.php")
?>