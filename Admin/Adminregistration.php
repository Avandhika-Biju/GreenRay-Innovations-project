
<?php
include("../Assets/Connection/Connection.php");

include("Head.php");
if(isset($_POST["btnsubmit"]))
{
	$adname=$_POST["txt_name"];
	$adcont=$_POST["txtcontact"];
	$ademail=$_POST["txtemail"];
	$adpass=$_POST["txtpass"];
	$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$adname."','".$adcont."','".$ademail."','".$adpass."')";
	if($con->query($insQry))
	{
		?>
        <script>
		alert("record inserted successfully");
		</script>
        <?php
	}
	else
		{
		?>
        <script>
		alert("record inserted failed");
		</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminregistration.php</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container" style="color:Black;">
        <form id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col">
                    <label for="txt_name">Name</label>
                    <td><input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>

                      </div>
            </div>
           
            <div class="row">
                <div class="col">
                    <label for="txtcontact">Contact</label>
                    <td><input type="text" required name="txtcontact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="txtemail">Email</label>
                    <input type="text" name="txtemail" id="txtemail" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="txtpass">Password</label>
                    <td><input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txtpass" /></td>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn btn-primary" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary" />
                </div>
            </div>
        </form>
        <table class="table mt-5" style="color:white;">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Your PHP code here -->
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
  include("Foot.php");
?>