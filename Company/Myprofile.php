<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");
ob_start();
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
<style>
.background{
    background-image: url("../Assets/Template/Main/img/light.jpg");
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
    background-color: #00008B;
  }
  .dgap {
    margin-top:10px;
  }
  .bt {
    padding: 10px;
    background: #00008B;
    border-radius: 10px;
  }
  .bt:hover {
    background: #ADD8E6;
  }
</style>
<body>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <?php
            $companyid = $_SESSION['cid'];
            $selQry = "SELECT * FROM tbl_company u INNER JOIN tbl_place p ON u.place_id = p.place_id INNER JOIN tbl_district d ON p.district_id = d.district_id WHERE company_id='" . $companyid . "'";
            $res = $con->query($selQry);
            $row = $res->fetch_assoc();
            ?>
             

           </form>
            <form id="form1" name"form1 method="post" action="">
             <b><table class=" table-bordered"width="200" height="260" align="center" cellpadding="10" style="color:black"></b>
                <tr>
                    <td colspan="2" align="center"><img src="../Assets/Files/Userlogo/<?php echo $row ['company_logo']; ?>"width="150" height="150" style="border-radius:10px;" /></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $row["company_name"] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row["company_email"] ?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?php echo $row["company_contact"] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $row["company_address"] ?></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><?php echo $row["district_id"] ?></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><?php echo $row["place_id"] ?></td>
                </tr>
                <tr>
                <td><a href="EditProfile.php" class="btn btn-primary">Edit Profile</a></td>
                <td><a href="ChangePassword.php" class="btn btn-primary">Change Password</a></td>
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