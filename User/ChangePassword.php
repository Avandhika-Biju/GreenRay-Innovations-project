<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");
if(isset($_POST["btnchangepass"]))
{ 

     $sel="select * from tbl_newuser where user_id='".$_SESSION["uid"]."' and user_password='".$_POST["txtoldpass"]."'";
     echo $sel;
     $row=$con->query($sel);
  if($data=$row->fetch_assoc())
  {
	;
	if($_POST["txtnewpass"]==$_POST["txtconpass"])
	{
		$update="update tbl_newuser set user_password='".$_POST["txtnewpass"]."' where user_id='".$_SESSION["uid"]."'";
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body style="background-image: url(../Assets/Template/Main/img/blue-background.jpg);">
<style>
  .background{
    background-image: url("../Assets/Template/Main/img/blue-background.jpg");
  }
  .card {
    background: #ADD8E6;
    padding: 29px 16px;
    width: fit-content;
    border-radius: 10px;
    background-color: #ADD8E6;
  }
  .main {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }
  .circular-photo{
    width:200px;
    height:200px;
    border-radius:50%;
    object-fit:cover;
    background-color: #000088;
  }
  .dgap {
    margin-top:10px;
  }
  .bt {
    padding: 10px;
    background: #000088;
    border-radius: 10px;
  }
  .bt:hover {
    background: #ADD8E6;
  }
</style>
<div align="center" class="background">
<body>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
      <table width="600" height="560"  align="center" cellpadding="10" style="color:white">
</table>
            <div class="main">
            <div class="card">
          
        <tr>
          <td>Old Password</td>
          <td>
              <label for="txtoldpass"></label>
              <input type="text" name="txtoldpass" id="txtoldpass" class="form-control" />
          </td>
        </tr>
        <tr>
          <td>New Password</td>
          <td>
              <label for="txtnewpass"></label>
              <input type="text" name="txtnewpass" id="txtnewpass" class="form-control" />
          </td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td>
              <label for="txtconpass"></label>
              <input type="text" name="txtconpass" id="txtconpass" class="form-control" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
              <input type="submit" name="btnchangepass" id="btnchangepass" value="Submit" class="btn btn-primary" />
          </td>
        </tr>
      
    </form>
  </div>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>