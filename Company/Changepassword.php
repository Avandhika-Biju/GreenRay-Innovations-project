<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");

if(isset($_POST["btnchangepwd"]))
{ 
$sel="select * from tbl_company where company_id='".$_SESSION['cid']."' and company_password='".$_POST["txtoldpwd"]."'";
$row=$con->query($sel);
if($data=$row->fetch_assoc())
{
	
	if($_POST["txtnewpwd"]==$_POST["txtconfirmpwd"])
	{
		$update="update tbl_company set company_password='".$_POST["txtnewpwd"]."' where company_id='".$_SESSION['cid']."'";
		$con->query($update);
		header("location:../Guest/Login.php");
	}
	else{
		echo "Password MisMatch";
	}
}
else{
	echo "Invalid Password";
}
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
</style>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
        <b><table class=" table-bordered"width="500" height="400" align="center" cellpadding="10" style="color:black"></b>
                <tr>
                    <td>Old Password</td>
                    <td><input type="password" name="txtoldpwd" id="txtoldpwd" class="form-control" /></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="txtnewpwd" id="txtnewpwd" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="txtconfirmpwd" id="txtconfirmpwd" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnchangepwd" id="btnchangepwd" value="Change Password" class="btn btn-primary" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>
