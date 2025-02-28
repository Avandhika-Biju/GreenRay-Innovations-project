<?php
include("../Assets/Connection/connection.php");
include("SessionValidation.php");
include("Head.php");
if(isset($_GET['aid']))
{
  $insQry="insert into tbl_servicerequest(booking_id,user_id,request_date) values('".$_GET["aid"]."','".$_SESSION["uid"]."',curdate())";
  if($con->query($insQry))
  {
    ?>
    <script>
      alert('inserted')
      </script>
      <?php
  }
  else
  {
    ?>
    <script>
      alert('failed')
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
</head>

<body>
<div class="container mt-5" style="background-image: url('../Assets/Template/Main/img/userbackground.jpg');">
<form id="form1" name="form1" method="post" action="">
<table width="1200" border="1" align="center" cellpadding="10px;" cellpadding="10" style="color:black">
    <tr>
      <td>SL.NO</td>
      <td>ProductName</td>
      <td>Quantity</td>
      <td>CompanyName</td>
      <td>Contact</td>
      <td>Rate</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php
$selQry="select * from tbl_cart ct inner join tbl_product p on ct.product_id=p.product_id inner join tbl_booking b on ct.booking_id=b.booking_id 
inner join tbl_company c on c.company_id=p.company_id where b.user_id='".$_SESSION["uid"]."'";
//	echo $selQry;
$res=$con->query($selQry);
$i=0;
while($row=$res->fetch_assoc())
{
 $i++;

?>      
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row ['product_name']; ?></td>
      <td><?php echo $row ['cart_qty']; ?></td>
      <td><?php echo $row ['company_name']; ?></td>
      <td><?php echo $row ['company_contact']; ?></td>
      <td><?php echo $row ['product_rate']; ?></td>
      <td>
      <td>
      <?php
   if($row["booking_status"]==5 and $row["payment_status"]==1)
   {
    ?> <td>payment Completed and Order Received | <a href="Companyrating.php?sid=<?php echo $row ['company_id']; ?>">Rate Now</a></td>
          <?php
   }
   else if($row["booking_status"]==4 and $row["payment_status"]==1)
   {
      ?>
      <td>Booking Assigned</td>
      <?php
   }
   else if($row["booking_status"]==3 and $row["payment_status"]==1)
   {
      ?>
      <td>Booking Rejected</td>
      <?php
   }
   else if($row["booking_status"]==2 and $row["payment_status"]==1)
   {
      ?>
      <td>Booking Accepted</td>
      <?php
   }
   else if($row["booking_status"]==1 and $row["payment_status"]==0)
   {
      ?>
      <td>Booking Completed</td>
      <?php
   }
   else
   {
      ?>
      <td>Pending</td>
      <?php
   }
   ?>
      </td>
    </tr>
     <?php
}
?>
  </table>
</form>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>