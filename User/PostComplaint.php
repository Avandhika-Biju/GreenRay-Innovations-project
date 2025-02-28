<?php
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btn_submit"]))
{
	
$csubject=$_POST["txt_subject"];	
$complaint=$_POST["txt_comp"];

if($_GET["cmid"]!="")
{
$insQry="insert into tbl_complaint(complaint_subject,complaint_details,company_id,user_id,complaint_date)values('".$csubject."','".$complaint."','".$_GET["cmid"]."','".$_SESSION["uid"]."',curdate())";
if($con->query($insQry))
{
 ?>
    <script>
     alert("Complaint Registered");
     window.location="Homepage.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed to register complaint");
 window.location="PostComplaint.php";
</script>
<?php	
}
}
else
{
	$insQry="insert into tbl_complaint(complaint_subject,complaint_details,complaint_date,user_id)values('".$csubject."','".$complaint."',curdate(),'".$_SESSION['uid']."')";
if($con->query($insQry))
{
 ?>
    <script>
     alert("Complaint Registered");
     window.location="Homepage.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed to register complaint");
 window.location="PostComplaint.php";
</script>
<?php	
}
}
}


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PostComplaint</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<p><a href="HomePage.php"> Home</a></p>
 <?php
 ob_start();
include("Head.php");
?>
    <div class="container mt-5" style="background-image: url('../Assets/Template/Main/img/sol-tec1.jpg');">
        <form id="form1" name="form1" method="post" action="">
            <div class="text-center">
                <table class="table" width="358" height="287" cellpadding="10" style="color:white">
                    <tr>
                        <td width="121">Subject:</td>
                        <td width="221"><input type="text" name="txt_subject" id="txt_subject" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Complaint:</td>
                        <td><textarea name="txt_comp" id="txt_comp" cols="45" rows="5" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary" />
                            <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-secondary" />
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
       
</body>
</html>