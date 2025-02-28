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

   
<?php
$userid=$_SESSION['uid'];
$sqlQry="select * from tbl_newuser u inner join tbl_place p on u.place_id inner join tbl_district d on
 p.district_id=d.district_id where user_id='".
$userid."'";
$res=$con->query($sqlQry);
$row=$res->fetch_assoc();
?>   
             <div align="center" class="background">
             <body>
              <br>
               <form id="form1" name="form1" method="post" action="">
               <table width="309" height="285"  align="center" cellpadding="10">
          


  <div class="main">
    <div class="card">
      <div ><img src="../Assets/Files/Userphoto/<?php echo $row["user_photo"]?>" alt="Profile Image" class="img-fluid" width="150" height="150"> </div>
      <div class="dgap">Name :&nbsp;&nbsp;<?php echo $row["user_name"]?></div>
      <div class="dgap">Email :&nbsp;&nbsp;<?php echo $row["user_email"]?></div>
      <div class="dgap">Contact :&nbsp;&nbsp;<?php echo $row["user_contact"]?></div>
      <div class="dgap">Address :&nbsp;&nbsp;<?php echo $row["user_address"]?></div>
      <div class="dgap"><a href="EditProfile.php"><div class="bt">Edit Profile</div></a></div>
      <div class="dgap"><a href="ChangePassword.php"><div class="bt">Change Password</div></a></div>
    </div>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>