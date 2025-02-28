<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");

if(isset($_POST["btnupdate"]))
{
	$up="update tbl_newuser set user_name='".$_POST["txtname"]."',user_contact='".$_POST["txtcontact"]."',user_address='".$_POST["txtaddress"]."' where user_id='".$_SESSION["uid"]."' ";
	if($con->query($up)){
        ?>
        <script>
          alert('Updated')
          window.location='EditProfile.php';
        </script>
        <?php
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
<div class="container mt-5" >
        <form id="form1" name="form1" method="post" action="">
            <?php
                $companyid = $_SESSION['cid'];
                $sqlQry = "select * from tbl_company u inner join tbl_place p on u.place_id inner join tbl_district d on p.district_id=d.district_id where company_id='" . $companyid . "'";
                $res = $con->query($sqlQry);
                $row = $res->fetch_assoc();
            ?>
            <b><table class=" table-bordered"width="500" height="400" align="center" cellpadding="10" style="color:black"></b>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtname" id="txtname" value="<?php echo $row["company_name"] ?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail" id="txtemail" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $row["company_contact"] ?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="txtaddress" id="txtaddress" value="<?php echo $row["company_address"] ?>" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnupdate" id="btnupdate" value="Update" class="btn btn-primary" /></td>
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