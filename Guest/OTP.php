<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OTP</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  .body{
    background-image: url("../Assets/Template/11.jpg");
  }
  </style>
<body>
  <div class="body">
<?php
ob_start();
session_start();
//include("Head.php");
if(isset($_POST["btnsubmit"]))
{
	if($_SESSION["token"]==$_POST["txtotp"])
	{
		?>
		<script>
		window.location="ResetPassword.php";
		</script>
		<?php
		
	}
	else
	{
		?>
		<script>
		alert("Invalid OTP");
		window.location="OTP.php";
		</script>
		<?php
		
	}
}
?>
<br><br><br><br />
<div id="tab" align="center">
<div class="container">
    <form id="form1" name="form1" method="post" action="">
      <h2>OTP</h2>
      <p>&nbsp;</p>
      <table class="table table-bordered" style="width: 200px; margin: 0 auto;" cellpadding="10">
        <tr>
          <td>
            <p>Enter OTP</p>
            <div class="input-group">
              <input type="text" class="form-control" name="txtotp" id="txtotp" placeholder="6 digit code" required="required" autocomplete="off">
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div align="center">
              <input type="submit" class="btn btn-primary" name="btnsubmit" id="btnsubmit" value="Submit" />
            </div>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
//include("Foot.php");
?>
</div>
</body>
</html>