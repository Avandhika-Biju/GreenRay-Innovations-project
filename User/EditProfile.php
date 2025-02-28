<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");
if(isset($_POST["btnupdate"]))
{
	$up="update tbl_newuser set user_name='".$_POST["txtname"]."',user_contact='".$_POST["txtcontact"]."',user_address='".$_POST[    "txtaddress"]."' where user_id='".$_SESSION["uid"]."' ";
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background-image: url(../Assets/Template/Main/img/blue-background.jpg);"><style>
  .background{
    background-image: url("../Assets/Template/Main/img/blue-background.jpg");
  }
  .card {
    background:  #ADD8E6;
    padding: 29px 16px;
    width: fit-content;
    border-radius: 10px;
    background-color:  #ADD8E6;
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
            <?php
                $userid=$_SESSION['uid'];  
                $sqlQry="select * from tbl_newuser u inner join tbl_place p on u.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$userid."'";
                $res=$con->query($sqlQry);
                $row=$res->fetch_assoc();
            ?>


            <div align="center" class="background">
             <body>
              <br>
             <form id="form1" name="form1" method="post" action="">
             <table width="309" height="285" align="center" cellpadding="10" style="color:white">
                
            </table>
            <div class="main">
            <div class="card">
          <div ><img src="../Assets/Files/Userphoto/<?php echo $row["user_photo"]?>" alt="Profile Image" class="img-fluid" width="150" height="150"> </div>
                 <div class="dgap"> <tr>
                    <td>Name</td>
                    <td><label for="txtname"></label>
                        <input type="text" name="txtname" id="txtname" value="<?php echo $row["user_name"] ?>" class="form-control"  />
                    </td>
                   </tr>
                  <div class="dgap"><tr>
                    <td>Contact</td>
                    <td><label for="txtcontact"></label>
                        <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $row["user_contact"] ?>" class="form-control"  />
                    </td>
                  </tr>
                  <div class="dgap"><tr>
                   <td>Address</td>
                    <td><label for="txtaddress"></label> 
                        <input type="text" name="txtaddress" id="txtaddress" value="<?php echo $row["user_address"] ?>" class="form-control"  />
                    </td>
                  </tr>
                 <div class="dgap"><input type="submit" name="btnupdate" id="btnupdate" value="Update" class="btn btn-primary"/></div></a></div>
     
    </div>
  </div>
        </form>
    </div>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>
