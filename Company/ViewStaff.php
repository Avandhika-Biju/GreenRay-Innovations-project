<?php
ob_start();
include("../Assets/Connection/Connection.php");
 include("SessionValidated.php");
 if(isset($_GET["did"]))
 {
  $_SESSION["bid"]=$_GET["did"];
 }
include("Head.php");
if(isset($_GET["aid"]))
{
$ins="insert into tbl_assignwork(staff_id,booking_id)values('".$_GET["aid"]."','".$_SESSION["bid"]."')";
if($con->query($ins))
{
  $up="update tbl_booking set booking_status=4 where booking_id='".$_SESSION["bid"]."'";
  $con->query($up);
  header("location:UserBooking.php");
}
}
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Staff</title>
</head>
 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SI NO</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $seldta="select *  from tbl_staff where company_id='".$_SESSION["cid"]."'";
    $datas=$con->query($seldta);
    $i=0;
    while($rsdata=$datas->fetch_assoc())
    {
        $i++;
    ?>
    <tr>
   
      <td><?php echo $i?></td>
      <td><?php echo $rsdata['staff_name'] ?></td>
    
     <td> <a href="ViewStaff.php?aid=<?php echo $rsdata['staff_id']?>" class ="btn btn-danger">Assign</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<?php
include("Foot.php") ;
ob_flush();
?>