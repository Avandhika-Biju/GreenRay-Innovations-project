<?php
ob_start();
include("../Assets/Connection/connection.php");
include("SessionValidated.php");
include("Head.php");
if(isset($_GET["aid"]))
{
  $update="update tbl_booking set booking_status=2 where booking_id='".$_GET["aid"]."'";
  $con->query($update);
  header("location:UserBooking.php");
}
if(isset($_GET["rid"]))
{
  $update="update tbl_booking set booking_status=3 where booking_id='".$_GET["rid"]."'";
  $con->query($update);
  header("location:UserBooking.php");
}
if(isset($_GET["complete"]))
{
  $update="update tbl_booking set booking_status=5 where booking_id='".$_GET["complete"]."'";
  $con->query($update);
  header("location:UserBooking.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<body style="background-image: url(../Assets/Template/Main/img/yyyy.jpg);">
</style>
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>SL.NO</th>
              <th>Product Name</th>
              <th>Quality</th>
              <th>Rate</th>
              <th>User Name</th>
              <th>Contact</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
               $sel="select * from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_newuser u on u.user_id=b.user_id where p.company_id='".$_SESSION["cid"]."'";
              $data=$con->query($sel);
              $i=0;
              while($row=$data->fetch_assoc()) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i?></td>
              <td><?php echo $row["product_name"]?></td>
              <td><?php echo $row["cart_qty"]?></td>
              <td><?php echo $row["product_rate"]?></td>
              <td><?php echo $row["user_name"]?></td>
              <td><?php echo $row["user_contact"]?></td>
              <td>
                <?php
                if($row["booking_status"]==1)
                {
?>
<a href="UserBooking.php?aid=<?php echo $row["booking_id"]?>" class="btn btn-success">Accept</a> | <a href="UserBooking.php?rid=<?php echo $row["booking_id"]?>" class="btn btn-danger">Reject</a>
<?php
                }
else if($row["booking_status"]==2)
{
  ?>
  <a href="ViewStaff.php?did=<?php echo $row["booking_id"]?>">Assign</a>
  <?php
}
else if($row["booking_status"]==4)
{
  echo "Assigned";?> | <a href="UserBooking.php?complete=<?php echo $row["booking_id"]?>">Order Arrived</a>
  <?php
}
else if($row["booking_status"]==5)
{
  echo "Order Completed";
}
else
{
  echo "Rejected";
}

                
                ?>
                </td> 
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>

</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>